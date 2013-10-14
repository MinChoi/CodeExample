<?
	$this->StyleBox->ConfirmMessageStart('pollmsg','');
	$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
	
	/*
?>
<div id="filterbar" style="display:block<?//=($this->Session->check('News'))?'block':'none';?>;">
	<div id="filter-block">
		<form action="/admin/news/filter" method="POST" name="filter_news">
		<table cellspacing="0" cellpadding="4" border="0">
			<tr>
				<td>Filter News</td>
				<td></td>
				<td></td>
				<td>Sort By</td>
			</tr>
			<tr>
				<?=$this->element('admin/news/category');?>
				<?=$this->element('admin/news/authors');?>
				<td><?=$this->Form->input('News.status',array('selected'=>$this->Session->read('News.publish'),'options'=>array('-1'=>'view all status','1'=>'Published','0'=>'Unpublished'),'type'=>'select','label'=>false));?></td>
				<?=$this->element('admin/news/sort');?>
			</tr>
			<tr>
				<td colspan="4"><div align="right">
				<a href="/admin/news/clrfilter" onclick="clearFilter();" class="clearlink">Clear Filters</a>
				<input type="submit" value="Apply" name="filterbtn" class="search-btn" />
				</div></td>
			</tr>
		</table>
		</form>
	</div>
	<div id="search-block">
		<form action="/admin/news/search" method="POST">
			<div><b>Search by Keyword</b></div>
			<?=$this->Form->input('News.search',array('value'=>$this->Session->read('News.search'),'class'=>'focus','default'=>'Enter Keyword','label'=>false,'focus_txt'=>'Enter Keyword'));?>
			<div>
				<a href="/admin/news/clrsearch" class="clearlink">Clear Search</a>
				<input type="submit" value="Search" name="filterbtn" class="search-btn" />
			</div>
		</form>
	</div>
</div>
<!--
<div>
	<a href="javascript:void(0);" onclick="searchFilter();" class="button"><span>Search / Filter</span></a>
</div>
-->
<script type="text/javascript">
	function searchFilter(){
		Effect.toggle('filterbar','blind', { duration: 0.3 });
		if($('filterbar').visible()){
				new Ajax.Request('/admin/news/clearfilters/',
					{
						method:'get',
						onSuccess: function(transport){
							var response = transport.responseText || "no response text";
						}
					});
		}
	}
</script>
*/
?>

<form action="" onsubmit="return false;">
<input type="hidden" name="selected_ids" id="selected_ids" value="" />
</form>


<div id="index-block" style="clear:both;">
	<div id="indexrows">
		<?
		$i = 0;
		foreach ($polls as $poll):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<input type="hidden" id="closed_<?= $poll['Poll']['id']; ?>" name="closed_<?= $poll['Poll']['id']; ?>" value="<?= $poll['Poll']['closed']; ?>" />
			<div id="rowid_<?= $poll['Poll']['id']; ?>" class="row">
				<div class="rowitem" style="width: 40%;">
					<div class="title">
						<?=$poll['Poll']['name'];?>
					</div>
				</div>
				<div class="rowitem" style="width: 12%; padding-left: 20px;"><div class="rowcell">
					
					<? if($poll['Poll']['published']==1){ ?>
						<?= $poll['Poll']['total_responses']; ?>
					<? }else{ ?>
						<b style="color:#737070"><?= $poll['Poll']['total_responses']; ?></b>
					<? } ?>
					<br />
					<span>responses</span>
				</div></div>
				<div class="rowitem" style="width: 12%; padding-left: 20px;"><div class="rowcell">
					
					
					<? if($poll['Poll']['published']==1){ ?>
						<span>active since</span><br />
						<?= date('d.m.Y',strtotime($poll['Poll']['published_date'])); ?>
					<? }elseif($poll['Poll']['closed']==1){ ?>
						<span>active since</span><br />
						<b style="color:#737070"><?= date('d.m.Y',strtotime($poll['Poll']['published_date'])); ?></b>
					<? } ?>
				</div></div>
				<div class="rowitem <? if($poll['Poll']['closed']==1){ ?>closed<? } ?>" style="width: 12%; padding-left: 20px;"><div class="rowcell">
					<? if($poll['Poll']['closed']==1){ ?>
						<span>Closed on</span><br />
						<b style="color:#737070"><?= date('d.m.Y',strtotime($poll['Poll']['unpublished_date'])); ?></b>
					<? } ?>
					<? if($poll['Poll']['close_date_chk']==1 && $poll['Poll']['closed']==0){ ?>
						<span>Closes on</span><br />
						<b style="color:#737070"><?= date('d.m.Y',strtotime($poll['Poll']['close_date'])); ?></b>
					<? } ?>
				</div></div>
				<div id="publish_<?=$poll['Poll']['id'];?>" class="rowitem <? if($poll['Poll']['published']==1 && $poll['Poll']['closed']==0){ ?>active<? } ?>" style="width: 15%; padding-left: 20px;"><div class="rowcell">
					<? if($poll['Poll']['published']==1 && $poll['Poll']['closed']==0){ ?>
						<b style="color:#39EF00">Current Poll</b>
					<? }else if($poll['Poll']['published']==0 && $poll['Poll']['closed']==0){ ?>
						<b style="color:#737070">Not Published</b>
					<? }else if($poll['Poll']['published']==0 && $poll['Poll']['closed']==1){ ?>
						<b style="color:#737070">Poll Closed</b>
					<? } ?>
				</div></div>
			</div>
		<? endforeach; ?>
	</div>
	<?=$this->element('admin/modules/paging',array('limit'=>$this->Session->read('Poll_Pag.limit'),'view_url'=>$this->params['controller']));?>
	<div class="paging">
		Display <?= $this->Paginator->counter(); ?>
		<?= html_entity_decode($this->Paginator->prev('&laquo;', array(), null, array('class'=>'disabled')));?>
		<?= $this->Paginator->numbers(array('separator'=>''));?>
		<?= html_entity_decode($this->Paginator->next('&raquo;', array(), null, array('class' => 'disabled')));?>
	</div>
	<div id="afm">
		<div id="afm-inner">
			<a href="/admin/polls/add" class="addnewpolls"></a>
			<ul id="footer-action">
				
			</ul>
		</div>
	</div>
	
	<script type="text/javascript">
		function processRows()
		{
			record_rows = $$('div.row');
			record_rows.each(function(e){
				e.observe('click', function(event){
					if(Event.element(event).hasClassName('rowselected') || Event.element(event).hasClassName('row'))
						ele = Event.element(event);
					else
						ele = Event.element(event).up('div.row') || Event.element(event).up('div.rowselected');
					if(typeof(ele) != 'undefined')
					{
						if(isCtrl==false)
						{
							result_i = $$('div.row,div.div.rowselected');
							result_i.each(function(e_i){
								e_i.addClassName("row");
							});
							$('selected_ids').value = ele.id.gsub('rowid_', '');
							
							itemselect(
										ele,
										$('selected_ids').value.gsub('rowid_', ''),
										ele.childElements()[4].hasClassName('active'),
										ele.childElements()[3].hasClassName('closed')
										);
							if(ele.hasClassName("rowselected")==false)
								ele.addClassName("rowselected");
						}else{
							
							var selected_ids = $('selected_ids').value.split(',');

							if(selected_ids.length>0 && selected_ids.indexOf(ele.id.gsub('rowid_', ''))>-1){
								$('selected_ids').value = selected_ids.without(ele.id.gsub('rowid_', '')).join(',');
							}else if(ele.up(0).hasClassName("rowselected")==false){
								if($('selected_ids').value.trim().length==0){
									$('selected_ids').value = ele.id.gsub('rowid_', '');
								}else{
									selected_ids[selected_ids.length] = ele.id.gsub('rowid_', '');
									$('selected_ids').value = selected_ids.join(',');
								}
							}
							Groupselect();
							
							if(ele.hasClassName("rowselected")==false)
								ele.addClassName("rowselected");
							else{
								ele.removeClassName("rowselected");
								ele.addClassName("row");
							}
								
						}
					}
				});
				e.observe('dblclick', function(event){
					if(Event.element(event).hasClassName('rowselected') || Event.element(event).hasClassName('row'))
						ele = Event.element(event);
					else
						ele = Event.element(event).up('div.row') || Event.element(event).up('div.rowselected');
					$id = ele.id.gsub('rowid_', '');
					if($id>0 && ele.childElements()[3].hasClassName('closed')==false && ele.childElements()[4].hasClassName('active')==false){
						location.href='/admin/polls/edit/'+$id;
					}
				}); 
			});
		}
	
		function Groupselect(){
			$('footer-action').update(GroupFooterActioHtml());
		}
	
		function GroupFooterActioHtml()
		{
			
			$action_html = '<li class="blank">'+$('selected_ids').value.split(',').length+' items selected:</li><li class="delete"><a class="delete" onclick="grpDeleteConfirm();return false;" href="#" title="Delete" >Delete</a></li>';
			return $action_html
		}
		
		function grpDeleteConfirm(){
			$('pollmsg').down(1).update('Are you sure you want to delete these '+$('selected_ids').value.split(',').length+' items? ');
			$('pollmsg').down('div.cmsg_content_small').update('You are about to delete the selected items. This action cannot be undone.');
			$('pollmsg').down('a.green').writeAttribute('onclick',"doGAction('delete');hideStyleBox('pollmsg');return false;");
			showStyleBox('pollmsg');
		}
	
		function doGAction(action)
		{
			if(action=='delete'){
				if($('selected_ids').value.trim().length>0){
					new Ajax.Request('/admin/polls/deleteall',
						  {
							method:'post',
							parameters: { 'ids': $('selected_ids').value },
							onSuccess: function(transport){
							  var response = transport.responseText || "no response text";
							  if(response.trim()=='Deleted Sccuessfully'){
								location.href="/admin-polls";
							  }
							},
							onFailure: function(){ alert('Something went wrong...') }
						  });
				}else{
					alert('Select an item to delete.');
				}
			}
		}
	
		function itemselect(element,$id,$pstatus,$closed){
			result = $$('div.row,div.rowselected');
			result.each(function(e){
				if(e.id==element.id){
					e.writeAttribute("class","rowselected");
				}else{
					e.writeAttribute("class","row");
				}
			});
			$('footer-action').update(footerActioHtml($id,$pstatus,$closed));
		}
		
		function footerActioHtml($id,$pstatus,$closed)
		{
			$action_html = '<li class="blank">1 item selected:</li>';
			if($pstatus==true && $closed==false){
				$action_html +='<li><a class="" onclick="doAction('+$id+',\'unpublish\',\'pub_'+$id+'\',$(this));return false;"  href="#" title="Unpublish" >Close</a></li>'
			}else if($pstatus==false && $closed==false){
				//$action_html +='<li><a class="" onclick="doAction('+$id+',\'publish\',\'pub_'+$id+'\',$(this));return false;"  href="#" title="Publish" >Publish</a></li>'
				$action_html +='<li><a href="/admin/polls/publish/'+$id+'" title="Publish">Open</a></li>'
			}
			if($pstatus==false && $closed==false){
				$action_html +='<li><a href="/admin/polls/edit/'+$id+'" title="Edit">Edit</a></li>'
			}
				
			$action_html +='<li><a href="/admin/polls/view/'+$id+'"  title="Preview" >View Results</a></li><li class="delete"><a class="delete"  href="/admin/polls/delete/'+$id+'" onclick="deleteConfirm(this.href);return false;" title="Delete" >Delete</a></li>';
			return $action_html
		}
		
		function deleteConfirm(href){
			$('pollmsg').down(1).update('Are you sure you want to delete this item?');
			$('pollmsg').down('div.cmsg_content_small').update('You are about to delete the selected item. This action cannot be undone.');
			$('pollmsg').down('a.green').writeAttribute('href',href);
			$('pollmsg').down('a.green').writeAttribute('onclick',"");
			showStyleBox('pollmsg');
		}
		
		
		function doAction(id,action,response_id,ele)
		{
			switch(action)
			  {
				case 'publish':
						ele.update('Close');
						ele.writeAttribute("onclick","doAction("+id+",'unpublish','pub_"+id+"',$(this));return false;");
						$('rowid_'+id).childElements()[3].down(0).update('');
						$('rowid_'+id).childElements()[4].down(0).update('<b style="color:#39EF00">Current Poll</b>');
				break;
				case 'unpublish':
						ele.update('Open');
						ele.writeAttribute("onclick","doAction("+id+",'publish','pub_"+id+"',$(this));return false;");
						$('rowid_'+id).childElements()[3].down(0).update('<span>Closed on</span><br /><b style="color:#737070"><?= date('d.m.Y'); ?></b>');
						$('rowid_'+id).childElements()[4].down(0).update('<b style="color:#737070">Poll Closed</b>');
						
						$('publish_'+id).removeClassName('active');
				break;
			  }
			new Ajax.Request('/admin/polls/'+action+'/'+id,
			  {
				method:'get',
				onSuccess: function(transport){
				  var response = transport.responseText || "no response text";
				},
				onFailure: function(){ alert('Something went wrong...') }
			  });

		} 
	</script>
</div>
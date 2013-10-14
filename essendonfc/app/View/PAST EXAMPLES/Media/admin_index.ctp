<?
	$this->StyleBox->ConfirmMessageStart('mediamsg','');
	$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
?>
<div id="filterbar">
	<div id="filter-block">
		<form action="/admin/media/filter" method="POST" name="filter_pages">
		<table cellspacing="0" cellpadding="4" border="0">
			<tr>
				<td class="filter_colour">Filter Media</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td class="filter_colour">Sort By</td>
			</tr>
			<tr>
				<?=$this->element('admin/media/mediatype');?>
				<?=$this->element('admin/media/authors');?>
				<?=$this->element('admin/media/category');?>
				<td><?=$this->Form->input('Media.published',array('selected'=>$this->Session->read('FMedia.published'),'options'=>array('-1'=>'view all status','1'=>'Published','0'=>'Unpublished'),'type'=>'select','label'=>false));?></td>
				<td><?=$this->Form->input('Media.featured',array('selected'=>$this->Session->read('FMedia.featured'),'options'=>array('-1'=>'view all status','1'=>'Featured','0'=>'Not Featured'),'type'=>'select','label'=>false));?></td>
				<?=$this->element('admin/media/sort');?>
			</tr>
			<tr>
				<td colspan="6">
					<div align="right">
						<a href="/admin/media/clrfilter" class="clearlink">Clear Filters</a> <!--onclick="clearFilter();"-->
						<input type="submit" value="Apply" name="filterbtn" class="search-btn" />
					</div>
				</td>
			</tr>
		</table>
		</form>
	</div>
	<div id="search-block">
		<form action="/admin/media/search" method="POST">
			<div class="filter_colour"><b>Search by Keyword</b></div>
			<?=$this->Form->input('Media.search',array('value'=>$this->Session->read('Media.search'),'class'=>'focus','default'=>'Enter Keyword','label'=>false,'focus_txt'=>'Enter Keyword'));?>
			<div>
				<a href="/admin/media/clrsearch" class="clearlink">Clear Search</a>
				<input type="submit" value="Search" name="filterbtn" class="search-btn" />
			</div>
		</form>
	</div>
</div>
<?
/*
<div>
	<a href="javascript:void(0);" onclick="searchFilter();" class="button"><span>Search / Filter</span></a>
</div>

<script type="text/javascript">
	function searchFilter(){
		Effect.toggle('filterbar','blind', { duration: 0.3 });
		if($('filterbar').visible()){
				new Ajax.Request('/admin/pages/clearfilters/',
					{
						method:'get',
						onSuccess: function(transport){
							var response = transport.responseText || "no response text";
						}
					});
		}
	}
</script>
<!--Filter Bar Ends -->
*/
?>

<form action="" onsubmit="return false;">
<input type="hidden" name="selected_ids" id="selected_ids" value="" />
</form>
<div id="index-block" style="clear:both;">
	<div id="indexrows">
		<?
		$i = 0;
		foreach ($media as $media):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<div id="rowid_<?= $media['Media']['id']; ?>" class="row">
				<div class="rowitem" style="width:30%">
					<div class="<?= ($media['Media']['media_type_id']==1)?'ivideo':'iaudio'; ?>">
						<?= $media['Media']['title']; ?>
					</div>
				</div>
				<div class="rowitem" style="width:8%;padding-left:20px;"><div class="rowcell">
					<?= $media['Media']['duration']; ?>
				</div></div>
				<div class="rowitem" style="width:17%;padding-left:20px;"><div class="rowcell">
					<?= $media['Category']['name']; ?>
				</div></div>
				<div class="rowitem" style="width:10%;padding-left:20px;"><div class="rowcell">
					<? if($media['Media']['featured']==1){ ?>
					<div class="featuredstar"></div>
					<span>featured</span>
					<? } ?>
				</div></div>
				<div class="rowitem" style="width:16%"><div class="rowcell">
					<span><?= date('d/m/Y',strtotime($media['Media']['modified'])); ?></span><br />
					<? 
					if(intval($media['Media']['modified_by'])>0)
						echo $media['MUser']['username'] .'<br /><span><i>edited this item</i></span>';
					else
						echo $media['CUser']['username'] .'<br /><span><i>created this item</i></span>';
					?>
				</div></div>
				<div class="rowitem" style="width:10%"><div class="rowcell">
					<? 
						echo (intval($media['Media']['published'])==1)?'<div id="pub_'.$media['Media']['id'].'" class="published">Published</div>':'<div id="pub_'.$media['Media']['id'].'" class="unpublished">Unpublished</div>';
					?>
				</div></div>
			</div>
		<? endforeach; ?>
	</div>

	<?=$this->element('admin/modules/paging',array('limit'=>$this->Session->read('Media_Pag.limit'),'view_url'=>$this->params['controller']));?>
<div class="paging">
	Display <?= $this->Paginator->counter(); ?>
	<?= html_entity_decode($this->Paginator->prev('&laquo;', array(), null, array('class'=>'disabled')));?>
	<?= $this->Paginator->numbers(array('separator'=>''));?>
	<?= html_entity_decode($this->Paginator->next('&raquo;', array(), null, array('class' => 'disabled')));?>
</div>

<div id="afm">
	<div id="afm-inner">
		<a href="/admin/media/add" class="addnewmedias"></a>
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
										ele.childElements()[5].down(1).hasClassName('published')
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
					if($id>0){
						location.href='/admin/media/edit/'+$id;
					}
				});
			});
		}
	
	
		function Groupselect(){
			$('footer-action').update(GroupFooterActioHtml());
		}
	
		function GroupFooterActioHtml()
		{
			
			$action_html = '<li class="blank">'+$('selected_ids').value.split(',').length+' items selected:</li><li><a class="" onclick="doGAction(\'unpublish\');return false;" href="#" title="Unpublish" >Unpublish</a></li><li><a class="" onclick="doGAction(\'publish\');return false;" href="#" title="Publish" >Publish</a></li><li class="delete"><a class="delete" onclick="grpDeleteConfirm();return false;" href="#" title="Delete" >Delete</a></li>';
			return $action_html
		}
		
		function grpDeleteConfirm(){
			$('mediamsg').down(1).update('Are you sure you want to delete these '+$('selected_ids').value.split(',').length+' items? ');
			$('mediamsg').down('div.cmsg_content_small').update('You are about to delete the selected items. This action cannot be undone.');
			$('mediamsg').down('a.green').writeAttribute('onclick',"doGAction('delete');hideStyleBox('mediamsg');return false;");
			showStyleBox('mediamsg');
		}
	
		function doGAction(action)
		{
			if(action=='delete'){
				if($('selected_ids').value.trim().length>0){
					$selectedids = $('selected_ids').value.split(',');
					$selectedids.each(function(id){
						$('rowid_'+id).remove();;
					});
					
					new Ajax.Request('/admin/media/deleteall/'+<?=$this->Paginator->counter(array('format' => '%page%'));?>,
						  {
							method:'post',
							parameters: { 'ids': $('selected_ids').value },
							onSuccess: function(transport){
							  var response = transport.responseText || "no response text";
							  if(response.trim()!='' || response.trim()!="no response text"){
								$newindexrows = $('indexrows').innerHTML;
								$('indexrows').update($newindexrows+response.trim());
								processRows();
							  }
							},
							onFailure: function(){ alert('Something went wrong...') }
						  });
					$('selected_ids').value = "";
				}else{
					alert('Select an item to delete.');
				}
			}else{
				if($('selected_ids').value.trim().length>0){
					$selectedids = $('selected_ids').value.split(',');
					$selectedids.each(function(id){
						switch(action)
						  {
							case 'publish':
									$('pub_'+id).update('Published');
									$('pub_'+id).writeAttribute("class",'published');
									break;
							case 'unpublish':
									$('pub_'+id).update('Unpublished');
									$('pub_'+id).writeAttribute("class",'unpublished');
									break;
						  }
					});
				
					new Ajax.Request('/admin/media/'+action+'all',
						  {
							method:'post',
							parameters: { 'ids': $('selected_ids').value },
							onSuccess: function(transport){
							  var response = transport.responseText || "no response text";
							},
							onFailure: function(){ alert('Something went wrong...') }
						  });
				}else{
					alert('Please Select an Item.');
				}
			 }
		}
	
	
	
		function itemselect(element,$id,$pstatus){
			result = $$('div.row,div.rowselected');
			result.each(function(e){
				if(e.id==element.id){
					e.writeAttribute("class","rowselected");
				}else{
					e.writeAttribute("class","row");
				}
			});
		
			$('footer-action').update(footerActioHtml($id,$pstatus));
		}
		
		function footerActioHtml($id,$pstatus)
		{
			$action_html = '<li class="blank">1 item selected:</li><li><a class="" href="/admin/media/edit/'+$id+'" title="Edit" >Edit</a></li>';
			if($pstatus==1){
				$action_html +='<li><a class="" onclick="doAction('+$id+',\'unpublish\',\'pub_'+$id+'\',$(this));return false;"  href="#" title="Unpublish" >Unpublish</a></li>'
			}else{
				$action_html +='<li><a class="" onclick="doAction('+$id+',\'publish\',\'pub_'+$id+'\',$(this));return false;"  href="#" title="Publish" >Publish</a></li>'
			}
			$action_html +='<li class="delete"><a class="delete"  href="/admin/media/delete/'+$id+'" onclick="deleteConfirm(this.href);return false;" title="Delete" >Delete</a></li>';
			return $action_html
		}
		
		function deleteConfirm(href){
			$('mediamsg').down(1).update('Are you sure you want to delete this item?');
			$('mediamsg').down('div.cmsg_content_small').update('You are about to delete the selected item. This action cannot be undone.');
			$('mediamsg').down('a.green').writeAttribute('href',href);
			$('mediamsg').down('a.green').writeAttribute('onclick',"");
			showStyleBox('mediamsg');
		}
		
		function doAction(id,action,response_id,ele)
		{
			switch(action)
			  {
				case 'publish':
						ele.update('Unpublish');
						ele.writeAttribute("onclick","doAction("+id+",'unpublish','pub_"+id+"',$(this));return false;");
						$(response_id).update('Published');
						$(response_id).writeAttribute("class",'published');
				break;
				case 'unpublish':
						ele.update('Publish');
						ele.writeAttribute("onclick","doAction("+id+",'publish','pub_"+id+"',$(this));return false;");
						$(response_id).update('Unpublished');
						$(response_id).writeAttribute("class",'unpublished');
				break;
			  }
			new Ajax.Request('/admin/media/'+action+'/'+id,
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
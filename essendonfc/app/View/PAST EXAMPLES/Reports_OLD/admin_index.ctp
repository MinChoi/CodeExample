<?
	$this->StyleBox->ConfirmMessageStart('reportmsg','');
	$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
?>
<?
	/*
    $this->Paginator->options(
            array('update'=>'maincontent', 
                    'url'=>array('controller'=>'news', 'action'=>'index','admin'=>true),
					'indicator' => 'loadingDiv'
					));
	*/
?>


<div id="filterbar" style="display:block;">
	<div id="filter-block">
		<form action="/admin/reports/filter" method="POST" name="filter_news">
		<table cellspacing="0" cellpadding="4" border="0">
			<tr>
				<td>Filter Reports</td>
				<td>Sort By</td>
			</tr>
			<tr>
				<?=$this->element('admin/reports/category');?>
				<?=$this->element('admin/reports/sort');?>
			</tr>
			<tr>
				<td colspan="3"><div align="right">
				<a href="/admin/reports/clrfilter" onclick="clearFilter();" class="clearlink">Clear Filters</a>
				<input type="submit" value="Apply" name="filterbtn" class="search-btn" />
				</div></td>
			</tr>
		</table>
		</form>
	</div>
	<div id="search-block">
		<form action="/admin/reports/search" method="POST">
			<div><b>Search by Keyword</b></div>
			<?=$this->Form->input('Report.search',array('value'=>$this->Session->read('Report.search'),'class'=>'focus','default'=>'Enter Keyword','label'=>false,'focus_txt'=>'Enter Keyword'));?>
			<div>
				<a href="/admin/reports/clrsearch" class="clearlink">Clear Search</a>
				<input type="submit" value="Search" name="filterbtn" class="search-btn" />
			</div>
		</form>
	</div>
</div>

<form action="" onsubmit="return false;">
<input type="hidden" name="selected_ids" id="selected_ids" value="" />
</form>

<div id="index-block" style="clear:both;">
	<div id="indexrows">
		<?
		$i = 0;
		foreach ($reports as $report):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<div id="rowid_<?= $report['Report']['id']; ?>" class="row">
				<div class="rowitem" style="width:40%">
					<div class="title"><?=$report['Report']['name'];?></div>
				</div>
				<div class="rowitem" style="width:25%;padding-left:20px;"><div class="rowcell">
					<?=$report['Category']['name'];?>
				</div></div>
				<div class="rowitem" style="width:13%;padding-left:20px;"><div class="rowcell">
					<span>Report last run</span><br />
					<?=date('d/m/Y',strtotime($report['Report']['last_run'])); ?>
				</div></div>
				<div class="rowitem" style="width:14%"><div class="rowcell">
					<span><?= date('d/m/Y',strtotime($report['Report']['modified'])); ?></span><br />
					<? 
					if(intval($report['Report']['modified_by'])>0)
						echo $report['MUser']['username'] .'<br /><span><i>edited this item</i></span>';
					else
						echo $report['CUser']['username'] .'<br /><span><i>created this item</i></span>';
					?>
				</div></div>
			</div>
		<? endforeach; ?>
	</div>
	<?=$this->element('admin/modules/paging',array('limit'=>$this->Session->read('Reports_Pag.limit'),'view_url'=>$this->params['controller']));?>
	<div class="paging">
		Display <?= $this->Paginator->counter(); ?>
		<?= html_entity_decode($this->Paginator->prev('&laquo;', array(), null, array('class'=>'disabled')));?>
		<?= $this->Paginator->numbers(array('separator'=>''));?>
		<?= html_entity_decode($this->Paginator->next('&raquo;', array(), null, array('class' => 'disabled')));?>
	</div>
	<div id="afm">
		<div id="afm-inner">
			<a href="/admin/reports/add" class="addnewreports"></a>
			<ul id="footer-action">
				
			</ul>
		</div>
	</div>
	
	<script type="text/javascript">
	<!--
		function processRows(){
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
										$('selected_ids').value.gsub('rowid_', '')
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
						location.href='/admin/reports/edit/'+$id;
					}
				});
			});
		}
	
		function Groupselect(){
			$('footer-action').update(GroupFooterActioHtml());
		}
	
		function GroupFooterActioHtml(){
			
			$action_html = '<li class="blank">'+$('selected_ids').value.split(',').length+' items selected:</li><li class="delete"><a class="delete" onclick="grpDeleteConfirm();return false;" href="#" title="Delete" >Delete</a></li>';
			return $action_html
		}
		
		function grpDeleteConfirm(){
			$('reportmsg').down(1).update('Are you sure you want to delete these '+$('selected_ids').value.split(',').length+' items? ');
			$('reportmsg').down('div.cmsg_content_small').update('You are about to delete the selected items. This action cannot be undone.');
			$('reportmsg').down('a.green').writeAttribute('onclick',"doGAction('delete');hideStyleBox('reportmsg');return false;");
			showStyleBox('reportmsg');
		}
	
		function doGAction(action){
			if(action=='delete'){
				if($('selected_ids').value.trim().length>0){
					new Ajax.Request('/admin/reports/deleteall',
						  {
							method:'post',
							parameters: { 'ids': $('selected_ids').value },
							onSuccess: function(transport){
							  var response = transport.responseText || "no response text";
							  if(response.trim()=='Deleted Sccuessfully'){
								location.href="/admin-reports";
							  }
							},
							onFailure: function(){ alert('Something went wrong...') }
						  });
				}else{
					alert('Select an item to delete.');
				}
			}
		}

		function itemselect(element,$id){
			result = $$('div.row,div.rowselected');
			result.each(function(e){
				if(e.id==element.id){
					e.writeAttribute("class","rowselected");
				}else{
					e.writeAttribute("class","row");
				}
			});
			$('footer-action').update(footerActioHtml($id));
		}
		
		function footerActioHtml($id){
			$action_html = '<li class="blank">1 item selected:</li><li><a class="" href="/admin/reports/edit/'+$id+'" title="Edit" >Edit</a></li><li><a class="" href="/admin/reports/copy/'+$id+'" title="Duplicate">Duplicate </a></li><li><a class="preview" href="/admin/reports/run/'+$id+'"  title="Preview" target="_blank" >Run Report</a></li><li class="delete"><a class="delete"  href="/admin/reports/delete/'+$id+'" onclick="deleteConfirm(this.href);return false;" title="Delete" >Delete</a></li>';
			return $action_html
		}
		
		function deleteConfirm(href){
			$('reportmsg').down(1).update('Are you sure you want to delete this item?');
			$('reportmsg').down('div.cmsg_content_small').update('You are about to delete the selected item. This action cannot be undone.');
			$('reportmsg').down('a.green').writeAttribute('href',href);
			$('reportmsg').down('a.green').writeAttribute('onclick',"");
			showStyleBox('reportmsg');
		}
	//-->
	</script>
</div>
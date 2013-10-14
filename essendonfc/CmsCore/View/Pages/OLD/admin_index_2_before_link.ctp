<div id="filterbar" style="display:block<?//=($this->Session->check('Page'))?'block':'none';?>;">
	<div id="filter-block">
		<form action="/admin/pages/filter" method="POST" name="filter_pages">
		<table cellspacing="0" cellpadding="4" border="0">
			<tr>
				<td>Filter Pages</td>
				<td></td>
				<td></td>
				<td></td>
				<td>Sort By</td>
			</tr>
			<tr>
				<?=$this->element('admin/pages/sections');?>
				<?=$this->element('admin/pages/authors');?>
				<td><?=$this->Form->input('Page.status',array('selected'=>$this->Session->read('Page.publish'),'options'=>array('-1'=>'view all status','1'=>'Published','0'=>'Unpublished','2'=>'Hidden'),'type'=>'select','label'=>false));?></td>
				<?=$this->element('admin/pages/sort');?>
			</tr>
			<tr>
				<td colspan="5">
					<div align="right">
						<a href="/admin/pages/clrfilter" class="clearlink">Clear Filters</a> <!--onclick="clearFilter();"-->
						<input type="submit" value="Apply" name="filterbtn" class="search-btn" />
					</div>
				</td>
			</tr>
		</table>
		</form>
	</div>
	<div id="search-block">
		<form action="/admin/pages/search" method="POST">
			<div><b>Search by Keyword</b></div>
			<?=$this->Form->input('Page.search',array('value'=>$this->Session->read('Page.search'),'class'=>'focus','default'=>'Enter Keyword','label'=>false,'focus_txt'=>'Enter Keyword'));?>
			<div>
				<a href="/admin/pages/clrsearch" class="clearlink">Clear Search</a>
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

<form action="" onsubmit="return false;">
<input type="hidden" name="selected_ids" id="selected_ids" value="" />
</form>
<div id="index-block" style="clear:both;">
	<div id="indexrows">
		<?
		$i = 0;
		foreach ($pages as $page):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<?
				if($page['Page']['islink']==1){
				?>
					<input type="hidden" id="page_url_<?= $page['Page']['id']; ?>" value="<?= $page['Page']['link']; ?>" />
				<?
				}else{
					if(strlen(trim($page['ParentPage']['name']))>0){
					?>
					<input type="hidden" id="page_url_<?= $page['Page']['id']; ?>" value="http://<?=$_SERVER['HTTP_HOST'];?>/<?= strtolower(urlencode(str_replace(array('&','/',' '),array('and','or','-'),$page['ParentPage']['name'])));?>/<?= strtolower(urlencode(str_replace(array('&','/',' '),array('and','or','-'),$page['Page']['name']))); ?>.html" />
					<?
					}else{
					?>
					<input type="hidden" id="page_url_<?= $page['Page']['id']; ?>" value="http://<?=$_SERVER['HTTP_HOST'];?>/<?= strtolower(urlencode(str_replace(array('&','/',' '),array('and','or','-'),$page['Page']['name']))); ?>.html" />
					<?
					}
				}
			?>
			<input type="hidden" id="sitemap_id_<?= $page['Page']['id']; ?>" value="<?= $page['Page']['sitemap_id']; ?>" />
			<div id="rowid_<?= $page['Page']['id']; ?>" class="row">
				<div class="rowitem" style="width:40%">
					<div class="title">
					<?= $page['Page']['name']; ?>
					</div>
				</div>
				<div class="rowitem" style="width:21%;padding-left:20px;"><div class="rowcell">
					<? 
					if(intval($page['Page']['page_id'])==0){
						echo $page['Sitemap']['start_menu'];
					}else{
						
						if(isset($page['TParentPage']['name']) && strlen(trim($page['TParentPage']['name']))>0){
						?>
						<?=$text->truncate($page['TParentPage']['name'],28);?>
						<?
						}else{
						echo $page['Sitemap']['start_menu'];
						}
						echo '<br /><span>('.$text->truncate($page['ParentPage']['name'],28).')</span>';
					}
					?>
				</div></div>
				<div class="rowitem" style="width:14%;padding-left:20px;"><div class="rowcell">
					<span><?= date('d/m/Y',strtotime($page['Page']['modified'])); ?></span><br />
					<? 
					if(intval($page['Page']['modified_by'])>0)
						echo $page['MUser']['username'] .'<br /><span><i>edited this item</i></span>';
					else
						echo $page['CUser']['username'] .'<br /><span><i>created this item</i></span>';
					?>
				</div></div>
				<div class="rowitem" style="width:16%"><div class="rowcell">
					<? 
						echo (intval($page['Page']['published'])==1)?'<div id="pub_'.$page['Page']['id'].'" class="published">Published</div>':'<div id="pub_'.$page['Page']['id'].'" class="unpublished">Unpublished</div>';
						echo (intval($page['Page']['showatmenu'])==0)?'<div id="sam_'.$page['Page']['id'].'" class="hidden">Hidden</div>':'<div id="sam_'.$page['Page']['id'].'" class="">&nbsp;</div>';
					?>
				</div></div>
			</div>
		<? endforeach; ?>
	</div>

	<?=$this->element('admin/modules/paging',array('limit'=>$this->Session->read('Page_Pag.limit'),'view_url'=>$this->params['controller']));?>
<div class="paging">
	Display <?= $this->Paginator->counter(); ?>
	
	<!--<?
	/*echo $this->Paginator->counter(array(
		'format' => 'Page %page% of %pages%, showing %current% records out of
				 %count% total, starting on record %start%, ending on %end%'
	)); */
	?>-->
	<?= html_entity_decode($this->Paginator->prev('&laquo;', array(), null, array('class'=>'disabled')));?>
	<?= $this->Paginator->numbers(array('separator'=>''));?>
	<?= html_entity_decode($this->Paginator->next('&raquo;', array(), null, array('class' => 'disabled')));?>
</div>
			<?
				//echo $ajax->link(' ',array( 'controller' => 'pages', 'action' => 'add', 'admin'=>true),array('class'=>'addnewpage', 'update' => 'maincontent','indicator' => 'loadingDiv','complete'=>'updateActionMenu()'));
			?>
	<div id="afm">
		<div id="afm-inner">
			<a href="/admin-sitemap/1/pages" class="addnewpages"></a>
			<a href="/admin-sitemap/1/pages" class="normal">Add link</a>
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
										ele.childElements()[3].down(1).hasClassName('published'),
										!ele.childElements()[3].down(1).next().hasClassName('hidden')
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
						location.href='/admin/pages/edit/'+$id;
					}
				});
			});
		}
	
	
		function Groupselect(){
			$('footer-action').update(GroupFooterActioHtml());
		}
	
		function GroupFooterActioHtml()
		{
			
			$action_html = '<li class="blank">'+$('selected_ids').value.split(',').length+' pages selected:</li><li><a class="" onclick="doGAction(\'unpublish\');return false;" href="#" title="Unpublish" >Unpublish</a></li><li><a class="" onclick="doGAction(\'publish\');return false;" href="#" title="Publish" >Publish</a></li><li><a class="" onclick="doGAction(\'hide\');return false;" href="#" title="Hidden" >Hide</a></li><li><a class="" onclick="doGAction(\'show\');return false;" href="#" title="Show" >Show</a></li><li class="delete"><a class="delete"  onclick="doGAction(\'delete\');return false;" href="#" title="Delete" >Delete</a></li>';
			return $action_html
		}
	
		function doGAction(action)
		{
			if(action=='delete'){
				if($('selected_ids').value.trim().length>0){
					$selectedids = $('selected_ids').value.split(',');
					$selectedids.each(function(id){
						$('rowid_'+id).remove();
						$('page_url_'+id).remove();
						$('sitemap_id_'+id).remove();
					});
					
					new Ajax.Request('/admin/pages/listdeleteall/'+<?=$this->Paginator->counter(array('format' => '%page%'));?>,
						  {
							method:'post',
							parameters: { 'text': $('selected_ids').value },
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
									$('rowid_'+id).childElements()[3].down(1).update('Published');
									$('rowid_'+id).childElements()[3].down(1).writeAttribute("class",'published');
									break;
							case 'unpublish':
									$('rowid_'+id).childElements()[3].down(1).update('Unpublished');
									$('rowid_'+id).childElements()[3].down(1).writeAttribute("class",'unpublished');
									break;
							case 'show':
									$('rowid_'+id).childElements()[3].down(1).next().update('&nbsp;');
									$('rowid_'+id).childElements()[3].down(1).next().writeAttribute("class",'');
									break;
							case 'hide':
									$('rowid_'+id).childElements()[3].down(1).next().update('Hidden');
									$('rowid_'+id).childElements()[3].down(1).next().writeAttribute("class",'hidden');
									break;
						  }
					});
				
					new Ajax.Request('/admin/pages/'+action+'all',
						  {
							method:'post',
							parameters: { 'text': $('selected_ids').value },
							onSuccess: function(transport){
							  var response = transport.responseText || "no response text";
							},
							onFailure: function(){ alert('Something went wrong...') }
						  });
				}else{
					alert('Please Select an Item.');
				}
			/*
			
				$selectedids = $('selected_ids').value.split(',');
				$selectedids.each(function(id){
					new Ajax.Request('/admin/pages/'+action+'/'+id.gsub('rowid_', ''),
					  {
						method:'get',
						onSuccess: function(transport){
						  var response = transport.responseText || "no response text";
						 
						},
						onFailure: function(){ alert('Something went wrong...') }
					  });
				  });*/
			 }
		}
	
	
	
		function itemselect(element,$id,$pstatus,$sam){
			result = $$('div.row,div.rowselected');
			result.each(function(e){
				if(e.id==element.id){
					e.writeAttribute("class","rowselected");
				}else{
					e.writeAttribute("class","row");
				}
			});
		
			$('footer-action').update(footerActioHtml($id,$pstatus,$sam));
			

			if($('c2c')){
				$('c2c').remove();
			}
			$id = $id.gsub('rowid_', '');
			if($('page_url_'+$id).value.trim().length>0){
				copyfunc('http://'+$('page_url_'+$id).value.gsub('http://', ''),'copied'+$id);
			}
		}
		
		function footerActioHtml($id,$pstatus,$sam)
		{
			$action_html = '<li class="blank">1 page selected:</li><li><a class="" href="/admin/pages/edit/'+$id+'" title="Edit" >Edit</a></li><li><a class="" href="/admin/pages/copy/'+$id+'" title="Copy" >Copy</a></li>';
			if($pstatus==1){
				$action_html +='<li><a class="" onclick="doAction('+$id+',\'unpublish\',\'pub_'+$id+'\',$(this));return false;"  href="#" title="Unpublish" >Unpublish</a></li>'
			}else{
				$action_html +='<li><a class="" onclick="doAction('+$id+',\'publish\',\'pub_'+$id+'\',$(this));return false;"  href="#" title="Publish" >Publish</a></li>'
			}
			
			if($sam==1){
				$action_html +='<li><a class="" onclick="doAction('+$id+',\'hide\',\'sam_'+$id+'\',$(this));return false;"  href="#" title="Hidden" >Hide</a></li>'
			}else{
				$action_html +='<li><a class="" onclick="doAction('+$id+',\'show\',\'sam_'+$id+'\',$(this));return false;"  href="#" title="Show" >Show</a></li>'
			}
				
			$action_html +='<li><a id="copied'+$id+'" class="" href="#" title="Copy Url" onclick="return false;">Copy Url</a></li><li><a class=""  href="/admin-sitemap/'+$('sitemap_id_'+$id).value+'/'+$id+'" title="Show in Sitemap">Show in Sitemap</a></li><li><a class="preview" target="_blank"  href="'+$('page_url_'+$id).value+'" title="Preview" >Preview</a></li><li class="delete"><a class="delete"  href="#" onclick="$(\'selected_ids\').value=\''+$id+'\';doGAction(\'delete\');return false;" title="Delete" >Delete</a></li>';
			return $action_html
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
				case 'show':
						ele.update('Hide');
						ele.writeAttribute("onclick","doAction("+id+",'hide','sam_"+id+"',$(this));return false;");
						$(response_id).update('&nbsp;');
						$(response_id).writeAttribute("class",'');
				break;
				case 'hide':
						ele.update('Show');
						ele.writeAttribute("onclick","doAction("+id+",'show','sam_"+id+"',$(this));return false;");
						$(response_id).update('Hidden');
						$(response_id).writeAttribute("class",'hidden');
				break;
			  }
			new Ajax.Request('/admin/pages/'+action+'/'+id,
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
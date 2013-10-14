<form>
<input type="hidden" name="selected_ids" id="selected_ids" value="" />
</form>
<div id="temp">
</div>
<div id="index-block" style="clear:both;">
	<div id="indexrows">
		<?
		$i = 0;
		foreach ($memberGroups as $memberGroup):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<div id="rowid_<?= $memberGroup['MemberGroup']['id']; ?>" class="row">
				<div class="rowitem" style="width:37%">
					<div class="title">
					<?= $memberGroup['MemberGroup']['name']; ?>
					</div>
				</div>
				<div class="rowitem" style="width:13%;padding-left:20px;"><div class="rowcell">
					<b><?= $number->currency($memberGroup['MemberGroup']['price'], 'USD'); ?></b>
					<span> inc GST</span>
				</div></div>
				<div class="rowitem" style="width:10%;padding-left:20px;"><div class="rowcell">
					<span class="green"><?= $memberGroup['MemberGroup']['members_count']; ?></span><br />
					<span>members</span>
				</div></div>
				<div class="rowitem" style="width:16%;padding-left:20px;"><div class="rowcell">
					<? if(intval($memberGroup['MemberGroup']['approval_required'])==1){?>
						<span class="yellow"><?= $memberGroup['MemberGroup']['pending_count']; ?></span><br />
						<span>pending</span>
					<? }else{?>
						<span>pending not enabled for this tier</span>
					<? }?>
				</div></div>
				<div class="rowitem" style="width:10%;padding-left:20px;"><div class="rowcell">
					<? 
						echo (intval($memberGroup['MemberGroup']['published'])==1)?'<div id="pub_'.$memberGroup['MemberGroup']['id'].'" class="published">Published</div>':'<div id="pub_'.$memberGroup['MemberGroup']['id'].'" class="unpublished">Unpublished</div>';
					?>
				</div></div>
			</div>
		<? endforeach; ?>
	</div>

	<?=$this->element('admin/modules/paging',array('limit'=>$this->Session->read('Page_Pag.limit'),'view_url'=>$this->params['controller']));?>
	<div class="paging">
		<?= html_entity_decode($this->Paginator->prev('&laquo;', array(), null, array('class'=>'disabled')));?>
		<?= $this->Paginator->numbers(array('separator'=>''));?>
		<?= html_entity_decode($this->Paginator->next('&raquo;', array(), null, array('class' => 'disabled')));?>
	</div>
	
<?
	$this->StyleBox->startSmall('memgedit','View/Edit Member Tier','width:400px;height:235px;left:34%;','');
?>
		
	<form id="memgroupfrm" onsubmit="return false;">	
		<div class="slb_rbox">
			<div class="slb_rbox-top"><div></div></div>
			<div class="slb_rbox-content">
				<?
					echo $this->Form->input('MemberGroup.id',array('type'=>'hidden'));
					echo $this->Form->input('MemberGroup.name',array('style'=>'width:335px;','label'=>'Tire Name'));
					echo $this->Form->input('MemberGroup.price',array('style'=>'width:100px;text-align:right;','label'=>'Tier Cost','between'=>'<b style="color:black;
margin-right:6px;">$</b>','after'=>'<b style="color:black;
margin-left:4px;">AUD</b>','onKeyPress'=>'return numbersonly(this, event,$(this));'));
				?>
			</div>
			<div class="slb_rbox-btm"><div></div></div>
		</div>
	</form>
	<a href="#" onclick="updateMemGroup();return false" style="float:right;"><img src="/CORE/admin_theme/css/images/slb_save_btn.png" alt="Save Member Group" /></a>		
<?
	$this->StyleBox->endSmall('');
?>
			<?
				//echo $ajax->link(' ',array( 'controller' => 'pages', 'action' => 'add', 'admin'=>true),array('class'=>'addnewpage', 'update' => 'maincontent','indicator' => 'loadingDiv','complete'=>'updateActionMenu()'));
			?>
	<div id="afm">
		<div id="afm-inner">
			<!--<a href="/admin-sitemap/1/pages" class="addnewpages"></a>
			<a href="/admin-sitemap/1/pages" class="normal">Add link</a>-->
			<ul id="footer-action">
				
			</ul>
		</div>
	</div>
	
	<script type="text/javascript">
		String.prototype.contains = function(t) { 
		 return this.indexOf(t) >= 0 ? true : false ;
		};
		function numbersonly(myfield, e, ifield)
		{
		var key;
		var keychar;

		if (window.event)
		   key = window.event.keyCode;
		else if (e)
		   key = e.which;
		else
		   return true;
		keychar = String.fromCharCode(key);

		// control keys
		if ((key==null) || (key==0) || (key==8) || 
			(key==9) || (key==13) || (key==27) )
		   return true;

		// numbers
		else if ((("0123456789").indexOf(keychar) > -1))
		   return true;

		// decimal point jump
		else if (keychar == ".")
		   {
			if(ifield.value.contains('.'))
				return false;
			else
				return true;
		   }
		else
		   return false;
		}

		
		function addCommas(nStr)
		{
			nStr += '';
			x = nStr.split('.');
			x1 = x[0];
			x2 = x.length > 1 ? '.' + x[1] : '';
			var rgx = /(\d+)(\d{3})/;
			while (rgx.test(x1)) {
				x1 = x1.replace(rgx, '$1' + ',' + '$2');
			}
			return x1 + x2;
		}

		function updateMemGroup(){
			ele = $('rowid_'+$('MemberGroupId').value.trim());
			ele.down(1).update($('MemberGroupName').value);
			ele.down(0).next(0).down(1).update('$'+addCommas($('MemberGroupPrice').value));
			hideStyleBox('memgedit');
			new Ajax.Request('/admin/member_groups/ajaxupdate/',
			  {
				method:'post',
				parameters: { 
					'id' : $('MemberGroupId').value,
					'name': $('MemberGroupName').value,
					'price': $('MemberGroupPrice').value
				},
				onSuccess: function(transport){
					var ivalue = transport.responseText || "no response text";
			  },
				onFailure: function(){ alert('Something went wrong...') }
			  });
		}
		
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
							$('selected_ids').value = ele.id;
							
							itemselect(
										ele,
										$('selected_ids').value.gsub('rowid_', ''),
										ele.childElements()[4].down(1).hasClassName('published')
										);
							if(ele.hasClassName("rowselected")==false)
								ele.addClassName("rowselected");
						}else{
							
							if(strpos($('selected_ids').value,ele.id,1)==0){
								$('selected_ids').value = $('selected_ids').value+','+ele.id;
								Groupselect();
							}else{
								$('selected_ids').value = str_replace(',,',',',str_replace(ele.id,'',$('selected_ids').value));
								Groupselect();
							}
							
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
				
					$('MemberGroupId').value = $id;
					$('MemberGroupName').value = ele.down(1).innerHTML.trim();
					$('MemberGroupPrice').value =  ele.down(0).next(0).down(1).innerHTML.trim().gsub(',', '').gsub('$','');
					
					showStyleBox('memgedit');
				/*	
					$id = ele.id.gsub('rowid_', '');
				/*	if($id>0){
						location.href='/admin/memeber_groups/edit/'+$id;
					}*/
				});
			});
		}
	
		
	
		function Groupselect(){
			$('footer-action').update(GroupFooterActioHtml());
		}
	
		function GroupFooterActioHtml()
		{
			
			$action_html = '<li class="blank">'+$('selected_ids').value.split(',').length+' items selected:</li><li><a class="" onclick="doGAction(\'unpublish\')" href="javascript:void(0);" title="Unpublish" >Unpublish</a></li><li><a class="" onclick="doGAction(\'publish\')" href="javascript:void(0);" title="Publish" >Publish</a></li>';
			return $action_html
		}
	
		function doGAction(action)
		{
			$selectedids = $('selected_ids').value.split(',');
			$selectedids.each(function(id){
				new Ajax.Request('/admin/member_groups/'+action+'/'+id.gsub('rowid_', ''),
				  {
					method:'get',
					onSuccess: function(transport){
					  var response = transport.responseText || "no response text";
					  switch(action)
					  {
						case 'publish':
								$(id).childElements()[4].down(1).update(response);
								$(id).childElements()[4].down(1).writeAttribute("class",response.toLowerCase());
						break;
						case 'unpublish':
								$(id).childElements()[4].down(1).update(response);
								$(id).childElements()[4].down(1).writeAttribute("class",response.toLowerCase());
						break;
					  }
					},
					onFailure: function(){ alert('Something went wrong...') }
				  });
			  });
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
		}
		
		function mgroupeditclick(selid){
			ele = $('rowid_'+selid);
			$('MemberGroupId').value = selid;
			$('MemberGroupName').value = ele.down(1).innerHTML.trim();
			$('MemberGroupPrice').value =  ele.down(0).next(0).down(1).innerHTML.trim().gsub(',', '').gsub('$','');		
			showStyleBox('memgedit');
		}
		
		function footerActioHtml($id,$pstatus,$sam)
		{
			$action_html = '<li class="blank">1 page selected:</li><li><a href="#" title="Edit" onclick="mgroupeditclick('+$id+'); return false;" >Edit</a></li>';
			if($pstatus==1){
				$action_html +='<li><a class="" onclick="doAction('+$id+',\'unpublish\',\'pub_'+$id+'\',$(this))"  href="javascript:void(0);" title="Unpublish" >Unpublish</a></li>'
			}else{
				$action_html +='<li><a class="" onclick="doAction('+$id+',\'publish\',\'pub_'+$id+'\',$(this))"  href="javascript:void(0);" title="Publish" >Publish</a></li>'
			}
			return $action_html
		}
		
		function doAction(id,action,response_id,ele)
		{
			new Ajax.Request('/admin/member_groups/'+action+'/'+id,
			  {
				method:'get',
				onSuccess: function(transport){
				  var response = transport.responseText || "no response text";
				  switch(action)
				  {
					case 'publish':
							ele.update('Unpublish');
							ele.writeAttribute("onclick","doAction("+id+",'unpublish','pub_"+id+"',$(this))");
							$(response_id).update(response);
							$(response_id).writeAttribute("class",response.toLowerCase());
					break;
					case 'unpublish':
							ele.update('Publish');
							ele.writeAttribute("onclick","doAction("+id+",'publish','pub_"+id+"',$(this))");
							$(response_id).update(response);
							$(response_id).writeAttribute("class",response.toLowerCase());
					break;
				  }
				},
				onFailure: function(){ alert('Something went wrong...') }
			  });
		}
	</script>
</div>
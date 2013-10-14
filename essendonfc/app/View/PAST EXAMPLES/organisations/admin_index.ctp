<?
	$this->StyleBox->ConfirmMessageStart('orgmsg','');
	$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
?>
<?
	
/*     $this->Paginator->options(
            array('update'=>'maincontent', 
                    'url'=>array('controller'=>'organisations', 'action'=>'index','admin'=>true),
					'indicator' => 'loadingDiv'
					)); */

?>

<div id="filterbar" style="display:block<?//=($this->Session->check('News'))?'block':'none';?>;">
	<div id="filter-block">
		<form action="/admin/organisations/filter" method="POST" name="filter_news">
		<table cellspacing="0" cellpadding="4" border="0">
			<tr>
				<td colspan="2" class="filter_colour">Filter Organisation by</td>
				<td class="filter_colour">Sort Organisation by</td>
			</tr>
			<tr>
				<td><?=$this->element('admin/organisation/membership_tires');?></td>
				<td><?=$this->element('admin/organisation/status');?></td>
				<td><?=$this->element('admin/organisation/sort');?></td>
			</tr>
			<tr>
				<td colspan="3">
				<div align="right">
					<a href="/admin/organisations/clrfilter" class="clearlink">Clear Filters</a>
					<input type="submit" value="Apply" name="filterbtn" class="search-btn" />
				</div>
				</td>
			</tr>
		</table>
		</form>
	</div>
	<div id="search-block">
		<form action="/admin/organisations/search" method="POST">
			<div class="filter_colour"><b>Search by Keyword</b></div>
			<?=$this->Form->input('Organisation.search',array('value'=>$this->Session->read('Organisation.search'),'class'=>'focus','default'=>'Enter Keyword','label'=>false,'focus_txt'=>'Enter Keyword'));?>
			<div>
				<a href="/admin/organisations/clrsearch" class="clearlink">Clear Search</a>
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
<form action="" onsubmit="return false;">
<input type="hidden" name="selected_ids" id="selected_ids" value="" />
</form>
<div id="index-block" style="clear:both;">
	<div id="indexrows">
		<?
		$i = 0;
		foreach ($organisations as $organisation):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<div id="rowid_<?= $organisation['Organisation']['id']; ?>" class="row">
				<div class="rowitem" style="width:36%">
					<div class="orgtitle">
					<?= $organisation['Organisation']['name']; ?><br />
					<span><a href="mailto:<?= $organisation['Organisation']['kc_email']; ?>"><?= $organisation['Organisation']['kc_email']; ?></a></span>
					</div>
				</div>
				<div class="rowitem" style="padding-left: 20px; width: 26%;"><div class="rowcell">
					<?
						$mship_class = '';
						if($organisation['Organisation']['active']==1){
							if(mktime(0,0,0,date('m'),date('d'),date('Y'))>strtotime($organisation['Organisation']['membership_renewal_date'])){
								$mship_class = 'red strike italic';
							}
						}
					?>
					<div class="<?=$mship_class;?>"><?= $organisation['MemberTier']['name']; ?></div>
					<span>employees</span>
				</div></div>
				<div class="rowitem" style="padding-left: 20px; width: 10%;"><div class="rowcell">
					<?= date('d.m.Y',strtotime($organisation['Organisation']['membership_renewal_date'])); ?><br />
					<span>renewal date</span>
				</div></div>
				<div class="rowitem" style="padding-left: 20px;width: 18%;"><div class="rowcell">
					<?
						if($organisation['Organisation']['active']==1){
							if(mktime(0,0,0,date('m'),date('d'),date('Y'))<=strtotime($organisation['Organisation']['membership_renewal_date'])){
							?>
								<b style="color:#26DE0E;"><?=date_diff2(date('Y-m-d H:i:s'),$organisation['Organisation']['membership_renewal_date']);?></b><br/>
								<span>days remaining</span>
							<?
							}else{
							?>
								<b style="color:#FE0000">EXPIRED</b>
							<?
							}
						}else if($organisation['Organisation']['expired']==1){
						?>
						<b style="color:#FE0000">EXPIRED</b>
						<?
						}else
						{
						?>
							<b style="color:#FFA000;">PENDING</b><br/>
							<span>application approval</span>
						<?						
						}
					?>
				</div></div>
			</div>
		<? endforeach; ?>
	</div>
	<?=$this->element('admin/modules/sp_paging',array('limit'=>$this->Session->read('ORG_LIMIT'),'view_url'=>'/admin/organisations/setorgpaging'));?>
	<div class="paging">
		Display <?= $this->Paginator->counter(); ?>
		<?= html_entity_decode($this->Paginator->prev('&laquo;', array(), null, array('class'=>'disabled')));?>
		<?= $this->Paginator->numbers(array('separator'=>''));?>
		<?= html_entity_decode($this->Paginator->next('&raquo;', array(), null, array('class' => 'disabled')));?>
	</div>
	<div id="afm">
		<div id="afm-inner">
			<a href="/admin/organisations/add" class="addneworg"></a>
			<ul id="footer-action">
				
			</ul>
		</div>
	</div>
	
	<script type="text/javascript">
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
						location.href='/admin/organisations/edit/'+$id;
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
			$('orgmsg').down(1).update('Are you sure you want to delete these '+$('selected_ids').value.split(',').length+' items? ');
			$('orgmsg').down('div.cmsg_content_small').update('You are about to delete the selected items. This action cannot be undone.');
			$('orgmsg').down('a.green').writeAttribute('onclick',"doGAction('delete');hideStyleBox('orgmsg');return false;");
			showStyleBox('orgmsg');
		}
	
		function doGAction(action){
			if(action=='delete'){
				if($('selected_ids').value.trim().length>0){
					new Ajax.Request('/admin/organisations/deleteall',
						  {
							method:'post',
							parameters: { 'ids': $('selected_ids').value },
							onSuccess: function(transport){
							  var response = transport.responseText || "no response text";
							  if(response.trim()=='Deleted Sccuessfully'){
								location.href="/admin-organisations";
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
			$action_html = '<li class="blank">1 item selected:</li><!--<li><a class="" href="/admin/organisations/edit/'+$id+'" title="Edit" >Edit</a></li>--><li class="delete"><a class="delete"  href="/admin/organisations/delete/'+$id+'" onclick="deleteConfirm(this.href);return false;" title="Delete" >Delete</a></li>';
			return $action_html
		}
		
		function deleteConfirm(href){
			$('orgmsg').down(1).update('Are you sure you want to delete this item?');
			$('orgmsg').down('div.cmsg_content_small').update('You are about to delete the selected item. This action cannot be undone.');
			$('orgmsg').down('a.green').writeAttribute('href',href);
			$('orgmsg').down('a.green').writeAttribute('onclick',"");
			showStyleBox('orgmsg');
		}

		
		function selectMultipleItem(event){
			 if(event.keyCode == Event.KEY_TAB) alert('Tab Pressed');
		}
		  
	</script>
</div>
<?

function date_diff2($start, $end="NOW")
{
        $sdate = strtotime($start);
        $edate = strtotime($end);

        $time = $edate - $sdate;
        if($time>=0 && $time<=59) {
                // Seconds
                $timeshift = $time.' seconds ';

        } elseif($time>=60 && $time<=3599) {
                // Minutes + Seconds
                $pmin = ($edate - $sdate) / 60;
                $premin = explode('.', $pmin);
               
                $presec = $pmin-$premin[0];
                $sec = $presec*60;
               
                $timeshift = $premin[0].' min '.round($sec,0).' sec ';

        } elseif($time>=3600 && $time<=86399) {
                // Hours + Minutes
                $phour = ($edate - $sdate) / 3600;
                $prehour = explode('.',$phour);
               
                $premin = $phour-$prehour[0];
                $min = explode('.',$premin*60);
               
                $presec = '0.'.$min[1];
                $sec = $presec*60;

                $timeshift = $prehour[0].' hrs '.$min[0].' min '.round($sec,0).' sec ';

        } elseif($time>=86400) {
                // Days + Hours + Minutes
                $pday = ($edate - $sdate) / 86400;
                $preday = explode('.',$pday);

                $phour = $pday-$preday[0];
                $prehour = explode('.',$phour*24);

                $premin = ($phour*24)-$prehour[0];
                $min = explode('.',$premin*60);
               
                $presec = '0.'.$min[1];
                $sec = $presec*60;
               
                $timeshift = $preday[0];//.' days '.$prehour[0].' hrs '.$min[0].' min '.round($sec,0).' sec ';

        }
        return $timeshift;
}
?>
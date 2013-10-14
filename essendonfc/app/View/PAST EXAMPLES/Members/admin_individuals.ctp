<?
	
$this->StyleBox->ConfirmMessageStart('inidimsg','');
	$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
	$this->Paginator->options(array('url' => '../../../admin-individuals'));
?>

<div id="filterbar" style="display:block;">
	<div id="filter-block">
		<form action="/admin/members/individualfilter" method="POST" name="filter_news">
		<table cellspacing="0" cellpadding="4" border="0">
			<tr>
				<td class="filter_colour">Filter Individuals by </td>
				<td></td>
			</tr>
			<tr>
				
				<td><?=$this->element('admin/member/organisations');?></td>
				<td><?=$this->element('admin/member/sort');?></td>
			</tr>
			<tr>
				<td colspan="2">
				<div align="right">
					<a href="/admin/members/clrindividualfilter" class="clearlink">Clear Filters</a>
					<input type="submit" value="Apply" name="filterbtn" class="search-btn" />
				</div>
				</td>
			</tr>
		</table>
		</form>
	</div>
	<div id="search-block">
		<form action="/admin/members/memsearch" method="POST">
			<div class="filter_colour"><b>Search by Keyword</b></div>
			<?=$this->Form->input('Member.memsearch',array('value'=>$this->Session->read('MemMember.memsearch'),'class'=>'focus','default'=>'Enter Keyword','label'=>false,'focus_txt'=>'Enter Keyword'));?>
			<div>
				<a href="/admin/members/clrmemsearch" class="clearlink">Clear Search</a>
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
<!--Filter Bar Ends -->


<form action="" onsubmit="return false;">
<input type="hidden" name="selected_ids" id="selected_ids" value="" />
</form>
<div id="index-block" style="clear:both;">
	<div id="indexrows">
		<?
		$i = 0;
		foreach ($members as $member):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<div id="rowid_<?= $member['Member']['id']; ?>" class="row">
				<div class="rowitem" style="width:40%">
					<div class="memtitle">
						<?= $member['Member']['gname']; ?> <?= $member['Member']['lname']; ?><br />
						<span><a href="mailto:<?= $member['Member']['email']; ?>"><?= $member['Member']['email']; ?></a></span>
					</div>
				</div>
				<div class="rowitem" style="width:21%;padding-left:20px;"><div class="rowcell">
					<?= $member['Organisation']['name']; ?>
				</div></div>
				<div class="rowitem" style="width:14%;padding-left:20px;"><div class="rowcell">
					<span>Last Active on:</span><br />
					<? 
						if($member['Member']['last_login']!='0000-00-00 00:00:00')
							echo $time->niceShort($member['Member']['last_login']); 
					?>
				</div></div>
				<div class="rowitem" style="width:16%"><div class="rowcell">
					<? //echo $time->timeAgoInWords($member['Member']['renewal_date']); ?>
					<?
						if($member['Member']['active']==1){
							if(mktime(0,0,0,date('m'),date('d'),date('Y'))<=strtotime($member['Member']['renewal_date']) || mktime(0,0,0,date('m'),date('d'),date('Y'))<=strtotime($member['Organisation']['membership_renewal_date'])){
							?>
								<?
									$days_remains = date_diff3(date('Y-m-d H:i:s'),$member['Organisation']['membership_renewal_date']);
									if($days_remains>0){
								?>
									<b style="color:#26DE0E;"><?=date_diff3(date('Y-m-d H:i:s'),$member['Organisation']['membership_renewal_date']);?></b><br/>
									<span>days remaining</span>
								<?
									}else{
								?>
									<b style="color:#FFA000;">PENDING</b><br/>
									<span>application approval</span>
								<?
									}
								?>
								
							<?
							}else{
							?>
								<b style="color:#FE0000">EXPIRED</b>
							<?
							}
						}else if($member['Member']['expired']==1){
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

	<?=$this->element('admin/modules/sp_paging',array('limit'=>$this->Session->read('INDIVIDUAL_LIMIT'),'view_url'=>'/admin/members/setindividualpaging'));?>
<div class="paging">
	Display <?= $this->Paginator->counter(); ?>
	<?= html_entity_decode($this->Paginator->prev('&laquo;', array(), null, array('class'=>'disabled')));?>
	<?= $this->Paginator->numbers(array('separator'=>''));?>
	<?= html_entity_decode($this->Paginator->next('&raquo;', array(), null, array('class' => 'disabled')));?>
</div>

<div id="afm">
	<div id="afm-inner">
		<a href="/admin/members/individualadd" class="addnewindi"></a>
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
						location.href='/admin/members/individualedit/'+$id;
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
			$('inidimsg').down(1).update('Are you sure you want to delete these '+$('selected_ids').value.split(',').length+' items? ');
			$('inidimsg').down('div.cmsg_content_small').update('You are about to delete the selected items. This action cannot be undone.');
			$('inidimsg').down('a.green').writeAttribute('onclick',"doGAction('delete');hideStyleBox('inidimsg');return false;");
			showStyleBox('inidimsg');
		}
	
		function doGAction(action)
		{
			if(action=='delete'){
				if($('selected_ids').value.trim().length>0){
					$selectedids = $('selected_ids').value.split(',');
					$selectedids.each(function(id){
						$('rowid_'+id).remove();;
					});
					
					new Ajax.Request('/admin/members/deleteall/'+<?=$this->Paginator->counter(array('format' => '%page%'));?>,
						  {
							method:'post',
							parameters: { 'ids': $('selected_ids').value },
							onSuccess: function(transport){
								location.href="/admin-individuals";
							  /* var response = transport.responseText || "no response text";
							  if(response.trim()!='' || response.trim()!="no response text"){
								$newindexrows = $('indexrows').innerHTML;
								$('indexrows').update($newindexrows+response.trim());
								processRows();
							  } */
							},
							onFailure: function(){ alert('Something went wrong...') }
						  });
					$('selected_ids').value = "";
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
		
		function footerActioHtml($id)
		{
			$action_html = '<li class="blank">1 item selected:</li><li><a class="" href="/admin/members/individualedit/'+$id+'" title="Edit" >Edit</a></li><li class="delete"><a class="delete"  href="/admin/members/delete/'+$id+'/admin-individuals" onclick="deleteConfirm(this.href);return false;" title="Delete" >Delete</a></li>';
			return $action_html
		}
		
		function deleteConfirm(href){
			$('inidimsg').down(1).update('Are you sure you want to delete this item?');
			$('inidimsg').down('div.cmsg_content_small').update('You are about to delete the selected item. This action cannot be undone.');
			$('inidimsg').down('a.green').writeAttribute('href',href);
			$('inidimsg').down('a.green').writeAttribute('onclick',"");
			showStyleBox('inidimsg');
		}
	</script>
</div>
<?

function date_diff3($start, $end="NOW")
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
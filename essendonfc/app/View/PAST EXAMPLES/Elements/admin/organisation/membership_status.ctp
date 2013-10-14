<?
$model = $this->params['models'][0];
?>
<div class="widget">
	<div class="widget-header">
		<div class="label">Membership Status</div>
		<div class="widgetToggle"></div>
	</div>
	<div class="widget-content <?=(isset($open) && $open)?'open':'';?>" >
		<div id="org-active">
			<?
			if(isset($this->request->data[$model]['active']) && $this->request->data[$model]['active']==1){
			?><span id="pagepublish-label" class="published">ACTIVE</span>
			<?
			}else{
			?><span id="pagepublish-label" class="unpublished">INACTIVE</span>
			<?
			}
			?>
			<a href="#" onclick="edit_active(); return false;">Edit</a>
		</div>
		<div id="edit-active" style="display:none;">			
			<script type="text/javascript">
			<!--
				function edit_active(){
					$('edit-active').show();$('org-active').hide();
					$active_state = $('s-active').value;
				}
				function cancel_active(){
					$('s-active').value = $active_state;
					$('edit-active').hide();
					$('org-active').show();
				}
				function ch_active_status(pstatus){	
					if(pstatus==1){
						$('pagepublish-label').update('ACTIVE');
						$('pagepublish-label').writeAttribute("class",'published');
					}else{
						$('pagepublish-label').update('INACTIVE');
						$('pagepublish-label').writeAttribute("class",'unpublished');
					}
					$('edit-active').hide();
					$('org-active').show();
				}
			-->
			</script>
			<?=$this->Form->input('Organisation.active',array('id'=>'s-active','label'=>false,'type'=>'select','options'=>array('INACTIVE','ACTIVE'),'after'=>'&nbsp;&nbsp;&nbsp;<a href="#" onclick="ch_active_status($(\'s-active\').value);return false;">Apply</a>&nbsp;|&nbsp;<a href="#" onclick="cancel_active();return false;">Cancel</a>'));?>
		</div>
		<div id="org-vrights" style="margin-top:10px;">
			<?
			if(isset($this->request->data[$model]['voting_rights']) && $this->request->data[$model]['voting_rights']==1){
			?><span id="vrights-label" class="vrights">VOTING RIGHTS</span>
			<?
			}else{
			?><span id="vrights-label" class="novrights">NO VOTING RIGHTS</span>
			<?
			}
			?>
			<a href="#" onclick="edit_vright(); return false;">Edit</a>
		</div>
		<div id="edit-vrights" style="display:none;margin-top:10px;">			
			<script type="text/javascript">
			<!--
				function edit_vright(){
					$('edit-vrights').show();$('org-vrights').hide();
					$vright_status = $('m-vright').value;
				}
				function cancel_vright(){
					$('m-vright').value = $vright_status;
					$('edit-vrights').hide();
					$('org-vrights').show();
				}
				function ch_vright_status(pstatus){	
					if(pstatus==1){
						$('vrights-label').update('VOTING RIGHTS');
						$('vrights-label').writeAttribute("class",'vrights');
					}else{
						$('vrights-label').update('NO VOTING RIGHTS');
						$('vrights-label').writeAttribute("class",'novrights');
					}
					$('edit-vrights').hide();
					$('org-vrights').show();
				}
			-->
			</script>
			<?=$this->Form->input('Organisation.voting_rights',array('id'=>'m-vright','label'=>false,'type'=>'select','options'=>array('NO VOTING RIGHT','VOTING RIGHT'),'after'=>'&nbsp;<a href="#" onclick="ch_vright_status($(\'m-vright\').value);return false;">Apply</a>&nbsp;|&nbsp;<a href="#" onclick="cancel_vright(); return false;">Cancel</a>'));?>	
		</div>
		
		
		<div id="org-grace_period" style="margin-top:10px;">
			<?
			if(isset($this->request->data[$model]['grace_period']) && $this->request->data[$model]['grace_period']==1){
			?><span id="grace_period-label" class="vrights">GRACE PERIOD IS <font color="#00CC00">ON</font></span>
			<?
			}else{
			?><span id="grace_period-label" class="novrights">GRACE PERIOD IS <font color="#CC0000">OFF</font></span>
			<?
			}
			?>
			<a href="#" onclick="edit_gperiod(); return false;">Edit</a>
		</div>
		<div id="edit-grace_period" style="display:none;margin-top:10px;">			
			<script type="text/javascript">
			<!--
				function edit_gperiod(){
					$('edit-grace_period').show();$('org-grace_period').hide();
					$gperiod_state = $('m-grace_period').value;
				}
				function cancel_gperiod(){
					$('m-grace_period').value = $gperiod_state;
					$('edit-grace_period').hide();
					$('org-grace_period').show();
				}
				function ch_grace_period_status(pstatus){	
					if(pstatus==1){
						$('grace_period-label').update('GRACE PERIOD IS <font color="#00CC00">ON</font>');
						$('grace_period-label').writeAttribute("class",'vrights');
					}else{
						$('grace_period-label').update('GRACE PERIOD IS <font color="#CC0000">OFF</font>');
						$('grace_period-label').writeAttribute("class",'novrights');
					}
					$('edit-grace_period').hide();
					$('org-grace_period').show();
				}
			-->
			</script>
			<?=$this->Form->input('Organisation.grace_period',array('id'=>'m-grace_period','label'=>false,'type'=>'select','options'=>array('GRACE PERIOD IS OFF','GRACE PERIOD IS ON'),'after'=>'&nbsp;<a href="#" onclick="ch_grace_period_status($(\'m-grace_period\').value);return false;">Apply</a>&nbsp;|&nbsp;<a href="#" onclick="cancel_gperiod(); return false;">Cancel</a>'));?>	
		</div>
		<div id="member-targeted" style="margin-top:10px;">
			<table cellpadding="4" cellspacing="0" border="0" id="member_rdates">
				<tr>
					<th>Member since</th>
					<td><?=isset($this->request->data[$model]['membership_start_date'])?date('d M Y',strtotime($this->request->data[$model]['membership_start_date'])):'';?></td>
				</tr>
				<tr>
					<th>Renewal date</th>
					<td><?=isset($this->request->data[$model]['membership_renewal_date'])?date('d M Y',strtotime($this->request->data[$model]['membership_renewal_date'])):'';?></td>
				</tr>
				<?	
				if(isset($this->request->data['Organisation']) && isset($this->request->data['Organisation']['id'])){	
				?>
				<tr>
					<td colspan="2" style="padding: 0 0 0 0;">	
						<a style="float: left;" onclick="if(!confirm('Are you sure you want to do offline payment?')){return false;}"  href="/admin/organisations/manual_renew/<?=$this->request->data['Organisation']['id'];?>">Offline payment</a>

				<?	
				}	
				?>

					</td>
				</tr>				
			</table>
		</div>
	</div>
</div>
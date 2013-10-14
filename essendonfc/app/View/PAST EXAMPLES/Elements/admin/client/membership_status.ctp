<?
$model = $this->params['models'][0];
?>
<div class="widget">
	<div class="widget-header">
		<div class="label">Membership Status</div>
		<div class="widgetToggle"></div>
	</div>
	<div class="widget-content <?=(isset($open) && $open)?'open':'';?>" >
		
		<div id="member-active">
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
					$('edit-active').show(); $('member-active').hide();
					$active_state = $('s-active').value;
				}
				function cancel_active(){
					$('s-active').value = $active_state;
					$('edit-active').hide();
					$('member-active').show();
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
					$('member-active').show();
				}
			-->
			</script>
			<?=$this->Form->input('Member.active',array('id'=>'s-active','label'=>false,'type'=>'select','options'=>array('INACTIVE','ACTIVE'),'after'=>'&nbsp;&nbsp;&nbsp;<a href="#" onclick="ch_active_status($(\'s-active\').value);return false;">Apply</a>&nbsp;|&nbsp;<a href="#" onclick="cancel_active();return false;">Cancel</a>'));?>
			
		</div>
		
		<?
		/*<div id="member-vrights" style="margin-top:10px;">
			<?
			if(isset($this->request->data[$model]['voting_rights']) && $this->request->data[$model]['voting_rights']==1){
			?><span id="vrights-label" class="vrights">VOTING RIGHTS</span>
			<?
			}else{
			?><span id="vrights-label" class="novrights">NO VOTING RIGHTS</span>
			<?
			}
			?>
			<a href="#" onclick="$('edit-vrights').show();$('member-vrights').hide();return false;">Edit</a>
		</div>
		<div id="edit-vrights" style="display:none;margin-top:10px;">			
			<script type="text/javascript">
				function ch_vright_status(pstatus){	
					if(pstatus==1){
						$('vrights-label').update('VOTING RIGHTS');
						$('vrights-label').writeAttribute("class",'vrights');
					}else{
						$('vrights-label').update('NO VOTING RIGHTS');
						$('vrights-label').writeAttribute("class",'novrights');
					}
					$('edit-vrights').hide();
					$('member-vrights').show();
				}
			</script>
			<?=$this->Form->input('Member.voting_rights',array('id'=>'m-vright','label'=>false,'type'=>'select','options'=>array('NO VOTING RIGHT','VOTING RIGHT'),'after'=>'&nbsp;&nbsp;&nbsp;<a href="#" onclick="ch_vright_status($(\'m-vright\').value);return false;">Apply</a>'));?>	
		</div>

		<?
		*/
			if($this->request->url == 'admin-non-members'){
		?>
		<div id="member-targeted" style="margin-top:10px;">
			<?
			if(isset($this->request->data[$model]['targeted']) && $this->request->data[$model]['targeted']==1){
			?><span id="targeted-label" class="ctarget">CURRENT TARGET</span>
			<?
			}else{
			?><span id="targeted-label" class="nottarget">NOT A TARGET</span>
			<?
			}
			?>
			<a href="#" onclick="edit_target(); return false;">Edit</a>
		</div>
		<div id="edit-targeted" style="display:none;margin-top:10px;">			
			<script type="text/javascript">
			<!--
				function edit_target(){
					$('edit-targeted').show();$('member-targeted').hide();
					$target_state = $('m-targeted').value;
				}
				function cancel_target(){
					$('m-targeted').value = $target_state;
					$('edit-targeted').hide();
					$('member-targeted').show();
				}
				function ch_target_status(pstatus){	
					if(pstatus==1){
						$('targeted-label').update('CURRENT TARGET');
						$('targeted-label').writeAttribute("class",'ctarget');
					}else{
						$('targeted-label').update('NOT A TARGET');
						$('targeted-label').writeAttribute("class",'nottarget');
					}
					$('edit-targeted').hide();
					$('member-targeted').show();
				}
			-->
			</script>
			<?=$this->Form->input('Member.targeted',array('id'=>'m-targeted','label'=>false,'type'=>'select','options'=>array('NOT A TARGET','CURRENT TARGET'),'after'=>'&nbsp;<a href="#" onclick="ch_target_status($(\'m-targeted\').value);return false;">Apply</a>&nbsp;|&nbsp;<a href="#" onclick="cancel_target();return false;">Cancel</a>'));?>
		</div>
		<?
			}
		?>
		
		
		<div id="member-grace_period" style="margin-top:10px;">
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
					$('edit-grace_period').show();$('member-grace_period').hide();
					$gperiod_status = $('m-grace_period').value;
				}
				function cancel_gperiod(){
					$('m-grace_period').value = $gperiod_status;
					$('edit-grace_period').hide();
					$('member-grace_period').show();
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
					$('member-grace_period').show();
				}
			-->
			</script>
			<?=$this->Form->input('Member.grace_period',array('id'=>'m-grace_period','label'=>false,'type'=>'select','options'=>array('GRACE PERIOD IS OFF','GRACE PERIOD IS ON'),'after'=>'&nbsp;<a href="#" onclick="ch_grace_period_status($(\'m-grace_period\').value);return false;">Apply</a>&nbsp;|&nbsp;<a href="#" onclick="cancel_gperiod();return false;">Cancel</a>'));?>	
		</div>
		
		<div id="member-targeted" style="margin-top:10px;">
			<table cellpadding="4" cellspacing="0" border="0" id="member_rdates">
				<tr>
					<th>Member since</th>
					<td><?=isset($this->request->data['Member']['created'])?date('d M Y',strtotime($this->request->data['Member']['created'])):'';?></td>
				</tr>
				<tr>
					<th>Renewal date</th>
					<td><?=isset($this->request->data['Member']['renewal_date'])?date('d M Y',strtotime($this->request->data['Member']['renewal_date'])):'';?></td>
				</tr>
			</table>
		</div>
		
	</div>
</div>
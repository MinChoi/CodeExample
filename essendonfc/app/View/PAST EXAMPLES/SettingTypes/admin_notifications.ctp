<?
$form = $this->Form;
echo $this->Form->create(null,array('url'=>'/admin-notifications-settings','id'=>'notifications_settings'));
?>
<script type="text/javascript">
document.observe("dom:loaded", function(){
	var ndropdowns = $$('a.ndropdown');
	ndropdowns.each(function(e){
		e.observe('click', function(event){
			var a_ele = Event.element(event);
			if($(a_ele.id+'_content').visible()){
				a_ele.removeClassName('dropdown_down');
				a_ele.addClassName('dropdown_up');
			}else{
				a_ele.addClassName('dropdown_down');
				a_ele.removeClassName('dropdown_up');
			}
			Effect.toggle(a_ele.id+'_content','appear', { duration: 0.33});							
		 });
	});
	
	var editlinks = $$('a.iedit');
	editlinks.each(function(e){
		e.observe('click', function(event){
			var dele = Event.element(event).up('div');
			dele.hide();
			if($(dele.id+'_txt').tagName.toLowerCase()=='input')
				$(dele.id+'_txt').value = $(dele.id+'_hidden').value;
			else
				tinyMCE.get(dele.id+'_txt').setContent($(dele.id+'_hidden').value);
			dele.next().show();
		});
	});
	
	var apply_cancels = $$('a.icancel,a.iapply');
	apply_cancels.each(function(e){
		e.observe('click', function(event){
			var link_ele =  Event.element(event);
			var iele 	 =  link_ele.up('div');
			var ele		 =	iele.previous();
			if(link_ele.hasClassName('iapply')){
				if($(ele.id+'_txt').tagName.toLowerCase()=='input' && $(ele.id+'_txt').value.trim().length>0){
					$(ele.id+'_hidden').value = $(ele.id+'_txt').value;
					ele.down(0).update($(ele.id+'_txt').value);
				}
				else if(tinyMCE.get(ele.id+'_txt').getContent().trim().length>0){
					$(ele.id+'_hidden').value = tinyMCE.get(ele.id+'_txt').getContent();
					ele.down(0).update(tinyMCE.get(ele.id+'_txt').getContent());
				}
			}
			iele.hide();
			ele.show();
		});
	});
	
	
});
</script>

<?
	
	function createNotiBox($name,$dbname,$uniqueid,$form,$form_data){
	
?>
		<div class="rbox">
		<div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<h3>Notification: <?= $name;?></h3>
			<a href="#" id="<?=$uniqueid;?>" class="ndropdown dropdown_up" onclick="return false;"></a>
			<div id="<?=$uniqueid;?>_content" style="display:none;">
				<table class="not_table" width="100%">
					<tr>
						<th width="10%">To:</th>
						<td width="60%"><span class="bold"><?=$form_data['to'];?></span><span class="info">This field cannot be edited</span></td>
						<td width="30%"></td>
					</tr>
					<tr>
						<th>When:</th>
						<td><span class="bold"><?=$form_data['when'];?></span><span class="info">This field cannot be edited</span></td>
						<td></td>
					</tr>
					<tr>
						<th>From:</th>
						<td>
							<div id="<?=$uniqueid;?>_from">
								<span><?=$form_data['from'];?></span><a href="#" class="iedit" onclick="return false;">Edit</a>
							</div>
							<div id="<?=$uniqueid;?>_from_i" style="display:none;">
								<?=$form->input($dbname.'.from',array('type'=>'hidden','id'=>$uniqueid.'_from_hidden'));?>
								<input type="text" id="<?= $uniqueid ?>_from_txt" class="spinput" />
								<a href="#" class="iapply" onclick="return false;">Apply</a>&nbsp;|&nbsp;<a href="#" class="icancel" onclick="return false;">Cancel</a>
							</div>
						</td>
						<td></td>
					</tr>
					<tr>
						<th>Subject:</th>
						<td>
							<div id="<?=$uniqueid;?>_sub"><span><?=$form_data['sub'];?></span><a href="#" class="iedit"  onclick="return false;">Edit</a></div>
							<div id="<?=$uniqueid;?>_sub_i" style="display:none;">
								<?=$form->input($dbname.'.sub',array('type'=>'hidden','id'=>$uniqueid.'_sub_hidden'));?>
								<input type="text" id="<?=$uniqueid;?>_sub_txt" class="spinput" />
								<a href="#" class="iapply" onclick="return false;">Apply</a>&nbsp;|&nbsp;<a href="#" class="icancel" onclick="return false;">Cancel</a>
							</div>
						</td>
						<td></td>
					</tr>
					<tr>
						<th>Body:</th>
						<td>
							<div id="<?=$uniqueid;?>_body" class="body"><span><?=$form_data['body'];?></span><a class="iedit" href="#" style="margin-left:0px;" onclick="return false;">Edit</a></div>
							<div id="<?=$uniqueid;?>_body_i" style="display:none;">
								<?=$form->input($dbname.'.body',array('type'=>'hidden','id'=>$uniqueid.'_body_hidden'));?>
								<textarea type="text" id="<?=$uniqueid;?>_body_txt"></textarea>
								<a class="iapply" href="#" onclick="return false;">Apply</a>&nbsp;|&nbsp;<a class="icancel" href="#" onclick="return false;">Cancel</a>
							</div>
						</td>
						<td>
							<p class="hint">
							<b>Hint:</b> This following are list of tags that can be included in the email enclosed in curly brackets{}
							</p>
							<p class="hint">
								<?=$form_data['body_hint'];?>
							</p>
						</td>
					</tr>
				</table>
			</div>	
		</div>
		<div class="rbox-btm"><div></div></div>
	</div>
	<br />
	<?
	}
?>



<div class="settings_template_frm">
	<h3 class="title">Edit Notification/s Settings</h3>

	<?
	/* Notify Email Immediate After Member Regsitration */
	$form_data = array(
		'to'		=>	'Member',
		'when' 		=> 	'Immediately after member registration',
		'from' 		=> 	$this->request->data['NEW_MEM_REG_NOT']['from'],
		'sub' 		=> 	$this->request->data['NEW_MEM_REG_NOT']['sub'],
		'body' 		=> 	$this->request->data['NEW_MEM_REG_NOT']['body'],
		'body_hint'	=>	'{first_name} = first name of member<br />Member login details = {user_name} and {password} <br />'
	);
	createNotiBox('New individual member confirmation','NEW_MEM_REG_NOT','namap',$form,$form_data);
	
	/* Notify Email Immediate After Member Regsitration */
	$form_data = array(
		'to'		=>	'Non-Member',
		'when' 		=> 	'Immediately after non-member registration',
		'from' 		=> 	$this->request->data['NEW_NON_MEM_REG_NOT']['from'],
		'sub' 		=> 	$this->request->data['NEW_NON_MEM_REG_NOT']['sub'],
		'body' 		=> 	$this->request->data['NEW_NON_MEM_REG_NOT']['body'],
		'body_hint'	=>	'{first_name} = first name of member<br />Member login details = {user_name} and {password} <br />'
	);
	createNotiBox('New non-member confirmation','NEW_NON_MEM_REG_NOT','inanonr',$form,$form_data);
	
	/* Notify Email After Organisation Approval */
	$form_data = array(
		'to'		=>	'Organisation Key Contact',
		'when' 		=> 	'After Organisation Activation',
		'from' 		=> 	$this->request->data['ORG_APPROVAL']['from'],
		'sub' 		=> 	$this->request->data['ORG_APPROVAL']['sub'],
		'body' 		=> 	$this->request->data['ORG_APPROVAL']['body'],
		'body_hint'	=>	'{first_name} = first name of member<br />Member login details = {user_name} and {password} <br />'
	);
	createNotiBox('New member organisation confirmation','ORG_APPROVAL','oa',$form,$form_data);
	
	/* Notify Email After Member Approval */
	$form_data = array(
		'to'		=>	'Individual member',
		'when' 		=> 	'After Member Approval',
		'from' 		=> 	$this->request->data['MEM_APPROVAL']['from'],
		'sub' 		=> 	$this->request->data['MEM_APPROVAL']['sub'],
		'body' 		=> 	$this->request->data['MEM_APPROVAL']['body'],
		'body_hint'	=>	'{first_name} = first name of member<br />Member login details = {user_name} and {password} <br />'
	);
	createNotiBox('Individual member approval','MEM_APPROVAL','ma',$form,$form_data);
	
	/* Notify Email After Non-Member Approval 
	$form_data = array(
		'to'		=>	'Non-Member',
		'when' 		=> 	'After Non-Member Approval',
		'from' 		=> 	$this->request->data['NON_MEM_APPROVAL']['from'],
		'sub' 		=> 	$this->request->data['NON_MEM_APPROVAL']['sub'],
		'body' 		=> 	$this->request->data['NON_MEM_APPROVAL']['body'],
		'body_hint'	=>	'{first_name} = first name of member<br />Member login details = {user_name} and {password} <br />'
	);
	createNotiBox('After Non-Member Approval','NON_MEM_APPROVAL','nma',$form,$form_data);
	*/
	
	/* Notify Admin After Member/Non-Member Registration */
	$form_data = array(
		'to'		=>	'All DCA Staff',
		'when' 		=> 	'After Member/Non-Member registration',
		'from' 		=> 	$this->request->data['MEM_NONMEM_REG']['from'],
		'sub' 		=> 	$this->request->data['MEM_NONMEM_REG']['sub'],
		'body' 		=> 	$this->request->data['MEM_NONMEM_REG']['body'],
		'body_hint'	=>	'{fullname} = full name of DCA staff <br />Details = {details} <br />'
	);
	createNotiBox('DCA notification of new member organisation','MEM_NONMEM_REG','mnmr',$form,$form_data);
	
	/* Notify After Member Organisation Registration With Offline Payment */
	$form_data = array(
		'to'		=>	'Key Contact of Organisation Registered',
		'when' 		=> 	'Member organisation registered with offline payment.',
		'from' 		=> 	$this->request->data['MEMSHIP_INVOICE']['from'],
		'sub' 		=> 	$this->request->data['MEMSHIP_INVOICE']['sub'],
		'body' 		=> 	$this->request->data['MEMSHIP_INVOICE']['body'],
		'body_hint'	=>	'{first_name} = first name of key contact<br />{member-tier-name}, {member-tier-amount} <br />'
	);
	createNotiBox('Key contact notification that invoice will be sent by DCA','MEMSHIP_INVOICE','msinv',$form,$form_data);

	$form_data = array(
		'to'	=>'Event registrant',
		'when' 	=> 'Immediately after registration',
		'from' 	=> $this->request->data['EVT_FREE_CONFIRM_NOT']['from'],
		'sub' 	=> $this->request->data['EVT_FREE_CONFIRM_NOT']['sub'],
		'body' 	=> $this->request->data['EVT_FREE_CONFIRM_NOT']['body'],
		'body_hint'=>'{first_name} = first name<br />
		{event_title} = Event Name<br />
		{hostedby} = Hosted By<br />
		{date} = Event Date<br />
		{event_time} = Event Time<br />
		{location} = Event Location'
	);

	createNotiBox('Free event confirmation email','EVT_FREE_CONFIRM_NOT','fec',$form,$form_data);
	
	
	$form_data = array(
		'to'	=>'Event registrant',
		'when' 	=> 'Immediately after payment',
		'from' 	=> $this->request->data['EVT_PAID_CONFIRM_NOT']['from'],
		'sub' 	=> $this->request->data['EVT_PAID_CONFIRM_NOT']['sub'],
		'body' 	=> $this->request->data['EVT_PAID_CONFIRM_NOT']['body'],
		'body_hint'=>'{first_name} = first name<br />
		{event_title} = Event Name<br />
		{hostedby} = Hosted By<br />
		{date} = Event Date<br />
		{event_time} = Event Time<br />
		{total} = Event Ticket Fee<br />
		{location} = Event Location'
	);

	createNotiBox('Paid event confirmation email','EVT_PAID_CONFIRM_NOT','pec',$form,$form_data);
	
	
	$form_data = array(
		'to'	=>'All event registrants',
		'when' 	=> 'Before the event',
		'from' 	=> $this->request->data['EVT_REMIND_NOT']['from'],
		'sub' 	=> $this->request->data['EVT_REMIND_NOT']['sub'],
		'body' 	=> $this->request->data['EVT_REMIND_NOT']['body'],
		'body_hint'=>'Member First Name = first name of member<br />
								Event details list = Full list of event details<br />
								{org-name} = organisation name<br />'
	);

	createNotiBox('Event reminder','EVT_REMIND_NOT','ern',$form,$form_data);
	
	$form_data = array(
		'to'=>'Event registrant',
		'when' => 'Immediately after registration',
		'from' => $this->request->data['EVT_CONFIRM_NOT']['from'],
		'sub' => $this->request->data['EVT_CONFIRM_NOT']['sub'],
		'body' => $this->request->data['EVT_CONFIRM_NOT']['body'],
		'body_hint'=>'Member First Name = first name of member<br />
								Event details list = Full list of event details<br />
								Org Name = organisation name<br />'
	);

	createNotiBox('Event confirmation email - pay by invoice','EVT_CONFIRM_NOT','ecm',$form,$form_data);
	
	
	$form_data = array(
		'to'=>'DCA Staff',
		'when' => 'Immediately after Membership renewal',
		'from' => $this->request->data['ORG_RENEWAL_CONFIRM_NOT']['from'],
		'sub' => $this->request->data['ORG_RENEWAL_CONFIRM_NOT']['sub'],
		'body' => $this->request->data['ORG_RENEWAL_CONFIRM_NOT']['body'],
		'body_hint'=>'{fullname} = Staff Full Name<br />
							{org-name} = organisation name<br />'
	);

	createNotiBox('Membership Renewal Notification to DCA Staff','ORG_RENEWAL_CONFIRM_NOT','orcn',$form,$form_data);
	
	
	$form_data = array(
		'to'=>'DCA Staff',
		'when' => 'Immediately after Membership re-activation',
		'from' => $this->request->data['ORG_REACTIVATION_CONFIRM_NOT']['from'],
		'sub' => $this->request->data['ORG_REACTIVATION_CONFIRM_NOT']['sub'],
		'body' => $this->request->data['ORG_REACTIVATION_CONFIRM_NOT']['body'],
		'body_hint'=>'{fullname} = Staff Full Name<br />
							{org-name} = organisation name<br />'
	);

	createNotiBox('Membership Re-activation Notification to DCA Staff','ORG_REACTIVATION_CONFIRM_NOT','oracn',$form,$form_data);
	
	$form_data = array(
		'to'=>'Key Contact',
		'when' => 'Immediately after membership expiration',
		'from' => $this->request->data['MEM_EXPIRE_NOT']['from'],
		'sub' => $this->request->data['MEM_EXPIRE_NOT']['sub'],
		'body' => $this->request->data['MEM_EXPIRE_NOT']['body'],
		'body_hint'=>'{fullname} = Full name of Key Contact<br />
					{org-name} = organisation name<br />'
	);

	createNotiBox('Notification of expired member to Key Contact','MEM_EXPIRE_NOT','emn',$form,$form_data);
	
	$form_data = array(
		'to'=>'DCA Staff',
		'when' => 'Immediately after membership expiration',
		'from' => $this->request->data['MEM_EXPIRE_NOT_DCA_STAFF']['from'],
		'sub' => $this->request->data['MEM_EXPIRE_NOT_DCA_STAFF']['sub'],
		'body' => $this->request->data['MEM_EXPIRE_NOT_DCA_STAFF']['body'],
		'body_hint'=>'{fullname} = Full name of DCA Staff<br />
						{link} = Link to Member area<br />
						{org-name} = Organisation name<br />'
	);

	createNotiBox('Notification of expired member to DCA Staff','MEM_EXPIRE_NOT_DCA_STAFF','mends',$form,$form_data);
	
	
	
		$form_data = array(
		'to'=>'Key Contact',
		'when' => 'Immediately after renewal by the DCA Staff',
		'from' => $this->request->data['RENEWAL_DCA_STAFF']['from'],
		'sub' => $this->request->data['RENEWAL_DCA_STAFF']['sub'],
		'body' => $this->request->data['RENEWAL_DCA_STAFF']['body'],
		'body_hint'=>'{fullname} = Full name of Key Contact<br />
						{renewal_date} = Next Renewal Date<br />
						{org-name} = Organisation name<br />'
	);

	createNotiBox('DCA renewal notification to Key Contact','RENEWAL_DCA_STAFF','rds',$form,$form_data);
	
	
	$form_data = array(
		'to'=>'Key Contact',
		'when' => 'Immediately after re-activate by the DCA Staff',
		'from' => $this->request->data['REACTIVATE_DCA_STAFF']['from'],
		'sub' => $this->request->data['REACTIVATE_DCA_STAFF']['sub'],
		'body' => $this->request->data['REACTIVATE_DCA_STAFF']['body'],
		'body_hint'=>'{fullname} = Full name of Key Contact<br />
						{renewal_date} = Next Renewal Date<br />
						{org-name} = Organisation name<br />'
	);

	createNotiBox('DCA re-activate notification to Key Contact','REACTIVATE_DCA_STAFF','rads',$form,$form_data);
	
	
		$form_data = array(
		'to'=>'Key Contact',
		'when' => 'Immediately after initial Offline Payment',
		'from' => $this->request->data['INITIAL_OFFLINE_PAYMENT']['from'],
		'sub' => $this->request->data['INITIAL_OFFLINE_PAYMENT']['sub'],
		'body' => $this->request->data['INITIAL_OFFLINE_PAYMENT']['body'],
		'body_hint'=>'{fullname} = Full name of Key Contact<br />
						{renewal_date} = Next Renewal Date<br />
						{org-name} = Organisation name<br />'
	);

	createNotiBox('Initial payment notification to Key Contact','INITIAL_OFFLINE_PAYMENT','iop',$form,$form_data);
	
		
	
	$form_data = array(
		'to'=>'Members who are about to expire',
		'when' => '30 days before the renewal date',
		'from' => $this->request->data['SUBSCRIPTION_RENEW_NOT']['from'],
		'sub' => $this->request->data['SUBSCRIPTION_RENEW_NOT']['sub'],
		'body' => $this->request->data['SUBSCRIPTION_RENEW_NOT']['body'],
		'body_hint'=>'{fullname} = full name of member<br />
								{renewal-link} = Renewal Link<br />
								{org-name} = organisation name<br />'
	);

	createNotiBox('30 day membership renewal notice','SUBSCRIPTION_RENEW_NOT','srn',$form,$form_data);
	
	
	$form_data = array(
		'to'=>'DCA Staff',
		'when' => 'After Event Registration',
		'from' => $this->request->data['ADMIN_EVENT_REG_NOT']['from'],
		'sub' => $this->request->data['ADMIN_EVENT_REG_NOT']['sub'],
		'body' => $this->request->data['ADMIN_EVENT_REG_NOT']['body'],
		'body_hint'=>'{fullname} = DCA Staff Full Name<br />
		{first_name} = first name<br />
		{event_title} = Event Name<br />
		{hostedby} = Hosted By<br />
		{date} = Event Date<br />
		{event_time} = Event Time<br />
		{location} = Event Location<br />
		${total} = Event Cost<br />'
	);

	createNotiBox('Event registration notice to DCA staff','ADMIN_EVENT_REG_NOT','aern',$form,$form_data);
	
	
		$form_data = array(
		'to'=>'Key Contact',
		'when' => 'Admin changes Key contact of an Organisation ',
		'from' => $this->request->data['KEY_CONTACT_CHANGE']['from'],
		'sub' => $this->request->data['KEY_CONTACT_CHANGE']['sub'],
		'body' => $this->request->data['KEY_CONTACT_CHANGE']['body'],
		'body_hint'=>'{fullname} = full name of key contact<br />
						{org-name} = organisation name<br />'
	);

	createNotiBox('Key contact change notice','KEY_CONTACT_CHANGE','kcc',$form,$form_data);
	
	   	$form_data = array(
		'to'=>'DCA Staff',
		'when' => 'New individual member registered for an event',
		'from' => $this->request->data['MEM_EVENT_REG_APPROVAL']['from'],
		'sub' => $this->request->data['MEM_EVENT_REG_APPROVAL']['sub'],
		'body' => $this->request->data['MEM_EVENT_REG_APPROVAL']['body'],
		'body_hint'=>'{fullname} = full name of key contact<br />
						{first_name} = first name of the member<br />
						{email} = first name of the member<br />
						'
	);

	createNotiBox('Individual member and Event registration pending approval notice','MEM_EVENT_REG_APPROVAL','mera',$form,$form_data);
	
	
		$form_data = array(
		'to'=>'DCA Staff',
		'when' => 'New individual member registered',
		'from' => $this->request->data['INDIVIDUAL_MEM_REG_APPROVAL']['from'],
		'sub' => $this->request->data['INDIVIDUAL_MEM_REG_APPROVAL']['sub'],
		'body' => $this->request->data['INDIVIDUAL_MEM_REG_APPROVAL']['body'],
		'body_hint'=>'{fullname} = full name of key contact<br />
						{first_name} = first name of the member<br />
						{email} = first name of the member<br />'
	);

	createNotiBox('Individual member pending approval to DCA Staff','INDIVIDUAL_MEM_REG_APPROVAL','imra',$form,$form_data);
	
	
	$form_data = array(
		'to'=>'Attendees who are registered for an event',
		'when' => 'Reminder email to attendees prior to the event',
		'from' => $this->request->data['REMINDER_EVENT_NOTIFICATION']['from'],
		'sub' => $this->request->data['REMINDER_EVENT_NOTIFICATION']['sub'],
		'body' => $this->request->data['REMINDER_EVENT_NOTIFICATION']['body'],
		'body_hint'=>'{fullname} = full name of attendee<br />
					   {event_title} = Event Name<br />
						{hostedby} = Hosted By<br />
						{date} = Event Date<br />
						{event_time} = Event Time<br />
						{location} = Event Location<br />
						${total} = Event Cost<br />'
	);

	createNotiBox('Reminder email notification to attendees prior to event','REMINDER_EVENT_NOTIFICATION','ren',$form,$form_data);
	?>
</div>
</form>
<div id="afm">
	<div id="afm-inner">
		<a href="#" onclick="showConfirm();return false;" class="save_btn"></a>
	</div>
</div>
<?
	// Example from a view calling TinyMceHelper::init().
	
	$text_areas = array(
		'namap_body_txt',
		'srn_body_txt',
		'emn_body_txt',
		'ecm_body_txt',
		'ern_body_txt',
		'inanonr_body_txt',
		'oa_body_txt',
		'ma_body_txt',
		'nma_body_txt',
		'mnmr_body_txt',
		'msinv_body_txt',
		'fec_body_txt',
		'pec_body_txt',
		'aern_body_txt',
		'kcc_body_txt',
		'mera_body_txt',
		'imra_body_txt',
		'orcn_body_txt',
		'mends_body_txt',
		'rds_body_txt',
		'rads_body_txt',
		'iop_body_txt',
		'oracn_body_txt',
		'ren_body_txt'
		);
	
	echo $this->TinyMce->init(implode(',',$text_areas));
?> 

<?
	$this->StyleBox->ConfirmBoxStart('notificationcbox','Notification Settings');
?>
	<!--We noticed that you're about to make a pretty big change. Did you still want to do this?-->
		You are about to change the Global Settings. 
		Making changes to the Global Settings may affect the back-end and/or front-end features of your website. 
<?
	$this->StyleBox->ConfirmBoxEnd('saveNSet();');
?>
<script type="text/javascript">
function showConfirm(){
	showStyleBox('notificationcbox');
}
function saveNSet(){
	$('notifications_settings').submit();
}
</script>
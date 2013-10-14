<?= $this->element('admin/header_js') ?>

<?= $this->CmsForm->create('ClientUser', array(
	'id' => 'clientAdd',
	'class' => 'mainForm white',
)) ?>
<?= $this->CmsForm->hidden('id') ?>

<div class="frm-l">
	
	<h1>Client User Login Details</h1>

	<?= $this->element('admin/notices') ?>

	<?= $this->CmsForm->textbox('First Name', 'firstName') ?>
	<?= $this->CmsForm->textbox('Last Name', 'lastName') ?>
	<?= $this->CmsForm->textbox('Position Title', 'positionTitle') ?>
	<?= $this->CmsForm->selectBox('Client', 'client_id', $clients) ?>
	<?= $this->CmsForm->selectBox('User Type', 'user_level', array(
		'2' => 'Level 2 (Read Only)',
		'1' => 'Level 1 (Read & Upload)',
	)) ?>
	<?= $this->CmsForm->textbox('Email Address', 'email') ?>
	<?= $this->CmsForm->textbox('Password', 'password') ?>
	<?= $this->CmsForm->textbox('Confirm Password', 'password_confirm') ?>
	
</div>
	

<?/*****************
<?= $this->Form->create(null,array('id'=>'individualadd','ENCTYPE'=>'multipart/form-data','url'=>'/admin/clients/edit/'.$this->data['Client']['id'],'method'=>'post'));?>
<?= $this->Form->input('Redirect.redirect',array('type'=>'hidden'));?>
<?= $this->Form->input('Client.id',array('type'=>'hidden'));?>
<?= $this->Form->input('UserLogin.id',array('type'=>'hidden'));?>
<div class="frm-l">
	<h3>View/Edit Client <b><?= $this->request->data['Client']['first_name']. ' ' . $this->request->data['Client']['last_name']?> </b></h3>
	<br/>
	<ol class="erroruls">
		<? 
		if(isset($errors)){
		foreach($errors as $error){
		?>
			<li><?=$error;?></li>
		<?
		}}
		?>
	</ol>





<? //debug($this->data)?>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Personal Details</a></li>
		<li><a href="#tabs-2">Business Details</a></li>
        <li><a href="#tabs-3">Bookings</a></li>
		
	</ul>
	<div id="tabs-1">
	

    <div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<div id="rbox-content-d1" style="display:block;">
	<table width="790" border="0" cellspacing="0" cellpadding="5">
	<tr>
      <td width="25%"><h3>Title</h3></td>
      <td width="75%"><?= $this->Form->input('Client.title',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Title'));?></td>
    </tr>
    <tr>
      <td><h3>First name</h3></td>
      <td><?= $this->Form->input('Client.first_name',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter First Name'));?></td>
    </tr>
    <tr>
      <td><h3>Last name</h3></td>
      <td><?= $this->Form->input('Client.last_name',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Last Name'));?></td>
    </tr>
    <tr>
      <td><h3>Daytime phone</h3></td>
      <td><?= $this->Form->input('Client.phone1',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Daytime phone'));?></td>
    </tr>
    <tr>
      <td><h3>AH phone </h3></td>
      <td><?= $this->Form->input('Client.phone2',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter AH phone'));?></td>
    </tr>
    <tr>
      <td><h3>Other phone or mobile</h3></td>
      <td><?= $this->Form->input('Client.phone3',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Other phone or mobile'));?></td>
    </tr>
    <tr>
      <td><h3>Issues</h3></td>
      <td><?= $this->Form->input('Client.issues',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Issue'));?></td>
    </tr>
  </table>
			</div>	
		</div>
	</div>
	<div class="rbox-btm"><div></div></div>
	
	
	<br />
    
    <div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<div id="rbox-content-d2" style="display:block;">
	<table width="790" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td width="17%"><h3>User name</h3></td>
      <td width="83%"><?= $this->Form->input('UserLogin.user_name',array('label'=>false, 'readonly'=>true, 'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter First Name'));?></td>
    </tr>
    <tr>
      <td><h3>Password</h3></td>
      <td><?= $this->Form->input('UserLogin.user_pass',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Last Name'));?></td>
    </tr>

  </table>
			</div>	
		</div>
	</div>
	<div class="rbox-btm"><div></div></div>
    <!-- end 1 -->
    
    </div>
	<div id="tabs-2">



<div id="bus-tabs">
	<ul>
	<? $tab_names = $this->data['ClientBusiness']; 
	 foreach($tab_names as $cb) {?>
		<li><a href="#bus-tabs-<?= $cb['id']?>"><?= $cb['name']?></a></li>
	<? } ?>
	</ul>
	
	<? 
	$i = 0;
	foreach($this->data['ClientBusiness'] as $cb) {?>
	<div id="bus-tabs-<?= $cb['id']?>">
	
		
		
		
		<div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<div id="rbox-content-d1" style="display:block;">
			<?= $this->Form->hidden('ClientBusiness.'.$i.'.id');?>
			<?= $this->Form->hidden('ClientBusiness.'.$i.'.client_id');?>
	<table width="790" border="0" cellspacing="0" cellpadding="5">
	<tr>
      <td width="25%"><h3>Business name</h3></td>
      <td width="75%"><?= $this->Form->input('ClientBusiness.'.$i.'.name',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Title'));?></td>
    </tr>
    <tr>
      <td><h3>Your position</h3></td>
      <td>			 <?= $this->Form->input('ClientBusiness.'.$i.'.position',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter First Name'));?></td>
    </tr>
    <tr>
      <td><h3>ABN</h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.abn',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Last Name'));?></td>
    </tr>
    <tr>
      <td><h3>Years in this business</h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.years',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Daytime phone'));?></td>
    </tr>
    <tr>
      <td><h3>Business street<br>
        </h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.street',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter AH phone'));?></td>
    </tr>
    <tr>
      <td><h3>Business suburb</h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.suburb',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Other phone or mobile'));?></td>
    </tr>
    <tr>
      <td><h3>Postcode</h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.postcode',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Issue'));?></td>
    </tr>
    <tr>
      <td><h3>Your region</h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.sbms_region',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Issue'));?></td>
    </tr>
    <tr>
      <td><h3>Email</h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.email',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Issue'));?></td>
    </tr>
    <tr>
      <td><h3>Website</h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.website',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Issue'));?></td>
    </tr>
    <tr>
      <td><h3>What does your business do?</h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.desc',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Issue'));?></td>
    </tr>
    <tr>
      <td><h3>Business Structure</h3></td>
      <td><?= $this->Form->input('ClientBusiness.'.$i.'.structure',array('label'=>false,'div'=>false,'class'=>'focus fullwidth','focus_txt'=>'Enter Issue'));?></td>
    </tr>
    </table>
			</div>	
		</div>
	</div>
	<div class="rbox-btm"><div></div></div>
    <br />
    	<div class="rbox"><div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<div id="rbox-content-d1" style="display:block;">
			  <table width="790" border="0" cellspacing="0" cellpadding="5">
			    <tr>
			      <td width="25%" valign="top"><h3>Business plan</h3></td>
			      <td width="25%" valign="top"><?= $this->Form->radio('ClientBusiness.'.$i.'.plan',array('1' => 'Yes', '0' => 'No'),array('label'=>false,'div'=>false,'legend' => false));?></td>
			      <td width="25%" valign="top"><h3>Num of employees</h3></td>
			      <td width="25%" rowspan="3" valign="top"><?= $this->Form->radio('ClientBusiness.'.$i.'.num_employees', $options_num_employees ,array('label'=>false,'div'=>false,'legend' => false));?></td>
		        </tr>
			    <tr>
			      <td valign="top"><h3>Budget</h3></td>
			      <td valign="top"><?= $this->Form->radio('ClientBusiness.'.$i.'.budget',array('1' => 'Yes', '0' => 'No') ,array('label'=>false,'div'=>false,'legend' => false));?></td>
			      <td valign="top">&nbsp;</td>
		        </tr>
			    <tr>
			      <td valign="top"><h3>Year to date P&amp;L</h3></td>
			      <td valign="top"><?= $this->Form->radio('ClientBusiness.'.$i.'.year_to_date',array('1' => 'Yes', '0' => 'No') ,array('label'=>false,'div'=>false,'legend' => false));?></td>
			      <td valign="top">&nbsp;</td>
		        </tr>
			    <tr>
			      <td valign="top"><h3>Last years accounts</h3></td>
			      <td valign="top"><?= $this->Form->radio('ClientBusiness.'.$i.'.last_year_accounts',array('1' => 'Yes', '0' => 'No') ,array('label'=>false,'div'=>false,'legend' => false));?></td>
			      <td valign="top"><h3>Profitability</h3></td>
			      <td rowspan="2" valign="top"><?= $this->Form->radio('ClientBusiness.'.$i.'.profitability', $options_profitability ,array('label'=>false,'div'=>false,'legend' => false));?></td>
		        </tr>
			    <tr>
			      <td valign="top"><h3>Anual sales ($'000)<br>
			        </h3></td>
			      <td valign="top"><?= $this->Form->radio('ClientBusiness.'.$i.'.anual_sales', $options_sales ,array('label'=>false,'div'=>false,'legend' => false));?></td>
			      <td valign="top">&nbsp;</td>
		        </tr>
		      </table>
			</div>	
		</div>
	</div>
	<div class="rbox-btm"><div></div></div>
	    	
	    	
	</div>
	<? $i++; } ?>
	
</div>
	<!-- end 2 -->
	</div>
    <div id="tabs-3">3</div>

</div>





	



	
</div>
<br/><br/>
</div>********************/?>

<div class="frm-r">
	<?= $this->element('admin/administrator_notes', array('open'=> true)) ?>
</div>

<br style="clear:both;" />
	<div id="afm">
		<div id="afm-inner">
			<a href="#" onclick="$('clientAdd').submit();return false;" class="save_btn"></a>
			<div id='ajax-save'>
				<img src="<?= $theme_admin?>/images/ajaxLoader.gif"> Saving..
				</div>
			<ul id="footer-action">
				<li><a class="" href="#"  onclick="resetConfirm();return false;" title="Reset" >Reset</a></li>
				<? //if($this->data['Redirect']['redirect']=='admin-sitemap'){ ?>
				<? //}else{ ?>
					<li class='close'><a class='close' onclick="" href="<?= $this->Html->url(array('action' => 'index')) ?>" title="Close" >Close</a></li> <!-- closeConfirm(this.href);return false;-->
				<? //} ?>
			</ul>
		</div>
	</div>
	
<?= $this->CmsForm->end() ?>

<script type="text/javascript">
function closeConfirm(href){
	$('individualmsg').down(1).update('Are you sure you want to close without saving?');
	$('individualmsg').down('div.cmsg_content_small').update('You may have unsaved changes.');
	$('individualmsg').down('a.green').writeAttribute('href',href);
	$('individualmsg').down('a.green').writeAttribute('onclick','');
	showStyleBox('individualmsg');
}
function resetConfirm(){
	$('individualmsg').down(1).update('You are about to reset all fields.');
	$('individualmsg').down('div.cmsg_content_small').update('This will undo any changes you have made to this form. Are you sure you want to reset?');
	$('individualmsg').down('a.green').writeAttribute('onclick',"$('individualadd').reset();hideStyleBox('individualmsg');return false;");
	showStyleBox('individualmsg');
}
</script>
<?if(isset($success)){?><div class="page-title">Approval Pending</div><p>Your details have been submitted. An email has been sent to DCA to confirm that your are an employee of a DCA member organisation.</p><p>Once your account is approved, it will be activated and your DCA website log-in details will be emailed to you.</p><?}else{?><div class="page-title">Create an individual member account</div><p>If your organisation is a DCA member, you can create your own individual account for free. This allows you to access members-only content and attend events for free or at discounted prices.</p><p>When you submit the form below, an email will be sent to DCA to confirm that you are an employee of a DCA member.</p><p>You will receive confirmation via email when your account has been approved.</p><?= $this->Form->create(null,array('id'=>'jqvalidated','url'=>'/members/register'));?><div id="errors">	<ul>	<?		if(isset($errors)){			foreach($errors as $error){				echo '<li style="color:#DD0000">'.$error.'</li>';					}		}	?>	</ul></div><div id="dca_reg_frm_step_1" style="display:block;">	<div><b>Complete the following details to for your individual account</b></div>	<p style="color: #7E7D7D;font-size: 12px;font-weight: bold;margin-top: 10px;font-style: italic;">Note: Please type the first letter of your organisation and select it from the list</p>	<div class="frow">		<label><span>*</span>Name of Organisation</label>		<?			echo $ajax->autoComplete('Organisation.name', '/organisations/autoComplete',array('minChars' => 1,'class'=>'validate[required]','indicator'=>'orgspinner'));		?>		<div style="display:none;margin-left: 399px;margin-top: -25px;position: absolute;" id="orgspinner">			<img src="/img/spinner.gif" alt="Loader" />		</div> 	</div>	<div class="frow">		<label><span>*</span>Given Name</label>		<?			echo $this->Form->input('Member.gname',array('label'=>false,'div'=>'false','class'=>'validate[required]'));		?>	</div>	<div class="frow">		<label><span>*</span>Last Name</label>		<?			echo $this->Form->input('Member.lname',array('label'=>false,'div'=>'false','class'=>'validate[required]'));		?>	</div>	<div class="frow">		<label><span>*</span>Position Title</label>		<?			echo $this->Form->input('Member.position',array('label'=>false,'div'=>'false','class'=>'validate[required]'));		?>	</div>	<div class="frow">		<label><span>*</span>Email Address</label>		<?			echo $this->Form->input('Member.email',array('label'=>false,'div'=>'false','class'=>'validate[required,custom[email],ajax[ajaxEmail]]'));		?>	</div>	<div class="frow">		<label><span>*</span>Phone Number</label>		<?			echo $this->Form->input('Member.phonenumber',array('label'=>false,'div'=>'false','class'=>'validate[required,onlyNumber]'));		?>	</div>	<div class="frow">		<a style=" margin-right:217px;" id="redlink4" href="#" onclick="$('jqvalidated').submit();return false;" class="reg_nxt_btn">Submit</a>	</div></div></form><?}?>
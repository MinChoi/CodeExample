<div class="page-title"><?= __('Edit account details');?></div>
	<?
		if(isset($msg)){
	?>
	<p><font color="#055F00"><?=$msg?></font></p>
	<?
		}
	?>
	<?= $this->Form->create(null,array('url'=>'/memberarea-editacc','id'=>'member_edit'));?>
	<div id="dca_reg_frm_step_1" style="display:block;">
		<div class="frow">
			<label>Name of Organisation</label>
			<div style="margin-top:7px;margin-left:180px;">
			<?
				echo $this->request->data['Organisation']['name'];
			  echo $this->Form->input('Organisation.name',array('type'=>'hidden','value'=>$this->request->data['Organisation']['name']));			
			?>
			</div>
		</div>
		<div class="frow">
			<label>Given Name</label>
			<?
				echo $this->Form->input('gname',array('label'=>false,'div'=>'false'));
			?>
		</div>
		<div class="frow">
			<label>Last Name</label>
			<?
				echo $this->Form->input('lname',array('label'=>false,'div'=>'false'));
			?>
		</div>
		<div class="frow">
			<label>Position Title</label>
			<?
				echo $this->Form->input('position',array('label'=>false,'div'=>'false'));
			?>
		</div>
		<div class="frow">
			<label>Email Address</label>
			<?
				echo $this->Form->input('email',array('label'=>false,'div'=>'false'));
			?>
		</div>
		<div class="frow">
			<label>Phone Number</label>
			<?
				echo $this->Form->input('phonenumber',array('label'=>false,'div'=>'false'));
			?>
		</div>

		
	<script type="text/javascript">
		function pass_edit(){
			$('password_from_i').show();
			g_pass=$('MemberPassword').value;
			g_cpass=$('MemberCpassword').value;
			}
		function pass_apply(){
			$('password_from_i').hide();
			}
		function pass_cancel(){
			$('password_from_i').hide();
			$('MemberPassword').value=g_pass;
			$('MemberCpassword').value=g_cpass;
		}
	</script>


		<div class="frow">
			<label>Password</label>
			<div class="false" style="margin-left:180px;">************ <a style="cursor:pointer" onclick="pass_edit();return false;" id="password_edit">Edit</a></div>
		</div>
		<div id="password_from_i" style="display:none;">
			<div class="frow">
				<label>New password</label>
				<?=$this->Form->input('Member.password',array('label'=>false,'type'=>'password','value'=>''));?>
			</div>
			
			<div class="frow">
				<label>Confirm password</label>
				<?=$this->Form->input('Member.cpassword',array('label'=>false,'type'=>'password','value'=>''));?>
			</div>
			<div class="frow">
				<label>&nbsp;</label>
				<div class="false" style="margin-left:180px;">
				<a style="cursor:pointer" onclick="pass_apply();return false;" id="password_apply" >Update</a>&nbsp;|&nbsp;<a style="cursor:pointer" onclick="pass_cancel();return false;" id="password_cancel">Cancel</a>
				</div>
			</div>			
		</div>
		<div class="frow">
			<a class="reg_nxt_btn scroll" onclick="$('member_edit').submit();return false;" href="#" id="redlink1">Submit</a>
		</div>
</div>
	<?
	if(!empty($this->Form->validationErrors['Member']['password'])) { 
	?>
	<script type="text/javascript">pass_edit();</script>
	<?
	}
	?>	
<?
if(!isset($saved) && !isset($invalid_request)) {
?>
<div class="page-title"><?= __('Edit account details');?></div>
<? $this->Session->flash(); ?>

	<? 
		echo $ajax->form(array('type' => 'post',
			'options' => array(
				'model'=>'Member',
				'update'=>'member-add-edit-form',
				'url' => array(
					'controller' => 'members',
					'action' => 'member_edit',
					
				),
				'indicator'=>'form_spinner'
			)
		));	
	?>	
	<div id="dca_reg_frm_step_1" style="display:block;">
			<?
			  echo $this->Form->input('Member.id',array('type'=>'hidden'));			
			?>
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
		<div class="frow">
			<div>
			<?
				echo $this->Form->submit('Save',array('div'=>false,'label'=>false));
			?>
			<a href="#" onclick="$('member-add-edit-form').update(''); return false;">Cancel</a>	
			</div>	
		</div>
	</div>
</form>
<?
}
?>

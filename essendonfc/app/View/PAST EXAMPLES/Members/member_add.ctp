<?
if(!isset($saved)) {
?>
<div class="page-title"><?= __('New individual account');?></div>
<? $this->Session->flash(); ?>

	<? 
		echo $ajax->form(array('type' => 'post',
			'options' => array(
				'model'=>'Member',
				'update'=>'member-add-edit-form',
				'url' => array(
					'controller' => 'members',
					'action' => 'member_add',
					
				),
				'indicator'=>'form_spinner'
			)
		));	
	?>	
	<div id="dca_reg_frm_step_1" style="display:block;">
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
			<label>&nbsp;</label>
			<div>
			<?
				echo $this->Form->submit('Add this account',array('div'=>false,'label'=>false));
			?>
			<a href="#" onclick="$('member-add-edit-form').update(''); return false;">Cancel</a>	
			</div>			
		</div>
	</div>
	</form>
<?
}
else
{
?>
	<script type="text/javascript">
	<!--
	location.href="/memberarea-moa";
	-->
	</script>
<?
}
?>

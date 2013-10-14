<? if(!isset($s)){?>
<?
echo $ajax->form(array('type' => 'post',
    'options' => array(
        'model'=>'Group',
        'update'=>'edit-formdiv',
        'url' => array(
            'controller' => 'groups',
            'action' => 'edit'
        ),
		'indicator' => 'loadingDiv'
    )
));
?>
	<?
		echo $this->Form->input('id');
	?>
	<fieldset> 
		<?=$this->Form->input('name');?>
	</fieldset>
	</fieldset>
		<fieldset class="nopad">
		<button id="captions-button" type="submit" title="Save" class="primary_lg_alt right">Save</button>
		<button type="button"  onclick="Messaging.kill('edit-dialog');" title="Cancel" class="primary_lg_alt right">Cancel</button> 
	</fieldset>
</form>
</div>
<? }else{ ?>
<div id="loadeditindex">
<?=$javascript->codeBlock($ajax->remoteFunction( 
			array( 
				'url' => '/admin-groups', 
				'update' => 'maincontent',
				'after' => "Messaging.kill('edit-dialog')",
				'before'=>"$('loadeditindex').update('');",
				'indicator' => 'loadingDiv'
			) 
		)); ?>
<? } ?>
</div>
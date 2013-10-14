<?
echo $ajax->form(array('type' => 'post',
    'options' => array(
        'model'=>'Group',
        'update'=>'add-formdiv',
        'url' => array(
            'controller' => 'groups',
            'action' => 'add'
        ),
		'indicator' => 'loadingDiv'
    )
));
?>
	<fieldset>
		<?= $this->Form->input('name'); ?>
	</fieldset>	
	<fieldset class="nopad">
		<button id="captions-button" type="submit" title="Save" class="primary_lg_alt right">Save</button>
		<button id="captions-clear-button" type="reset" title="Clear captions" class="primary_lg_alt right">Clear</button> 
		<button type="button"  onclick="Messaging.kill('addnew-dialog');" title="Cancel" class="primary_lg_alt right">Cancel</button> 
	</fieldset>
</form>
<? if(isset($s)){?>
<div id="loadaddindex">
<?=$javascript->codeBlock($ajax->remoteFunction( 
			array( 
				'url' => '/admin-groups', 
				'update' => 'maincontent',
				'before' => "Messaging.kill('addnew-dialog')",
				'after'=>"$('loadaddindex').update('');",
				'indicator' => 'loadingDiv'
			) 
		)); ?>
</div>
<? } ?>
<?
    $this->Paginator->options(
            array('update'=>'maincontent', 
                    'url'=>array('controller'=>'groups', 'action'=>'index','admin'=>true),
					'indicator' => 'loadingDiv'
					));
?>
<div id="head">
	<div class="head-wrap">		
		<h1>
			<a href="/admin/users" title="Admin User">User Groups</a>
			<a href="javascript:void(0);" onclick="Messaging.dialogue('addnew-dialog'); return false;" class="button fr">Add New</a>
		</h1>
	</div> <!--close head-wrap-->
</div>

<div id="container-wrap">
	<div class="col-wrap">
		<? $this->Session->flash(); ?>	
			<div class="clear" style="height:10px;"></div>
			<form>
			<div class="div-bulk-action">
				<ul class="bulk-actions">
					<li><b>Bulk Actions:</b></li>
					<li><a href="#">Delete</a></li>
					<li><a href="#">Publish</a></li>
					<li><a href="#">UnPublish</a></li>
					<li class="fr"><?
					echo $this->Paginator->counter(array(
					'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
					));
				?></li>
				</ul>
			</div>
			<table cellspacing="0" cellpadding="0" id="users-table" class="sortable">
				<tr>
					<th class="tl"  width="10px"><input type="checkbox" id="cust_chk_0" name="cust_chk_0" value="0" onclick="$(this.form).getInputs('checkbox').each(function (elem) { if(elem.checked){elem.checked = false;$('cust_chk_0').checked=false;}else{elem.checked = true;$('cust_chk_0').checked=true;}});"/></th>
					<th><?= $this->Paginator->sort('name');?></th>
					<th><?= $this->Paginator->sort('created');?></th>
					<th><?= $this->Paginator->sort('modified');?></th>
					<th class="tr" ><?= $this->Paginator->sort('id');?></th>
				</tr> 
				<?
				$i = 0;
				foreach ($groups as $group):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
				<tr class="content">
					<td><input type="checkbox" id="test$i" name="data[Group][ids][]" value="<?= $group['Group']['id']; ?>" /></td>
					<td class="title">
						<h4><?= $group['Group']['name']; ?></h4>
						 <div class="row-actions">
							<span><a title="Edit" href="javascript:void(0)" onclick="new Ajax.Updater('edit-formdiv','/admin/groups/edit/<?=$group['Group']['id'];?>', {asynchronous:true, evalScripts:true, requestHeaders:['X-Update', 'edit-formdiv']});Messaging.dialogue('edit-dialog'); return false;
">Edit</a> | </span>
							<span><a title="View"  href="javascript:void(0)" onclick="new Ajax.Updater('view-formdiv','/admin/groups/view/<?=$group['Group']['id'];?>', {asynchronous:true, evalScripts:true, requestHeaders:['X-Update', 'view-formdiv']});Messaging.dialogue('view-dialog'); return false;
">View</a> | </span>
							<span><?=$html->link(__('Delete'), array('action' => 'delete', $group['Group']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $group['Group']['name']));?></span>
						</div>	
					</td>
					<td>
						<?= $group['Group']['created']; ?>
					</td>
					<td>
						<?= $group['Group']['modified']; ?>
					</td>
					<td>
						<?= $group['Group']['id']; ?>
					</td>
				</tr>
			<? endforeach; ?>
			 </table>
			</form>
			<div class="paging">
				<?= $this->Paginator->prev('<< ' . __('previous'), array(), null, array('class'=>'disabled'));?>| 	
				<?= $this->Paginator->numbers();?>|
				<?= $this->Paginator->next(__('next') . ' >>', array(), null, array('class' => 'disabled'));?>
			</div>
			<div class="clear" style="height:10px;"></div>
	</div> <!--close col-wrap-->
</div> <!--close container-wrap-->


	



<div id="addnew-dialog" class="dialogue-wrap"style="display:none;">
	<div class="dialogue">
		<div class="dialogue-content">
			<div class="dialogue-inner-wrap">
				<h1><?= __('Add New Group'); ?></h1>
				<div class="content" id="add-formdiv">
					<?=$javascript->codeBlock($ajax->remoteFunction( 
						array( 
							'url' => array( 'controller' => 'groups', 'action' => 'add','admin'=>true), 
							'update' => 'add-formdiv',
							'indicator' => 'loadingDiv'
						) 
					)); ?>
				</div> <!--close content-->
			</div>
		</div>
	</div>
</div>
<!-- Shows the page numbers -->
<? /* echo $this->Paginator->numbers(); ?>
<!-- Shows the next and previous links -->
<?
	echo $this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled'));
	echo $this->Paginator->next(' Next »', null, null, array('class' => 'disabled'));
?> 
<!-- prints X of Y, where X is current page and Y is number of pages -->
<?= $this->Paginator->counter();*/ ?>

<div id="edit-dialog" class="dialogue-wrap"style="display:none;">
	<div class="dialogue">
		<div class="dialogue-content">
			<div class="dialogue-inner-wrap">
				<h1><?= __('Edit Group'); ?></h1>
				<div class="content" id="edit-formdiv">
					&nbsp;					
				</div> <!--close content-->
			</div>
		</div>
	</div>
</div>


<div id="view-dialog" class="dialogue-wrap"style="display:none;">
	<div class="dialogue">
		<div class="dialogue-content">
			<div class="dialogue-inner-wrap">
				<h1><?= __('View Group'); ?></h1>
				<div class="content" id="view-formdiv">
					&nbsp;					
				</div> <!--close content-->
				</fieldset>
					<button type="button"  onclick="Messaging.kill('view-dialog');" title="Close" class="primary_lg_alt right">Close</button> 
				</fieldset>
			</div>
		</div>
	</div>
</div>

<?
	//$js->writeBuffer();
?>
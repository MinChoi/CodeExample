<?

    $this->Paginator->options(
            array('update'=>'content', 
                    'url'=>'/memberarea-moa',
					'indicator' => 'loader'
					));
	
?>
<img align="top" src="/img/spinner.gif" alt="spinner" id="loader" style="display:none;" />
<div class="page-title">Manage Organisation accounts</div>
<p>
The following accounts are linked to your organisation.
</p>
<div id="cpoll-info" class="frow">
	<form action="/keycontact-save" method="POST" name="kcontact" id="kcontact">
		<h2 class="sub_head">Current individuals accounts</h2>
		<div id="ml">
			<table width="100%" cellpadding="4" cellspacing="0">
				<tr>
					<td colspan="4">
					Key Contact
					</td>
				</tr>
				<?
					foreach($members as $member){
				?>
				<tr>
					<td><img align="top" src="/img/spinner.gif" alt="spinner" id="spinner_<?=$member['Member']['id'];?>" style="display:none;" /></td>
					<td>
						
						<?
							$checked = '';
							if($member['Member']['keycontact']==1){
								$checked = 'checked="checked"';
							}
						?>
						<input <?=$checked;?> type="radio" name="data[Member][kc_member_id]" value="<?=$member['Member']['id'];?>" />
					</td>
					<td>
						<?=$member['Member']['gname'];?> <?=$member['Member']['lname'];?>
					</td>
					<td>
						<?= $ajax->link( 
								'edit', 
								array( 'controller' => 'members', 'action' => 'member_edit', $member['Member']['id'] ), 
								array( 'update' => 'member-add-edit-form','indicator'=>'spinner_'.$member['Member']['id'] )
							); 
						?>
					</td>
					<td>
							<?= $html->link(__('remove'), '/memberdel/'.$member['Member']['id'], null, sprintf(__('Are you sure you want to delete this member  %s?'), $member['Member']['gname'].' '.$member['Member']['lname'])); ?>
					</td>
				</tr>
				<?
					}
				?>
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Save" />
					</td>
					<td colspan="2"><div align="right">
						<?= $ajax->link( 
								'Add another account', 
								array( 'controller' => 'members', 'action' => 'member_add'), 
								array( 'update' => 'member-add-edit-form','indicator'=>'form_spinner')
							); 
						?>
					</div></td>
				</tr>
			</table>
			<div class="paging">
			<?= html_entity_decode($this->Paginator->prev('&laquo; Previous', array(), null, array('class'=>'disabled')));?>
			<?= $this->Paginator->numbers(array('separator'=>''));?>
			<?= html_entity_decode($this->Paginator->next('Next &raquo;', array(), null, array('class' => 'disabled')));?>
			</div>
		</div>
	</form>
</div>
<br />
<img align="top" src="/img/spinner.gif" alt="spinner" id="form_spinner" style="display:none;" />
<div id="member-add-edit-form">&nbsp;</div>
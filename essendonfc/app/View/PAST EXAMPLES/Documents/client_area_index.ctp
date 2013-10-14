<?
// Note: this view is used for both clients and staff users
$addUrl = $this->Html->url(array('action' => 'add'));
if ($routing_prefix == 'staff') $addUrl .= '/' . $clientId;

// debug($documents)

// $this->StyleBox->ConfirmMessageStart('inidimsg','');
// $this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
// $this->Paginator->options(array('url' => '../../../admin-individuals'));
?>
<div class="sidebarLeft">
	<?
	// Client Doc Box (for staff) is menu link with ID 107
	// Client docs is menu link with ID 67
	if ($routing_prefix == 'staff')
		$pageId = 107;
	else
		$pageId = 67; 
	echo $this->element('frontend/sidebar_page_submenu', array('page' => $pageId));
	// debug($pageId);
	?>	
</div>


<div class="content">
<div id="filterbar" style="display:block;">
	<?//---------------- TODO: FILTER BOX ------------------- 
	/* ?>
	<div id="filter-block">
		<form action="/clientArea/documents/filter" method="POST">
		<table cellspacing="0" cellpadding="4" border="0">
			<tr>
				<td>Filter by category:</td>
				<td>Sort by:</td>
				<td>Search:</td>
			</tr>
			<tr>
				<td><?= $this->Form->select('category', array(), array('value' => 'xxx', 'empty' => 'All categories')) ?></td>
				<td><?= $this->Form->select('sort', array(), array('value' => 'xxx', 'empty' => true)) ?></td>
				<td><input type="text" name="search"/><input type="submit" value="Search"/></td>
			</tr>
		</table>
		</form>
	</div>
	<? */ ?>
</div>

<?= $this->Session->flash() ?>

<? if ($hasUploadPermissions) { ?>
	<div id="uploadNew">
		<a href="<?= $addUrl ?>" class="blueButton"><span>Upload New Document</span></a>
	</div>
<? } ?>
	
<? //---------------- LIST OF DOCUMENTS ----------------------------?>
<div id="index-block" style="clear:both;">
	<div id="indexrows">
		<? foreach ($documents as $doc) : //debug($doc) ?>
			<div id="rowid_<?= $doc['Document']['id'] ?>" class="row">
				<div class="rowitem first">
					<div class="memtitle">
						<?= $doc['Document']['title'] ?>
					</div>
				</div>
				<div class="rowitem">
					<div class="rowcell"><?= $doc['DocumentCategory']['name']; ?></div>
				</div>
				<div class="rowitem" style="xwidth:20%; padding-left: 20px">
					<div class="rowcell">
						<a href="<?= $docFolder . $doc['Document']['id'] . '/' . $doc['Document']['filename'] ?>" class="blueButton"><span>Download</span></a>
					</div>
				</div>
				<div class="rowitem">
					<div class="rowcell" title="<?= $doc['Document']['version_notes'] ?>">
						<span>Last updated</span><br/>
						<?= $doc['Document']['modified'] ?><br/>
						<span>by</span> 
						<?= $doc['Document']['latest_upload_by_username'] ?>
						(<?= $doc['Document']['latest_upload_by_usertype'] ?>)
					</div>					
				</div>
				<? if ($hasUploadPermissions) { ?>
					<div class="rowitem last">
						<div class="rowcell">
							<a href="<?= $this->Html->url(array('action' => 'edit', $doc['Document']['id'])) ?>" class="blueButton"><span>Edit</span></a>
						</div>					
					</div>
				<? } ?>
			</div>
		<? endforeach ?>
		<? if (!$documents) : ?>
			<div class="noResults">
				There are currently no documents here.  Would you like to <a href="<?= $addUrl ?>">upload one now</a>?
			</div>
		<? endif ?>
	</div>

	<?//=$this->element('admin/modules/sp_paging',array('limit'=>$this->Session->read('INDIVIDUAL_LIMIT'),'view_url'=>'/admin/mentor/setpaging'));?>
	<div class="paging">
		<? if ($this->Paginator->hasPage(2)) : // show paging links only if there is more than 1 page ?>
			<?= $this->Paginator->prev('« Prev', array(), ' ', array('class' => 'disabled'));?>
			<?= $this->Paginator->numbers(array('separator'=>' | '));?>
			<?= $this->Paginator->next('Next »', array(), ' ', array('class' => 'disabled'));?>
			<div>Page <?= $this->Paginator->counter(); ?></div>
		<? endif ?>
	</div>

	<? if ($hasUploadPermissions) { ?>
		<div id="uploadNew">
			<a href="<?= $addUrl ?>" class="blueButton"><span>Upload New Document</span></a>
		</div>
	<? } ?>
	
</div>
</div>
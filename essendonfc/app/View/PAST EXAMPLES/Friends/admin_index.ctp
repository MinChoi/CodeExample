<?
$this->StyleBox->ConfirmMessageStart('inidimsg','');
$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
$this->Paginator->options(array('url' => '../../../admin-individuals'));
?>

<div id="filterbar" style="display:block;">
	<?//---------------- FILTER BOX -------------------?>
	<div id="filter-block">
		<form action="/admin/clients/filter" method="POST" name="filter_news">
		<table cellspacing="0" cellpadding="4" border="0">
			<tr>
				<td class="filter_colour">Filter Clients by </td>
				<td></td>
			</tr>
			<tr>
				
				<td><?//= $this->element('admin/mentor/name');?></td>
			</tr>
			<tr>
				<td colspan="2">
				<div align="right">
					<a href="/admin/clients/clrfilter" class="clearlink">Clear Filters</a>
					<input type="submit" value="Apply" name="filterbtn" class="search-btn" />
				</div>
				</td>
			</tr>
		</table>
		</form>
	</div>
	<?//--------------- SEARCH BOX -----------------------?>
	<div id="search-block">
		<form action="/admin/clients/clientsearch" method="POST">
			<div class="filter_colour"><b>Search by Keyword</b></div>
			<?=$this->Form->input('Client.clientsearch',array('value'=>$this->Session->read('Client.clientsearch'),'class'=>'focus','default'=>'Enter Keyword','label'=>false,'focus_txt'=>'Enter Keyword'));?>
			<div>
				<a href="/admin/clients/clrclientsearch" class="clearlink">Clear Search</a>
				<input type="submit" value="Search" name="filterbtn" class="search-btn" />
			</div>
		</form>
	</div>
</div>

<?//---------------- LIST OF CLIENTS ----------------------------?>
<div id="index-block" style="clear:both;">
	<div id="indexrows">
		<? foreach ($friends as $friend) : //debug($friend) ?>
			<div id="rowid_<?= $friend['Friend']['id']; ?>" class="row">
				<div class="rowitem" style="width:45%">
					<div class="memtitle">
						<?= $friend['Friend']['first_name'] ?> <?= $friend['Friend']['last_name'] ?><br/>
						<span><?= $friend['Friend']['email'] ?></span>
					</div>
				</div>
				<div class="rowitem" style="width:30%;padding-left:20px;">
					<div class="rowcell">
						<?= $friend['Friend']['organisation'] ?>
					</div>
				</div>				
				<div class="rowitem" style="width:17%;padding-left:20px;">
					<div class="rowcell">
						<span>Last logged in</span><br/>
						<?= $friend['Friend']['last_login'] ? $friend['Friend']['last_login'] : 'never' ?>
					</div>
				</div>		
			</div>
		<? endforeach ?>
	</div>

	<?=$this->element('admin/modules/sp_paging',array('limit'=>$this->Session->read('INDIVIDUAL_LIMIT'),'view_url'=>'/admin/mentor/setpaging'));?>
	<div class="paging">
		Display <?= $this->Paginator->counter(); ?>
		<?= html_entity_decode($this->Paginator->prev('&laquo;', array(), null, array('class'=>'disabled')));?>
		<?= $this->Paginator->numbers(array('separator'=>''));?>
		<?= html_entity_decode($this->Paginator->next('&raquo;', array(), null, array('class' => 'disabled')));?>
	</div>
	
	<?= $this->element('admin/bottom_button_bar') ?>
	<?= $this->element('admin/list_actions') ?>
	
</div>
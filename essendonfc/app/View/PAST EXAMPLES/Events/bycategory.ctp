<div class="page-title"><?=ucwords(str_replace(array('-and-','-or-','-'),array('&amp;','/',' '),$catname));?></div>
<div id="event-list">
<?
$this->Paginator->options(array('url' =>  '/'.$catname));
$i = 0;
foreach ($events as $event):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
	$estatus = array();
	$estatus = unserialize($event['Event']['check_status']);
?>
	<div class="event-list-item">
		<div class="event-date">
		<?//=date('d M Y',strtotime($event['Event']['publish_date']));?>
		<?
			//if(intval($estatus['end_date_chk'])==0){
				echo date('d M Y',strtotime($event['Event']['start_date']));
			//}else{
			//	echo date('d M Y',strtotime($event['Event']['start_date'])).' to <br />'.date('d M //Y',strtotime($event['Event']['end_date']));
			//}
		?>
		</div>
		<div class="event-info">
			<div class="event-cat-hostedby"><?= $event['Category']['name']; ?> <? if(strlen(trim($event['Event']['hostedby']))>0 && trim($event['Event']['hostedby'])!='Enter Hosted By'){ ?> | Hosted by <b><?= ucfirst($event['Event']['hostedby']); ?></b><? } ?></div>
			<div class="event-title">
				<?= $event['Event']['title']; ?>
			</div>
			<div class="event-desc">
				<?= $event['Event']['short_desc']; ?>
				<a href="/events-details/<?=$catname;?>/<?= urlencode(str_replace(array('&','/',' ','?'),array('and','or','-',''),strtolower($event['Event']['title']))); ?>/<?= $event['Event']['id']; ?>" class="more">More</a>
			</div>
		</div>
	</div>
<? endforeach; ?>
</div>
<div class="paging">
	<? $this->Paginator->options(array('url'=>$catname)); ?>
	<?= html_entity_decode($this->Paginator->prev('&laquo; Previous', array(), null, array('class'=>'disabled')));?>
  	<?= $this->Paginator->numbers(array('separator'=>''));?>
	<?= html_entity_decode($this->Paginator->next('Next &raquo;', array(), null, array('class' => 'disabled')));?>
</div>
<?php
$this->StyleBox->ConfirmMessageStart('faqmsg','');
$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
echo $this->element('admin/list_filter_bar');
?>

<?= $this->Session->flash() ?>

<? //----------------- FAQ Questions ------------------------?>
<div id="index-block" style="clear:both;">
	<div id="indexrows">
		<?php
		$i = 0;
		foreach ($items as $faq):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<div id="displaying_<?= $faq['Faq']['displaying_order']; ?>">
			<div id="rowid_<?= $faq['Faq']['id']; ?>" class="row">
				<div class="rowitem" style="width:50%">
					<div class="title">
					<?= $faq['Faq']['question']; ?>
					</div>
					<div style="display:none;" id="menu_label_<?= $faq['Faq']['id']; ?>">
						<!--http://<?=$_SERVER['HTTP_HOST'];?>/Product/<?= $product_item['Product']['id']; ?>-->
					</div>
				</div>
				<div class="rowitem" style="width:15%;padding-left:20px;"><div class="rowcell">
					<?= $faq['FaqSection']['name'] ?>
				</div></div>
				<div class="rowitem" style="width:1%;padding-left:20px;"><div class="rowcell">
				</div></div>
				<div class="rowitem" style="width:1%;padding-left:20px;"><div class="rowcell">
				</div></div>
				<div class="rowitem" style="width:20%;padding-left:20px;"><div class="rowcell">
					<?/*<input type='hidden' name='category_holder_<?= $faq['Faq']['id']; ?>' id='category_holder_<?= $faq['Faq']['id']; ?>' value='<?= $faq['Faq']['category_id'];?>'>*/?>
					<input type='hidden' name='answer_holder_<?= $faq['Faq']['id']; ?>' id='answer_holder_<?= $faq['Faq']['id']; ?>' value='<?= addslashes($faq['Faq']['answer']);?>'>
					<?= (intval($faq['Faq']['published'])==1)?'<div id="pub_'.$faq['Faq']['id'].'" class="published">Published</div>':'<div id="pub_'.$faq['Faq']['id'].'" class="unpublished">Unpublished</div>';
					?>
				</div></div>
			</div>
		</div>	
		<?php endforeach; ?>
	</div>
	
    <?= $this->element('admin/modules/paging') ?>
    <?= $this->element('admin/bottom_button_bar', array('actionButton' => 'Add New FAQ')) ?>
    <?= $this->element('admin/list_actions') ?>

</div>
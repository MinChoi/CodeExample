<?
$this->StyleBox->ConfirmMessageStart('newsmsg', '');
$this->StyleBox->ConfirmMessageEnd("", 'Yes', 'Cancel');
echo $this->element('admin/list_filter_bar');
?>

<?= $this->Session->flash() ?>

<? //----------------- List of News Items ------------------------?>
<div id="index-block" style="clear:both;">
    <div id="indexrows">
        <?
        $i = 0;
        foreach ($items as $news_item):
            // $class = null;
            // if ($i++ % 2 == 0) {
            // $class = ' class="altrow"';
            // }
            ?>
            <div id="rowid_<?= $news_item['News']['id']; ?>" class="row">
                <div class="rowitem" style="width:10%">
                    <div class="title">
                        <?
                        $idate = strtotime($news_item['News']['publish_date']);
                        echo date('d F', $idate);
                        ?><br />
                        <span><?= date('Y', $idate); ?></span>
                    </div>
                </div>
                <div class="rowitem" style="width:35%">
                    <div class="rowcell">
                    	<div id="row_title_<?= $news_item['News']['id']; ?>"><?= $news_item['News']['title']; ?></div>
                        <div style="display:none;" id="menu_label_<?= $news_item['News']['id']; ?>">
                            http://<?= $_SERVER['HTTP_HOST']; ?>/News/<?= urlencode(str_replace(array('&', '/', ' '), array('and', 'or', '-'), $news_item['Category']['name'])); ?>/<?= urlencode(str_replace(array('&', '/', ' '), array('and', 'or', '-'), $news_item['News']['title'])); ?>/<?= $news_item['News']['id']; ?>
                        </div>
                    </div>
                </div>
                <div class="rowitem" style="width:10%;padding-left:20px;">
                    <div class="rowcell">
                        <?= $news_item['NewsCategory']['name']; ?>
                    </div>
                </div>
                <div class="rowitem" style="width:20%;padding-left:20px;">
                    <div class="rowcell">
                        <span><?= date('d/m/Y', strtotime($news_item['News']['modified'])); ?></span><br />
                        <?
                        if (intval($news_item['News']['modified_by']) > 0)
                            echo $news_item['Editor']['username'] . '<br /><span><i>edited this item</i></span>';
                        else
                            echo $news_item['Creator']['username'] . '<br /><span><i>created this item</i></span>';
                        ?>
                    </div>
                </div>

                <div class="rowitem" style="width:15%">
                    <div class="rowcell">
                        <?
                        echo (intval($news_item['News']['published']) == 1) ? '<div id="pub_' . $news_item['News']['id'] . '" class="published">Published</div>' : '<div id="pub_' . $news_item['News']['id'] . '" class="unpublished">Unpublished</div>';
                        echo (intval($news_item['News']['showatmenu']) == 0) ? '<div id="sam_' . $news_item['News']['id'] . '" class="hidden">Hidden</div>' : '<div id="sam_' . $news_item['News']['id'] . '" class=""></div>';
                        ?>
                    </div>
                </div>
            </div>
        <? endforeach ?>
    </div>

    <?= $this->element('admin/modules/paging') ?>
    <?= $this->element('admin/bottom_button_bar', array('actionButton' => 'Add New Article')) ?>
    <?= $this->element('admin/list_actions') ?>

</div>
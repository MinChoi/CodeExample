<?
$this->StyleBox->ConfirmMessageStart('newsmsg','');
$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
?>
<?= $this->CmsForm->create('News', array('id'=>'newsadd', 'class'=>'mainForm white')) ?>
<?= $this->CmsForm->hidden('News.id') ?>
<?= $this->CmsForm->hidden('News.meta_id') ?>

<div class="frm-l">

	<h1>News Item Content</h1>
	
	<?= $this->element('admin/notices') ?>
		
	<?= $this->CmsForm->textbox('Article Headline', 'title') ?>
	<?// Menu label? ?>
	<?= $this->CmsForm->kcFinderImage('Article Image', 'image', null, array(), '/thumb/200x200/fit') ?>
	<?= $this->CmsForm->selectAndManage('Category', 'news_category_id', $news_categories, 'NewsCategory') ?>
		
	<?= $this->CmsForm->date('Article Date', 'publish_date') ?>
	<?= $this->CmsForm->input('short_desc', array('type' => 'textarea', 'label' => 'Short Description')) ?>
	<?//---- Group of radio buttons that show/hide the CmsForm elements underneath ----
	if(empty($this->request->data['News']['content_type'])) $this->request->data['News']['content_type'] = 'content';?>
	<div class="input">
		<label>What type of content does this news item contain?</label>
		<div class="radioGroup">
			<?= $this->CmsForm->radio('content_type', $news_content_types, array(
				'legend' => 0, 
				'onclick' => 'showSection(this)'
			)) ?>
		</div>
		<script type="text/javascript">
			function showSection(radioElement) {
				var fieldName = radioElement.value;
				jQuery('#cmsField_content, #cmsField_file_attach, #cmsField_url').hide(250);	// number indicates animation length
				jQuery('#cmsField_' + fieldName).show(400);
			}
			jQuery(document).ready(function($){
				var selectedRadio = $('.radioGroup :checked');
				if (selectedRadio.length) showSection(selectedRadio[0]);
			});
		</script>		
	</div>
	
	<?= $this->CmsForm->wysiwyg('Article Text', 'content') ?>
	<?= $this->CmsForm->kcFinderFile('Uploaded File', 'file_attach') ?>
	<?= $this->CmsForm->textbox('Link/URL', 'url') ?>
	
	<?//= $this->CmsForm->multiChooser('Practice Areas', $practiceAreas, @$this->request->data['PracticeArea']) ?>

	
	<? /***
	<table>	

		<tr>
			<th width="100px">Article Date :</th>
			<td>
				<div id="news_date_label" style="display:block;>">
					<b class="eventdates"><?=isset($this->request->data['News']['publish_date'])?date('l, jS F, Y',strtotime($this->request->data['News']['publish_date'])):date('l, jS F, Y');?></b>
					<? //echo $this->request->data['News']['publish_date'];?>
					&nbsp;<a class="editlinks" href="#" onclick="newsdate_edit();return false;">Edit</a>
				</div>
				<div id="news_date_input" style="display:none">
					<?=$this->Form->input('News.publish_date',array('type'=>'date','minYear' => 2005
,'maxYear' => date('Y') +10,'dateFormat'=>'DMY','label'=>false,'after'=>'&nbsp;&nbsp;<a class="editlinks" href="#" onclick="newsdate_apply();return false;">Apply</a>&nbsp;|&nbsp;<a class="editlinks" href="#" onclick="newsdate_cancel();return false;">Cancel</a>'));?>
					
				</div>
				<script type="text/javascript">
					var news_date_arr;
					function newsdate_edit(){
						$('news_date_label').hide();$('news_date_input').show();
						news_date_arr = [
									$('NewsPublishDateDay').value,
									$('NewsPublishDateMonth').value,
									$('NewsPublishDateYear').value
								];
					}
					function newsdate_apply(){
						$('news_date_label').show();$('news_date_input').hide();
						getDateFormatted('NewsPublishDateDay','NewsPublishDateMonth','NewsPublishDateYear','news_date_label');
					}
					function newsdate_cancel(){
						$('news_date_label').show();$('news_date_input').hide();
						$('NewsPublishDateDay').value = news_date_arr[0];
						$('NewsPublishDateMonth').value = news_date_arr[1];
						$('NewsPublishDateYear').value = news_date_arr[2];
					}
				</script>
				<?//=$this->Form->input('News.publish_date',array('type'=>'date','id'=>'publish_date','default'=>'0','label'=>false));?>
			</td>
		</tr>
	</table>
	<?=$this->Form->input('News.short_desc',array('id'=>'short_desc','rows'=>'4','class'=>'focus','style'=>'margin-bottom:10px;width:99%;','label'=>false,'focus_txt'=>'Enter your short description or article excerpt to appear in summary view on your website.'));?>
	<?=$this->Form->input('News.content',array('id'=>'newscontent','class'=>'focus','style'=>'height:225px;width:100%;','label'=>false,'focus_txt'=>'Enter your description.'));?>
	<a href="javascript:void(0);" class="fr lgray" onclick ="toggleEditor('newscontent',$(this));">Switch To Html</a>
	*****/ ?>
	
</div>

<div class="frm-r">
	<?= $this->element('/admin/modules/page_visibility', array('open'=>true)) ?>	
	<?//= $this->element('/admin/modules/page_access', array('open'=>true)) ?>	
	<?= $this->element('/admin/modules/tags', array('open'=>false)) ?>	
	<?= $this->element('/admin/modules/seo', array('open'=>false)) ?>	
	<?= $this->element('/admin/modules/widgets', array('open'=>false)) ?>
</div>

<br style="clear:both;" />
	<div id="afm">
		<div id="afm-inner">
			<a href="javascript:void(0);" onclick="$('newsadd').submit();" class="save_btn"></a>
			<?= $this->element('admin/preview_button') ?>
			<ul id="footer-action">
				<!--<li><a class="" onclick="$('newsadd').submit();" title="Edit" >Save</a></li>  -->  
				<li><a class="" href="#" class="" onclick="resetConfirm();return false;"  title="Reset" >Reset</a></li>
				<li class='close'><a class='close' onclick="" href="<?= $this->Html->url(array('action' => 'index')) ?>" title="Close">Close</a></li><!--closeConfirm(this.href);return false;-->
			</ul>
		</div>
	</div>
	
<?= $this->CmsForm->end() ?>


<script type="text/javascript">
<!--
function closeConfirm(href){
	$('newsmsg').down(1).update('Are you sure you want to close without saving?');
	$('newsmsg').down('div.cmsg_content_small').update('You may have unsaved changes.');
	$('newsmsg').down('a.green').writeAttribute('href',href);
	$('newsmsg').down('a.green').writeAttribute('onclick','');
	showStyleBox('newsmsg');
}
function resetConfirm(){
	$('newsmsg').down(1).update('You are about to reset all fields.');
	$('newsmsg').down('div.cmsg_content_small').update('This will undo any changes you have made to this form. Are you sure you want to reset?');
	$('newsmsg').down('a.green').writeAttribute('onclick',"$('newsadd').reset();hideStyleBox('newsmsg');return false;");
	showStyleBox('newsmsg');
}
-->
</script>

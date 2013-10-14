<?= $this->CmsForm->create() ?>
<?= $this->CmsForm->hidden('id') ?>

<div class="frm-l">

	<h2>Edit Package Category</h2>
	
	<?= $this->element('admin/notices') ?>
	
	<?= $this->CmsForm->input('title') ?>
	<?= $this->CmsForm->input('content') ?>
	<?= $this->CmsForm->kcFinderImage('Image', 'file_attach') ?>
</div>

<div class="frm-r">
	<?=$this->element('/admin/modules/page_visibility',array('open'=>true));?>
	<?=$this->element('/admin/modules/seo',array('open'=>false));?>
	<?//=$this->element('/admin/modules/widgets',array('open'=>false));?>
</div>
<br style="clear:both;" />
	<div id="afm">
		<div id="afm-inner">
		<a href="javascript:void(0);" onclick="jQuery('.CmsForm').submit();return false" class="save_btn"></a>
			<?php
			if(!empty($this->data['PackageCategory']['modified']))
				echo 'Last saved at: '.date("j F, Y, g:i a",strtotime($this->data['PackageCategory']['modified']));
			?>
			<ul id="footer-action">
				<!--<li><a class="" onclick="$('packageadd').submit();" title="Edit" >Save</a></li>  -->  
				<!--<li><a class="" href="#" class="" onclick="resetConfirm();return false;"  title="Reset" >Reset</a></li>-->
			<li class='close'><a class='close' onclick="" href="<?= $this->Html->url(array('action' => 'index')) ?>" title="Close" >Close</a></li><!--closeConfirm(this.href);return false;-->
			</ul>
		</div>
	</div>
</form>
<script type="text/javascript">
function closeConfirm(href){
	$('packagemsg').down(1).update('Are you sure you want to close without saving?');
	$('packagemsg').down('div.cmsg_content_small').update('You may have unsaved changes.');
	$('packagemsg').down('a.green').writeAttribute('href',href);
	$('packagemsg').down('a.green').writeAttribute('onclick','');
	showStyleBox('packagemsg');
}
function resetConfirm(){
	$('packagemsg').down(1).update('You are about to reset all fields.');
	$('packagemsg').down('div.cmsg_content_small').update('This will undo any changes you have made to this form. Are you sure you want to reset?');
	$('packagemsg').down('a.green').writeAttribute('onclick',"$('packageadd').reset();hideStyleBox('packagemsg');return false;");
	showStyleBox('packagemsg');
}

</script>

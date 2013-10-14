<?= $this->CmsForm->create() ?>
<?= $this->CmsForm->hidden('id') ?>

<div class="frm-l">

	<h2>Edit FAQ</h2>
	
	<?= $this->element('admin/notices') ?>
	
	<?= $this->CmsForm->selectAndManage('FAQ Section', 'faq_section_id', $sections, 'FaqSection') ?>
	<?= $this->CmsForm->input('question') ?>
	<?= $this->CmsForm->wysiwyg('Answer', 'answer') ?>
	
	<?/*
			<th width="100px">Category :</th>
			<td>
				<?=$this->element('/admin/modules/category',array('category_type_id'=>'1'));?>
			</td>

			<th width="100px">Question :</th>
			<td>
				<?=$this->CmsForm->input('Faq.question',array('id'=>'question','rows'=>'4','class'=>'focus','style'=>'margin-bottom:10px;width:99%;','label'=>false,'focus_txt'=>'Enter question.'));?>
			</td>

			<th width="100px">Answer :</th>
			<td>
				<?=$this->CmsForm->input('Faq.answer',array('id'=>'answer','rows'=>'4','class'=>'focus','style'=>'margin-bottom:10px;width:99%;','label'=>false,'focus_txt'=>'Enter answer.'));?>
				<a href="javascript:void(0);" class="fr lgray" onclick ="toggleEditor('answer',$(this));">Switch To Html</a>
			</td>
	*/ ?>

</div>

<div class="frm-r">
	<?=$this->element('/admin/modules/page_visibility',array('open'=>true));?>
</div>

<br style="clear:both;" />
<div id="afm">
	<div id="afm-inner">
		<a href="javascript:void(0);" onclick="jQuery('.CmsForm').submit();return false" class="save_btn"></a>
		Last saved at: <?= date("j F, Y, g:i a", strtotime($this->data['Faq']['modified'])) ?>
		<script type="text/javascript">
		<!--
		function FaqPreview(ele){
		   var form = $('faqadd'); 
		   ele.down(0).update().insert('Preparing Preview...');
		  try{
			$('faqcontent').value = tinyMCE.get('faqcontent').getContent();
		  }catch(err){
			  $('faqcontent').update(tinyMCE.get('faqcontent').getContent());
/* 				  txt="There was an error on this page.\n\n";
			  txt+="Error description: " + err.description + "\n\n";
			  txt+="Click OK to continue.\n\n";
			  alert(txt);
			  $('faqcontent').update(tinyMCE.get('faqcontent').getContent()); */
		  }
		  
		   var prev_action = $('faqadd').readAttribute('action');
		   //$('faqadd').writeAttribute('action','/admin/faq/preview/1');
		   $('faqadd').action = '/admin/faq/preview/1';
		   form.request({
			   onComplete: function(){ 
				ele.down(0).update().insert('Preview');
				window.open("/admin/faq/preview/0"); 
			   }
		   });
		  // $('faqadd').writeAttribute('action',prev_action);
		   $('faqadd').action = prev_action;
		}
		-->
		</script>
		<ul id="footer-action">
			<!--<li><a class="" onclick="$('faqadd').submit();" title="Edit" >Save</a></li>  -->  
			<li><a class="" href="#" class="" onclick="resetConfirm();return false;"  title="Reset" >Reset</a></li>
			<li class='close'><a class='close' onclick="" href="<?= $this->Html->url(array('action' => 'index')) ?>" title="Close" >Close</a></li><!--closeConfirm(this.href);return false;-->
		</ul>
	</div>
</div>

<?= $this->CmsForm->end() ?>


<script type="text/javascript">
<!--
function closeConfirm(href){
	$('faqmsg').down(1).update('Are you sure you want to close without saving?');
	$('faqmsg').down('div.cmsg_content_small').update('You may have unsaved changes.');
	$('faqmsg').down('a.green').writeAttribute('href',href);
	$('faqmsg').down('a.green').writeAttribute('onclick','');
	showStyleBox('faqmsg');
}
function resetConfirm(){
	$('faqmsg').down(1).update('You are about to reset all fields.');
	$('faqmsg').down('div.cmsg_content_small').update('This will undo any changes you have made to this form. Are you sure you want to reset?');
	$('faqmsg').down('a.green').writeAttribute('onclick',"$('faqadd').reset();hideStyleBox('faqmsg');return false;");
	showStyleBox('faqmsg');
}
-->
</script>
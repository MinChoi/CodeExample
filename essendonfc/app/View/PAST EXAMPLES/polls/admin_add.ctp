<?
	$this->StyleBox->ConfirmMessageStart('pollsmsg','');
	$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
?>
<?= $this->Form->create('Poll',array('id'=>'polladd','ENCTYPE'=>'multipart/form-data'));?>
<?=$this->Form->input('Redirect.redirect',array('type'=>'hidden'));?>
<div class="frm-l">
	<h3><address>New Poll</address></h3><br />
	<ol class="erroruls">
		<? 
		if(isset($errors)){
		foreach($errors as $error){
		?>
			<li><?=$error;?></li>
		<?
		}}
		?>
	</ol>
	<?=$this->Form->input('Poll.name',array('class'=>'focus fullwidth required','type'=>'text','label'=>false,'focus_txt'=>'Enter Question','default'=>'Enter Question'));?>
	<br />
	<?=$this->Form->input('Poll.intro_txt',array('id'=>'intro_txt','class'=>'focus','style'=>'height:100px;width:98%;','label'=>false,'focus_txt'=>'Enter introduction text.'));?>
	<br />
	<div class="form-row">
		<table width="100%">
			<tr>
				<td>
					<label for="close_date_chk">
					<?= $this->Form->input('Poll.close_date_chk',array('value'=>'1','id'=>'close_date_chk','type'=>'checkbox','label'=>false,'div'=>false,'onclick'=>'fclose_date_chk();'));?>&nbsp;
					Close Date:</label>
					<div id="close_date_input" style="display:none;">
						<?=$this->Form->input('Poll.close_date',array('type'=>'date','minYear' => 2005
	,'maxYear' => date('Y') +10,'label'=>false,'after'=>'&nbsp;&nbsp;<a class="editlinks" href="#" onclick="close_date_apply();return false;">Apply</a>&nbsp;|&nbsp;<a class="editlinks" href="#" onclick="close_date_cancel();return false;">Cancel</a>'));?>
					</div>
					<?
						$close_date_label = 'none';
						if(isset($this->request->data['Poll']['close_date_chk']) && $this->request->data['Poll']['close_date_chk']==1){
							$close_date_label = 'block';
						}
					?>
					<div id="close_date_label" style="display:<?=$close_date_label;?>;">
						<b class="eventdates"><?=isset($this->request->data['Poll']['close_date'])?date('l, jS F, Y',strtotime($this->request->data['Poll']['close_date'])):date('l, jS F, Y');?></b>
						&nbsp;&nbsp;<a class="editlinks" href="#" onclick="close_date_edit();return false;">Edit</a>
					</div>
					<script type="text/javascript">
					<!--
						function fclose_date_chk(){
							if($('close_date_chk').checked){
								$('close_date_label').show();
							}else{
								$('close_date_label').hide();
							}
						}
						function close_date_edit(){
							$('close_date_label').hide();
							$('close_date_input').show();
							pubdate = [
										$('PollCloseDateMonth').value,
										$('PollCloseDateDay').value,
										$('PollCloseDateYear').value
									];
						}
						function close_date_apply(){
							$('close_date_label').show();	
							$('close_date_input').hide();
							getDateFormatted('PollCloseDateDay','PollCloseDateMonth','PollCloseDateYear','close_date_label');
						}
						function close_date_cancel(){
							$('PollCloseDateMonth').value = pubdate[0];
							$('PollCloseDateDay').value = pubdate[1];
							$('PollCloseDateYear').value = pubdate[2];
							$('close_date_label').show();	
							$('close_date_input').hide();
						}
					//-->
					</script>
				</td>
			</tr>
		</table>
	</div>
	<!--Answers-->
	<div class="form-row" style="padding:10px 50px 10px 30px;">
		<label style="color:#BC8203;font-size:1.1em;font-weight:bold;">Answers</label>
		<?=$this->Form->input('Poll.answer1',array('style'=>'width:90%','class'=>'focus fullwidth required','label'=>false,'focus_txt'=>'Enter answer #1','default'=>'Enter answer #1','before'=>'<img src="/CORE/admin_theme/css/images/polloption.png" alt="option" style="float:left;margin-right:15px;margin-top:22px;" />'));?>
		<?=$this->Form->input('Poll.answer2',array('style'=>'width:90%','class'=>'focus fullwidth required','label'=>false,'focus_txt'=>'Enter answer #2','default'=>'Enter answer #2','before'=>'<img src="/CORE/admin_theme/css/images/polloption.png" alt="option" style="float:left;margin-right:15px;margin-top:22px;"  />'));?>
		<?=$this->Form->input('Poll.answer3',array('style'=>'width:90%','class'=>'focus fullwidth required','label'=>false,'focus_txt'=>'Enter answer #3','default'=>'Enter answer #3','before'=>'<img src="/CORE/admin_theme/css/images/polloption.png" alt="option" style="float:left;margin-right:15px;margin-top:22px;"  />'));?>
		<?=$this->Form->input('Poll.answer4',array('style'=>'width:90%','class'=>'focus fullwidth required','label'=>false,'focus_txt'=>'Enter answer #4','default'=>'Enter answer #4','before'=>'<img src="/CORE/admin_theme/css/images/polloption.png" alt="option" style="float:left;margin-right:15px;margin-top:22px;"  />'));?>
		<?=$this->Form->input('Poll.answer5',array('style'=>'width:90%','class'=>'focus fullwidth required','label'=>false,'focus_txt'=>'Enter answer #5','default'=>'Enter answer #5','before'=>'<img src="/CORE/admin_theme/css/images/polloption.png" alt="option" style="float:left;margin-right:15px;margin-top:22px;"  />'));?>

		<div class="hint">
			<b>Hint:</b> If you leave an answer field blank. it woun't show up when the poll is published. Once a poll is saved, you can no longer edit it, you'll need to create a new poll.
		</div>
	</div>

</div>
<div class="frm-r">
	<?=$this->element('/admin/modules/page_visibility',array('open'=>true));?>
	<?=$this->element('/admin/modules/page_access',array('open'=>true));?>
	<?=$this->element('/admin/modules/seo',array('open'=>false));?>
	<?=$this->element('/admin/modules/widgets',array('open'=>false));?>
</div>
<br style="clear:both;" />
	<div id="afm">
		<div id="afm-inner">
			<a href="javascript:void(0);" onclick="$('polladd').submit();" class="save_btn"></a>
			<ul id="footer-action">
				<li><a class="" href="#"  onclick="resetConfirm();return false;" title="Reset" >Reset</a></li>
				<li class='close'><a class='close' onclick="" href="/<?=$this->request->data['Redirect']['redirect'];?>" title="Close" >Close</a></li>
			</ul>
		</div>
	</div>
</form>
<script type="text/javascript">
function closeConfirm(href){
	$('pollsmsg').down(1).update('Are you sure you want to close without saving?');
	$('pollsmsg').down('div.cmsg_content_small').update('You may have unsaved changes.');
	$('pollsmsg').down('a.green').writeAttribute('href',href);
	$('pollsmsg').down('a.green').writeAttribute('onclick','');
	showStyleBox('pollsmsg');
}
function resetConfirm(){
	$('pollsmsg').down(1).update('You are about to reset all fields.');
	$('pollsmsg').down('div.cmsg_content_small').update('This will undo any changes you have made to this form. Are you sure you want to reset?');
	$('pollsmsg').down('a.green').writeAttribute('onclick',"$('polladd').reset();hideStyleBox('pollsmsg');return false;");
	showStyleBox('pollsmsg');
}
</script>
<?
// Example from a view calling TinyMceHelper::init().
    echo $tinyMce->init('intro_txt');
?> 
<?
	$this->StyleBox->ConfirmMessageStart('mediamsg','');
	$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
?>
<?= $this->Form->create('Media',array('id'=>'mediaadd','type'=>'file'));?>
<?=$this->Form->input('Redirect.redirect',array('type'=>'hidden'));?>
<div class="frm-l">
	<h3><address>New Media Upload</address></h3>
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
	<?=$this->Form->input('title',array('class'=>'focus fullwidth required','label'=>false,'default'=>'Enter Media Title','focus_txt'=>'Enter Media Title'));?>
	<table>	
		<tr>
			<th>Media Type :</th>
			<td>
				<?=$this->element('/admin/media/type');?>
			</td>
		</tr>
		<tr>
			<th width="100px">Category:</th>
			<td>
				<?=$this->element('/admin/modules/category',array('category_type_id'=>'3'));?>
			</td>
		</tr>
		<tr>
			<th width="100px">Duration:</th>
			<td>
				<?=$this->Form->input('duration',array('label'=>false));?>
			</td>
		</tr>
	</table>
	<?
		/*
	<table width="100%">
		<tr>
			<th>Description :</th>
		</tr>
		 <tr>
			<td>
				<!-- File Upload Script -->
				<div id='mediasd_label' style="display:block;">
					<p>
					<?
					if(isset($this->request->data['Media']['short_desc']) && strlen($this->request->data['Media']['short_desc'])>0){
						echo $this->request->data['Media']['short_desc'];
					}else{
						echo 'Enter ShortDescription';
					}
					?>
					</p>
					<a class="editlinks" href="#" onclick="media_sd_edit();return false;">Edit</a>
				</div>
				<div id="mediasd_input" style="display:none;">
					<?=$this->Form->input('Media.short_desc',array('id'=>'short_desc','rows'=>'4','class'=>'focus','style'=>'margin-bottom:10px;width:99%;','label'=>false,'focus_txt'=>'Enter your short description.','default'=>'Enter your short description.','after'=>'<a class="editlinks" href="#" onclick="media_sd_apply();return false;">Apply</a>&nbsp;|&nbsp;<a class="editlinks" href="#" onclick="media_sd_cancel();return false;">Cancel</a>'));?>
					
				</div>
			</td>
		</tr> 
	</table>
	*/
		?>
	
	<script type="text/javascript">
	<!--
		function media_sd_edit(){
			$('mediasd_label').hide(); $('mediasd_input').show();
			media_sd = $('short_desc').value;
		}
		function media_sd_apply(){
			$('mediasd_label').show();	$('mediasd_input').hide();
			$('mediasd_label').down(0).update($('short_desc').value);
		}
		function media_sd_cancel(){
			$('short_desc').value = media_sd;
			$('mediasd_label').show();	$('mediasd_input').hide();
		}
	-->
	</script>
	
	
	<script type="text/javascript">
	<!--
		function media_img_edit(){
			$('mediaimg').hide(); $('mediaimg_input').show();
			media_img = $('media_preview').value;
		}
		function media_img_apply(){
			$('mediaimg').show();	$('mediaimg_input').hide();
			$('media_preview_file').writeAttribute('src',$('media_preview').value);
			$('media_preview_file').writeAttribute('width','100px');
		}
		function media_img_cancel(){
			$('media_preview').value = media_img;
			$('mediaimg').show();	$('mediaimg_input').hide();
		}
	-->
	</script>

	<?=$this->Form->input('Media.video_file',array('id'=>'uploadedfile','type'=>'hidden'));?>
	<!-- File Upload Script -->
	<div>
		<span id="spanButtonPlaceholder"></span>
	</div>
	<div id="divFileProgressContainer"></div>
	<br />
	
	<table>	
		<tr>
			<th>Current Preview Image:</th>
			<td>
				<!-- File Upload Script -->
				<div id="mediaimg" style="display:block;">
					<? 
						$src = (isset($this->request->data['Media']['preview_file']) && trim($this->request->data['Media']['preview_file'])!='')?'/attachments/photos/small/'.$this->request->data['Media']['preview_file']:'/img/blank.png';
					?>
					<img src="<?=$src;?>" alt="Event Logo" width="<?=($src!='/img/blank.png')?'':'1px'?>" id="media_preview_file" />&nbsp;&nbsp;<a class="editlinks" href="#" onclick="media_img_edit();return false;">Edit</a>
				</div>
				<div id='mediaimg_input' style="display:none;" class="fvalue">
					<?=$this->Form->input('Media.preview_file',array('style'=>'width:250px;cursor:pointer;','default'=>'Click here and select a file double clicking on it','onclick'=>'openKCFinder($(this).id)','readonly'=>'readonly','type'=>'text','id'=>'media_preview','label'=>false,'after'=>'&nbsp;<a class="editlinks" href="#" onclick="media_img_apply();return false;">Apply</a>&nbsp;|&nbsp;<a class="editlinks" href="#" onclick="media_img_cancel();return false;">Cancel</a>'));?>
				</div>
			</td>
		</tr>
	</table>
	<br /><br />
	
</div>
<div class="frm-r">
	<?=$this->element('/admin/media/page_visibility',array('open'=>true));?>	
	<?//=$this->element('/admin/modules/page_access',array('open'=>true));?>
	<?//=$this->element('/admin/modules/tags',array('open'=>false));?>
	<?//=$this->element('/admin/modules/seo',array('open'=>false));?>
	<?//=$this->element('/admin/modules/widgets',array('open'=>false));?>
</div>
<br style="clear:both;" />
	<div id="afm">
		<div id="afm-inner">
			<a href="javascript:void(0);" onclick="$('mediaadd').submit();" class="save_btn"></a>
			<!--<a href="#" onclick="MediaPreview($(this));return false;" class="preview_btn"><div>Preview</div></a>-->
			<script type="text/javascript">
			/*function MediaPreview(ele){
			   var form = $('mediaadd'); 
			   ele.down(0).update('Preparing Preview...');
			   //$('newscontent').update(tinyMCE.get('newscontent').getContent());
			   
			   var prev_action = $('mediaadd').readAttribute('action');
			   $('mediaadd').writeAttribute('action','/admin/media/preview/1');
			   form.request({
				   onComplete: function(){ 
					ele.down(0).update('Preview');
					window.open("/admin/media/preview/0"); 
				   }
			   });
			   $('mediaadd').writeAttribute('action',prev_action);
			}*/
			</script>
			<ul id="footer-action">
				<li><a href="#" class="" onclick="resetConfirm();return false;" title="Reset">Reset</a></li>
				<li class='close'><a class='close' onclick="" href="/<?=$this->request->data['Redirect']['redirect'];?>" title="Close" >Close</a></li><!--closeConfirm(this.href);return false;-->
			</ul>
		</div>
	</div>
</form>
<script type="text/javascript">
<!--
function closeConfirm(href){
	$('mediamsg').down(1).update('Are you sure you want to close without saving?');
	$('mediamsg').down('div.cmsg_content_small').update('You may have unsaved changes.');
	$('mediamsg').down('a.green').writeAttribute('href',href);
	$('mediamsg').down('a.green').writeAttribute('onclick','');
	showStyleBox('mediamsg');
}
function resetConfirm(){
	$('mediamsg').down(1).update('You are about to reset all fields.');
	$('mediamsg').down('div.cmsg_content_small').update('This will undo any changes you have made to this form. Are you sure you want to reset?');
	$('mediamsg').down('a.green').writeAttribute('onclick',"$('mediaadd').reset();hideStyleBox('mediamsg');return false;");
	showStyleBox('mediamsg');
}
-->
</script>
<textarea id="mediatext" style="display:none;"></textarea>
<?
// Example from a view calling TinyMceHelper::init().
    echo $tinyMce->init('mediatext');
?>
<script type="text/javascript">
<!--
function openKCFinder(field) {
	tinyMCE.activeEditor.windowManager.open({
		file: '/CORE/tiny_mce/plugins/kcfinder-2.1/browse.php?opener=tinymce&type=files&dir=files/public',
		title: 'KCFinder',
		width: 700,
		height: 500,
		resizable: "yes",
		inline: true,
		close_previous: "no",
		popup_css: false
	}, {
		window: this.window,
		input: field
	});
}
-->
</script>
<?
$this->StyleBox->ConfirmMessageStart('pagesmsg','');
$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
?>
<?= $this->CmsForm->create('Page',array('id' => 'pageadd', 'class' => 'mainForm white'));?>
<?= $this->CmsForm->input('Page.id');?>
<?= $this->CmsForm->input('Page.meta_id',array('type'=>'hidden'));?>
<?= $this->CmsForm->input('Page.page_id',array('type'=>'hidden'));?>
<?= $this->CmsForm->input('Page.sitemap_id',array('type'=>'hidden'));?>
<?= $this->CmsForm->input('Page.islink',array('type'=>'hidden'));?>
<?= $this->CmsForm->input('Page.link',array('type'=>'hidden'));?>
<?= $this->CmsForm->input('Redirect.redirect',array('type'=>'hidden'));?>

<div class="frm-l">

	<h1>Webpage Content</h1>

	<?= $this->element('admin/notices') ?>

	<?
		if(intval($this->request->data['Page']['islink'])==0) {
			echo $this->CmsForm->textbox('Page Title', 'name');
		} else {
			echo $this->CmsForm->textbox('Link Title', 'name');
			// echo $this->CmsForm->input('name',array('class'=>'focus fullwidth required','label'=>false,'focus_txt'=>'New Link'));
		}
	?>
	
	<?/* if($this->request->data['Page']['islink']) : ?>

		<?= $this->CmsForm

	<table>
	
		<tr>
			<th>Link Type:</th>
			<td>
				<div id="linktype_label" style="display:block">
					<span>
						<?
							if(isset($this->request->data['Page']['linktype'])){
								$linktypes = array('1'=>'External','2'=>'Internal');
								echo $linktypes[$this->request->data['Page']['linktype']];
							}
						?>
					</span>
					&nbsp;&nbsp;<a class="editlinks" href="#" onclick="linktype_edit();return false;">Edit</a>
				</div>
				<div id="linktype_input" style="display:none">
				<?= $this->CmsForm->input('linktype',array('label'=>false,'type'=>'select','options'=>array('1'=>'External','2'=>'Internal'),'after'=>'&nbsp;&nbsp;<a class="editlinks" href="#" onclick="linktype_apply();return false;">Apply</a>&nbsp;|&nbsp;<a class="editlinks" href="#" onclick="linktype_cancel();return false;">Cancel</a>'));?>
				</div>
				<script type="text/javascript">
					var linktype;
					function linktype_edit(){
						$('linktype_label').hide(); $('linktype_input').show();
						linktype = $('PageLinktype').value;
					}
					function linktype_apply(){
						$('linktype_label').show();	$('linktype_input').hide();
						$('linktype_label').down(0).update(getSelectedOptionHTML($('PageLinktype')));
					}
					function linktype_cancel(){
						$('linktype_label').show();	$('linktype_input').hide();
						$('PageLinktype').value = linktype;
					}
				</script>
			</td>
		</tr>
		</table>
		<? endif // item is a "link" rather than a "page"*/ ?>
		
				<?= $this->CmsForm->textbox('Menu Label <span>(leave this blank to use the page title, above)</span>', 'menu_name'); ?>
		
		<?/*<tr>
			<th>Menu Label :</th>
			<td>
				<div id="pmenu">
					<?
						if($this->request->data['Page']['menu_name']=='New Page' || $this->request->data['Page']['menu_name']=='New Link' || $this->request->data['Page']['name']==$this->request->data['Page']['menu_name']){
						?>
							<span class="fvalue" id="pm-label">Same as page title</span>
						<?
							echo $this->CmsForm->input('menu_name',array('type'=>'hidden','id'=>'page-menu','value'=>'Same as page title'));
						}else{
						?>
							<span class="fvalue" id="pm-label"><?=$this->request->data['Page']['menu_name'];?></span>
						<?
							echo $this->CmsForm->input('menu_name',array('type'=>'hidden','id'=>'page-menu'));
						}
					?>	
					<a href="javascript:void(0);" onclick="$('pmenu-alter').show();">Edit</a>
				</div>
				<div id="pmenu-alter" style="display:none;">
					<select name="select-page-name" onchange="if($(this).value==2){$('pm-etxt').show()}else{$('pmenu-alter').hide();$('pm-label').update('Same as page title');$('page-menu').value='Same as page title';}">
						<option value="1">Same as page title</option>
						<option value="2">Different to page title</option>
					</select>
					<div id="pm-etxt"  style="display:none;">
						<input type="text" value="Enter text..." id="pname-txt" /> 
						<a href="javascript:void(0);" onclick="$('pmenu-alter').hide();$('pm-label').update($('pname-txt').value);$('page-menu').value=$('pname-txt').value;">OK</a>
					</div>
				</div>
				
			</td>
		</tr>
		
		
			//if(intval($this->request->data['Page']['islink'])==0){
		
		<!--<tr>
			<th>Page Template :</th>
			<td>
				<span id="seltemplatename" class="fvalue"><?//=($this->request->data['Page']['template_id']==0)?'Section Default':'Template '.$this->request->data['Page']['template_id'];?></span>
				<?//=$this->CmsForm->input('template_id',array('type'=>'hidden','id'=>'template_selected'));?>	
				<a href="javascript:void(0);" onclick="$('template-selector').toggle();if($(this).innerHTML=='Edit'){$(this).update('Close');}else{$(this).update('Edit');}">Edit</a>
			</td>
		</tr>-->
		<?
			//}else{
				echo $this->CmsForm->input('template_id',array('type'=>'hidden','id'=>'template_selected','value'=>0));	
			//}
		
	</table>
	
	<?
		//if(intval($this->request->data['Page']['islink'])==0){
		//	echo $this->element('/admin/modules/template');
		//}
	?>
	*/?>

	<?
		if ($this->request->data['Page']['islink'] == false) {
			echo $this->CmsForm->wysiwyg('Page Content', 'content');
				// . '<a href="javascript:void(0);" class="fr lgray" onclick ="toggleEditor(\'pagecontent\',$(this));">Switch To Html</a>'
				// . $this->CmsForm->hidden('link', array('value' => 'Link'));
		} else {
			// If it's a link...
			// if(strlen(trim($this->request->data['Page']['link']))==0)
				// $this->request->data['Page']['link'] = 'Type Url Here';
			echo $this->CmsForm->hidden('content',array('value'=>'Link'));
			echo $this->CmsForm->textbox('Link URL <span>(links within the site should start with a / slash, links outside should begin with http:// and will open in a new browser tab/window)</span>', 'link');
		}
	?>

</div>

<?// Right sidebar ?>
<div class="frm-r">
	<?
	if($this->request->data['Page']['id']=='1') {
		echo $this->element('/admin/modules/seo',array('open'=>true));
	} else {
		$CMS_MODULES = Configure::read('Core.EnabledAdminWidgets');
		foreach($CMS_MODULES as $file_name=>$arr_setting) {
			// if(intval($this->request->data['Page']['islink'])==0||$arr_setting['available_in_link'])
				echo $this->element($file_name, array('open'=>$arr_setting['default_visibility']));
		}
	}
	
	
	?>
</div>



	<div id="afm">
		<div id="afm-inner">
			<a href="#" onclick="document.forms[0].submit();return false;" class="save_btn"></a>
			
			<? if($this->request->data['Page']['islink'] == false) : ?>
			
				<a href="#" onclick="PagePreview($(this));return false;" class="preview_btn"><div>Preview</div></a>
				Last saved at: <?= date("j F, Y, g:i a",strtotime($this->request->data['Page']['modified']));  ?>
				
				<script type="text/javascript">
					function PagePreview(ele){
						var $ = jQuery;
					   /* var form = $('pageadd'); 
					   ele.down(0).update('Preparing Preview...');
					   $('pagecontent').update(tinyMCE.get('pagecontent').getContent());
					   
					   var prev_action = $('pageadd').readAttribute('action');
					   $('pageadd').writeAttribute('action','/admin/pages/preview/1');
					   form.request({
						   onComplete: function(){ 
							ele.down(0).update('Preview');
							window.open("/admin/pages/preview/0"); 
						   }
					   });
					   $('pageadd').writeAttribute('action',prev_action); */
					   
					   var form = $('#pageadd'),
					       origAction = form[0].action;
					   form[0].action = '/admin/pages/preview/' + <?= $this->request->data['Page']['id'] ?>;
					   form[0].target = '_PreviewWindow';
					   form.submit();
					   form[0].action = origAction;
					   form[0].target = '';
					   
					   
						// ele.down(0).update().insert('Preparing Preview...');
						// try{
							// $('pagecontent').value = tinyMCE.get('pagecontent').getContent();
						// }catch(err){
							// $('pagecontent').update(tinyMCE.get('pagecontent').getContent());
						// }

						// var prev_action = $('pageadd').readAttribute('action');
						// $('pageadd').action = '/admin/pages/preview/1';
						// form.request({
							// onComplete: function(){ 
								// ele.down(0).update().insert('Preview');
								// window.open("/admin/pages/preview/0"); 
							// }
						// });
						// $('pageadd').action = prev_action;
					   
					}
				</script>
			<? endif ?>
			<ul id="footer-action">
				<li><a class="" href="#"  onclick="resetConfirm();return false;" title="Reset" >Reset</a></li>
				
				<? /*if ($this->request->data['Redirect']['redirect'] == 'admin-sitemap') { ?>
					<li class='close'>
						<a class='close' onclick="" href="/<?=$this->request->data['Redirect']['redirect'];?>/<?=$this->request->data['Page']['sitemap_id'];?>/<?=$this->request->data['Page']['id'];?>" title="Close" >Close</a>
					</li>  <!--closeConfirm(this.href);return false;-->
				<? } else {*/ ?>
					<li class='close'>
						<a class='close' onclick="" href="/admin/pages" title="Close" >Close</a>
					</li> <!-- closeConfirm(this.href);return false;-->
				<? //} ?>
			</ul>
		</div>
	</div>
</form>
<script type="text/javascript">
function closeConfirm(href){
	$('pagesmsg').down(1).update('Are you sure you want to close without saving?');
	$('pagesmsg').down('div.cmsg_content_small').update('You may have unsaved changes.');
	$('pagesmsg').down('a.green').writeAttribute('href',href);
	$('pagesmsg').down('a.green').writeAttribute('onclick','');
	showStyleBox('pagesmsg');
}
function resetConfirm(){
	$('pagesmsg').down(1).update('You are about to reset all fields.');
	$('pagesmsg').down('div.cmsg_content_small').update('This will undo any changes you have made to this form. Are you sure you want to reset?');
	$('pagesmsg').down('a.green').writeAttribute('onclick',"$('pageadd').reset();hideStyleBox('pagesmsg');return false;");
	showStyleBox('pagesmsg');
}
</script>
<?
// Example from a view calling TinyMceHelper::init().
  //  echo $this->TinyMce->init(array('mode'=>'textareas'));
?>

<?

//debug($this->TinyMce);
// Example from a view calling TinyMceHelper::init().
	// if(intval($this->request->data['Page']['islink'])==0){
		// echo $this->TinyMce->init('pagecontent');
	// }
?>
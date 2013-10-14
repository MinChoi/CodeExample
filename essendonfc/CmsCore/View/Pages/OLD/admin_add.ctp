<?
	$this->StyleBox->ConfirmMessageStart('pagesmsg','');
	$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
?>
<?= $this->Form->create('Page',array('id'=>'pageadd'));?>
<?=$this->Form->input('Page.page_id',array('type'=>'hidden'));?>
<?=$this->Form->input('Page.sitemap_id',array('type'=>'hidden'));?>
<?=$this->Form->input('Page.islink',array('type'=>'hidden'));?>
<?=$this->Form->input('Page.link',array('type'=>'hidden'));?>
<div class="frm-l">
	<h3><address>New page in <b><?=$parent_name;?></b> section</address></h3>
	<?=$this->Form->input('name',array('class'=>'focus fullwidth required','label'=>false,'value'=>'Page Title','focus_txt'=>'Page Title'));?>
	<table>
		<tr>
			<th>Menu Label:</th>
			<td>
				<div id="pmenu">
					<span id="pm-label"><?=(isset($this->request->data['Page']['menu_name'])?$this->request->data['Page']['menu_name']:'Same as page title');?></span>
					<?=$this->Form->input('Page.menu_name',array('type'=>'hidden','id'=>'page-menu','value'=>'Same as page title'));?>
					<a href="javascript:void(0);" onclick="$('pmenu-alter').show()">Edit</a>
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
		<tr>
			<th>Page Template:</th>
			<td>
				<span id="seltemplatename"><?=(!isset($this->request->data['Page']['template_id']) || $this->request->data['Page']['template_id']==0)?'Section Default':'Template '.$this->request->data['Page']['template_id'];?></span>
				<?=$this->Form->input('Page.template_id',array('type'=>'hidden','id'=>'template_selected','default'=>'0'));?>
				<a href="javascript:void(0);" onclick="$('template-selector').toggle();if($(this).innerHTML=='Edit'){$(this).update('Close');}else{$(this).update('Edit');}">Edit</a>
			</td>
		</tr>
	</table>

	<?=$this->element('/admin/modules/template');?>
	
	<textarea name="data[Page][content]" id="pagecontent" style="height:225px;width:100%;">EEEETesting.....</textarea>
	<a href="javascript:void(0);" class="fr lgray" onclick ="toggleEditor('pagecontent',$(this));">Switch To Html</a>
</div>
<div class="frm-r">

	<?=$this->element('/admin/modules/page_visibility',array('open'=>true));?>
	
	<?=$this->element('/admin/modules/page_access',array('open'=>true));?>
	
	<?=$this->element('/admin/modules/tags',array('open'=>false));?>
	
	<?=$this->element('/admin/modules/seo',array('open'=>false));?>
	
	<?=$this->element('/admin/modules/widgets',array('open'=>false));?>

</div>
<br style="clear:both;" />
	<div id="afm">
		<div id="afm-inner">
			<a href="javascript:void(0);" onclick="$('pageadd').submit();" class="save_btn"></a>
			<a href="javascript:void(0);" onclick="$('pageadd').submit();" class="preview_btn"></a>
			<ul id="footer-action">
				<li><a class="" onclick="$('pageadd').reset();" title="Edit" >Reset</a></li>
				<li class='close'><a class='close' href="/admin/pages" title="Edit" >Close</a></li>  
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
// Example from a view calling TinyMceHelper::init().
    echo $this->TinyMce->init('pagecontent');
?> 
<script type="text/javascript">
function 
</script>
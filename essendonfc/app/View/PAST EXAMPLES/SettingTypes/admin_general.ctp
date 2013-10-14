<?
echo $this->Form->create(null,array('url'=>'/admin-general-settings','id'=>'general_settings'));
?>
<script type="text/javascript">
document.observe("dom:loaded", function(){
	var ndropdowns = $$('a.ndropdown');
	ndropdowns.each(function(e){
		e.observe('click', function(event){
			var a_ele = Event.element(event);
			if($(a_ele.id+'_content').visible()){
				a_ele.removeClassName('dropdown_down');
				a_ele.addClassName('dropdown_up');
			}else{
				a_ele.addClassName('dropdown_down');
				a_ele.removeClassName('dropdown_up');
			}
			Effect.toggle(a_ele.id+'_content','blind', { duration: 0.33});							
		 });
	});
	
	var editlinks = $$('a.iedit');
	editlinks.each(function(e){
		e.observe('click', function(event){
			var dele = Event.element(event).up('div');
			dele.hide();
			if($(dele.id+'_txt').tagName.toLowerCase()=='input')
				$(dele.id+'_txt').value = $(dele.id+'_hidden').value;
			else
				tinyMCE.get(dele.id+'_txt').setContent($(dele.id+'_hidden').value);
			dele.next().show();
		});
	});
	
	var apply_cancels = $$('a.icancel,a.iapply');
	apply_cancels.each(function(e){
		e.observe('click', function(event){
			var link_ele =  Event.element(event);
			var iele 	 =  link_ele.up('div');
			var ele		 =	iele.previous();
			if(link_ele.hasClassName('iapply')){
				if($(ele.id+'_txt').tagName.toLowerCase()=='input' && $(ele.id+'_txt').value.trim().length>0){
					$(ele.id+'_hidden').value = $(ele.id+'_txt').value;
					ele.down(0).update($(ele.id+'_txt').value);
				}
				else if(tinyMCE.get(ele.id+'_txt').getContent().trim().length>0){
					$(ele.id+'_hidden').value = tinyMCE.get(ele.id+'_txt').getContent();
					ele.down(0).update(tinyMCE.get(ele.id+'_txt').getContent());
				}
			}
			iele.hide();
			ele.show();
		});
	});
	
	
});
function showConfirm(){
	showStyleBox('generalcbox');
}
function saveGSet(){
	$('general_settings').submit();
}
</script>

<?
	
	function createNotiBox($name,$dbname,$uniqueid,$form,$form_data){
	
?>
		<div class="rbox">
		<div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<h3>General Setting: <?= $name;?></h3>
			<a href="#" id="<?=$uniqueid;?>" class="ndropdown dropdown_down" onclick="return false;"></a>
			<div id="<?=$uniqueid;?>_content" style="display:block">
				<table class="not_table" width="100%">
					<tr>
						<th width="100px">Site Name:</th>
						<td>
							<div id="<?=$uniqueid;?>_sitename"><span><?=$form_data['sitename'];?></span><a href="#" class="iedit"  onclick="return false;">Edit</a></div>
							<div id="<?=$uniqueid;?>_sub_i" style="display:none;">
								<?=$this->Form->input($dbname.'.sitename',array('type'=>'hidden','id'=>$uniqueid.'_sitename_hidden'));?>
								<input type="text" id="<?=$uniqueid;?>_sitename_txt" class="spinput" />
								<a href="#" class="iapply" onclick="return false;">Apply</a>&nbsp;|&nbsp;<a href="#" class="icancel" onclick="return false;">Cancel</a>
							</div>
						</td>
					</tr>
					<tr>
						<th width="100px">Body:</th>
						<td>
							<div id="<?=$uniqueid;?>_welcometxt" class="body"><span>
							<?=$form_data['welcometxt'];?>
							</span><br /><br /><a class="iedit" href="#" style="margin-left:0px;" onclick="return false;">Edit</a></div>
							<div id="<?=$uniqueid;?>_body_i" style="display:none;">
								<?=$this->Form->input($dbname.'.welcometxt',array('type'=>'hidden','id'=>$uniqueid.'_welcometxt_hidden'));?>
								<textarea type="text" id="<?=$uniqueid;?>_welcometxt_txt"></textarea>
								<a class="iapply" href="#" onclick="return false;">Apply</a>&nbsp;|&nbsp;<a class="icancel" href="#" onclick="return false;">Cancel</a>
							</div>
						</td>
					</tr>
				</table>
			</div>	
		</div>
		<div class="rbox-btm"><div></div></div>
	</div>
	<br />
	<?
	}
?>



<div class="settings_template_frm">
	<h3 class="title">Edit General Settings</h3>
	<?

	$form_data = array(
		'sitename' 	 => isset($this->request->data['GENERAL_SETTINGS']['sitename'])?$this->request->data['GENERAL_SETTINGS']['sitename']:'',
		'welcometxt' => isset($this->request->data['GENERAL_SETTINGS']['welcometxt'])?$this->request->data['GENERAL_SETTINGS']['welcometxt']:''
	);

	createNotiBox('Home Page','GENERAL_SETTINGS','home_setting',$form,$form_data);
	
	?>
</div>
</form>
<div id="afm">
	<div id="afm-inner">
		<a href="#" onclick="showConfirm();return false;" class="save_btn"></a>
	</div>
</div>
<?
	echo $tinyMce->init('home_setting_welcometxt_txt');
?> 

<?
	$this->StyleBox->ConfirmBoxStart('generalcbox','General Settings');
?>
	You are about to change the Global Settings. 
Making changes to the Global Settings may affect the back-end and/or front-end features of your website. 
<?
	$this->StyleBox->ConfirmBoxEnd('saveGSet();');
?>
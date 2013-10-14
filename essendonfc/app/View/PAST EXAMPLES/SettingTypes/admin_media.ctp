<?
echo $this->Form->create(null,array('url'=>'/admin-media-settings','id'=>'media_settings'));
?>
<div class="settings_media_frm">
	<h3 class="title">Edit Media Settings</h3>
	<div class="rbox">
		<div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<h3>Approved File Types</h3>
			<p class="hint"><b>Hint:</b> Check the boxes of file types you wish to upload to your website and allow people to download.</p>
			<table>
				<tr>
					<td>
						<?
							$file_types = array(
												'pdf' =>array('label'=>'PDF(.pdf)'),
												'doc' =>array('label'=>'Word(.doc)'),
												'docx'=>array('label'=>'Word(.docx)'),
												'ppt' =>array('label'=>'Powerpoint(.ppt)'),
												'jpg' =>array('label'=>'Graphics(.jpg)'),
												'gif' =>array('label'=>'Graphics(.gif)'),
												'png' =>array('label'=>'Graphics(.png)'),
												'flv' =>array('label'=>'VIdeo(.flv)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...etc')
											);
							$ftc = 0;
							foreach($file_types as $key=>$file_type){
								$checked = '';
								if(isset($this->request->data['Setting']['Filetype'][$key])){
									$checked = 'checked="checked"';
								}
						?>
								<div class="checkbox">
									<input <?=$checked;?> type="checkbox" name="data[Setting][Filetype][<?=$key;?>]" id="<?=$key;?>" value="<?=$key;?>"/>
									<label for="<?=$key;?>"><?=$file_type['label'];?></label>
								</div>										
						<?
								$ftc++;
								if($ftc==4){
									echo '</td><td>';
								}
							}
						?>
					</td>
				</tr>					
			</table>	
		</div>
		<div class="rbox-btm"><div></div></div>
	</div>
	<br />
	<div class="rbox">
		<div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<h3>Maximum file size</h3>
			<p class="hint"><b>Hint:</b> A Typical YouTube Video is 35Mb, A very large, hi-resolution image is approximately 4Mb.</p>
			<?
				if(isset($this->request->data['Setting']['unlimited_size']) && $this->request->data['Setting']['unlimited_size']==1){
					echo $this->Form->input('Setting.mediafilesize',array('id'=>'mediafilesize','class'=>'focus fsize','label'=>false,'focus_txt'=>'10','disabled'=>'disabled','value'=>'~','after'=>'<h2 class="filesize">Mb</h2>&nbsp;<b class="filesize">(Megabytes)</b>'));
				}else{
					echo $this->Form->input('Setting.mediafilesize',array('id'=>'mediafilesize','class'=>'focus fsize','label'=>false,'focus_txt'=>'10','after'=>'<h2 class="filesize">Mb</h2>&nbsp;<b class="filesize">(Megabytes)</b>'));
				}
				
			?>
			<br />
			<? 
				echo $this->Form->input('Setting.unlimited_size',array('value'=>'1','id'=>'unlimited_size','type'=>'checkbox','label'=>'Disable file size upload limit','onclick'=>'unlimitfilesizechg();'));
			?>
			<script type="text/javascript">
				function unlimitfilesizechg(){
					if($('unlimited_size').checked){
						$('mediafilesize').value = '';
						$('mediafilesize').disable();
					}else{
						$('mediafilesize').value = '';
						$('mediafilesize').enable();
					}
				}
			</script>
		</div>
		<div class="rbox-btm"><div></div></div>
	</div>
</div>
</form>
<div id="afm">
	<div id="afm-inner">
		<a href="#" onclick="showConfirm();return false;" class="save_btn"></a>
	</div>
</div>

<?
	$this->StyleBox->ConfirmBoxStart('mediacbox','Media Settings');
?>
	You are about to change the Global Settings. 
Making changes to the Global Settings may affect the back-end and/or front-end features of your website. 
<?
	$this->StyleBox->ConfirmBoxEnd('saveMSet();');
?>
<script type="text/javascript">
function showConfirm(){
	showStyleBox('mediacbox');
}
function saveMSet(){
	$('media_settings').submit();
}
</script>
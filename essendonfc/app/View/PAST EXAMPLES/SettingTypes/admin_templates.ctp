<?
echo $this->Form->create(null,array('url'=>'/admin-templates-settings','id'=>'template_settings'));
?>
<div class="settings_template_frm">
	<h3 class="title">Edit Template Settings</h3>
	<!--<div class="rbox">
		<div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<h3>Site Templates</h3>
			<p class="hint"><b>Hint:</b> These are the page layouts for your site. You cannot modify these.</p>
			<table border="1">
					<tr>
						<td>
							
						</td>
					</tr>					
			</table>	
		</div>
		<div class="rbox-btm"><div></div></div>
	</div>-->
	<br />
	<div class="rbox">
		<div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<h3>Pagination</h3>
			<p class="hint"><b>Hint:</b> This sets the default number of items that will appear in the lists on your website.</p>
			
			<table class="settings_template">
				<!--<tr>
					<th><div align="right">Artist Listings:</div></th>
					<td>
					<? 
					if(isset($this->request->data['Setting']['disablepaginglimit']) && $this->request->data['Setting']['disablepaginglimit']==1){
					echo $this->Form->input('Setting.templates_artist_listings',array('class'=>'focus fsize','id'=>'templates_artist_listings','label'=>false,'focus_txt'=>'10','value'=>'~','disabled'=>'disabled'));
					}else{
					echo $this->Form->input('Setting.templates_artist_listings',array('class'=>'focus fsize','id'=>'templates_artist_listings','label'=>false,'focus_txt'=>'10'));
					}
					?></td>
					<td><div align="left">per page</div></td>
				</tr>-->
				<tr>
					<th><div align="right">News Items:</div></th><td>
					<?
if(isset($this->request->data['Setting']['disablepaginglimit']) && $this->request->data['Setting']['disablepaginglimit']==1){
					echo $this->Form->input('Setting.templates_news_items',array('class'=>'focus fsize','label'=>false,'focus_txt'=>'10','id'=>'templates_news_items','value'=>'~','disabled'=>'disabled'));
					}else{
					echo $this->Form->input('Setting.templates_news_items',array('class'=>'focus fsize','label'=>false,'focus_txt'=>'10','id'=>'templates_news_items'));
					}
					?>
					
					</td><td><div align="left">per page</div></td>
				</tr>
				<tr>
					<th><div align="right">Events:</div></th><td>
					
					<?
if(isset($this->request->data['Setting']['disablepaginglimit']) && $this->request->data['Setting']['disablepaginglimit']==1){
					echo $this->Form->input('Setting.templates_events',array('class'=>'focus fsize','label'=>false,'focus_txt'=>'10','id'=>'templates_events','value'=>'~','disabled'=>'disabled'));
					}else{
					echo $this->Form->input('Setting.templates_events',array('class'=>'focus fsize','label'=>false,'focus_txt'=>'10','id'=>'templates_events'));
					}
					?></td><td><div align="left">per page</div></td>
				</tr>
			</table>
			
			
			<br />
			<? 
				echo $this->Form->input('Setting.disablepaginglimit',array('value'=>'1','id'=>'disablepaginglimit','type'=>'checkbox','label'=>'Disable pagination on all lists','onclick'=>'disablepagelimit();'));
			?>
			<script type="text/javascript">
				function disablepagelimit(){
					if($('disablepaginglimit').checked){
						$('templates_artist_listings').value = '';
						$('templates_news_items').value = '';
						$('templates_events').value = '';
						$('templates_artist_listings').disable();
						$('templates_news_items').disable();
						$('templates_events').disable();
					}else{
						$('templates_artist_listings').value = '';
						$('templates_news_items').value = '';
						$('templates_events').value = '';
						$('templates_artist_listings').enable();
						$('templates_news_items').enable();
						$('templates_events').enable();
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
	$this->StyleBox->ConfirmBoxStart('tplcbox','Template Settings');
?>
	You are about to change the Global Settings. 
Making changes to the Global Settings may affect the back-end and/or front-end features of your website. 
<?
	$this->StyleBox->ConfirmBoxEnd('saveTSet();');
?>
<script type="text/javascript">
function showConfirm(){
	showStyleBox('tplcbox');
}
function saveTSet(){
	$('template_settings').submit();
}
</script>
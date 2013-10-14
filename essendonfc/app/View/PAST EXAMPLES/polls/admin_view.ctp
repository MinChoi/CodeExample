<?
	$this->StyleBox->ConfirmMessageStart('pollsmsg','');
	$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
?>
<? 
echo $this->Form->create('Poll',array('id'=>'polladd','ENCTYPE'=>'multipart/form-data'));
echo $this->Form->input('id');
?>
<?=$this->Form->input('Redirect.redirect',array('type'=>'hidden'));?>
<div class="frm-l">
	<h3><address>View Poll</address></h3>
	<br />
	<h2 style="margin-bottom:20px;">
	<?=$poll['Poll']['name'];?>
	</h2>
	<p style="margin-bottom:20px;">
	<?=$poll['Poll']['intro_txt'];?>
	</p>
	<!--Answers-->
	<div class="form-row" style="padding:10px 50px 10px 30px;">
		<label style="color:#BC8203;font-size:1.1em;font-weight:bold;">Answers</label>
		
		<?
			$answers = unserialize(base64_decode($poll['Poll']['answers']));
			foreach($answers as $key=>$answer){
				if(strlen(trim($answer))>0){
					$percentage = 0;
					if($poll['Poll']['response_'.$key]>0){
						$percentage = (($poll['Poll']['response_'.$key]/$poll['Poll']['total_responses'])*100);
					}
			?>
				<div class="input text pollanswer">
					<img alt="option" src="/CORE/admin_theme/css/images/polloption.png">
					<span><?=$answer;?></span>
					<div class="poll-count">
						<?=$poll['Poll']['response_'.$key];?> <span>( <?=round($percentage);?>% )</span>
					</div>
				</div>
			<?
				}
			}
			?>
			<div class="input text pollanswer">
				<div class="poll-count">
					<?=$poll['Poll']['total_responses'];?> <span>total responses</span>
				</div>
			</div>
	</div>
</div>
</form>
<br style="clear:both;" />
	<div id="afm">
		<div id="afm-inner">
			<ul id="footer-action">
				<li class='close'><a class='close' onclick="" href="/<?=$this->request->data['Redirect']['redirect'];?>" title="Close" >Close</a></li>
			</ul>
		</div>
	</div>
<script type="text/javascript">
function closeConfirm(href){
	$('pollsmsg').down(1).update('Are you sure you want to close without saving?');
	$('pollsmsg').down('div.cmsg_content_small').update('You may have unsaved changes.');
	$('pollsmsg').down('a.green').writeAttribute('href',href);
	$('pollsmsg').down('a.green').writeAttribute('onclick','');
	showStyleBox('pollsmsg');
}
</script>
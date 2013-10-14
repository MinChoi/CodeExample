<?
echo $this->Form->create(null,array('url'=>'/admin-payments-settings','id'=>'payment_settings'));
?>
<style type="text/css">
input.payment{
	border:1px solid #000000;
	float:left;
	font-family:arial;
	font-size:1.2em;
	font-weight:bold;
	line-height:30px;
	margin-right:5px;
	padding:4px;
	width:200px;
}
select.paymentsel{
	border:1px solid #000000;
	float:left;
	font-family:arial;
	font-size:1.2em;
	font-weight:bold;
	line-height:30px;
	margin-right:5px;
	padding:4px;
	width:210px;
}

</style>
<div class="settings_template_frm">
	<h3 class="title">Edit Payment Settings</h3>
	<br />
	<div class="rbox">
		<div class="rbox-top"><div></div></div>
		<div class="rbox-content">
			<br />
			<h3>SecurePay XML API (AU)</h3>
			<br />
			<p class="hint"><b>Hint:</b> This sets the default payment settings for SecurePay.</p>
			
			<table class="settings_template">
				<tr>
					<th><div align="right"><b style="color:#DD0000">*</b> Merchant ID:</div></th>
					<td>
					<? 
					echo $this->Form->input('Setting.payment_securepay_merchant_id',array('class'=>'payment','id'=>'payment_securepay_merchant_id','label'=>false));
					?></td>
				</tr>
				<tr>
					<th><div align="right"><b style="color:#DD0000">*</b> Password:</div></th>
					<td>
					<?
					echo $this->Form->input('Setting.payment_securepay_password',array('class'=>'payment','label'=>false,'id'=>'payment_securepay_password'));
					?>
					</td>
				</tr>
				<tr>
					<th><div align="right">Mode:</div></th>
					<td>
					<?
					$modes = array();
					$modes['live'] = 'Live';
					$modes['test'] = 'Test';
					echo $this->Form->input('Setting.payment_securepay_mode',array('class'=>'paymentsel','options'=>$modes,'label'=>false,'focus_txt'=>'10','id'=>'payment_securepay_mode'));
					?></td>
				</tr>
				
				<tr>
					<th><div align="right">Transaction Type:</div></th>
					<td>
					<?
					$ttypes = array();
					$ttypes['authorization'] = 'Authorization';
					$ttypes['capture'] = 'Capture';
					echo $this->Form->input('Setting.payment_securepay_ttype',array('class'=>'paymentsel','options'=>$ttypes,'label'=>false,'id'=>'payment_securepay_ttype'));
					?></td>
				</tr>
				
				<!---<tr>
					<th><div align="right">Enable FraudGuard?:</div></th>
					<td>
					<?
					//echo $this->Form->input('Setting.payment_securepay_fraudguard',array('type'=>'checkbox','value'=>'1','label'=>false,'id'=>'payment_securepay_fraudguard'));
					?></td>
				</tr>-->
				
			</table>
			<br /><br />
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
	$this->StyleBox->ConfirmBoxStart('paymentcbox','Payment Settings');
?>
	You are about to change the Global Settings. 
Making changes to the Global Settings may affect the back-end and/or front-end features of your website. 
<?
	$this->StyleBox->ConfirmBoxEnd('saveTSet();');
?>
<script type="text/javascript">
function showConfirm(){
	showStyleBox('paymentcbox');
}
function saveTSet(){
	$('payment_settings').submit();
}
</script>
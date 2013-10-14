<div class="page-title">Registered Events</div>
<br /><br />
<?
foreach ($eventRegistrations as $event)
{
$event['priceList'] = unserialize(base64_decode($event['Event']['pricing']));
?>
<div id="regevent">
	<div class="edate"><?=date('l j F Y',strtotime($event['Event']['start_date']));?>, <?=date('ga',strtotime($event['Event']['start_time']));?> - <?=date('ga',strtotime($event['Event']['end_time']));?></div>
	<div class="etitle"><?=$event['Event']['title'];?></div>
	<div class="eaddr"><?=$event['Event']['location'];?></div>
	
	<?
		$logged_in = false;
		$member_group_id = 2; //Non-Member
		if($this->Session->check('Member.id')){
			$logged_in = true;
			$member_group_id = $this->Session->read('Member.member_group_id');
		}
		$final_prices = array();
		$price_enter = false;
		
		if(isset($event['priceList']['priceList'][0]))
		{
			if((int)$event['priceList']['priceList'][0]>0)
			{
				$final_prices[] = 'AUD '.number_format($event['priceList']['priceList'][0],2).' inc. GST';
				$price_enter = true;
			}
		}
		else
		{		
			foreach($event['priceList'] as $key=>$val){
				$label = explode('___',$key);
				if(intval($label[0])==0){
					if(floatval($val)>0.0 && $event['Event']['pric_chk']==1){
						$final_prices[] = 'AUD '.number_format($val,2).' inc. GST';
						$price_enter = true;
						break;
					}else{
						continue;
					}
				}else{
					if(intval($val)>0){
						$final_prices[] = $label[1].' : $'.number_format($val,2).' inc. GST';
						$price_enter = true;
					}else{
						$final_prices[] = $label[1].' : FREE';
					}
					
				}
			}
		}		
		if($price_enter==false){
			$final_prices[] = 'FREE';
		}
	?>
	
	<div class="eprice">PRICE: 
	<?
		$price_val = true;

		$final_price = 0;
		if(isset($event['priceList']['priceList'][0]))
		{
			$final_price=$final_prices[0];
			echo $final_prices[0];
			if(stristr($final_prices[0],'FREE'))
				$price_val = false;
		}
		else
		{
			$search_ele = 'Members';
			if(intval($member_group_id)==2){
				$search_ele = 'Non-Members';
			}
			foreach($final_prices as $fprice){
				$fval = explode(':',$fprice);
				if(trim($fval[0])==$search_ele){
					$final_price=$fprice;
					echo $fprice;break;
				}
			}
			if(stristr($fprice,'FREE'))
			$price_val = false;
		}
		
 		if($price_val && ($event['EventRegistration']['payment_status_id']!=2))
		{
		?>
			&nbsp;&nbsp;
			<!--<a href="/event_registrations/pay_now_member_event/<?=$event['Event']['id']?>" style="color:green">Not paid</a>-->
			<font color="red">Not Paid</font>
		<?
		}
	?>
	</div>
</div>
<br />
<? 
} 
?>

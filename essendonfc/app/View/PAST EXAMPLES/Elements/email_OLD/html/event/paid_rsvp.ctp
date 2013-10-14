<p>Dear <?=$first_name?>,<br /><br />
Thanks for registering for the for the following DCA event. Your payment has been received. We look forward to seeing you there.<p>
<p><b><?=$event_title;?></b></p>
<? if($hostedby!=''){ ?> <p><b>Hosted by</b> <?=$hostedby;?></p><? } ?>
<b>Date</b><br />
<?=$date;?><br />
<b>Time</b><br />
<?=$event_time;?><br />
<b>Location</b><br />
<?=$location;?><br />
<p>
	<?

		function get_gst($total,$percentage){
			$processed_percentage = (float)$percentage/100;
			$percentage_plus_one = (float)($processed_percentage)+1;

			$real_price =  (float)($total)/(float)($percentage_plus_one);
			$gst = (float)($real_price) * (float)($processed_percentage);
			return  $gst;
		}
		$gst = get_gst($total,10);
	?>
	<b>Subtotal - AU $<?=number_format($total-$gst,2);?><br />
	GST - AU $<?=number_format($gst,2);?><br />
	Total - AU $<?=number_format($total,2);?>	</b>
</p>

<?if($new_reg){	if(empty($payment) || $payment==false ){			$event['priceList'] = unserialize(base64_decode($event['Event']['pricing']));		$estatus = unserialize($event['Event']['check_status']);			$logged_in = false;		$member_group_id = 2; //Non-Member		if($this->Session->check('Member.id')){			$logged_in = true;			$member_group_id = $this->Session->read('Member.member_group_id');		}				$final_prices = array();		$price_enter = false;				if(isset($event['priceList']['priceList'][0]))		{			if((int)$event['priceList']['priceList'][0]>0)			{				$final_prices[] = 'AUD '.number_format($event['priceList']['priceList'][0],2).' inc. GST';				$price_enter = true;			}		}		else		{					foreach($event['priceList'] as $key=>$val){				$label = explode('___',$key);				if(intval($label[0])==0){					if(floatval($val)>0.0 && $event['Event']['pric_chk']==1){						$final_prices[] = 'AUD '.number_format($val,2).' inc. GST';						$price_enter = true;						break;					}else{						continue;					}				}else{					if(intval($val)>0){						$final_prices[] = $label[1].' : $'.number_format($val,2).' inc. GST<br />';						$price_enter = true;					}else{						$final_prices[] = $label[1].' : FREE<br />';					}									}			}		}				if($price_enter==false){			$final_prices[] = 'FREE';		}?>		<div class="page-title">Event Payment</div>	<!--<p><b>You are now a registered non-member.</b> You can now attend future DCA events using the login information we've sent to your elected email address.</p>-->	<p>To confirm your place at the following event select one of the payment options below.</p>	<?	?>	<div id="regevent">		<div class="edate"><?=date('l j F Y',strtotime($event['Event']['start_date']));?>, <?=date('ga',strtotime($event['Event']['start_time']));?> - <?=date('ga',strtotime($event['Event']['end_time']));?></div>		<div class="etitle"><?=$event['Event']['title'];?></div>		<div class="eaddr"><?=$event['Event']['location'];?></div>						<div class="eprice">PRICE: 		<?			$final_price = 0;			if(isset($event['priceList']['priceList'][0]))			{				$final_price=$final_prices[0];				echo $final_prices[0];			}			else			{				if($member_group_id==2){					foreach($final_prices as $fprice){						$fval = explode(':',$fprice);						if(trim($fval[0])=='Non-Members'){							$final_price=$fprice;							echo $fprice;break;						}					}				}else{					foreach($final_prices as $fprice){						$fval = explode(':',$fprice);						if(trim($fval[0])=='Members'){							$final_price=$fprice;							 echo $fprice;break;						}					}				}			}		?>		</div>	</div>	<?  if($price_enter) { ?>	<div class="form-holder">		<form method="post" action="/event_registrations/payment/" name="payment_form" id="payment_form">		<script type="text/javascript">		<!--		function selectPayment(type){			if(type=='cc'){				$('cc_frm').show();				//$('snt-invoice-payment').hide();			}else{				$('cc_frm').hide();				//$('snt-invoice-payment').show();			}		}		-->		</script>				<h2 class="sub_head">How would you like to pay for this event?</h2>		<div class="frow">			<label class="widthfinal"><span>*</span>How would you like to pay?</label>			<div class="option" style="width:310px;">				<input type="radio" name="data[CC][payment_method]" id="pay_inv_1" value="1" checked="checked" onclick="selectPayment('cc');" /><label for="pay_inv_1">Pay with credit card</label> 				<div class="hint">					You will receive a receipt via email once your payment has been processed.				</div>				<input type="radio" name="data[CC][payment_method]" id="pay_inv_2" value="2"  onclick="selectPayment('inv');" /><label for="pay_inv_2">Email me an invoice for payment</label> 				<div class="hint">					You will receive an invoice within a maximum of 3 business days. Upon receiving payment, we will email you a receipt within 3 business days.				</div>			</div>		</div>		<!--<div id="snt-invoice-payment" style="display:none;">			<div class="frow">				<label class="widthfinal"><span>*</span>Send the invoice to the key contact via</label>				<select name="" style="width:160px;">						<option value="email">email</option>					<option value="paddr">postal address</option>					<option value="saddr">street address</option>				</select>			</div>			<div class="frow">				<label class="widthfinal">Special invoice instructions</label>				<textarea name="special_invoice_instruction" class="regtextarea"></textarea>			</div>		</div>-->		<div id="cc_frm">			<h2 class="sub_head">Credit Card details</h2>			<div class="frow">				<label class="widthfinal"><span>*</span>Name on card</label>				<input type="text" name="data[CC][name]" id="cc_name" autocomplete="off" class='validate[onlyNumber]' /> 			</div>			<div class="frow">				<label class="widthfinal"><span>*</span>Card Number</label>				<input type="text" name="data[CC][number]" id="cc_number" autocomplete="off" class='validate[onlyNumber]' /> 			</div>			<div class="frow">				<label class="widthfinal"><span>*</span>Expiry Date</label>				<div id="ccchk">				<select name="data[CC][expire_month]">					<option value="01">January</option>					<option value="02">February</option>					<option value="03">March</option>					<option value="04">April</option>					<option value="05">May</option>					<option value="06">June</option>					<option value="07">July</option>					<option value="08">August</option>					<option value="09">September</option>					<option value="10">October</option>					<option value="11">November</option>					<option value="12">December</option>				</select>				<select name="data[CC][expire_year]">					 <?						$final_year = date('Y')+10;						for($cur_year = date('Y');$cur_year<=$final_year;$cur_year++){							echo '<option value="',$cur_year,'">',$cur_year,'</option>';						}					 ?>				</select>				</div>			</div>			<div class="frow">				<label class="widthfinal"><span>*</span>CVV Number</label>				<div style="float:left:width:71px;">					<input autocomplete="off" name="data[CC][cvv]" type="text" id="ccv" style="width:71px;" maxlength="4"  size="4" class='validate[onlyNumber]' />					<a href="#" class="ccwit">What is this?</a>				</div>			</div>			<div class="frow">				<div class="paymentsumm">					<b>Payment Summary:<span id="mfee_5"><?=$final_price;?></span></b>				</div>			</div>			<div class="frow cchint">				By pressing "Submit", DCA will charge your card in accordance with your order. All information is transferred securely and is subject to the DCA <!--<a href="/terms-of-use-and-privacy-statement.html" title="privacy policy" rel="lightbox">privacy policy</a>--><a href="#" title="privacy policy" onclick="showStyleBox('privacy-overlay');return false;">privacy policy</a>			</div>		</div>					<div class="frow">			<a id="redlink4" href="#" onclick="$('payment_form').submit();return false;" class="reg_nxt_btn">Submit</a>		</div>	</form>	</div>	<div id="email_invoice" style="display:none;"><!--<p>Email invoice</p>--></div>	<script type="text/javascript">	function payment_mode(val)	{		 $('cc_frm').hide();		 $('email_invoice').hide();		switch(val)		{			case '1': $('cc_frm').show();			break;			case '2': $('email_invoice').show();			break;				}	}	</script>	<?		$page_obj = ClassRegistry::init('Page');		$page = $page_obj->read('content',1137);	?>	<div style="display:none;" class="white_content" id="privacy-overlay">		<div class="white_content_inner">			<?=$page['Page']['content'];?>		</div>	</div>	<?		}// Price available checking end	} 		else	{		if($payment_method=='online')		{		?>			<div class="page-title">Payment Confirmation</div>			<p>				<!--Your payment has been processed. A receipt of payment will be emailed to you-->				Your request has been sent to DCA to confirm that you are an employee of a DCA member organisation. Once approved, your event registration will be confirmed and your account login details will be emailed to you.			</p>		<?		}		else		{		?>			<div class="page-title">Confirmation </div>			<p>			<!--An invoice will be sent to your email address.-->			Your request has been sent to DCA to confirm that you are an employee of a DCA member organisation. Once approved, your event registration will be confirmed and your account login details will be emailed to you.			If there is a cost for members to attend this event, you will also receive an invoice for payment.						</p>		<?			}	}}else{ ?>			<div class="page-title">RSVP </div>			<p>You have already RSVPd this event.</p><?}?>
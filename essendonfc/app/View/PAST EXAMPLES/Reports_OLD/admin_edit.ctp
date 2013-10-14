<?
	$this->StyleBox->ConfirmMessageStart('reportmsg','');
	$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
?>
<?= $this->Form->create('Report',array('id'=>'reportadd','ENCTYPE'=>'multipart/form-data'));?>
<?=$this->Form->input('Redirect.redirect',array('type'=>'hidden'));?>
<?=$this->Form->input('Report.id');?>
<?=$this->Form->input('ReportDetail.id');?>
<div class="frm-l">
	<h3><address>Edit Report</address></h3>
	<ol class="erroruls">
		<? 
		if(isset($errors)){
		foreach($errors as $error){
		?>
			<li><?=$error;?></li>
		<?
		}}
		?>
	</ol>
	<?=$this->Form->input('Report.name',array('class'=>'focus fullwidth required','label'=>false,'focus_txt'=>'Enter Report Name','default'=>'Enter Report Name'));?>
	<table>	
		<tr>
			<th width="100px">Report Category:</th>
			<td>
				<?=$this->element('/admin/reports/scategory',array('category_type_id'=>'4'));?>
			</td>
		</tr>
	</table>
	<style type="text/css">
	<!--
		div#filterinput{
			border-right: 1px solid #E7E388;width: 240px;float:left;padding:10px;
		}
		div#filterexpression{
			    border-left: 1px solid #E7E388;float: left;font-family: arial,sans-serif;margin-left: -1px;padding: 10px;width: 55%;
		}
		div#filterinput .title{
		
		}
		div#filterexpression label.title{
			color: #289A06;font-size: 14px;
		}
		
		div#filterinput #ifield, div#filterinput #icond, div#filterinput input.fieldval{
			font-family: arial,sans-serif;font-size: 12px;font-weight: bold;
		}
		div#filterinput #ifield{
		    padding: 4px;width: 175px;
		}
		div#filterinput #icond{
		    padding: 4px;width: 175px;
		}
		div#filterinput input.fieldval, div#filterinput input.fieldval_1, div#filterinput input.fieldval_2{
		    padding: 4px;width: 165px;
		}
		div#filterinput select.fieldval{
		    padding: 4px;width: 175px;
		}
		div.checkbox {
			float: left;margin-right: 10px;width: 180px;
		}
		div#evt_fields, div#org_fields, div#ind_fields{
			width: 32%;float:left;padding: 5px;font-family: arial,sans-serif;
		}
		div#evt_fields b, div#org_fields b, div#ind_fields b{
			margin-top:5px;margin-bottom:5px; display: block;
		}
		div#evt_fields_inner, div#org_fields_inner, div#ind_fields_inner{
			background-color: #FFFFFF;border: 1px solid #BDB9B8;height: 222px;overflow: auto;padding: 5px;
		}
		div#evt_fields label, div#org_fields label, div#ind_fields label{
			color: #787878;font-family: arial,sans-serif;font-size: 11px;font-weight: bold;
		}
		div#fexpr_inner span{
			color:#5c5c5c;
		}
	//-->
	</style>
<SCRIPT type="text/javascript">
<!--
	function isNumberKey(evt){
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57)){
			return false;
		}
		return true;
	}

	function isFloat(evt){
		var element = evt.element();
		var charCode = (evt.which) ? evt.which : event.keyCode;
		if(charCode==46 && element.value.split('.').length==1){
			return true;
		}
		if (charCode > 31 && (charCode < 48 || charCode > 57)){
			return false;
		}
		return true;
	}
	<?
	
	$dayfield = '<select id="fieldval-day"><option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select>';
	
	$monthfield = '<select id="fieldval-month"><option value="01">January</option><option value="02">February</option><option value="03">March</option><option value="04">April</option><option value="05">May</option><option value="06">June</option><option value="07">July</option><option value="08">August</option><option value="09">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select>';
	
	$yearfield = '<select id="fieldval-year">';
 	for($yi=date('Y')+5;$yi>=1991;$yi--){
		$yearfield .= '<option value="'.$yi.'">'.$yi.'</option>';
	}
	$yearfield .= '</select>'; 

	$hourfield ='<select id="fieldval-hour"><option value="0">0</option><option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select>';
	
	$minfield ='<select id="fieldval-min"><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option></select>';
	
	$statefield ='<select id="fieldval" class="fieldval"><option value="0">Australian Capital Territory</option><option value="1">New South Wales</option><option value="2">Northern Territory</option><option value="3">Queensland</option><option value="4">South Australia</option><option value="5">Tasmania</option><option value="6">Victoria</option><option value="7">Western Australia</option></select>';
	
	
	$countryfield ='<select id="fieldval" class="fieldval"><option value="0">Please select</option><option value="1">Afghanistan</option><option value="2">Albania</option><option value="3">Algeria</option><option value="4">American Samoa</option><option value="5">Angola</option><option value="6">Anguilla</option><option value="7">Antartica</option><option value="8">Antigua and Barbuda</option><option value="9">Argentina</option><option value="10">Armenia</option><option value="11">Aruba</option><option value="12">Ashmore and Cartier Island</option><option selected="selected" value="13">Australia</option><option value="14">Austria</option><option value="15">Azerbaijan</option><option value="16">Bahamas</option><option value="17">Bahrain</option><option value="18">Bangladesh</option><option value="19">Barbados</option><option value="20">Belarus</option><option value="21">Belgium</option><option value="22">Belize</option><option value="23">Benin</option><option value="24">Bermuda</option><option value="25">Bhutan</option><option value="26">Bolivia</option><option value="27">Bosnia and Herzegovina</option><option value="28">Botswana</option><option value="29">Brazil</option><option value="30">British Virgin Islands</option><option value="31">Brunei</option><option value="32">Bulgaria</option><option value="33">Burkina Faso</option><option value="34">Burma</option><option value="35">Burundi</option><option value="36">Cambodia</option><option value="37">Cameroon</option><option value="38">Canada</option><option value="39">Cape Verde</option><option value="40">Cayman Islands</option><option value="41">Central African Republic</option><option value="42">Chad</option><option value="43">Chile</option><option value="44">China</option><option value="45">Christmas Island</option><option value="46">Clipperton Island</option><option value="47">Cocos (Keeling) Islands</option><option value="48">Colombia</option><option value="49">Comoros</option><option value="50">Congo, Democratic Republic of the</option><option value="51">Congo, Republic of the</option><option value="52">Cook Islands</option><option value="53">Costa Rica</option><option value="54">Cote d\\\'Ivoire</option><option value="55">Croatia</option><option value="56">Cuba</option><option value="57">Cyprus</option><option value="58">Czeck Republic</option><option value="59">Denmark</option><option value="60">Djibouti</option><option value="61">Dominica</option><option value="62">Dominican Republic</option><option value="63">Ecuador</option><option value="64">Egypt</option><option value="65">El Salvador</option><option value="66">Equatorial Guinea</option><option value="67">Eritrea</option><option value="68">Estonia</option><option value="69">Ethiopia</option><option value="70">Europa Island</option><option value="71">Falkland Islands (Islas Malvinas)</option><option value="72">Faroe Islands</option><option value="73">Fiji</option><option value="74">Finland</option><option value="75">France</option><option value="76">French Guiana</option><option value="77">French Polynesia</option><option value="78">French Southern and Antarctic Lands</option><option value="79">Gabon</option><option value="80">Gambia, The</option><option value="81">Gaza Strip</option><option value="82">Georgia</option><option value="83">Germany</option><option value="84">Ghana</option><option value="85">Gibraltar</option><option value="86">Glorioso Islands</option><option value="87">Greece</option><option value="88">Greenland</option><option value="89">Grenada</option><option value="90">Guadeloupe</option><option value="91">Guam</option><option value="92">Guatemala</option><option value="93">Guernsey</option><option value="94">Guinea</option><option value="95">Guinea-Bissau</option><option value="96">Guyana</option><option value="97">Haiti</option><option value="98">Heard Island and McDonald Islands</option><option value="99">Holy See (Vatican City)</option><option value="100">Honduras</option><option value="101">Hong Kong</option><option value="102">Howland Island</option><option value="103">Hungary</option><option value="104">Iceland</option><option value="105">India</option><option value="106">Indonesia</option><option value="107">Iran</option><option value="108">Iraq</option><option value="109">Ireland</option><option value="110">Ireland, Northern</option><option value="111">Israel</option><option value="112">Italy</option><option value="113">Jamaica</option><option value="114">Jan Mayen</option><option value="115">Japan</option><option value="116">Jarvis Island</option><option value="117">Jersey</option><option value="118">Johnston Atoll</option><option value="119">Jordan</option><option value="120">Juan de Nova Island</option><option value="121">Kazakhstan</option><option value="122">Kenya</option><option value="123">Kiribati</option><option value="124">Korea, North</option><option value="125">Korea, South</option><option value="126">Kuwait</option><option value="127">Kyrgyzstan</option><option value="128">Laos</option><option value="129">Latvia</option><option value="130">Lebanon</option><option value="131">Lesotho</option><option value="132">Liberia</option><option value="133">Libya</option><option value="134">Liechtenstein</option><option value="135">Lithuania</option><option value="136">Luxembourg</option><option value="137">Macau</option><option value="138">Macedonia, Former Yugoslav Republic of</option><option value="139">Madagascar</option><option value="140">Malawi</option><option value="141">Malaysia</option><option value="142">Maldives</option><option value="143">Mali</option><option value="144">Malta</option><option value="145">Man, Isle of</option><option value="146">Marshall Islands</option><option value="147">Martinique</option><option value="148">Mauritania</option><option value="149">Mauritius</option><option value="150">Mayotte</option><option value="151">Mexico</option><option value="152">Micronesia, Federated States of</option><option value="153">Midway Islands</option><option value="154">Moldova</option><option value="155">Monaco</option><option value="156">Mongolia</option><option value="157">Montserrat</option><option value="158">Morocco</option><option value="159">Mozambique</option><option value="160">Namibia</option><option value="161">Nauru</option><option value="162">Nepal</option><option value="163">Netherlands</option><option value="164">Netherlands Antilles</option><option value="165">New Caledonia</option><option value="166">New Zealand</option><option value="167">Nicaragua</option><option value="168">Niger</option><option value="169">Nigeria</option><option value="170">Niue</option><option value="171">Norfolk Island</option><option value="172">Northern Mariana Islands</option><option value="173">Norway</option><option value="174">Oman</option><option value="175">Pakistan</option><option value="176">Palau</option><option value="177">Panama</option><option value="178">Papua New Guinea</option><option value="179">Paraguay</option><option value="180">Peru</option><option value="181">Philippines</option><option value="182">Pitcaim Islands</option><option value="183">Poland</option><option value="184">Portugal</option><option value="185">Puerto Rico</option><option value="186">Qatar</option><option value="187">Reunion</option><option value="188">Romainia</option><option value="189">Russia</option><option value="190">Rwanda</option><option value="191">Saint Helena</option><option value="192">Saint Kitts and Nevis</option><option value="193">Saint Lucia</option><option value="194">Saint Pierre and Miquelon</option><option value="195">Saint Vincent and the Grenadines</option><option value="196">Samoa</option><option value="197">San Marino</option><option value="198">Sao Tome and Principe</option><option value="199">Saudi Arabia</option><option value="200">Scotland</option><option value="201">Senegal</option><option value="202">Seychelles</option><option value="203">Sierra Leone</option><option value="204">Singapore</option><option value="205">Slovakia</option><option value="206">Slovenia</option><option value="207">Solomon Islands</option><option value="208">Somalia</option><option value="209">South Africa</option><option value="210">South Georgia and South Sandwich Islands</option><option value="211">Spain</option><option value="212">Spratly Islands</option><option value="213">Sri Lanka</option><option value="214">Sudan</option><option value="215">Suriname</option><option value="216">Svalbard</option><option value="217">Swaziland</option><option value="218">Sweden</option><option value="219">Switzerland</option><option value="220">Syria</option><option value="221">Taiwan</option><option value="222">Tajikistan</option><option value="223">Tanzania</option><option value="224">Thailand</option><option value="225">Tobago</option><option value="226">Toga</option><option value="227">Tokelau</option><option value="228">Tonga</option><option value="229">Trinidad</option><option value="230">Tunisia</option><option value="231">Turkey</option><option value="232">Turkmenistan</option><option value="233">Tuvalu</option><option value="234">Uganda</option><option value="235">Ukraine</option><option value="236">United Arab Emirates</option><option value="237">United Kingdom</option><option value="238">Uruguay</option><option value="239">USA</option><option value="240">Uzbekistan</option><option value="241">Vanuatu</option><option value="242">Venezuela</option><option value="243">Vietnam</option><option value="244">Virgin Islands</option><option value="245">Wales</option><option value="246">Wallis and Futuna</option><option value="247">West Bank</option><option value="248">Western Sahara</option><option value="249">Yemen</option><option value="250">Yugoslavia</option><option value="251">Zambia</option><option value="252">Zimbabwe</option></select>';
	
	$industrytypefield ='<select id="fieldval" class="fieldval"><option value="8">Accommodation, Cafes and Restaurants</option><option value="1">Agriculture, Forestry and Fishing</option><option value="10">Communication Services</option><option value="5">Construction</option><option value="16">Cultural and Recreational Services</option><option value="14">Education</option><option value="4">Electricity, Gas and Water Supply</option><option value="11">Finance an</option><option value="13">Government Administration and Defence</option><option value="15">Health and Community Services</option><option value="3">Manufacturing</option><option value="2">Mining</option><option value="17">Personal and Other Services</option><option value="12">Property and Business Services</option><option value="7">Retail Trade</option><option value="9">Transport and Storage</option><option value="6">Wholesale Trade</option></select>';
	
	$boolfield ='<select id="fieldval" class="fieldval"><option value="0">False</option><option value="1">True</option></select>';

	$nullfield ='<select id="fieldval" class="fieldval"><option value="NULL">NULL</option><option value="NOT NULL">NOT NULL</option></select>';
	
	$evt_attend_status = '<select id="fieldval" class="fieldval"><option value="1">Attended</option><option value="2">Failed to attend</option><option value="3">Walk-in</option></select>';

	$evt_payment_status = '<select id="fieldval" class="fieldval"><option value="1">Pending</option><option value="2">Paid</option></select>';

	$reasonfield = '<select id="fieldval" class="fieldval"><option value="1">want assistance with my organisation\\\'s diversity and inclusion efforts</option><option value="2">want to be positioned alongside other leading employers</option><option value="3">want to show my organisation\\\'s commitment to diversity and be an employer of choice</option><option value="4">want help managing inappropriate behaviour in the membership was recommended by a trusted source</option><option value="5">Other (please specify)</option><option value="6">don\\\'t know</option></select>';
	
	$intfield = '<input id="fieldval" value="" class="fieldval" onkeypress="return isNumberKey(event)" />';
	$floatfield = '<input id="fieldval" value="" class="fieldval" onkeypress="return isFloat(event)" />';
	$strfield = '<input id="fieldval" value="" class="fieldval" />';
	
	$eventcat ='<select id="fieldval" class="fieldval">';
	foreach($cats as $catk=>$catv){
		$eventcat .='<option value="'.$catk.'">'.str_replace(array("'","\n"),array("\\'",''),$catv).'</option>';
	}
	$eventcat .='</select>';
	
	
	$membgroup ='<select id="fieldval" class="fieldval">';
	foreach($mgrp as $mgk=>$imgrp){
		$membgroup .='<option value="'.$mgk.'">'.str_replace(array("'","\n"),array("\\'",''),$imgrp).'</option>';
	}
	$membgroup .='</select>';
	
	$user_select ='<select id="fieldval" class="fieldval">';
	foreach($users as $ukey=>$fullname){
		$user_select .='<option value="'.$ukey.'">'.str_replace(array("'","\n"),array("\\'",''),$fullname).'</option>';
	}
	$user_select .='</select>';
	
	$org_select ='<select id="fieldval" class="fieldval"><option value="0">None</option>';
	foreach($orgs as $okey=>$oname){
		$org_select .='<option value="'.$okey.'">'.str_replace(array("'","\n"),array("\\'",''),$oname).'</option>';
	}
	$org_select .='</select>';
	
	$mtiers_select ='<select id="fieldval" class="fieldval"><option value="0">None</option>';
	foreach($mtiers as $mtkey=>$mtname){
		$mtiers_select .='<option value="'.$mtkey.'">'.str_replace(array("'","\n"),array("\\'",''),$mtname).'</option>';
	}
	$mtiers_select .='</select>';
	
	

	?>
	function getInputField($type,fieldname){
		var day ='<?=$dayfield?>';
		var month ='<?=$monthfield?>';
		var year ='<?=$yearfield?>';
		var hour ='<?=$hourfield?>';
		var min ='<?=$minfield?>';
		var floatfield ='<?=$floatfield?>';
		var intfield ='<?=$intfield?>';
		var membergrp ='<?=$membgroup;?>';
		var strfield ='<?=$strfield;?>';
		var statefield='<?=$statefield;?>';
		var eventcat='<?=$eventcat;?>';
		var boolfield ='<?=$boolfield;?>';
		var nullfield ='<?=$nullfield;?>';
		var countryfield ='<?=$countryfield;?>';
		var industrytypefield ='<?=$industrytypefield;?>';
		var reasonfield = '<?=$reasonfield;?>';
		var evt_attend_status = '<?=$evt_attend_status;?>';
		var evt_payment_status = '<?=$evt_payment_status;?>';
		var user_select = '<?=$user_select;?>';
		var org_select = '<?=$org_select;?>';
		var mtiers_select = '<?=$mtiers_select;?>';
		
		switch($type){
			case 'date':
				return day.gsub('fieldval',fieldname) +month.gsub('fieldval',fieldname) +year.gsub('fieldval',fieldname); break;
			case 'datetime':
				return day.gsub('fieldval',fieldname) +month.gsub('fieldval',fieldname) +year.gsub('fieldval',fieldname) +hour.gsub('fieldval',fieldname) +min.gsub('fieldval',fieldname); break;
			case 'time':
				return hour.gsub('fieldval',fieldname) +min.gsub('fieldval',fieldname); break;
			case 'int':
				return intfield.gsub('fieldval',fieldname); break;
			case 'float':
				return floatfield.gsub('fieldval',fieldname); break;
			case 'member_group_id':
				return membergrp.gsub('fieldval',fieldname); break;
			case 'country_id':
				return countryfield.gsub('fieldval',fieldname); break;
			case 'state_id':
				return statefield.gsub('fieldval',fieldname); break;
			case 'event_category':
				return eventcat.gsub('fieldval',fieldname); break;
			case 'bool':
				return boolfield.gsub('fieldval',fieldname); break;
			case 'null':
				return nullfield.gsub('fieldval',fieldname); break;
			case 'industry_type_id':
				return industrytypefield.gsub('fieldval',fieldname); break;
			case 'reason_id':
				return reasonfield.gsub('fieldval',fieldname); break;
			case 'event_attendee_status_id':
				return evt_attend_status.gsub('fieldval',fieldname); break;
			case 'payment_status_id':
				return evt_payment_status.gsub('fieldval',fieldname); break;
			case 'user_id':
				return user_select.gsub('fieldval',fieldname); break;
			case 'organisation_id':
				return org_select.gsub('fieldval',fieldname); break;
			case 'member_tier_id':
				return mtiers_select.gsub('fieldval',fieldname); break;
			default:
				return strfield.gsub('fieldval',fieldname); break;
		}
	}
	
	function populateCond($type){
		var str = '<option value="e">equals</option><option value="ne">does not equal</option><option value="is">is</option>';
		if($type=='string'){
			str +='<option value="like">like</option><option value="s%">start with</option><option value="%e">end with</option><option value="%%">contains</option>';
		}

		if($type=='date' || $type=='datetime' || $type=='time' || $type=='int' || $type=='float'){
			str +='<option value="gt">is greater than</option><option value="lt">is less than</option><option value="gte">is greater than or equals to</option><option value="lte">is less than or equals to</option><option value="bw">between</option>';
		}
		$('icond').update(str);
	}
	
	function updateField(value){
		var fieldname = value.split('#');
		var vtype = fieldname[1];
		populateCond(vtype);
		val = $('icond').value;
		switch(val){
			case 'bw':
				$('ivalue').update(getInputField(vtype,'fieldval_1')+'<br /><center><b>AND</b></center>'+getInputField(vtype,'fieldval_2'));
				break;
			case 'is':
				$('ivalue').update(getInputField('null','fieldval'));
				break;
			default:
				$('ivalue').update(getInputField(vtype,'fieldval'));
				break;
		}
	}
	
//-->
</SCRIPT>
	<!-- Filter For This Report -->
	<div class="form-row" style="padding:0px;">
		<div id="filterinput">
			<label class="title">Filter For This Report</label>
			
			<table width="100%">
				<tr>
					<th width="50%">Field</th>
					<td width="50%">
						<select id="ifield" onchange="updateField(this.value)">
							<option value="Member.gname#string">Member First Name</option>
							<option value="Member.lname#string">Member Last Name</option>
							<option value="Member.email#string">Member Email</option>
							<option value="Member.position#string">Member Position</option>
							<option value="Member.organisation_id#organisation_id">Member Organisation</option>
							<option value="Member.keycontact#bool">Member Key Contact</option>
							<option value="Member.active#bool">Member Active</option>
							<option value="Member.verified#bool">Member Verified</option>
							<option value="Member.verified_by#user_id">Member Verified By</option>
							<option value="Member.verified_date#date">Member Verified Date</option>
							<option value="Member.targeted#bool">Non Member Targeted</option>
							<option value="Member.voting_rights#bool">Member Voting Rights</option>
							<option value="Member.renewal_date#date">Member Renewal Date</option>
							<option value="Member.last_login#date">Member Last Login</option>
							<option value="Member.created#date">Member Created Date</option>
							<option value="Member.modified#date">Member Modified Date</option>
							<option value="Member.modified_by#user_id">Member Modified By</option>
							<option value="Member.created_by#user_id">Member Created By</option>
							<option value="Member.member_group_id#member_group_id">Member Group</option>
							<option value="Member.organisation_name#string">Non-Member Organisation Name</option>
							<option value="Member.grace_period#bool">Member Grace Period</option>
							<option value="Organisation.name#string">Organisation Name</option>
							<option value="Organisation.street_address_1#string">Organisation Street Address</option>
							<option value="Organisation.street_country_id#country_id">Organisation Street Country</option>
							<option value="Organisation.street_postcode#int">Organisation Street Postal Code</option>
							<option value="Organisation.street_state_id#state_id">Organisation Street State</option>
							<option value="Organisation.street_suburb#string">Organisation Street Suburb</option>
							<option value="Organisation.postal_country_id#country_id">Organisation Postal Country</option>
							<option value="Organisation.postal_address_1#string">Organisation Postal Address</option>
							<option value="Organisation.postal_postcode#int">Organisation Postal Postcode</option>
							<option value="Organisation.postal_state_id#state_id">Organisation Postal State</option>
							<option value="Organisation.postal_suburb#string">Organisation Postal Suburb</option>
							<option value="Organisation.phonenumber#string">Organisation Phone Number</option>
							<option value="Organisation.website#string">Organisation Website Address</option>
							<option value="Organisation.parent_company#string">Organisation Parent Company</option>
							
							<option value="Organisation.industry_type_id#industry_type_id">Organisation Industry Type</option>
							<option value="Organisation.member_tier_id#member_tier_id">Organisation No of Employees</option>
							
							<option value="Organisation.reason_id#reason_id">Organisation Reason</option>
							
							<option value="Organisation.ceo_gname#string">Organisation CEO FIrst Name</option>
							<option value="Organisation.ceo_lname#string">Organisation CEO Last Name</option>
							<option value="Organisation.ceo_address_1#string">Organisation CEO Address</option>
							<option value="Organisation.ceo_suburb#string">Organisation CEO Suburb</option>
							<option value="Organisation.ceo_state_id#int">Organisation CEO State</option>
							<option value="Organisation.ceo_country_id#country_id">Organisation CEO Country</option>	
							<option value="Organisation.ceo_postcode#string">Organisation CEO Postcode</option>
							
							<option value="Organisation.hr_gname#string">Organisation HR First Name</option>
							<option value="Organisation.hr_email#string">Organisation HR Email</option>
							
							<option value="Organisation.hod_gname#string">Organisation HOD First Name</option>
							<option value="Organisation.hod_lname#string">Organisation HOD Last Name</option>
							<option value="Organisation.hod_email#string">Organisation HOD Email</option>
							
							<option value="Organisation.kc_gname#string">Organisation Key Contact First Name</option>
							<option value="Organisation.kc_lname#string">Organisation Key Contact Last Name</option>
							<option value="Organisation.kc_email#string">Organisation Key Contact Email</option>
							
							<option value="Organisation.kc_position#string">Organisation Key Contact Position</option>
							<option value="Organisation.kc_phone#string">Organisation Key Contact Phone Number</option>
							<option value="Organisation.kc_address_1#string">Organisation Key Contact Address</option>
							<option value="Organisation.kc_suburb#int">Organisation Key Contact Suburb</option>
							<option value="Organisation.kc_state_id#state_id">Organisation Key Contact State</option>
							<option value="Organisation.kc_country_id#country_id">Organisation Key Contact Country</option>
							<option value="Organisation.kc_postcode#int">Organisation Key Contact Post Code</option>
							
							<option value="Organisation.membership_renewal_date#date">Organisation Renewal Date</option>
							<option value="Organisation.membership_start_date#date">Organisation Membership Start Date</option>
							
							<option value="Organisation.active#bool">Organisation Active</option>
							<option value="Organisation.grace_period#bool">Organisation Grace Period</option>
							<option value="Organisation.voting_rights#bool">Organisation Voting Rights</option>
							
							<option value="Organisation.created_by#user_id">Organisation Created By</option>
							<option value="Organisation.modified_by#user_id">Organisation Modified By</option>
							
							
							<option value="Event.title#string">Events Name</option>
							<option value="Event.location#string">Event Location</option>
							<option value="Event.category_id#event_category">Event Category</option>
							
							<option value="Event.start_date#date">Event Start Date</option>
							<option value="Event.end_date#date">Event End Date</option>
							
							<option value="Event.start_time#time">Event Start Time</option>
							<option value="Event.end_time#time">Event End Time</option>
							
							<option value="Event.rsvp_date#date">Event RSVP Date</option>
							
							<option value="Event.available#int">Event Places Available</option>
							<option value="Event.filled#int">Event Places Filled</option>
							<option value="Event.unlimited#bool">Event Unlimited Places</option>
							
							<option value="Event.reminder#bool">Event Reminder</option>
							<option value="Event.reminder_date#date">Event Reminder Date</option>

							<option value="Event.published#bool">Event Published</option>
							<option value="Event.publish_date#date">Event Published Date</option>
							
							<option value="Event.created#date">Event Created Date</option>
							<option value="Event.modified#date">Event Modified Date</option>
							
							<option value="Event.created_by#user_id">Event Created By</option>
							<option value="Event.modified_by#user_id">Event Modified By</option>
							
							<option value="Event.hosted_by#string">Event Hosted By</option>
							
							<option value="EventRegistration.event_attendee_status_id#event_attendee_status_id">Event Attendee Status</option>
							<option value="EventRegistration.payment_status_id#payment_status_id">Event Payment Status</option>
							
							<option value="AdministratorNode.description#string">Member Administrator Note</option>
							<option value="AdministratorOnode.description#string">Organisation Administrator Note</option>
						</select>
					</td>
				</tr>
				<tr>
					<th width="50%">Condition</th>
					<td width="50%">
						<select id="icond" onchange="on_change_icond(this.value);">
							<option value="e">equals</option>
							<option value="ne">does not equal</option>
							<option value="is">is</option>
							<option value="like">like</option>
							<option value="s%">start with</option>
							<option value="%e">end with</option>
							<option value="%%">contains</option>
						</select>
						<script type="text/javascript">
						<!--
							function on_change_icond(val){
								var fieldname = $('ifield').value.split('#');
								var vtype = fieldname[1];
								switch(val){
									case 'bw':
										$('ivalue').update(getInputField(vtype,'fieldval_1')+'<br /><center><b>AND</b></center>'+getInputField(vtype,'fieldval_2'));
										break;
									case 'is':
										$('ivalue').update(getInputField('null','fieldval'));
										break;
									default:
										$('ivalue').update(getInputField(vtype,'fieldval'));
										break;
								}
							}
						//-->
						</script>
					</td>
				</tr>
				<tr>
					<th width="50%">Value</th>
					<td width="50%">
						<div id="ivalue">
							<input id="fieldval" value="" class="fieldval" />
						</div>
					</td>
				</tr>
				<tr>
					<th width="50%">&nbsp;</th>
					<td width="50%">
						<div align="right" id="applythis">
							<a href="#" onclick="addthiscond(); return false;" class="editlink">+ Apply this</a>
						</div>
					</td>
				</tr>
			</table>
			
		</div>
		<div id="filterexpression">
			<label class="title">Current Filters Applied</label>
	<?
			/*		
			
			<?=$this->Form->input('ReportDetail.sql_query',array('type'=>'textarea','cols'=>'100','rows'=>'10','id'=>'rcondition'));?>
			<?=$this->Form->input('ReportDetail.fields',array('type'=>'textarea','cols'=>'100','rows'=>'3','id'=>'listfields'));?>
			<?=$this->Form->input('ReportDetail.fieldids',array('type'=>'textarea','cols'=>'100','rows'=>'3','id'=>'listfieldids'));?>
			<?=$this->Form->input('ReportDetail.jsarray',array('type'=>'hidden','id'=>'rcondition_js_array'));?>
	*/
			?>
			<?=$this->Form->input('ReportDetail.fields',array('type'=>'hidden','id'=>'listfields'));?>
			<?=$this->Form->input('ReportDetail.fieldids',array('type'=>'hidden','id'=>'listfieldids'));?>
			<?=$this->Form->input('ReportDetail.sql_query',array('type'=>'hidden','id'=>'rcondition'));?>
			<?=$this->Form->input('ReportDetail.jsarray',array('type'=>'hidden','id'=>'rcondition_js_array'));?>
		
			<div id="fexpr_inner">
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
	<!--
		function autoPopulate(){
			if(typeof(autoDraw)=='undefined'){
				if($('listfieldids').value.trim()!=''){
					var selected_field_ids = $('listfieldids').value.split(',');
					if(selected_field_ids.length>0){
						selected_field_ids.each(function(e){
							$(e).checked = true;
						});
					}
				}
				if(typeof(gcond)=='undefined'){
					<? if(isset($this->request->data['ReportDetail']) && trim($this->request->data['ReportDetail']['jsarray'])!=''){ ?>
							$('rcondition_js_array').value = base64_decode($('rcondition_js_array').value);
							gcond = unserialize($('rcondition_js_array').value);
					<? }else{ ?>
							gcond = new Array();
					<? } ?>
				}
				//resetCondition();
				drawfilter();
				autoDraw = true;
			}
		}
	
		function removefilter(count){
			var curlen = gcond.length;
			var j=0;
			var temp_arr =  new Array();
			for(var i=0;i<curlen;i++){
				if(count!=i){
					
					temp_arr[j] =  new Array();
					temp_arr[j]['field'] =   gcond[i]['field'];
					temp_arr[j]['fieldname'] =  gcond[i]['fieldname'];
					temp_arr[j]['cond']  =  gcond[i]['cond'];	
					if((count==0 && i==1 ) || (curlen==2 && i==1)){
						gcond[i]['connector']=-1;
					}else{
						if(gcond[i]['connector']){
							temp_arr[j]['connector'] = gcond[i]['connector'];
						}
					}
					temp_arr[j]['value'] =  new Array();
					temp_arr[j]['valuename'] =  new Array();
					if(gcond[i]['value'][1]){
						temp_arr[j]['value'][0] =  gcond[i]['value'][0];	
						temp_arr[j]['valuename'][0] =  gcond[i]['valuename'][0];
						temp_arr[j]['value'][1] =  gcond[i]['value'][1];	
						temp_arr[j]['valuename'][1] =  gcond[i]['valuename'][1];						
					}else{
						temp_arr[j]['value'][0] =  gcond[i]['value'][0];
						temp_arr[j]['valuename'][0] =  gcond[i]['valuename'][0];							
					}
					temp_arr[j++]['condname']  =  gcond[i]['condname'];	
				}
			}
			gcond = new Array();
			gcond = temp_arr.clone();
			drawfilter();
		}
	
		function cancelFilter(){
			resetCondition();
		}
		
		function resetCondition(){
			$('applythis').update('<a href="#" onclick="addthiscond(); return false;" class="editlink">+ Apply this</a>');
			updateField($('ifield').value);
		}
	
		function getValueOfField(count,iindex,fvalname){
			var fieldname = gcond[count]['field'].split('#');
			var vtype = fieldname[1];

			switch(vtype){
				case 'date':
					gcond[count]['value'][iindex] =  $(fvalname+'-year').value +'-'+ $(fvalname+'-month').value +'-'+ $(fvalname+'-day').value;	
					gcond[count]['valuename'][iindex] = $(fvalname+'-day').value +' '+ getSelectedOptionHTML($(fvalname+'-month')) +' '+ $(fvalname+'-year').value;
					break;
				case 'datetime':
					gcond[count]['value'][iindex] =  $(fvalname+'-year').value +'-'+ $(fvalname+'-month').value +'-'+ $(fvalname+'-day').value+' '+ $(fvalname+'-hour').value+':'+ $(fvalname+'-min').value+':00';	
					gcond[count]['valuename'][iindex] = $(fvalname+'-day').value +' '+ getSelectedOptionHTML($(fvalname+'-month')) +' '+ $(fvalname+'-year').value+' '+ $(fvalname+'-hour').value+':'+ $(fvalname+'-min').value+':00';
					break;
				case 'time':
					gcond[count]['value'][iindex] = $(fvalname+'-hour').value+':'+ $(fvalname+'-min').value+':00';	
					gcond[count]['valuename'][iindex] = $(fvalname+'-hour').value+':'+ $(fvalname+'-min').value+':00';
					break;
				case 'int':
					gcond[count]['value'][iindex] = $(fvalname).value;	
					gcond[count]['valuename'][iindex] = $(fvalname).value;
					break;
				case 'float':
					gcond[count]['value'][iindex] = $(fvalname).value;	
					gcond[count]['valuename'][iindex] = $(fvalname).value;
					break;
				case 'member_group_id':
					gcond[count]['value'][iindex] = $(fvalname).value;	
					gcond[count]['valuename'][iindex] = getSelectedOptionHTML($(fvalname));
					break;
				case 'state_id':
					gcond[count]['value'][iindex] = $(fvalname).value;	
					gcond[count]['valuename'][iindex] = getSelectedOptionHTML($(fvalname));
					break;
				case 'country_id':
					gcond[count]['value'][iindex] = $(fvalname).value;	
					gcond[count]['valuename'][iindex] = getSelectedOptionHTML($(fvalname));
					break;
				case 'industry_type_id':
					gcond[count]['value'][iindex] = $(fvalname).value;	
					gcond[count]['valuename'][iindex] = getSelectedOptionHTML($(fvalname));
					break;
				case 'reason_id':
					gcond[count]['value'][iindex] = $(fvalname).value;	
					gcond[count]['valuename'][iindex] = getSelectedOptionHTML($(fvalname));
					break;
				case 'event_attendee_status_id':
					gcond[count]['value'][iindex] = $(fvalname).value;	
					gcond[count]['valuename'][iindex] = getSelectedOptionHTML($(fvalname));
					break;
				case 'payment_status_id':
					gcond[count]['value'][iindex] = $(fvalname).value;	
					gcond[count]['valuename'][iindex] = getSelectedOptionHTML($(fvalname));
					break;
				case 'event_category':
					gcond[count]['value'][iindex] = $(fvalname).value;	
					gcond[count]['valuename'][iindex] = getSelectedOptionHTML($(fvalname));
					break;
				case 'user_id':
					gcond[count]['value'][iindex] = $(fvalname).value;	
					gcond[count]['valuename'][iindex] = getSelectedOptionHTML($(fvalname));
					break;
				case 'organisation_id':
					gcond[count]['value'][iindex] = $(fvalname).value;	
					gcond[count]['valuename'][iindex] = getSelectedOptionHTML($(fvalname));
					break;
				case 'member_tier_id':
					gcond[count]['value'][iindex] = $(fvalname).value;	
					gcond[count]['valuename'][iindex] = getSelectedOptionHTML($(fvalname));
					break;
				case 'bool':
					gcond[count]['value'][iindex] = $(fvalname).value;	
					gcond[count]['valuename'][iindex] = getSelectedOptionHTML($(fvalname));
					break;
				default:
					gcond[count]['value'][iindex] = $(fvalname).value;	
					gcond[count]['valuename'][iindex] = $(fvalname).value;
					break;
			}
		}
	
		function processFieldValue(count){
			switch(gcond[count]['cond']){
				case 'bw':
					getValueOfField(count, 0, 'fieldval_1');
					getValueOfField(count, 1, 'fieldval_2');
					break;
				default:
					getValueOfField(count, 0, 'fieldval');
					break;
			}
		}
	
	    function applyChanges(count){
			gcond[count] =  new Array();
			gcond[count]['field'] =  $('ifield').value;
			gcond[count]['fieldname'] =  getSelectedOptionHTML($('ifield'));
			gcond[count]['cond']  =  $('icond').value;	
			gcond[count]['condname']  =  getSelectedOptionHTML($('icond'));	
			gcond[count]['value'] =  new Array();
			gcond[count]['valuename'] =  new Array();
			processFieldValue(count);
			resetCondition();
			drawfilter();
		}
		
		function setValueOfField(count,iindex,fvalname){
			var fieldname = gcond[count]['field'].split('#');
			var vtype = fieldname[1];

			switch(vtype){
				case 'date':
						var $date = gcond[count]['value'][iindex].split('-');
						$(fvalname+'-year').value  = $date[0];
					    $(fvalname+'-month').value = $date[1];
						$(fvalname+'-day').value   = $date[2]	;
					break;
				case 'datetime':
						var $date_time = gcond[count]['value'][iindex].split(' ');
						var $date = $date_time[0].split('-');
						var $time = $date_time[1].split(':');
						$(fvalname+'-year').value  = $date[0];
					    $(fvalname+'-month').value = $date[1];
						$(fvalname+'-day').value   = $date[2];		
						$(fvalname+'-hour').value  = $time[0];
						$(fvalname+'-min').value   = $time[1];
					break;
				case 'time':
						var $time = gcond[count]['value'][iindex].split(':');
						$(fvalname+'-hour').value  = $time[0];
						$(fvalname+'-min').value   = $time[1];
					break;
				case 'int':
						$(fvalname).value = gcond[count]['value'][iindex];	
					break;
				case 'float':
						$(fvalname).value = gcond[count]['value'][iindex];	
					break;
				case 'member_group_id':
						$(fvalname).value = gcond[count]['value'][iindex];	
					break;
				case 'state_id':
						$(fvalname).value = gcond[count]['value'][iindex];	
					break;
				case 'country_id':
						$(fvalname).value = gcond[count]['value'][iindex];	
					break;
				case 'industry_type_id':
						$(fvalname).value = gcond[count]['value'][iindex];	
					break;
				case 'reason_id':
						$(fvalname).value = gcond[count]['value'][iindex];	
					break;
				case 'event_attendee_status_id':
						$(fvalname).value = gcond[count]['value'][iindex];	
					break;
				case 'payment_status_id':
						$(fvalname).value = gcond[count]['value'][iindex];	
					break;
				case 'event_category':
						$(fvalname).value = gcond[count]['value'][iindex];	
					break;
				case 'user_id':
						$(fvalname).value = gcond[count]['value'][iindex];	
					break;
				case 'organisation_id':
						$(fvalname).value = gcond[count]['value'][iindex];	
					break;
				case 'member_tier_id':
						$(fvalname).value = gcond[count]['value'][iindex];	
					break;
				case 'bool':
						$(fvalname).value = gcond[count]['value'][iindex];	
					break;
				default:
						$(fvalname).value = gcond[count]['value'][iindex];	
					break;
			}
		}

		function editCondition(count){
			$('ifield').value = gcond[count]['field'];
			updateField($('ifield').value)
			$('icond').value  = gcond[count]['cond'];
			on_change_icond($('icond').value);
			
			
			setValueOfField
			
			switch(gcond[count]['cond']){
				case 'bw': 
					setValueOfField(count,0,'fieldval_1');
					setValueOfField(count,1,'fieldval_2');
					break;
				default:
					setValueOfField(count,0,'fieldval');
					break;
			}
			$('applythis').update('<a href="#" onclick="applyChanges('+count+'); return false;" class="editlink">Apply</a>&nbsp;|&nbsp;<a href="#" onclick="cancelFilter(); return false;" class="editlink">Cancel</a>');
		}
		
		function getCurrentFieldType(){
			var field = $('ifield').value.split('#');
			return field[1];
		}
		
		function addthiscond(){
			if(typeof(gcond)=='undefined'){
				<? if(isset($this->request->data['ReportDetail']) && trim($this->request->data['ReportDetail']['jsarray'])!=''){ ?>
						gcond = unserialize(base64_decode($('rcondition_js_array').value));
				<? }else{ ?>
						gcond = new Array();
				<? } ?>
			}
			var curlen = gcond.length;
			gcond[curlen] =  new Array();
			gcond[curlen]['field'] =  $('ifield').value;
			gcond[curlen]['fieldname'] =  getSelectedOptionHTML($('ifield'));
			gcond[curlen]['cond']  =  $('icond').value;	
			gcond[curlen]['condname']  =  getSelectedOptionHTML($('icond'));	
			gcond[curlen]['value'] =  new Array();
			gcond[curlen]['valuename'] =  new Array();
			processFieldValue(curlen);
			drawfilter();
			
		}

		function drawfilter(){
			rcond = '';
			$('fexpr_inner').update('');
			if(typeof(gcond)!='undefined'){
				var cond_arr_len = gcond.length;
				for(var i=0;i<cond_arr_len;i++){
					drawCondition(i);
				}
				if(gcond[0]){
					prepareSQL();
				}else{
					$('rcondition').value = '';
				}	
				/* Update Form Fields */
				updateInputFormField();
			}
			
		}
		
		function updateInputFormField(){
			var serialize_out = serialize(gcond);
			$('rcondition_js_array').value = base64_encode(serialize_out);
			var field_list = $('rcondition').value.split('FROM')
			$('listfields').value = field_list[0].gsub('SELECT','');
			saveSelectedFieldIds();
		}
		
		function saveSelectedFieldIds(){
			selectListFieldIds = new Array();
			
			var member_fields = $$('div#ind_fields_inner input');
			if(member_fields.length>0){
				member_fields.each(function(ele){
					if(ele.checked){
						selectListFieldIds[selectListFieldIds.length] = ele.id;
					}
				});
			}
			
			var event_fields = $$('div#org_fields_inner input');
			if(event_fields.length>0){
				event_fields.each(function(ele){
					if(ele.checked){
						selectListFieldIds[selectListFieldIds.length] = ele.id;
					}
				});
			}

			var event_fields = $$('div#evt_fields_inner input');
			if(event_fields.length>0){
				event_fields.each(function(ele){
					if(ele.checked){
						selectListFieldIds[selectListFieldIds.length] = ele.id;
					}
				});
			}
			
			$('listfieldids').value = selectListFieldIds.join(',');
		}

		function prepareSQL(){
			var $table = gcond[0]['field'].split('.'); 
			$('rcondition').value = getSelectedFieldsAndTables($table[0]) +' WHERE '+ rcond;
		}
		
		function clearFieldName(fieldval){
			return fieldval.gsub('#string', '')
						   .gsub('#int', '')
						   .gsub('#float', '')
						   .gsub('#date', '')
						   .gsub('#datetime', '')
						   .gsub('#time', '')
						   .gsub('#member_group_id', '')
						   .gsub('#state_id', '')
						   .gsub('#country_id', '')
						   .gsub('#industry_type_id', '')
						   .gsub('#reason_id', '')
						   .gsub('#event_attendee_status_id', '')
						   .gsub('#payment_status_id', '')
						   .gsub('#event_category', '')
						   .gsub('#organisation_id', '')
						   .gsub('#user_id', '')
						   .gsub('#member_tier_id', '')
						   .gsub('#bool', '');
		}
		
		function getSelectedFieldsAndTables(main_table){

			sql_arr = new Array();
			
			chk_member = false;
			var member_fields = $$('div#ind_fields_inner input');
			if(member_fields.length>0){
				member_fields.each(function(ele){
					if(ele.checked && ele.id!='mem_all'){
						chk_member = true;
						sql_arr[sql_arr.length] = ele.value;
					}
				});
			}
			
			chk_organisation = false;
			var org_fields = $$('div#org_fields_inner input');
			if(org_fields.length>0){
				org_fields.each(function(ele){
					if(ele.checked && ele.id!='org_all'){
						chk_organisation = true;
						sql_arr[sql_arr.length] = ele.value;
					}
				});
			}
			
			chk_event = false;
			var event_fields = $$('div#evt_fields_inner input');
			if(event_fields.length>0){
				event_fields.each(function(ele){
					if(ele.checked && ele.id!='evt_all'){
						chk_event = true;
						sql_arr[sql_arr.length] = ele.value;
					}
				});
			}
			//alert(sql_arr.toJSON());
			
			/* Inner Tables Processor */
			var kcstates = false; var ceostates = false; var postalstates = false; var streetstates = false;
			var kccountry = false; var ceocountry = false; var postalcountry = false; var streetcountry = false;
			var reasonid = false;
			var indtype = false;
			var membertier = false;
			var membergroup = false;
			var event_category = false;
			var memberacctype = false;
			var memverifyby = false;
			var memorgid = false;
			var event_created_user = false;
			var event_modified_user = false;
			
			var madmin_note = false;
			var oadmin_note = false;
			
			var sql_fields_str = 'SELECT ' + implode(', ', sql_arr);
			
			/* Organisation Fields */
			
			var before_str = sql_fields_str;
			sql_fields_str = sql_fields_str.gsub('Organisation.industry_type_id','IndustryType.name');
			if(before_str!=sql_fields_str){
				indtype = true;
			}
	
			before_str = sql_fields_str;
			sql_fields_str = sql_fields_str.gsub('Organisation.reason_id','Reason.name');
			if(before_str!=sql_fields_str){
				reasonid = true;
			}
			
			before_str = sql_fields_str;
			sql_fields_str = sql_fields_str.gsub('Organisation.member_tier_id','MemberTier.name');
			if(before_str!=sql_fields_str){
				membertier = true;
			}

			before_str = sql_fields_str;
			sql_fields_str = sql_fields_str.gsub('Organisation.kc_state_id','KcState.name');
			if(before_str!=sql_fields_str){
				kcstates = true;
			}
			before_str = sql_fields_str;
			sql_fields_str = sql_fields_str.gsub('Organisation.ceo_state_id','CeoState.name');
			if(before_str!=sql_fields_str){
				ceostates = true;
			}
			before_str = sql_fields_str;
			sql_fields_str = sql_fields_str.gsub('Organisation.postal_state_id','PostalState.name');
			if(before_str!=sql_fields_str){
				postalstates = true;
			}
			before_str = sql_fields_str;
			sql_fields_str = sql_fields_str.gsub('Organisation.street_state_id','StreetState.name');
			if(before_str!=sql_fields_str){
				streetstates = true;
			}

			before_str = sql_fields_str;
			sql_fields_str = sql_fields_str.gsub('Organisation.kc_country_id','KcCountry.name');
			if(before_str!=sql_fields_str){
				kccountry = true;
			}
			before_str = sql_fields_str;
			sql_fields_str = sql_fields_str.gsub('Organisation.ceo_country_id','CeoCountry.name');
			if(before_str!=sql_fields_str){
				ceocountry = true;
			}
			before_str = sql_fields_str;
			sql_fields_str = sql_fields_str.gsub('Organisation.postal_country_id','PostalCountry.name');
			if(before_str!=sql_fields_str){
				postalcountry = true;
			}
			before_str = sql_fields_str;
			sql_fields_str = sql_fields_str.gsub('Organisation.street_country_id','StreetCountry.name');
			if(before_str!=sql_fields_str){
				streetcountry = true;
			}
			
			/* Organisation Fields */
			
			/* Event Fields */
			
			before_str = sql_fields_str;
			sql_fields_str = sql_fields_str.gsub('Event.category_id','Category.name');
			if(before_str!=sql_fields_str){
				event_category = true;
			}
			
			before_str = sql_fields_str;
			sql_fields_str = sql_fields_str.gsub('Event.created_by','ECUser.fullname');
			if(before_str!=sql_fields_str){
				event_created_user = true;
			}
			
			before_str = sql_fields_str;
			sql_fields_str = sql_fields_str.gsub('Event.modified_by','EMUser.fullname');
			if(before_str!=sql_fields_str){
				event_modified_user = true;
			}
			
			/* Event Fields */
			
			/* Member Fields */
			before_str = sql_fields_str;
			sql_fields_str = sql_fields_str.gsub('Member.verified_by','MVUser.fullname');
			if(before_str!=sql_fields_str){
				memverifyby = true;
			}
			before_str = sql_fields_str;
			sql_fields_str = sql_fields_str.gsub('Member.organisation_id','MOrganisation.name');
			if(before_str!=sql_fields_str){
				memorgid = true;
			}
			
			before_str = sql_fields_str;
			sql_fields_str = sql_fields_str.gsub('Member.member_account_type_id','MemberAccountType.name');
			if(before_str!=sql_fields_str){
				memberacctype = true;
			}
			before_str = sql_fields_str;
			sql_fields_str = sql_fields_str.gsub('Member.member_group_id','MemberGroup.name');
			if(before_str!=sql_fields_str){
				membergroup = true;
			}
			
			/* Member Fields */
			/* Inner Tables Processor */

			var sql_from_str = '';
			switch(main_table){
				case 'AdministratorNode':
				case 'Member':
					sql_from_str = ' FROM members as Member ';
					var dummy_rcond = rcond;
					var dummy_rcond_len = dummy_rcond.length;
					if(dummy_rcond.gsub('Organisation','').length != dummy_rcond_len){
						chk_organisation = true;
					}
					if(chk_organisation){
						sql_from_str += ' LEFT JOIN organisations as Organisation ON(Organisation.id = Member.organisation_id) ';	
						/* Administrator Nodes */
						if(dummy_rcond.gsub('AdministratorOnode','').length != dummy_rcond_len){
							oadmin_note = true;
						}
						
						if(oadmin_note){
							sql_from_str += ' RIGHT JOIN administrator_onodes as AdministratorOnode ON(AdministratorOnode.organisation_id = Organisation.id) ';	
						}
						/* Administrator Nodes */
					}else{
						if(memorgid){
							sql_from_str += ' LEFT JOIN organisations as MOrganisation ON(MOrganisation.id = Member.organisation_id) ';	
							
							/* Administrator Nodes */
							if(dummy_rcond.gsub('AdministratorOnode','').length != dummy_rcond_len){
								oadmin_note = true;
							}
							
							if(oadmin_note){
								sql_from_str += ' RIGHT JOIN administrator_onodes as AdministratorOnode ON(AdministratorOnode.organisation_id = MOrganisation.id) ';	
							}
							/* Administrator Nodes */
						}
					}
					
					/* Administrator Nodes */
					if(dummy_rcond.gsub('AdministratorNode','').length != dummy_rcond_len){
						madmin_note = true;
					}
					
					if(madmin_note){
						sql_from_str += ' RIGHT JOIN administrator_nodes as AdministratorNode ON(AdministratorNode.member_id = Member.id) ';	
					}
					/* Administrator Nodes */
					
					
					if(dummy_rcond.gsub('Event','').length != dummy_rcond_len){
						chk_event = true;
					}
					if(chk_event){
						sql_from_str += ' RIGHT JOIN event_registrations as EventRegistration ON(EventRegistration.member_id = Member.id) ';	
						sql_from_str += ' LEFT JOIN events as Event ON(Event.id = EventRegistration.event_id) ';	
					}
					if(membergroup){
						sql_from_str += ' LEFT JOIN member_groups as MemberGroup ON(MemberGroup.id = Member.member_group_id) ';	
					}
					if(memberacctype){
						sql_from_str += ' LEFT JOIN member_account_types as MemberAccountType ON(MemberAccountType.id = Member.member_account_type_id) ';	
					}
					
					if(memverifyby){
						sql_from_str += ' LEFT JOIN users as MVUser ON(MVUser.id = Member.verified_by) ';	
					}
					break;
				case 'AdministratorOnode':
				case 'Organisation':
					sql_from_str = ' FROM organisations as Organisation ';
					var dummy_rcond = rcond;
					var dummy_rcond_len = dummy_rcond.length;
					if(dummy_rcond.gsub('Member','').length != dummy_rcond_len){
						chk_member = true;
					}
					
					/* Administrator Nodes */
					if(dummy_rcond.gsub('AdministratorNode','').length != dummy_rcond_len){
						madmin_note = true;
					}
					/* Administrator Nodes */
					
					if(chk_member){
						sql_from_str += ' RIGHT JOIN members as Member ON(Member.organisation_id = Organisation.id) ';
	
						
						
						if(madmin_note){
							sql_from_str += ' RIGHT JOIN administrator_nodes as AdministratorNode ON(AdministratorNode.member_id = Member.id) ';	
						}
						/* Administrator Nodes */
	
	
						if(dummy_rcond.gsub('Event','').length != dummy_rcond_len){
							chk_event = true;
						}
						if(chk_event){
							sql_from_str += ' RIGHT JOIN event_registrations as EventRegistration ON(EventRegistration.member_id = Member.id) ';	
							sql_from_str += ' LEFT JOIN events as Event ON(Event.id = EventRegistration.event_id) ';	
						}
						if(membergroup){
							sql_from_str += ' LEFT JOIN member_groups as MemberGroup ON(MemberGroup.id = Member.member_group_id) ';	
						}
						if(memberacctype){
							sql_from_str += ' LEFT JOIN member_account_types as MemberAccountType ON(MemberAccountType.id = Member.member_account_type_id) ';	
						}
						
						if(memverifyby){
							sql_from_str += ' LEFT JOIN users as MVUser ON(MVUser.id = Member.verified_by) ';	
						}
						
						if(memorgid){
							sql_from_str += ' LEFT JOIN organisations as MOrganisation ON(MOrganisation.id = Member.organisation_id) ';	
						}
					}else if(madmin_note){
						sql_from_str += ' RIGHT JOIN members as Member ON(Member.organisation_id = Organisation.id) ';
						/* Administrator Nodes */
						sql_from_str += ' RIGHT JOIN administrator_nodes as AdministratorNode ON(AdministratorNode.member_id = Member.id) ';	
						/* Administrator Nodes */
					}

					/* Administrator Nodes */
					
					if(dummy_rcond.gsub('AdministratorOnode','').length != dummy_rcond_len){
						oadmin_note = true;
					}
					
					if(oadmin_note){
						sql_from_str += ' RIGHT JOIN administrator_onodes as AdministratorOnode ON(AdministratorOnode.organisation_id = Organisation.id) ';	
					}
					
					/* Administrator Nodes */
					
					if(membertier){
						sql_from_str += ' LEFT JOIN member_tiers as MemberTier ON(MemberTier.id = Organisation.member_tier_id) ';	
					}
					if(indtype){
						sql_from_str += ' LEFT JOIN industry_types as IndustryType ON(IndustryType.id = Organisation.industry_type_id) ';	
					}
					if(reasonid){
						sql_from_str += ' LEFT JOIN reasons as Reason ON(Reason.id = Organisation.reason_id) ';	
					}
					
					if(kcstates){
						sql_from_str += ' LEFT JOIN states as KcState ON(KcState.id = Organisation.kc_state_id) ';	
					}
					if(ceostates){
						sql_from_str += ' LEFT JOIN states as CeoState ON(CeoState.id = Organisation.ceo_state_id) ';	
					}
					if(postalstates){
						sql_from_str += ' LEFT JOIN states as PostalState ON(PostalState.id = Organisation.postal_state_id) ';	
					}
					if(streetstates){
						sql_from_str += ' LEFT JOIN states as StreetState ON(StreetState.id = Organisation.street_state_id) ';	
					}
					
					if(kccountry){
						sql_from_str += ' LEFT JOIN countries as KcCountry ON(KcCountry.id = Organisation.kc_country_id) ';	
					}
					if(ceocountry){
						sql_from_str += ' LEFT JOIN countries as CeoCountry ON(CeoCountry.id = Organisation.ceo_country_id) ';	
					}
					if(postalcountry){
						sql_from_str += ' LEFT JOIN countries as PostalCountry ON(PostalCountry.id = Organisation.postal_country_id) ';	
					}
					if(streetcountry){
						sql_from_str += ' LEFT JOIN countries as StreetCountry ON(StreetCountry.id = Organisation.street_country_id) ';	
					}

					break;
				case 'EventRegistration':
				case 'Event':
					sql_from_str = ' FROM events as Event RIGHT JOIN event_registrations as EventRegistration ON(EventRegistration.event_id = Event.id) ';
					var dummy_rcond = rcond;
					var dummy_rcond_len = dummy_rcond.length;
					if(dummy_rcond.gsub('Member','').length != dummy_rcond_len){
						chk_member = true;
					}
					if(dummy_rcond.gsub('EventRegistration','').length != dummy_rcond_len){
						chk_member = true;
					}
					
					/* Administrator Nodes */
					if(dummy_rcond.gsub('AdministratorNode','').length != dummy_rcond_len){
						madmin_note = true;
					}
					/* Administrator Nodes */
					
					if(chk_member){
						sql_from_str += ' LEFT JOIN members as Member ON(Member.id = EventRegistration.member_id) ';

						/* Administrator Nodes */
						if(madmin_note){
							sql_from_str += ' RIGHT JOIN administrator_nodes as AdministratorNode ON(AdministratorNode.member_id = Member.id) ';	
						}
						/* Administrator Nodes */
						
						if(membergroup){
							sql_from_str += ' LEFT JOIN member_groups as MemberGroup ON(MemberGroup.id = Member.member_group_id) ';	
						}
						if(memberacctype){
							sql_from_str += ' LEFT JOIN member_account_types as MemberAccountType ON(MemberAccountType.id = Member.member_account_type_id) ';	
						}
						
						if(memverifyby){
							sql_from_str += ' LEFT JOIN users as MVUser ON(MVUser.id = Member.verified_by) ';	
						}	
						if(dummy_rcond.gsub('Organisation','').length != dummy_rcond_len){
							chk_organisation = true;
						}
						
						if(chk_organisation){
							sql_from_str += ' LEFT JOIN organisations as Organisation ON(Organisation.id = Member.organisation_id) ';	
							
							/* Administrator Nodes */
							if(dummy_rcond.gsub('AdministratorOnode','').length != dummy_rcond_len){
								oadmin_note = true;
							}
							
							if(oadmin_note){
								sql_from_str += ' RIGHT JOIN administrator_onodes as AdministratorOnode ON(AdministratorOnode.organisation_id = Organisation.id) ';	
							}
							/* Administrator Nodes */
						}			
						
						if(memorgid){
							sql_from_str += ' LEFT JOIN organisations as MOrganisation ON(MOrganisation.id = Member.organisation_id) ';	
							
							/* Administrator Nodes */
							if(dummy_rcond.gsub('AdministratorOnode','').length != dummy_rcond_len){
								oadmin_note = true;
							}
							
							if(oadmin_note){
								sql_from_str += ' RIGHT JOIN administrator_onodes as AdministratorOnode ON(AdministratorOnode.organisation_id = MOrganisation.id) ';	
							}
							/* Administrator Nodes */
						}
						
					}else if(madmin_note){
					
						sql_from_str += ' LEFT JOIN members as Member ON(Member.id = EventRegistration.member_id) ';

						/* Administrator Nodes */
						sql_from_str += ' RIGHT JOIN administrator_nodes as AdministratorNode ON(AdministratorNode.member_id = Member.id) ';	
						/* Administrator Nodes */
						
						/* Administrator Nodes */
						if(dummy_rcond.gsub('AdministratorOnode','').length != dummy_rcond_len){
							oadmin_note = true;
						}
						
						if(oadmin_note){
							sql_from_str += ' LEFT JOIN organisations as Organisation ON(Organisation.id = Member.organisation_id) ';	
							
							sql_from_str += ' RIGHT JOIN administrator_onodes as AdministratorOnode ON(AdministratorOnode.organisation_id = Organisation.id) ';	
						}
						/* Administrator Nodes */
					}
					
					if(event_category){
						sql_from_str += ' LEFT JOIN categories as Category ON(Category.id = Event.category_id) ';	
					}
					if(event_created_user){
						sql_from_str += ' LEFT JOIN users as ECUser ON(ECUser.id = Event.created_by) ';	
					}
					if(event_modified_user){
						sql_from_str += ' LEFT JOIN users as EMUser ON(EMUser.id = Event.modified_by) ';	
					}
					break;
			}
			
			return sql_fields_str +' '+ sql_from_str; 
		}
		
		function implode (glue, pieces) {
			var i = '', retVal='', tGlue='';
			if (arguments.length === 1) {
				pieces = glue;
				glue = '';
			}
			if (typeof(pieces) === 'object') {
				if (pieces instanceof Array) {
					return pieces.join(glue);
				}
				else {
					for (i in pieces) {
						retVal += tGlue + pieces[i];
						tGlue = glue;
					}
					return retVal;
				}
			}
			else {
				return pieces;
			}
		}
		
		function drawCondition(count){
			var cnd = '';
			if(typeof(gcond[count])!='undefined' && gcond[count]['cond']!='bw'){
				rcond += ' ('+ clearFieldName(gcond[count]['field']) + conditionFormator(count) + ') ';
				cnd += '<div><b> '+gcond[count]['fieldname']+' </b> <span> '+gcond[count]['condname']+' </span> <b> '+gcond[count]['valuename'][0]+' </b><a style="margin-left:10px;" href="#" onclick="editCondition('+count+');return false;" class="editlink">edit</a><a style="margin-left:5px;" href="#" onclick="removefilter('+count+'); return false;" class="editlink">remove</a></div>';
			}else{
				rcond += ' ('+ clearFieldName(gcond[count]['field']) + conditionFormator(count) + ') ';
				cnd += '<div><b> '+gcond[count]['fieldname']+' </b> <span> '+gcond[count]['condname']+' </span> <b> '+gcond[count]['valuename'][0]+' </b><span> and </span><b> '+gcond[count]['valuename'][1]+' </b> <a style="margin-left:10px;"  href="#" onclick="editCondition('+count+');return false;" class="editlink">edit</a><a style="margin-left:5px;" href="#" onclick="removefilter('+count+'); return false;" class="editlink">remove</a></div>';
			}
			$('fexpr_inner').insert(cnd);
			
			if(gcond[count+1]){
				drawConnector(count+1);
			}
		}
		
		function conditionFormator(count){
			switch(gcond[count]['cond']){
				case 'e': //Equal
					return " = '"+gcond[count]['value'][0]+"'";
					break;
				case 'ne': //Not Equal To
					return " <> '"+gcond[count]['value'][0]+"'";
					break;
				case 'is': //Is
					return " IS "+gcond[count]['value'][0];
					break;
				case 'like': //Like
					return " LIKE '"+gcond[count]['value'][0]+"'";
					break;
				case 's%': //Start With
					return " LIKE '"+gcond[count]['value'][0]+"%'";
					break;
				case '%e': //End With
					return " LIKE '%"+gcond[count]['value'][0]+"'";
					break;
				case '%%': //Contains
					return " LIKE '%"+gcond[count]['value'][0]+"%'";
					break;
				case 'gt': //Greater Than
					return " > '"+gcond[count]['value'][0]+"'";
					break;
				case 'lt': //Less Than
					return " < '"+gcond[count]['value'][0]+"'";
					break;
				case 'gte': //Greater Than or Equal To
					return " >= '"+gcond[count]['value'][0]+"'";
					break;
				case 'lte': //Less Than or Equal To
					return " <= '"+gcond[count]['value'][0]+"'";
					break;
				case 'bw': //
					return " BETWEEN '"+gcond[count]['value'][0]+"' AND '"+gcond[count]['value'][1]+"'";
					break;
				default:
					break;
			}
		}
		
		function updateConnector(count){
			gcond[count]['connector'] = $('connector_'+count).value;
			drawfilter();
		}
		
		function drawConnector(count){
			var con = '<div><select id="connector_'+count+'" onchange="updateConnector('+count+');">';
			if(gcond[count]['connector'] && gcond[count]['connector']=='0'){
				rcond += ' AND ';
				con += '<option value="0" selected="selected">AND</option><option value="1">OR</option></select></div>';	
			}else{
				rcond += ' OR ';
				gcond[count]['connector'] = '1';
				con += '<option value="0">AND</option><option value="1" selected="selected">OR</option></select></div>';
			}
			$('fexpr_inner').insert(con);
		}
	//-->
	</script>
	
	<!-- Choose the column you want to see in you report -->
	<div class="form-row">
		<label>Choose the column you want to see in you report</label>

		<div id="ind_fields">
			<b>Individual/Non Member</b>
			<div id="ind_fields_inner">
				<div class="checkbox">
					<input type="checkbox" id="mem_all" value="0" onclick="checkall('ind_fields',this);">
					<label for="mem_all" style="color: #000;">Select all</label>
				</div>
				<?
					$ind_fields = array(
						'Member.gname'=>'First Name',
						'Member.lname'=>'Last Name',
						'Member.position'=>'Position',
						'Member.email'=>'Email Address',
						'Member.member_account_type_id'=>'Members Account Types',
						'Member.member_group_id'=>'Members Group',
						'Member.keycontact'=>'Key Contact',
						'Member.verified'=>'Verified Members',
						'Member.verified_by'=>'Verified By',
						'Member.verified_date'=>'Verified Date',
						'Member.key_contact_info'=>'Key Contact Information',
						'Member.is_online'=>'Online Members',
						'Member.organisation_name'=>'Organisation Name',
						'Member.organisation_id'=>'Members Organisation',
						'Member.renewal_date'=>'Renewal Date',
						'Member.targeted'=>'Targeted',
						'Member.voting_rights'=>'Voting Rights',
						'Member.active'=>'Active Members',
						'Member.last_login'=>'Last Login'
					);
				?>
				<?
					$i = 0;
					foreach($ind_fields as $key=>$val){
				?>
					<div class="checkbox">
						<input onclick="drawfilter();" type="checkbox" id="mem_<?=$i;?>" value="<?=$key;?>" name="data[Report][Fields][0][]">
						<label for="mem_<?=$i++;?>"><?=$val;?></label>
					</div>
				<?
					}
				?>
			</div>
		</div>
		<div id="org_fields">
			<b>Organisation</b>
			<div id="org_fields_inner">
				<div class="checkbox">
					<input type="checkbox" id="org_all" value="0" onclick="checkall('org_fields',this);">
					<label for="org_all" style="color: #000;">Select all</label>
				</div>
				<?
					$org_fields = array(
							'Organisation.name'=>'Name',
							'Organisation.street_address_1'=>'Street Address 1',
							'Organisation.street_address_2'=>'Street Address 2',
							'Organisation.street_suburb'=>'Street Suburb',
							'Organisation.street_state_id'=>'Street State',
							'Organisation.street_country_id'=>'Street Country',
							'Organisation.street_postcode'=>' Street Postcode',
							
							'Organisation.postal_address_1'=>'Postal Address 1',
							'Organisation.postal_address_2'=>'Postal Address 2',
							'Organisation.postal_suburb'=>'Postal Suburb',
							'Organisation.postal_state_id'=>'Postal State',
							'Organisation.postal_country_id'=>'Postal Country',
							'Organisation.postal_postcode'=>'Postal Postcode',

							'Organisation.phonenumber'=>'Phone Number',
							'Organisation.website'=>'Website Address',
							'Organisation.parent_company'=>'Parent Company',
							'Organisation.industry_type_id'=>'Industry Type',
							'Organisation.number_of_employees'=>'No of Employees',
							'Organisation.reason_id'=>'Reason',
							
							'Organisation.ceo_gname'=>'CEO First Name',
							'Organisation.ceo_lname'=>'CEO Last Name',
							'Organisation.ceo_address_1'=>'CEO Address 1',
							'Organisation.ceo_address_2'=>'CEO Address 2',
							'Organisation.ceo_suburb'=>'CEO Suburb',
							'Organisation.ceo_state_id'=>'CEO State',
							'Organisation.ceo_country_id'=>'CEO Country',
							'Organisation.ceo_postcode'=>'CEO Postcode',

							'Organisation.hr_gname'=>'HR First Name',
							'Organisation.hr_gname'=>'HR Last Name',
							'Organisation.hr_email'=>'HR Email',
							
							'Organisation.hod_gname'=>'HOD First Name',
							'Organisation.hod_lname'=>'HOD Last Name',
							'Organisation.hod_email'=>'HOD Email',
							
							'Organisation.kc_gname'=>'Key Contact First Name',
							'Organisation.kc_lname'=>'Key Contact Last Name',
							'Organisation.kc_email'=>'Key Contact Email',							
							'Organisation.kc_position'=>'Key Contact Position',
							'Organisation.kc_phone'=>'Key Contact Phone Number',
							'Organisation.kc_address_1'=>'Key Contact Address 1',
							'Organisation.kc_address_2'=>'Key Contact Address 2',
							'Organisation.kc_suburb'=>'Key Contact Suburb',
							'Organisation.kc_state_id'=>'Key Contact State',
							'Organisation.kc_country_id'=>'Key Contact Country',
							'Organisation.kc_postcode'=>'Key Contact Postcode',

							'Organisation.member_tier_id'=>'Members Tier',
							'Organisation.membership_renewal_date'=>'Renewal Date',
							'Organisation.membership_start_date'=>'Membership Start Date',
							'Organisation.active'=>'Active',
							'Organisation.grace_period'=>'Grace Period',
							'Organisation.voting_rights'=>'Voting Rights'
					);
				?>
				<?
					$i = 0;
					foreach($org_fields as $key=>$val){
				?>
					<div class="checkbox">
						<input onclick="drawfilter();" type="checkbox" id="org_<?=$i;?>" value="<?=$key;?>" name="data[Report][Fields][1][]">
						<label for="org_<?=$i++;?>"><?=$val;?></label>
					</div>
				<?
					}
				?>
			</div>
		</div>
		<div id="evt_fields">
			<b>Event</b>
			<div id="evt_fields_inner">
				<div class="checkbox">
					<input type="checkbox" id="evt_all" value="0" onclick="checkall('evt_fields',this);">
					<label for="evt_all" style="color: #000;">Select all</label>
				</div>
				<?
					$event_fields = array(
							'Event.title'=>'Name',
							'Event.location'=>'Location',
							'Event.category_id'=>'Category',
							'Event.start_date'=>'Start Date',
							'Event.end_date'=>'End Date',
							'Event.start_time'=>'Start Time',
							'Event.end_time'=>'End Time',
							'Event.available'=>'Available Events',
							'Event.filled'=>'Filled Events',
							'Event.pricing'=>'Events Pricing',
							'Event.unlimited'=>'Unlimited Places',
							'Event.created'=>'Created Date',
							'Event.modified'=>'Modified Date',
							'Event.publish_date'=>'Published Date',
							'Event.published'=>'Published Events',
							'Event.rsvp_date'=>'RSVP Date',
							'Event.reminder'=>'Reminder',
							'Event.reminder_date'=>'Reminder Date',
							'Event.check_status'=>'Status',
							'Event.created_by'=>'Created By',
							'Event.modified_by'=>'Modified By',
							'Event.hosted_by'=>'Hosted By'
					);
				?>
				<?
					$i = 0;
					foreach($event_fields as $key=>$val){
				?>
					<div class="checkbox">
						<input onclick="drawfilter();" type="checkbox" id="evt_<?=$i;?>" value="<?=$key;?>" name="data[Report][Fields][2][]">
						<label for="evt_<?=$i++;?>"><?=$val;?></label>
					</div>
				<?
					}
				?>
			</div>
		</div>
	</div>
</div>
<div class="frm-r">
	<?=$this->element('/admin/reports/report_status',array('open'=>true));?>
	<?=$this->element('/admin/reports/administrator_notes',array('open'=>true));?>
</div>
<br style="clear:both;" />
	<div id="afm">
		<div id="afm-inner">
			<a href="#" onclick="$('reportadd').submit();return false;" class="save_btn"></a>
			<ul id="footer-action">
				<li><a title="Preview" href="/admin/reports/run/<?=$this->request->data['Report']['id'];?>" target="_blank" class="preview">Run Report</a></li>
				<li class='close'><a class='close' onclick="" href="/<?=$this->request->data['Redirect']['redirect'];?>" title="Close" >Close</a></li>
			</ul>
		</div>
	</div>
</form>

<?=$this->element('/admin/reports/administrator_notes_forms');?>

<script type="text/javascript">
<!--
	function checkall(divid,cele){
		var allcheckbox = $$('div#'+divid+' input');
		allcheckbox.each(function(ele,val){
			if(cele.id!=ele.id)
				ele.checked = cele.checked;
		});
		drawfilter();
	}
	function closeConfirm(href){
		$('reportmsg').down(1).update('Are you sure you want to close without saving?');
		$('reportmsg').down('div.cmsg_content_small').update('You may have unsaved changes.');
		$('reportmsg').down('a.green').writeAttribute('href',href);
		$('reportmsg').down('a.green').writeAttribute('onclick','');
		showStyleBox('reportmsg');
	}
	
	
	
function serialize (txt) {
	switch(typeof(txt)){
	case 'string':
		return 's:'+txt.length+':"'+txt+'";';
	case 'number':
		if(txt>=0 && String(txt).indexOf('.') == -1 && txt < 65536) return 'i:'+txt+';';
		return 'd:'+txt+';';
	case 'boolean':
		return 'b:'+( (txt)?'1':'0' )+';';
	case 'object':
		var i=0,k,ret='';
		for(k in txt){
			//alert(isNaN(k));
			if(!isNaN(k)) k = Number(k);
			ret += serialize(k)+serialize(txt[k]);
			i++;
		}
		return 'a:'+i+':{'+ret+'}';
	default:
		return 'N;';
		alert('var undefined: '+typeof(txt));return undefined;
	}
}

function unserialize(txt){
	var level=0,arrlen=new Array(),del=0,final=new Array(),key=new Array(),save=txt;
	while(1){
		switch(txt.substr(0,1)){
		case 'N':
			del = 2;
			ret = null;
		break;
		case 'b':
			del = txt.indexOf(';')+1;
			ret = (txt.substring(2,del-1) == '1')?true:false;
		break;
		case 'i':
			del = txt.indexOf(';')+1;
			ret = Number(txt.substring(2,del-1));
		break;
		case 'd':
			del = txt.indexOf(';')+1;
			ret = Number(txt.substring(2,del-1));
		break;
		case 's':
			del = txt.substr(2,txt.substr(2).indexOf(':'));
			ret = txt.substr( 1+txt.indexOf('"'),del);
			del = txt.indexOf('"')+ 1 + ret.length + 2;
		break;
		case 'a':
			del = txt.indexOf(':{')+2;
			ret = new Array();
			arrlen[level+1] = Number(txt.substring(txt.indexOf(':')+1, del-2))*2;
		break;
		case 'O':
			txt = txt.substr(2);
			var tmp = txt.indexOf(':"')+2;
			var nlen = Number(txt.substring(0, txt.indexOf(':')));
			name = txt.substring(tmp, tmp+nlen );
			//alert(name);
			txt = txt.substring(tmp+nlen+2);
			del = txt.indexOf(':{')+2;
			ret = new Object();
			arrlen[level+1] = Number(txt.substring(0, del-2))*2;
		break;
		case '}':
			txt = txt.substr(1);
			if(arrlen[level] != 0){alert('var missed : '+save); return undefined;};
			//alert(arrlen[level]);
			level--;
		continue;
		default:
			if(level==0) return final;
			alert('syntax invalid(1) : '+save+"\nat\n"+txt+"level is at "+level);
			return undefined;
		}
		if(arrlen[level]%2 == 0){
			if(typeof(ret) == 'object'){alert('array index object no accepted : '+save);return undefined;}
			if(ret == undefined){alert('syntax invalid(2) : '+save);return undefined;}
			key[level] = ret;
		} else {
			var ev = '';
			for(var i=1;i<=level;i++){
				if(typeof(key[i]) == 'number'){
					ev += '['+key[i]+']';
				}else{
					ev += '["'+key[i]+'"]';
				}
			}
			eval('final'+ev+'= ret;');
		}
		arrlen[level]--;//alert(arrlen[level]-1);
		if(typeof(ret) == 'object') level++;
		txt = txt.substr(del);
		continue;
	}
}




function base64_encode (data) {
    // http://kevin.vanzonneveld.net
    // +   original by: Tyler Akins (http://rumkin.com)
    // +   improved by: Bayron Guevara
    // +   improved by: Thunder.m
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Pellentesque Malesuada
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // -    depends on: utf8_encode
    // *     example 1: base64_encode('Kevin van Zonneveld');
    // *     returns 1: 'S2V2aW4gdmFuIFpvbm5ldmVsZA=='

    // mozilla has this native
    // - but breaks in 2.0.0.12!
    //if (typeof this.window['atob'] == 'function') {
    //    return atob(data);
    //}
        
    var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    var o1, o2, o3, h1, h2, h3, h4, bits, i = 0, ac = 0, enc="", tmp_arr = [];

    if (!data) {
        return data;
    }

    data = this.utf8_encode(data+'');
    
    do { // pack three octets into four hexets
        o1 = data.charCodeAt(i++);
        o2 = data.charCodeAt(i++);
        o3 = data.charCodeAt(i++);

        bits = o1<<16 | o2<<8 | o3;

        h1 = bits>>18 & 0x3f;
        h2 = bits>>12 & 0x3f;
        h3 = bits>>6 & 0x3f;
        h4 = bits & 0x3f;

        // use hexets to index into b64, and append result to encoded string
        tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
    } while (i < data.length);
    
    enc = tmp_arr.join('');
    
    switch (data.length % 3) {
        case 1:
            enc = enc.slice(0, -2) + '==';
        break;
        case 2:
            enc = enc.slice(0, -1) + '=';
        break;
    }

    return enc;
}
function utf8_encode ( argString ) {
    // http://kevin.vanzonneveld.net
    // +   original by: Webtoolkit.info (http://www.webtoolkit.info/)
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: sowberry
    // +    tweaked by: Jack
    // +   bugfixed by: Onno Marsman
    // +   improved by: Yves Sucaet
    // +   bugfixed by: Onno Marsman
    // +   bugfixed by: Ulrich
    // *     example 1: utf8_encode('Kevin van Zonneveld');
    // *     returns 1: 'Kevin van Zonneveld'

    var string = (argString+''); // .replace(/\r\n/g, "\n").replace(/\r/g, "\n");

    var utftext = "",
        start, end,
        stringl = 0;

    start = end = 0;
    stringl = string.length;
    for (var n = 0; n < stringl; n++) {
        var c1 = string.charCodeAt(n);
        var enc = null;

        if (c1 < 128) {
            end++;
        }
        else if (c1 > 127 && c1 < 2048) {
            enc = String.fromCharCode((c1 >> 6) | 192) + String.fromCharCode((c1 & 63) | 128);
        }
        else {
            enc = String.fromCharCode((c1 >> 12) | 224) + String.fromCharCode(((c1 >> 6) & 63) | 128) + String.fromCharCode((c1 & 63) | 128);
        }
        if (enc !== null) {
            if (end > start) {
                utftext += string.slice(start, end);
            }
            utftext += enc;
            start = end = n+1;
        }
    }

    if (end > start) {
        utftext += string.slice(start, stringl);
    }

    return utftext;
}
function base64_decode (data) {
    // http://kevin.vanzonneveld.net
    // +   original by: Tyler Akins (http://rumkin.com)
    // +   improved by: Thunder.m
    // +      input by: Aman Gupta
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Onno Marsman
    // +   bugfixed by: Pellentesque Malesuada
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +      input by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // -    depends on: utf8_decode
    // *     example 1: base64_decode('S2V2aW4gdmFuIFpvbm5ldmVsZA==');
    // *     returns 1: 'Kevin van Zonneveld'

    // mozilla has this native
    // - but breaks in 2.0.0.12!
    //if (typeof this.window['btoa'] == 'function') {
    //    return btoa(data);
    //}

    var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    var o1, o2, o3, h1, h2, h3, h4, bits, i = 0, ac = 0, dec = "", tmp_arr = [];

    if (!data) {
        return data;
    }

    data += '';

    do {  // unpack four hexets into three octets using index points in b64
        h1 = b64.indexOf(data.charAt(i++));
        h2 = b64.indexOf(data.charAt(i++));
        h3 = b64.indexOf(data.charAt(i++));
        h4 = b64.indexOf(data.charAt(i++));

        bits = h1<<18 | h2<<12 | h3<<6 | h4;

        o1 = bits>>16 & 0xff;
        o2 = bits>>8 & 0xff;
        o3 = bits & 0xff;

        if (h3 == 64) {
            tmp_arr[ac++] = String.fromCharCode(o1);
        } else if (h4 == 64) {
            tmp_arr[ac++] = String.fromCharCode(o1, o2);
        } else {
            tmp_arr[ac++] = String.fromCharCode(o1, o2, o3);
        }
    } while (i < data.length);

    dec = tmp_arr.join('');
    dec = this.utf8_decode(dec);

    return dec;
}
function utf8_decode ( str_data ) {
    // http://kevin.vanzonneveld.net
    // +   original by: Webtoolkit.info (http://www.webtoolkit.info/)
    // +      input by: Aman Gupta
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Norman "zEh" Fuchs
    // +   bugfixed by: hitwork
    // +   bugfixed by: Onno Marsman
    // +      input by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // *     example 1: utf8_decode('Kevin van Zonneveld');
    // *     returns 1: 'Kevin van Zonneveld'

    var tmp_arr = [], i = 0, ac = 0, c1 = 0, c2 = 0, c3 = 0;
    
    str_data += '';
    
    while ( i < str_data.length ) {
        c1 = str_data.charCodeAt(i);
        if (c1 < 128) {
            tmp_arr[ac++] = String.fromCharCode(c1);
            i++;
        }
        else if (c1 > 191 && c1 < 224) {
            c2 = str_data.charCodeAt(i + 1);
            tmp_arr[ac++] = String.fromCharCode(((c1 & 31) << 6) | (c2 & 63));
            i += 2;
        }
        else {
            c2 = str_data.charCodeAt(i + 1);
            c3 = str_data.charCodeAt(i + 2);
            tmp_arr[ac++] = String.fromCharCode(((c1 & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
            i += 3;
        }
    }

    return tmp_arr.join('');
}

autoPopulate();
//-->
</script>
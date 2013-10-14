<h1>Join The Madgwicks Mailing List</h1>

<p>To automatically receive news, publications and other relevant legal information direct to your inbox, please complete the form below.</p>

<form action="http://madgwicks.createsend.com/t/r/s/qtrtrt/" method="POST" class="CmsForm">

	<?= $this->CmsForm->textbox('Name', 'Name') ?>
	<?= $this->CmsForm->textbox('Email', 'Email') ?>
	<?= $this->CmsForm->textbox('Phone Number', 'Phone') ?>
	<?= $this->CmsForm->textbox('Company', 'Company') ?>
	<?= $this->CmsForm->textbox('Address', 'Address') ?>
	<?= $this->CmsForm->textbox('', 'Address 2') ?>
	<?= $this->CmsForm->textbox('Suburb', 'Suburb') ?>
	<?= $this->CmsForm->textbox('Postcode', 'Postcode') ?>
	
	<div class="checkboxList">
		<div class="label">Legal areas of interest to you*</div>
		<?= $this->CmsForm->select('lists', array(
				// Below are the lists and IDs outputted from CampaignMonitor
				'cm-ol-cuilui' => 'Accountants',
				'cm-ol-cuiluu' => 'Accountants/Micro Accountnts',
				'cm-ol-uthdid' => 'Building & Construction 1',
				'cm-ol-uthddt' => 'Building & Construction 2',
				'cm-ol-ndtlil' => 'Bus Serv, All Accountants & Franchising',
				'cm-ol-zlhidj' => 'Business Services',
				'cm-ol-uucdu' => 'Energy',
				'cm-ol-vldhhl' => 'Financial Services (Mark Burgess A list) November 2011',
				'cm-ol-qjlxl' => 'Franchising',
				'cm-ol-ujiukj' => 'Franchising & Accountant Grps',
				'cm-ol-xltiti' => 'Franchising & MSA',
				'cm-ol-qjkfh' => 'Franchising target list',
				'cm-ol-qhyjdj' => 'Franchising, Accountants, Target Franchising',
				'cm-ol-zukuri' => 'Franchisor List - November 2011',
				'cm-ol-uhujdl' => 'Friends of Madgwicks',
				'cm-ol-ukttyh' => 'FSG (all), Bus Serv & MSA ',
				'cm-ol-byuldi' => 'FSG groups',
				'cm-ol-flrtuh' => 'Hospitaliy & Tourism - Augsut 2011',
				'cm-ol-fadlr' => 'Insolvency & Litigation',
				'cm-ol-vmtid' => 'Mark Burgess List - All',
				'cm-ol-bydjjl' => 'Micro Accountants',
				'cm-ol-fuukrj' => 'Property Development',
				'cm-ol-bjyltj' => 'Property Groups',
				'cm-ol-vjykuj' => 'Property/Finance - Nov 2011',
				'cm-ol-mhtmy' => 'Retail List',
				'cm-ol-ktyhit' => 'Sample List',
				'cm-ol-qhuby' => 'Superannuation',
				'cm-ol-ujihut' => 'test',
				'cm-ol-bdudih' => 'Workplace Relations',
				'cm-ol-ajjsu' => 'Young Professionals',		
		), array('multiple' => 'checkbox')) ?>
	</div>

	<a href="javascript:void($('.CmsForm').submit())" class="blueButton"><span>Send Enquiry</span></a>
	
</form>

<?// Javascript to send the user's details to /subscribe/ajaxSave and wait for response before submitting form onto CampaignMonitor ?>
<script type="text/javascript">
	$('.CmsForm').submit(function(event){
		event.preventDefault();
		var form = $('.CmsForm')[0];
		$.ajax('/subscribe/ajaxSave', {
			type: 'POST',
			data: {
				Name:		form['data[Name]'].value,
				Email:		form['data[Email]'].value,
				Company:	form['data[Company]'].value,
				Phone:		form['data[Phone]'].value,
				Address:	form['data[Address]'].value,
				Address2:	form['data[Address 2]'].value,
				Suburb:		form['data[Suburb]'].value,
				Postcode:	form['data[Postcode]'].value
			},
			timeout: 5000,	// 5 seconds
			complete: function() {
				console.log('completed...');
				form.submit();
			}
		})
	})
</script>
<?//--------------------------- LEFT SIDEBAR -----------------------------------------------?>
<div class="sidebarLeft">
	
	<?//----- Subscribe to Campaign Monitor Newsletter Database -----?>
	<?= $this->element('frontend/sidebar_subscribe') ?>
	
</div>

<div class="sidebarRight">
        <div class="sidebarBox contactDetails">
            <h4>Contact Details</h4>
            <p><strong>
                Madgwicks Lawyers
                Level 33
                140 William Street
                Melbourne VIC
                Australia 3000
            </strong></p>
            <p>
                Ph: <strong>+61 3 9242 4744</strong><br>
                Fax: <strong>+61 3 9242 4777</strong> <br>
                E: <a href="mailto:madgwicks@madgwicks.com.au" title="Madgwicks email">madgwicks@madgwicks.com.au</a>
            </p>
            <p>
                Access information on working at Madgwicks in <a href="/careers.html" title="Careers">Careers</a> or <a href="mailto:careers@madgwicks.com.au" title="Careers email">contact HR</a>.
            </p>
            <p>
                For media enquiries, <a href="mailto:marketing@madgwicks.com.au" title="Marketing email">contact our Marketing Manager</a>.
            </p>
            <p>
                Access information and contact details for our senior lawyers in <a href="/our_people.html" title="Our people">Our People</a>
            </p>
        </div>
</div>

<div class="content">
	<h1>Contact Madgwicks</h1>
	
	<p>For general enquiries, please complete the details below.</p>
	<p>Madgwicks respects your privacy at all times. Please read the <a href="############">Madgwicks Privacy Policy</a> for more information.</p>
	
	<form action="" method="POST" class="CmsForm">
	
		<?= $this->CmsForm->textbox('Name', 'Name') ?>
		<?= $this->CmsForm->textbox('Email', 'Email') ?>
		<?= $this->CmsForm->textbox('Phone Number', 'Phone') ?>
		<?= $this->CmsForm->textbox('Company', 'Company') ?>
		<?= $this->CmsForm->textbox('Address', 'Address') ?>
		<?= $this->CmsForm->textbox('', 'Address 2') ?>
		<?= $this->CmsForm->textbox('Suburb', 'Suburb') ?>
		<?= $this->CmsForm->textbox('Postcode', 'Postcode') ?>
		<?= $this->CmsForm->textareaOld('Your Message', 'Message') ?>
	
		<a href="javascript:void($('.CmsForm').submit())" class="blueButton"><span>Send Enquiry</span></a>
		
	</form>
</div>

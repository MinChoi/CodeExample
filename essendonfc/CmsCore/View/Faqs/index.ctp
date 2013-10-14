<? $this->append('script', $this->Minify->css('/CORE/css/faqs_basic', false)) ?>	

<h1>FAQs</h1>

<div class="faq">
	<p>Got some questions about our membership packages or about memberships in general? You'll find answers to many questions here:</p>
	<?
	$current_cat = '';
	// Loop through all the FAQ questions
	// Print out a the section heading when we detect that the section has changed
	foreach ($faqs as $faq) {
		if ($current_cat != '' && $current_cat != $faq['Faq']['faq_section_id']) { // close previous FAQ section if needed ?>
				</div><!--/.questions-->
			</div><!--/.section-->
		
		<? } if ($current_cat == '' || $current_cat != $faq['Faq']['faq_section_id']) { // start of a new section ?>
			<div class="section">
				<a href="#" title="View Details" class="faqButton faqView">View Details</a>
				<a href="#" title="Hide Details" class="faqButton faqHide" style="display:none">Hide Details</a>
				<h2><?= $faq['FaqSection']['name'] ?></h2>
				<div class="questions">
		<? } ?>
		
		<h3 class="question"><?= $faq['Faq']['question'] ?></h3>
		<p class="answer"><?= html_entity_decode($faq['Faq']['answer']) ?></p>
			
		<?
		$current_cat = $faq['Faq']['faq_section_id'];
	}
	?>
	</div><!--/.questions-->
	</div><!--/.section-->
</div><!--/.faq-->

<script type="text/javascript">$(function(){

	// Hide all FAQ sections initially
	$('.faq .questions').css('overflow', 'hidden').hide();

	// Toggle section visibility when heading is clicked
	// Note that the expansion animation will look clunky if the .questions DIV doesn't
	// have any padding/border, or overflow is default (visible). Tweak these to correct.
	$('.faqButton').click(function(e) {
		var $this = $(this);
		$this.toggle();
		$this.siblings('.faqButton').toggle();
		$this.siblings('.questions').slideToggle(200);
		e.preventDefault();
	});
	
});</script>

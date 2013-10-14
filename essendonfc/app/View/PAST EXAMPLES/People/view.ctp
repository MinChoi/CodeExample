<div class="sidebarLeft">

	<?= $this->element('frontend/sidebar_people_types') ?>

	<?//----- Show related topics (tags) -----?>
	<?= $this->element('frontend/sidebar_tags') ?>

</div>

<div class="content">
	<h1><?= $person['Person']['name'] ?></h1>
	<div class="position"><strong><?= $person['Person']['positionType'] ?></strong></div>
	
	<div class="basicInfo">
		<div class="profilePic"><img src="<?= $person['Person']['image'] ?>" alt="<?= $person['Person']['name'] ?>"/></div>
	    <div class="profileText">
	    	<h3>Areas of Practice</h3>
	        <p><? foreach ($person['PracticeArea'] as $pa) { ?>
	                <a class="profileLink" href="<?= $this->Html->url(array('controller' => 'PracticeAreas', 'action' => 'view', $pa['id'])) ?>"><?= $pa['name'] ?></a><br/>
	            <? } ?>
	        </p>
	        
	        <p>
	            <div class="phone">Phone: + 61 3 9242 4<?= $person['Person']['extension'] ?></div>
				<? if ($person['Person']['skype']) { ?>
					<div class="skype">Skype: <a href="skype:<?= $person['Person']['skype'] ?>"><?= $person['Person']['skype'] ?></a></div>            
				<? } ?>
	        </p>
			
			<? if ($person['Person']['email']) { ?>
				<div class="email"><a class="blueButton arrow" href="#populated-with-jQuery"><span><?= str_replace('@', ' [at] ', $person['Person']['email']) ?></span></a></div>
	        <? } if ($person['Person']['linkedIn']) { ?>
				<div class="linkedIn"><a class="btnLinkedin" href="<?= $person['Person']['linkedIn'] ?>" target="_blank">Connect with <?= $person['Person']['name'] ?> on LinkedIn</a></div>
			<? } ?>
		</div>
	    <br clear="all"/>
	</div>
	
	<div class="fullProfile">
		<?= html_entity_decode($person['Person']['fullProfile']) ?>
	</div>
</div>

<script type="text/javascript">
	// Script for preventing spam to email addresses, replaces [dot] and [at] with proper equivalents
	$(document).ready(function(){
		var tag = $('.email a'),
			email = tag.find('span').html().replace(' [at] ', '@').replace(' [dot] ', '.');
		tag
			.attr('href', 'mailto:' + email)
			.find('span').html(email)
	})
</script>

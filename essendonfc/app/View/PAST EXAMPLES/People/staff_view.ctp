<?//= krumo($person) ?>

<h1><?= $person['Person']['name'] ?></h1>
<div class="position"><?= $person['Person']['positionType'] ?></div>

<div class="profilePic"><img src="<?= $person['Person']['image'] ?>" alt="<?= $person['Person']['name'] ?>"/></div>

<div class="basicInfo">
	<p>
		<strong>Areas of Practice</strong><br/>
		<? foreach ($person['PracticeArea'] as $pa) { ?>
			<a href="<?= $this->Html->url(array('controller' => 'PracticeAreas', 'action' => 'view', $pa['id'])) ?>"><?= $pa['name'] ?></a><br/>
		<? } ?>
	</p>
	
	<p class="contactDetails">
		<div class="phone">Phone: <?= $person['Person']['extension'] ?></div>
		<div class="skype">Skype: <a href="skype:<?= $person['Person']['skype'] ?>"><?= $person['Person']['skype'] ?></a></div>
		<div class="email"><a href="#populated-with-jQuery">simon [at] somewhere [dot] com</a></div>
	</p>
	
	<p class="linkedIn"><a href="#">Connect with <?= $person['Person']['name'] ?> on LinkedIn</a></p>
</div>

<div class="fullProfile">
	<?= html_entity_decode($person['Person']['fullProfile']) ?>
</div>

<script type="text/javascript">
	// Script for preventing spam to email addresses
	$(document).ready(function(){
		var tag = $('.email a'),
			email = tag.html().replace(' [at] ', '@').replace(' [dot] ', '.');
		
		tag.attr('href', 'mailto:' + email).html(email)
	})
</script>

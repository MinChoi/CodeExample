
<div class="content">

	<h1><?= $page['Page']['name'] ?></h1>
	<?= $page['Page']['content'] ?>

</div>

<?
//---------------- Page-Specific Scripts Can Be Injected Here -------------------------------
// (Yes, I hate it when they insist on inserting HTML forms inside WYSIWYG fields... so fragile!)

// New Members "Register Your Interest"
if ($this->here == '/new-members.html') {
	$this->Minify->js('/themes/essendon2013/js/prefer_to_talk_validation.js');
}

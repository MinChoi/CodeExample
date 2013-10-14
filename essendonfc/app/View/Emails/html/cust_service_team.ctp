<?
// Basic template that displays all fields passed to it in a table
// This template is usually used for "Contact Us" and other basic forms
?>
<p>Someone has submitted the "<a href="<?= $this->Html->url('/new-members.html', true) ?>">Prefer to Talk to Someone?</a>" form on the Essendon Membership Site.  They indicated that they would like a call from the customer service team.</p>

<table cellpadding="10" border="0">
	<? foreach ($fields as $key => $val) : $key = Inflector::humanize($key) ?>
		<tr>
			<th align="right" valign="top"><?= $key ?></th>
			<td><?= nl2br(h($val)) // apply HTML encoding and convert line returns to <br> ?></td>
		</tr>
	<? endforeach ?>
</table>

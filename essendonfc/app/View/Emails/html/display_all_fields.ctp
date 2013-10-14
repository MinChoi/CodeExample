<?
// Basic template that displays all fields passed to it in a table
// This template is usually used for "Contact Us" and other basic forms
?>

<table cellpadding="10" border="0">
	<? foreach ($fields as $key => $val) : ?>
		<tr>
			<th align="right" valign="top"><?= $key ?></th>
			<td><?= nl2br(h($val)) // apply HTML encoding and convert line returns to <br> ?></td>
		</tr>
	<? endforeach ?>
</table>

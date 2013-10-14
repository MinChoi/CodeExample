<?// This template is also currently being used for the subscribe notification (see subscribe.ctp) ?>

<table cellpadding="10" border="0">
	<? foreach ($fields as $key => $val) : ?>
	<tr>
		<th align="right" valign="top"><?= $key ?></th>
		<td><?= nl2br(h($val)) ?></td>
	</tr>
	<? endforeach ?>
</table>
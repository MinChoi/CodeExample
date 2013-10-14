
<p>Thanks for registering via the Madgwicks website.  The event details are below:</p>

<table cellpadding="8" border="0">
	<tr><th align="right" valign="top">Event</th>		<td><a href="http://www.madgwicks.com.au/events/<?= $event['id'] ?>"><?= $event['title'] ?></a></td></tr>
	<tr><th align="right" valign="top">Date</th>		<td><?= human_date($event['start_date']) . ($event['end_date'] ? ' - ' . human_date($event['end_date']) : '') ?></td></tr>
	<tr><th align="right" valign="top">Time</th>		<td><?= $event['start_time'] ?> - <?= $event['end_time'] ?></td></tr>
	<tr><th align="right" valign="top">Venue</th>		<td><?= $event['venue'] ?></td></tr>
	<tr><th align="right" valign="top">Address</th>		<td><?= $event['address'] ?></td></tr>
	<tr><th align="right" valign="top">Pricing</th>		<td><?= $event['pricing'] ?></td></tr>
	<tr><th align="right" valign="top">Description</th>	<td><?= nl2br(h($event['short_desc'])) ?></td></tr>
</table>

<p>&nbsp;</p>
<p>Your registration details:</p>

<table cellpadding="8" border="0">
	<? foreach ($fields as $key => $val) : if ($key == 'event_id') continue; // skip ID field ?>
		<tr>
			<th align="right" valign="top"><?= Inflector::humanize($key) ?></th>
			<td><?= nl2br(h($val)) ?></td>
		</tr>
	<? endforeach ?>
</table>

<p>Please <a href="http://www.madgwicks.com.au/contact_us">contact us</a> if you wish to cancel or amend your registration details.</p>
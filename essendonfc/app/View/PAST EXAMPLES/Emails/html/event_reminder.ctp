<p>Dear <?php echo!empty($registrant['first_name']) ? $registrant['first_name'] : '', ' ', !empty($registrant['last_name']) ? $registrant['last_name'] : ''; ?>,</p>
<br />    
<p>This is a reminder to your registered events at <?php echo $this->Html->link('Madgwicks', 'http://madgwicks.com.au'); ?>. The event details are below:</p>

<table cellpadding="8" border="0">
    <tr><th align="right" valign="top">Event</th>		<td><a href="/events/<?= $event['id'] ?>"><?= $event['title'] ?></a></td></tr>
    <tr><th align="right" valign="top">Date</th>		<td><?= $event['start_date'] . ($event['end_date'] ? ' - ' . $event['end_date'] : '') ?></td></tr>
    <tr><th align="right" valign="top">Time</th>		<td><?= $event['start_time'] ?> - <?= $event['end_time'] ?></td></tr>
    <tr><th align="right" valign="top">Venue</th>		<td><?= $event['venue'] ?></td></tr>
    <tr><th align="right" valign="top">Address</th>		<td><?= $event['address'] ?></td></tr>
    <tr><th align="right" valign="top">Pricing</th>		<td><?= $event['pricing'] ?></td></tr>
    <tr><th align="right" valign="top">Description</th>	<td><?= nl2br(h($event['short_desc'])) ?></td></tr>
</table>

<p>Don't miss out!</p>
<br />
<p>Regards,</p>
<p>The Madgwicks Team</p>

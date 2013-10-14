<h2>Summary of event reminders sent</h2>
<table>
    <tr>
        <th>Event Title</th>
        <th>Email Count</th>
    </tr>
    <?php foreach ($events as $event): ?>
        <tr>
            <td><?php echo $event['Event']['title']; ?></td>
            <td><?php echo $stat[$event['Event']['id']]; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
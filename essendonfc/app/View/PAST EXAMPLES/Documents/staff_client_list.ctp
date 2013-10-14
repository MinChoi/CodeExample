<div class="sidebarLeft">
	<?= $this->element('frontend/sidebar_page_submenu', array('page' => 107)) // Client Doc Box is menu link with ID 107 ?>	
</div>


<div class="content">
	<h1>Client Document Box</h1>

	<? //---------------- LIST OF CLIENTS THIS PERSON IS ASSOCIATED WITH ----------------------------?>
	<? if ($clients) : ?>
		<table>
			<? foreach ($clients as $c) : ?>
				<tr>
					<th>
						<a href="/staff/documents/index/<?= $c['id'] ?>"><?= $c['name'] ?></a>
					</th>
					<td>
						<?= count($c['Document']) ?> documents
					</td>
				</tr>
			<? endforeach ?>
		</table>
	<? endif ?>
	
	<p>You can only access client documents for those clients assigned to you.  If you require additional access, please contact XXXXXXXXXXXXXX.</p>
</div>
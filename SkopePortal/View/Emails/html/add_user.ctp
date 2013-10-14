Welcome to <?php echo Company::NAME; ?> Client Portal. You have been added as a User to the system.<br>
<?php
	foreach ($user_detail['Client'] as $client) :
		echo '<br><br><b>Client</b>: ';
		echo $client['name'];
		echo '<br>';
		echo '<b>Project(s)</b><br>';

		if (count($client['Project']) > 0):
			foreach ($client['Project'] as $project) :
				echo $project['name'] . '<br>';
			endforeach;
		else:
			echo 'None<br>';
		endif;

	endforeach;

	$url = 'http://'.$_SERVER['HTTP_HOST'].'/users/register/'.$user_detail['User']['email'].'/'.$key;
?>
<br>
<a href="<?php echo $url;?>">Please click here to complete the registration process.</a><br><br>
Thanks,<br>
<?php echo Company::NAME; ?>

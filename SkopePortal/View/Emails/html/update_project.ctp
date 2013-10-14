Your access to projects has been changed. Please see below for your current projects.<br>
<br>
<?php
	echo '<b>Client</b><br>';
	echo $user_detail['Client'][0]['name'];
	echo '<br><br>';
	echo '<b>Project(s)</b><br>';

	if (count($user_detail['Project']) > 0) {
		foreach ($user_detail['Project'] as $project) :
			echo $project['name'] . '<br>';
		endforeach;
	} else {
		echo 'None<br>';
	}
?>
<br>
<a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>">Click here to login to <?php echo Company::NAME; ?> Client Portal.</a><br><br>
Thanks,<br>
<?php echo Company::NAME; ?><br><br>
<a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/?redirect='.
urlencode('/users/edit'). '&uname='.
urlencode($user_detail['User']['email']); ?>">Go to 'My account' to unsubscribe notifications</a>
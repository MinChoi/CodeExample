Welcome to <?php echo Company::NAME; ?> Client Portal. You have been added as a Moderator to the system.<br>
<br>
<?php
	$url = 'http://'.$_SERVER['HTTP_HOST'].'/users/register/'.$email.'/'.$key;
?>
<a href="<?php echo $url;?>">Please click here to complete the registration process.</a><br><br>
Thanks,<br>
<?php echo Company::NAME; ?>

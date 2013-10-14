<?php
$url = 'http://'.$_SERVER['HTTP_HOST'].'/users/reset_password/'.$email.'/'.$key;
?>
<a href="<?php echo $url;?>">Click here to reset your password.</a>

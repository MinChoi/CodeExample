New file has been uploaded.<br>

<br>
<b>Project: </b><?php echo $file_detail['project_name']; ?><br>
<b>File name:</b> <?php echo $file_detail['file_name']; ?><br>
<b>No of files:</b> <?php echo $file_detail['file_count']; ?><br>
<br><br>
Thanks,<br>
<?php echo Company::NAME; ?><br><br>
<a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/?redirect='.
urlencode('/users/edit'). '&uname='.
urlencode($user_email); ?>">Go to 'My account' to unsubscribe notifications</a>

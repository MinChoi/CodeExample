<?php if (!empty($email)): ?>
    <h1>Password Reset Email Sent</h1>
	<p>An email has been sent to <?php echo $email; ?>, please follow the 
        instructions inside to reset your password.</p>
<?php else: ?>
	<h1>Error Resetting Your Password</h1>
    <p>We could not reset your password, please try again.</p>
<?php endif; ?>

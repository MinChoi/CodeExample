<?
// Generate tokenized URL for resetting password (true = prepend domain name also)
$url = $this->Html->url(array('controller' => 'frontend_login', 'action' => 'change_password', $data['password_token']), true);
?>

<p>Dear <?= $data['name']; ?></p>

<p>We have received a request via our website to reset your password.</p>

<p>If this was you, please click on the link below to change your password: </p>

<?= $this->Html->link($url, $url); ?>

<p>This link will expire in 24 hours.</p>

<p>Thank you for using our services.</p>

<p><br />Regards,</p>

<p>The request was made from the following IP address: <br /> 
   <?= $data['token_request_ip']; ?></p>
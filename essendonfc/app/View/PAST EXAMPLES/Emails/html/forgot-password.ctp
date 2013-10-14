<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$url = $this->Html->url(array('controller' => 'frontend_login', 'action' => 'change_password', $data['password_token']), true);
?>
<p>Dear <?= $data['name']; ?></p>
<p>We have received a request via the Madgwicks website to reset your password.</p>
<p>If this was you, please click on the link below to change your password: </p>
<p><?= $this->Html->link('Change my password', $url, true); ?></p>
<p>If your email client doesn't recognise the link, copy and paste the following into your browser's address bar:</p>
<?= $this->Html->link($url, $url); ?>

<p>The link will expire in 24 hours.</p>

<p>Thank you for using our services.</p>
<br />
<p>Regards,</p>
<p>The Madgwicks Team</p>
<p>The IP address that made the request was from IP address: <br />
    <?= $data['token_request_ip']; ?></p>
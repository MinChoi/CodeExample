
<h1>Reset Your Password</h1>
<?php

echo $this->Form->create('FrontendLogin'),
 $this->Form->input('password', array(
    'type' => 'password',
    'label' => 'New Password'
)),
 $this->Form->input('rpt_password', array(
    'type' => 'password',
    'label' => 'Confirm New Password'
)),
 $this->Form->end('Submit');

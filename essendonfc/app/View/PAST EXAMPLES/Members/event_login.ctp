<?
	if(isset($success)){
?>
<script type="text/javascript">
	window.location.href = "/members-area.html";
</script>
<?	
	}else{
?>
<span class="login-title">Member Login</span>	
<div id="errors">
	<ul style="margin:0px;padding:0px;list-style:none;">
<?
	if(isset($login_error)){
		echo '<li style="color:#DD0000">'.$login_error.'</li>';		
	}
?>
	</ul>
</div>
<div id="login_loader" style="display:none;"><img src="/img/spinner.gif" alt="Spinner" /></div>
<?
		echo $ajax->form(array('type' => 'post',
			'options' => array(
				'model'=>'Member',
				'update'=>'event_reg_form',
				'url' => array(
					'controller' => 'members',
					'action' => 'login'
				),
				'indicator' => 'login_loader'
			)
		));
		/*
		<!--<form action="/member-login" id="signin" method="post" onsubmit="return false;">-->
		*/
?>
	
	  <p class="textbox">
		<!--<label for="username">Username or email</label>-->
		<input type="text" title="username" value="ENTER EMAIL ADDRESS" name="data[Member][email]" id="username" />
	  </p>

	  <p class="textbox">
		<!--<label for="password">Password</label>-->
		<input type="password" title="password" value="ENTER PASSWORD" name="data[Member][password]" id="password" onfocus="this.value='';" />
	  </p>
	<div class="login-bttn-holder">
	  <div class="login-bttn">
		<input type="image" src="/themes/default/images/bttn-login.png" value="Sign in" id="signin_submit">
		<!--<input type="checkbox" tabindex="6" value="1" name="remember_me" id="remember">
		<label for="remember">Remember me</label>-->
	  </div>
	  <div class="forgot">
		<a id="resend_password_link" href="#" onclick="showforgotpassword();return false;">Forgot password?</a>
	  </div>
	</div>
 </form>
<?
	}
?>
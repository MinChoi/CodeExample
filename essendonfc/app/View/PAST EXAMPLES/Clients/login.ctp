<?
	if(isset($success)){
		if($this->Session->check('lastRD')){
?>
	<script type="text/javascript">
		window.location.href = "<?=$this->Session->read('lastRD');?>";
	</script>
<?
		}else{

?>
<div id="loggedin">
	<script type="text/javascript">
		hideloginbox();
		$('login_actions').update('<h1 class="logo"><a href="/">Diversity Council Australia</a></h1><a href="/member-logout" onclick="logoutMe(); return false;" class="text-members-logout">logout</a><a class="ma_normal" href="/members-area.html">Member Area</a>');
		$('loggedin').remove();
	</script>
</div>
<? 
		}
	}
?>
<span class="login-title">Member Login</span>	
<div id="loginerror">
	<div id="errors">
		<ul style="margin:0px;padding:0px;list-style:none;">
	<?
	if($this->Session->check('showlogin') && $this->Session->read('showlogin')){
		echo '<li style="color:#DD0000">The content you are trying to view is only available to members. Please login and we\'ll take you straight there.</li>';		
	}
	?>
	<?
		if(isset($login_error)){
			echo '<li style="color:#DD0000">'.$login_error.'</li>';		
		}
	?>
		</ul>
	</div>
</div>
<div id="login_loader" style="display:none;"><img src="/img/spinner.gif" alt="Spinner" /></div>
<?
		echo $ajax->form(array('type' => 'post',
			'options' => array(
				'model'=>'Member',
				'update'=>'signin_menu',
				'url' => array(
					'controller' => 'members',
					'action' => 'login'
				),
				'before' => "$('login_loader').show()",
				'after'=>'if($(\'loginerror\')){fadeout.delay(3.5);Element.hide.delay(4.8, "loginerror");}initPage()'
			)
		));
?>
	
	  <p class="textbox">
		<!--<label for="username">Username or email</label>-->
		<input type="text" title="username" value="enter email" name="data[Member][email]" id="username" />
	  </p>

	  <p class="textbox">
		<!--<label for="password">Password</label>-->
		<input type="password" title="password" value="enter password" name="data[Member][password]" id="password" onfocus="this.value='';" />
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
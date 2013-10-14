<span class="login-title">Forgot Password?</span>	
<div id="errors">
	<ul style="margin:0px;padding:0px;list-style:none;margin-top:10px;">
<?
	if(isset($femsg)){
		echo '<li style="color:#DD0000">Please enter a valid email.</li>';		
	}
?>
	</ul>
</div>
<div>
	<ul style="margin:0px;padding:0px;list-style:none;margin-top:10px;">
<?
	if(isset($fmsg)){
		echo '<li style="color:#00DD00">Password sent, check your mail for login details.</li>';		
	}
?>
	</ul>
</div>
<div id="fp_loader" style="display:none;"><img src="/img/spinner.gif" alt="Spinner" /></div>
<?
		echo $ajax->form(array('type' => 'post',
			'options' => array(
				'model'=>'Member',
				'update'=>'forgotpassworddiv',
				'url' => array(
					'controller' => 'members',
					'action' => 'forgotpassword'
				),
				'indicator' => 'fp_loader'
			)
		));
?>
	  <p class="textbox">
		<input type="text" title="email" value="enter email address" name="data[FMember][email]">
	  </p>
	<div class="login-bttn-holder">
	  <div class="login-bttn">
		<input type="submit" value="Send" name="submit">
	  </div>
	   <div class="forgot">
		<a href="#" onclick="showloginfrm();return false;">Login</a>
	  </div>
	</div>
 </form>
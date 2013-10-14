
<div class="row-fluid">
	

		<div class="span8">
			
			<ul class="slides">
				  <li>
					  <a class="youtube fresco glow" href="http://www.youtube.com/embed/<?= $video_id ?>?rel=0&autoplay=1">
					  	<img src="/themes/<?= Configure::read('Core.Theme'); ?>/img/slider01.png" alt="Essendon Membership 2013" class="glow" />
					  </a>
				  </li>
				  <li>
					  <a class="youtube fresco glow" href="http://www.youtube.com/embed/<?= $video_id ?>?rel=0&autoplay=1">
					  	<img src="/themes/<?= Configure::read('Core.Theme'); ?>/img/slider02.png" alt="Essendon Membership 2013" class="glow" />
					  </a>
				  </li>
				  <li>
					  <a class="youtube fresco glow" href="http://www.youtube.com/embed/<?= $video_id ?>?rel=0&autoplay=1">
					  	<img src="/themes/<?= Configure::read('Core.Theme'); ?>/img/slider03.png" alt="Essendon Membership 2013" class="glow" />
					  </a>
				  </li>
		
			</ul>
		
		</div>
	
		<div class="span4 hidden-phone">
		
			<a href="/new-members.html"><img src="/themes/<?= Configure::read('Core.Theme'); ?>/img/button_join.png" alt="Essendon Membership 2013" class="button_join" /></a>
			<a href="https://oss.ticketmaster.com/html/home.htmI?l=EN&team=essendon" target="_blank"><img src="/themes/<?= Configure::read('Core.Theme'); ?>/img/button_renew.png" alt="Essendon FC Membership 2013" class="button_renew"  /></a>
			
		</div>
</div>

<div class="row hidden-desktop hidden-tablet">

		<div class="span6 bigbutton">
			<a href="/new-members.html">Join</a>
		</div>
		
		<div class="span6 bigbutton">
			<a href="https://oss.ticketmaster.com/html/home.htmI?l=EN&team=essendon" target="_blank">Renew</a>
		</div>	
	
</div>


<div class="row-fluid black">
		
			<div class="span4 member_news">
			
				<div class="paddleft">
					<h3>Member News</h3>
					<?=$member_news?>
				</div>
			
			</div>			
			
			<div class="span4 instagram">
				<div class="paddleft">					
					<div class="whateverittakes">
						<span>#whateverittakes</span><br />
						<a target="_blank" href="http://statigr.am/essendon_fc"><img src="/themes/<?=Configure::read('Core.Theme')?>/img/sm_instagram.png" alt="Instagram" /></a>
						<a target="_blank" href="https://www.facebook.com/Essendon"><img src="/themes/<?=Configure::read('Core.Theme')?>/img/sm_facebook.png" alt="Facebook" /></a>
						<a target="_blank" href="http://twitter.com/Essendon_FC"><img src="/themes/<?=Configure::read('Core.Theme')?>/img/sm_twitter.png" alt="Twitter" /></a>
					</div>		
				</div>
			</div>
			
			<div class="span4 member_login">
			<div class="paddleft">
				
			<h3>Update Your Details</h3>
			<h5>Log in to my Essendon FC account</h5>
			
			<form id="formLogin" accept-charset="utf-8" id="login_form" method="post" action="https://oss.ticketmaster.com/aps/essendon/EN/account/login">   
					<p><label for="login_id">Account ID or E-mail Address </label>
					<input type="text" tabindex="1" class="loginInput" value="" id="login_id" name="login_id"></p>
					
					<p><label for="password">Password </label>
					<input type="password" tabindex="2" class="loginInput" name="password" id="password" value=""></p>
					
					<p><input class="btn btn-inverse" type="submit" value="&nbsp;&nbsp;Log in&nbsp;&nbsp;">
					<a class="forgotPassword" class="fresco" href="<?=Configure::read('Ticketmaster.forget_password')?>">Forgot Your Password?</a></p>
			</form>
			</div>
			</div>

	</div>
	<script>
		
			// Document ready
			jQuery(document).ready(function() {
				$("img.button_renew, img.button_join").hover(
				  function () {
					     var src = $(this).attr("src").match(/[^\.]+/) + "-hover.png";
					     $(this).attr("src", src);
   					  }, 
				  function () {
				         var src = $(this).attr("src").replace("-hover.png", ".png");
				         $(this).attr("src", src);
				  }
				);
				
			}); 
		
		</script>

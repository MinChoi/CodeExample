


	<form accept-charset="utf-8" id="login_form" method="post" action="<?=Configure::read('Ticketmaster.login')?>"><table cellspacing="0" cellpadding="0" border="0" width="100%" class="loginTable">
        <tbody>
        	<tr>
            <td width="28%" class="text-right bld text11px"><label for="login_id">Account ID or E-mail Address</label></td>
                <td width="34%">
                    <input type="text" tabindex="1" class="loginInput" value="" id="login_id" name="login_id">
                </td>
                <td width="38%" class="loginButton" rowspan="2">
                    <a class="whiteText inline buttonalt" tabindex="3" onclick="document.forms.login_form.submit(); return false;" href="#">Continue</a>
                    <input type="submit" style="display: none;">
                </td>
            </tr>
            <tr>
                <td class="text-right bld text11px"><label for="password">Password</label></td>
                <td>
                    <input type="password" tabindex="2" class="loginInput" name="password" id="password" value="">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td class="loginForget">
                    <a class="no-link text11px" onclick="openPopupWithID('<?=Configure::read('Ticketmaster.forget_password')?>', 420 , 250, 100, 200, 'popUpforgotPassword');" href="javascript:void()" id="forgotPassword">Forgot Your Password?</a>
                </td>
                <td>&nbsp;</td>
            </tr>
        </tbody></table>
    </form>
    <script>
	function openPopupWithID(url, p_width, p_height, p_1, p_2, id){
		window.open(url,id,"menubar=1,resizable=1,width="+p_width+",height="+p_height);
		<?php //'https://oss.ticketmaster.com/html/forgotPassword.htmI?l=EN&amp;team=melbournefc&amp;AcctId=', 420 , 250, 100, 200, 'popUpforgotPassword'){ ?>
	}
    </script>
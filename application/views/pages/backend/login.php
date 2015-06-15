<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Halaman Login Portal ITS</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/backend/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="<?php echo base_url(); ?>js/jquery-1.7.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="<?php echo base_url(); ?>js/backend/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo base_url(); ?>js/backend/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
<script type="text/javascript">
function setFocus()
{
     document.getElementById("txtuser").focus();
}
</script>
</head>
<body id="login-bg" onload="setFocus()"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<div id="logo-its">
			<a href="<?php echo base_url(); ?>">
				<img src="<?php echo base_url(); ?>images/Logo-ITS.png" height="100" width="170" alt="ITS" />
			</a>
		</div>
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
		
	<!--  start login-inner -->
	<div id="login-inner">
		<div>
			<center id="error-message"><?php if(isset($message) and $message != null) { echo $message; } ?></center>
			<h2>Login form</h2>
		</div>
		<form method="post" action="<?php echo base_url(); ?>login">
			<table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<th>Username</th>
				<td><input type="text" value="type your username here" onblur="if (this.value=='') { this.value='type your username here'; }" onfocus="if (this.value=='type your username here') { this.value=''; }" placeholder="type your username here" class="login-inp" name="username" id="txtuser" /></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="password" value="type your password here" onblur="if (this.value=='') { this.value='type your password here'; }" onfocus="if (this.value=='type your password here') { this.value=''; }" placeholder="type your password here" class="login-inp" name="password" id="txtpass" /></td>
			</tr>
			<tr>
				<th></th>
				<td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" /><label for="login-check">Remember me</label></td>
			</tr>
			<tr>
				<th></th>
				<td><input type="submit" class="submit-login corner-all" /></td>
			</tr>
			</table>
		</form>
	</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
	<a href="" class="forgot-pwd">Forgot Password?</a>
 </div>
 <!--  end loginbox -->
 
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email address:</th>
			<td><input type="text" value=""   class="login-inp" /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="button" class="submit-login"  /></td>
		</tr>
		</table>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Back to login</a>
	</div>
	<!--  end forgotbox -->
</div>
<!-- End: login-holder -->
</body>
</html>
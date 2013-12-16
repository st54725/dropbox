<h1>Registration</h1>
<form  action="" method="post" id="login-form">
	<input class="name" value="Login" type="text">
	<input class="email" value="E-mail" type="text">
	<input class="realname" value="First Name, Last Name" type="text">
	<input class="pass" value="password" type="password">
	<button onclick="register()" class="register" type="button">Register</button>
</form>

<script type="text/javascript">
	function register(){
		var name = jQuery(".name").val();
		var realname = jQuery(".realname").val();
		var pass = jQuery(".pass").val();
		var email = jQuery(".email").val();
		jQuery.ajax({
			type: 'POST',
			dataType: 'json',
			url: 'http://zend2.localhost/registration/save/name/'+name+'/realname/'+realname+'/pass/'+pass+'/email/'+email,
			success:
					function(data) {

					}
		});
	}
</script>
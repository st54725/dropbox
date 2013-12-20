<div class="main home">
	<div class="left">
	</div>
	<div class="right">
		<div class="logo"></div>
		<div class="signup">
			<form id="signup" method="post" action="">
				<ul>
					<li>
						<input class="username" name="username" type="text" value="Username">
					</li>
					<li>
						<input class="email" name="email" type="text" value="Email">
					</li>
					<li>
						<input class="password" name="password" type="password" value="Password">
					</li>
				</ul>
			</form>
			<div onclick="register()" class="button signup"></div>
		</div>
		<div class="signin">
			<span>or <a href="#">Sign in</a></span>
		</div>
		<div class="login">
			<form method='post' action=''>
				<ul>
					<li>
						<input class="username" name="username" value="Username">
					</li>
					<li>
						<input type="password" class="password" name="password" value="Password">
					</li>
				</ul>
			</form>
			<div onclick="sign()" class="buttonsignin"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function register(){
		var username = $("#signup .username").val();
		var password = $("#signup .password").val();
		var email = $(".email").val();
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: 'http://dropbox.localhost/index/save/username/'+username+'/password/'+password+'/email/'+email,
			success:
				function(data) {
					window.location.reload(true);
					if (data == true) {
					}
				}
		});
		alert('User has been successfully created!')
	}
	function sign(){
		var username = $(".login .username").val();
		var password = $(".login .password").val();
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: 'http://dropbox.localhost/index/auth/username/'+username+'/password/'+password,
			success:
					function(data) {
					}
		});
		window.setTimeout('location.reload()', 1000);
	}
</script>
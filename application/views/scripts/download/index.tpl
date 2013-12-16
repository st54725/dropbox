<h1>Upload</h1>
<form  action="" method="post" id="login-form">
	<input class="filename" value="filename" type="text">
	<input class="size" value="size" type="text">

	<button onclick="upload()" class="register" type="button">upload</button>
</form>

<script type="text/javascript">
	function upload(){
		var filename = jQuery(".filename").val();
		var size = jQuery(".size").val();

		jQuery.ajax({
			type: 'POST',
			dataType: 'json',
			url: 'http://dropbox.localhost/download/upload/filename/'+filename+'/size/'+size,
			success:
					function(data) {

					}
		});
	}
</script>
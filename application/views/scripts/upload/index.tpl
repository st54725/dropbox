<div class="main home">
	<div class="logout" onclick="logout()" >Logout</div>
	<div class="left">
	</div>
	<div class="right">
		<div class="logo"></div>
		<div class="download">
			<h1>Your files:</h1>
			<table>
				<?php
				foreach($this->content as $file) {
				?>
				<tr>
					<td>
						<?php echo $file->filename; ?>
					</td>
					<td>
						<?php echo $file->size; ?>kb
					</td>
					<td>
						<a href="<?php echo $file->downloadlink ?>">Download<a/>
					</td>
				</tr>
			<?php } ?>

			</table>
			<?php if (count($this->content) == 0) {echo "<p>You have not uploaded files.</p>"; } ?>
		</div>
		<div class="upload">
			<h1>Upload</h1>
			<form action="http://dropbox.localhost/upload/upload/" method="post"
				  enctype="multipart/form-data">
				<label for="file">Filename:</label>
				<input type="file" name="file" id="file"><br>
				<input type="submit" name="submit" value="Upload">
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	function logout(){
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: 'http://dropbox.localhost/upload/logout/',
			success:
					function() {
					}
		});
		window.setTimeout('location.reload()', 1000);
	}
</script>
<div class="main home">
	<div class="left">
	</div>
	<div class="right">
		<div class="logo"></div>
		<h1><?php echo $this->content; ?></h1>
		<div onclick="back()" class="back">Back</div>
	</div>

</div>
<script type="text/javascript">
	function back(){
		window.location.replace("http://dropbox.localhost/upload/");
	}
</script>
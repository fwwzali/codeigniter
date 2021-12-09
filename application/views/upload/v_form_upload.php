<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form Upload</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
	<h3>Form Upload Foto/Gambar</h3>

	<button id="buka">Form Upload</button><br><br><br>
	<form action="<?php echo base_url().'upload/do_upload' ?>" method="POST" enctype = "multipart/form-data" class="formku">
		<h3>Ini Form untuk upload file gambar</h3>
		<input type="file" name="gambar">
		<br>
		<input type="submit" name="submit" value="UPLOAD">
	</form>
</body>
</html>

<style type="text/css">
	.formku{
		display: none;
	}
</style>

<script type="text/javascript">
	$('#buka').click(function(){
		$('.formku').toggle('fast');
	});
</script>
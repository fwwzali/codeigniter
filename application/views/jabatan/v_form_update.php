<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update Jabatan</title>
</head>
<body>
	<h3>Form Update Jabatan</h3>
	<form action="<?php echo base_url().'jabatan/update_jabatan'; ?>" method="POST">

		<?php foreach($jabatan as $update) : ?>


		Nama Jabatan : 
		<input type="text" name="nama_jabatan" value="<?php echo $update->nama_jabatan; ?>">	<input type="hidden" name="id_jabatan" value="<?php echo $update->id_jabatan; ?>">

		<?php endforeach; ?>
		<input type="submit" name="submit" value="UPDATE">
	</form>
</body>
</html>
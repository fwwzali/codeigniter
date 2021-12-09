<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tambah Jabatan</title>
</head>
<body>
	<h3>Form Tambah Jabatan</h3>

	<!-- untuk menampilkan error ketika form di submit -->
	<?php echo validation_errors(); ?>

	<form action="<?php echo base_url()."jabatan/insert_jabatan"; ?>" method="POST">
		Nama Jabatan : 
		<input type="text" name="nama_jabatan" >
		<input type="submit" name="submi" value="submit">
	</form>
</body>
</html>
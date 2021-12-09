<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $nama; ?></title>
</head>
<body>
	<h1>Selamat Datang <?php echo $nama; ?></h1>
	<h3>Sugeng Rawuh, dari <?php echo $asal; ?></h3>
	<h3>Umur : <?php echo (2021-$thn_lahir); ?></h3>
	<h3>Welcome!</h3>
	<p>
		<?php echo "nama saya adalah $nama yang berasal dari kota $asal. saya disini untuk belajar framework CodeIgniter versi 3 di Inixindo Surabaya"; ?>
	</p>
	<?php echo anchor('home/biodata2','halaman selanjutnya'); ?>

	<a href="<?php echo base_url() ?>home/biodata2">halaman selanjutnya</a>

</body>
</html>
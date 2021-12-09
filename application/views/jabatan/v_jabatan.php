<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
</head>
<body>

	<h3><?php echo $title; ?></h3>
	<?php echo $this->session->flashdata('msg'); ?>
	<p>data terakhir masuk : <?php echo $this->session->userdata("jabatan_terakhir"); ?></p>
	<a href="<?php echo base_url()."jabatan/add_jabatan" ?>">Tambah Jabatan</a>
	<table>
		<thead>
			<tr>
				<th>Nama Jabatan</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<!-- data dari database -->
			<?php foreach ($jabatan as $item) : ?>
			<tr>
				<td><?php echo $item->nama_jabatan; ?></td>
				<td>
					<a href="<?php echo base_url().'jabatan/form_update/'.$item->id_jabatan ?>">UPDATE</a>
					<a href="<?php echo base_url().'jabatan/delete/'.$item->id_jabatan ?>">DELETE</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php echo $this->pagination->create_links(); ?>

</body>
</html>


<style type="text/css">
	.success{
		color: green;
	}
	.error{
		color: red;
	}
</style>
<?php 
	$this->load->view('template/header');
	$this->load->view('template/sidebar');
 ?>

	<h3>Update Jabatan</h3>

	<!-- untuk menampilkan error ketika form di submit -->
	<?php echo validation_errors(); ?>

	<form action="<?php echo base_url()."jabatan/update_jabatan"; ?>" method="POST">

		<?php foreach($jabatan as $update) : ?>
		<input type="hidden" name="id_jabatan" value="<?php echo $update->id_jabatan; ?>">
		<div class="mb-3">
		  <label class="form-label">Nama Jabatan :</label>
		  <input type="text" class="form-control" name="nama_jabatan" value="<?php echo $update->nama_jabatan; ?>">
		</div>

		<?php endforeach; ?>
		<button type="submit" class="btn btn-warning"> Simpan Data</button>
	</form>

<!-- end kode view -->
 <?php 
 	$this->load->view('template/footer')
  ?>

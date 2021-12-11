<?php 
	$this->load->view('template/header');
	$this->load->view('template/sidebar');
 ?>

	<h3>Form Tambah Jabatan</h3>

	<!-- untuk menampilkan error ketika form di submit -->
	<?php echo validation_errors(); ?>

	<form action="<?php echo base_url()."jabatan/insert_jabatan"; ?>" method="POST">
		<div class="mb-3">
		  <label class="form-label">Nama Jabatan :</label>
		  <input type="text" class="form-control" name="nama_jabatan">
		</div>
		<button type="submit" class="btn btn-success"> Simpan Data</button>
	</form>

<!-- end kode view -->
 <?php 
 	$this->load->view('template/footer')
  ?>

<?php 
	$this->load->view('template/header');
	$this->load->view('template/sidebar');
 ?>

<!-- isi kode view -->
<h3><?php echo $title; ?></h3>
<form action="<?php echo base_url().'karyawan/add' ?>" method="POST">
	<div class="mb-3">
	  <label class="form-label">Nama</label>
	  <input type="text" class="form-control" name="nama">
	</div>

	<div class="mb-3">
	  <label class="form-label">Alamat</label>
	  <input type="text" class="form-control" name="alamat">
	</div>

	<div class="mb-3">
	  <label class="form-label">Jabatan</label>
	  <select class="form-select" name="id_jabatan">
		  <option selected>-- pilih jabatan --</option>
		  <?php foreach ($jabatan as $item) : ?>
		  		<option value="<?php echo $item->id_jabatan ?>">
		  			<?php echo $item->nama_jabatan; ?>	
		  		</option>
		  <?php endforeach; ?>
	   </select>
	</div>

	<div class="mb-3">
	  <label class="form-label">Username</label>
	  <input type="text" class="form-control" name="username">
	</div>

	<div class="mb-3">
	  <label class="form-label">Password</label>
	  <input type="text" class="form-control" name="password">
	</div>

	<div class="mb-3">
	  <label class="form-label">TMT</label>
	  <input type="text" class="form-control" name="hire_date">
	</div>
	
	<button type="submit" class="btn btn-success"> Simpan Data</button>
</form>


<!-- end kode view -->
 <?php 
 	$this->load->view('template/footer')
  ?>
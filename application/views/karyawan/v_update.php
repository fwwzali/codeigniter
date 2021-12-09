<?php 
	$this->load->view('template/header');
	$this->load->view('template/sidebar');
 ?>

<!-- isi kode view -->
<h3><?php echo $title; ?></h3>
<form action="<?php echo base_url().'karyawan/update' ?>" method="POST">

	<?php foreach ($karyawan as $emp) : ?>

	<div class="mb-3">
	  <label class="form-label">Nama</label>
	  <input type="text" class="form-control" name="nama" value="<?php echo $emp->nama; ?>">
	</div>

	<div class="mb-3">
	  <label class="form-label">Alamat</label>
	  <input type="text" class="form-control" name="alamat" value="<?php echo $emp->alamat; ?>">
	</div>

	<div class="mb-3">
	  <label class="form-label">Jabatan</label>
	  <select class="form-select" name="id_jabatan">
		  <option>-- pilih jabatan --</option>
		  <?php foreach ($jabatan as $item) : ?>
		  		<option 
		  		<?php echo $emp->id_jabatan == $item->id_jabatan ? 'selected ' : '' ?> 
		  		value="<?php echo $item->id_jabatan ?>">
		  			<?php echo $item->nama_jabatan; ?>	
		  		</option>
		  <?php endforeach; ?>
	   </select>
	</div>

	<div class="mb-3">
	  <label class="form-label">Username</label>
	  <input type="text" class="form-control" name="username" value="<?php echo $emp->username; ?>">
	</div>

	<div class="mb-3">
	  <label class="form-label">Password</label>
	  <input type="text" class="form-control" name="password" value="<?php echo $emp->password; ?>">
	</div>

	<div class="mb-3">
	  <label class="form-label">TMT</label>
	  <input type="text" class="form-control" name="hire_date" value="<?php echo $emp->hire_date; ?>">
	</div>
	<?php endforeach; ?>
	<button type="submit" class="btn btn-danger"> Update Data</button>
</form>


<!-- end kode view -->
 <?php 
 	$this->load->view('template/footer')
  ?>
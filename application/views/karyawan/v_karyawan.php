<?php 
	$this->load->view('template/header');
	$this->load->view('template/sidebar');
 ?>

<!-- isi kode view -->

<h2><?php echo $title; ?></h2> 
<a href="<?php echo base_url() ?>karyawan/add" type="button" class="btn btn-primary">+ Tambah Karyawan</a>

<!-- untuk menampilkan pesan sukses/gagal ketika proses input/update/delete -->
<?php echo $this->session->flashdata('msg'); ?>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">TMT</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($karyawan as $item) : ?>
    <tr>
      <th scope="row"><?php echo $item->id_karyawan; ?></th>
      <td><?php echo $item->nama; ?></td>
      <td><?php echo $item->alamat; ?></td>
      <td><?php echo $item->nama_jabatan; ?></td>
      <td><?php echo $item->username; ?></td>
      <td><?php echo $item->password; ?></td>
      <td><?php echo $item->hire_date; ?></td>
      <td>
      	<a href="<?php echo base_url().'karyawan/update/'.$item->id_karyawan; ?>" class="btn btn-warning">Update</a>
      </td>
    </tr>
	<?php endforeach; ?>
  </tbody>
</table>

<?php echo $this->pagination->create_links(); ?>
<!-- end kode view -->
 <?php 
 	$this->load->view('template/footer')
  ?>
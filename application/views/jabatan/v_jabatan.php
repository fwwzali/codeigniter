<?php 
	$this->load->view('template/header');
	$this->load->view('template/sidebar');
 ?>

	<?php echo $this->session->flashdata('msg'); ?>

	<h2><?php echo $title; ?></h2>

	<div class="alert alert-secondary col-6" role="alert">
	  <p><b>Data terakhir masuk : </b><?php echo $this->session->userdata("jabatan_terakhir"); ?></p>
	</div>

	
	<a href="<?php echo base_url()."jabatan/add_jabatan" ?>" type="button" class="btn btn-primary float-end">+ Tambah Jabatan</a>


	<table class="table">
		<thead>
			<tr>
				<th scope="col">Nama Jabatan</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<!-- data dari database -->
			<?php foreach ($jabatan as $item) : ?>
			<tr>
				<td><?php echo $item->nama_jabatan; ?></td>
				<td>
					<a href="<?php echo base_url().'jabatan/form_update/'.$item->id_jabatan ?>" class="btn btn-warning">UPDATE</a>
					<a href="<?php echo base_url().'jabatan/delete/'.$item->id_jabatan ?>" class="btn btn-danger">DELETE</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php echo $this->pagination->create_links(); ?>




 <?php 
 	$this->load->view('template/footer')
  ?>
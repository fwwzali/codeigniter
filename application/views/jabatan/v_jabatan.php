<?php 
	$this->load->view('template/header');
	$this->load->view('template/sidebar');
 ?>


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



<style type="text/css">
	.success{
		color: green;
	}
	.error{
		color: red;
	}
</style>

 <?php 
 	$this->load->view('template/footer')
  ?>
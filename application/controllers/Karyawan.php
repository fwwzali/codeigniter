<?php 

/**
 * Controller Karyawan
 */
class Karyawan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_karyawan','dbkaryawan');
		$this->load->model('m_jabatan','dbjabatan');
	}

	function index()
	{
		//ambil data total row untuk data karyawan
		$total_data = $this->dbkaryawan->get_total();
		//konfigurasi paginasi page
		$this->load->library('pagination');
		$config['base_url'] 	= base_url().'karyawan/index/';
		$config['total_rows'] 	= $total_data[0]->total;
		$config['per_page'] 	= 5; 

		$this->pagination->initialize($config);

		$offset = $this->uri->segment(3);

		if ($offset == null) {
			$offset = 0;
		}

		$data['title'] 		= "Manajemen Karyawan";
		$data['karyawan'] 	= $this->dbkaryawan->get_karyawan($offset,$config['per_page']);
		$this->load->view("karyawan/v_karyawan",$data);
	}

	//fungsi add data karyawan
	function add()
	{
		if ($this->input->post()) {
			$data = $this->input->post();
			$this->dbkaryawan->insert_karyawan($data);
			redirect("karyawan/index");
		}
		else{
			//tampilkan from untuk tambah data
			$data['title'] = "Form tambah Data Karyawan";
			$data['jabatan'] = $this->dbjabatan->get_jabatan_all();
			$this->load->view("karyawan/v_form",$data);
		}
	}

	//proses update
	function update($id_karyawan = null)
	{
		if ($this->input->post()) {
			//proses update data
			$data_in = $this->input->post();
			$this->dbkaryawan->update_karyawan($data_in);
			redirect('karyawan/index');
		}
		else{
			//load form update
			$data['title'] = "Form Update Data Karyawan";
			$data['jabatan'] = $this->dbjabatan->get_jabatan_all();
			$data['karyawan'] = $this->dbkaryawan->get_one($id_karyawan);
			$this->load->view("karyawan/v_update",$data);
		}
	}




}
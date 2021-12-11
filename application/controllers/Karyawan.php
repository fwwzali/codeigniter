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

		//cek login
		if ($this->session->userdata('user')==null) {
			redirect('login');
		}
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

		//konfigurasi untuk tampilan link
		$config['full_tag_open'] = '<nav><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');
		$config['first_link'] = 'awal';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'akhir';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'selanjutnya';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'sebelumnya';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';



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
			$res = $this->dbkaryawan->insert_karyawan($data);
			//isi pesan
			if ($res > 0) {
				$this->session->set_flashdata('msg',success_msg("data berhasil disimpan"));
			}
			else{
				$this->session->set_flashdata('msg',error_msg("data gagal disimpan"));
			}
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

	function delete($id_karyawan)
	{
		$res = $this->dbkaryawan->delete_karyawan($id_karyawan);
		//isi pesan
		if ($res > 0) {
			$this->session->set_flashdata('msg',success_msg("data berhasil dihapus"));
		}
		else{
			$this->session->set_flashdata('msg',error_msg("data gagal dihapus"));
		}
		redirect('karyawan/index');
	}




}
<?php 

/**
 * Controller Jabatan
 * fungsi: logic manajemen data jabatan
 */

class Jabatan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_jabatan','jabatandb');
		$this->load->helper('form');
		$this->load->library('form_validation');

	}

	//menampilkan data jabatan
	function index()
	{
		//mengambil data total dari tabel jabatan
		$total_data = $this->jabatandb->get_count_data();

		//konfigurasi paginasi page
		$this->load->library('pagination');
		$config['base_url'] 	= base_url().'jabatan/index/';
		$config['total_rows'] 	= $total_data[0]->total;
		$config['per_page'] 	= 5; 

		$this->pagination->initialize($config);

		$offset = $this->uri->segment(3);
		if ($offset == null) {
			$offset = 0;
		}

		$data['title']   = "Jabatan";
		$data['jabatan'] = $this->jabatandb->get_jabatan($offset, $config['per_page']);

		$this->load->view('jabatan/v_jabatan',$data);
	}

	function add_jabatan()
	{
		$this->load->view('jabatan/v_add_jabatan');
	}

	function insert_jabatan()
	{
		$this->form_validation->set_rules('nama_jabatan',"Nama Jabatan",'required');
		
		if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('jabatan/v_add_jabatan');
        }
        else
        {
            $data = $this->input->post();
			$res = $this->jabatandb->insert_data($data);
			
			if ($res > 0) {
				$this->session->set_flashdata('msg',success_msg("data berhasil disimpan"));
			}
			else{
				$this->session->set_flashdata('msg',error_msg("data gagal disimpan"));
			}
            redirect('jabatan/index');
        }
	}

	//update
	//untuk menampilkan form dan data yg akan diedit
	function form_update($id_jabatan)
	{
		$data['jabatan'] = $this->jabatandb->get_jabatan_spec($id_jabatan);
		$this->load->view('jabatan/v_form_update',$data);
	}

	//untuk proses update ke database
	function update_jabatan()
	{
		$data = $this->input->post();
		$res = $this->jabatandb->update_jabatan($data);
		if ($res > 0) {
			$this->session->set_flashdata('msg',success_msg("data berhasil di-update"));
		}
		else{
			$this->session->set_flashdata('msg',error_msg("data gagal di-update"));
		}
		redirect('jabatan/index');
	}

	///PROSESS DELETE
	function delete($id_jabatan)
	{
		$res = $this->jabatandb->delete_jabatan($id_jabatan);
		if ($res > 0) {
			$this->session->set_flashdata('msg',success_msg("data berhasil di delete"));
		}
		else{
			$this->session->set_flashdata('msg',error_msg("data gagal dis impan"));
		}
		redirect('jabatan/index');
	}
}


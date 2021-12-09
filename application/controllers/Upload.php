<?php 

/**
 * percobaan upload class
 */
class Upload extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	function index(){
		$this->load->view('upload/v_form_upload');
	}

	function do_upload()
	{
		//konfigurasi library upload file
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] =  '2000';

		//prosess load library
		$this->load->library('upload',$config);

		//prosess upload file ke server
		if (! $this->upload->do_upload('gambar')) {
			$err = array('error'=>$this->upload->display_errors());
			$this->load->view('upload/v_upload', $err);
		}
		else{
			echo "data sukses";
		}
	}
}
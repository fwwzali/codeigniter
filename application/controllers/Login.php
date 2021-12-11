<?php 

/**
 * login controller
 */
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login','dblogin');
	}

	function index()
	{
		$this->load->view('v_login');
	}

	function do_auth()
	{
		$data = $this->input->post();
		$check = $this->dblogin->check_login($data);
		
		if ($check > 0) {
			//proses masukan data ke session
			//redirect ke home
			$data_session = array(
				"username" => $username,
			);
			$this->session->set_userdata('user',$data_session);
			redirect("karyawan");
		}
		else{
			$this->session->set_flashdata('msg',error_msg('username dan password tidak sesuai'));
			redirect("login");
		}
	}

	function log_out()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
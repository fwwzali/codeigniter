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
	}
}
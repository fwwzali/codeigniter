<?php 

/**
 * 
 */
class M_login extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function check_login($data)
	{
		//cek apakah data username dan password itu sama
		$sql = "SELECT * FROM karyawan
				WHERE username = ? AND password = md5(?)";
		$res = $this->db->query($sql,array($data['username'],$data['password']));
		return $res->num_rows();

	}
}
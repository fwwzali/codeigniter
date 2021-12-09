<?php 

/**
 * Model Karyawan
 */
class M_karyawan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	//mengambil data karyawan dengan paginasi
	//offset = data mulai diambil
	//limit = jumlah data yg diambil
	function get_karyawan($offset, $limit)
	{
		$sql = "SELECT k.*, j.nama_jabatan
				FROM karyawan k, jabatan j
				WHERE k.id_jabatan = j.id_jabatan
				limit ?,?";
		$result = $this->db->query($sql, array((int)$offset, $limit));
		return $result->result();
	}

	function get_total()
	{
		return $this->db->query("SELECT count(*) total FROM karyawan")->result();
	}

	function insert_karyawan($data)
	{
		$data_in = array(
			"nama" => $data['nama'],
			"alamat" => $data['alamat'],
			"id_jabatan" => $data['id_jabatan'],
			"username" => $data['username'],
			"password" => md5($data['password']),
			"hire_date" => $data['hire_date'],
		);
		$this->db->insert('karyawan',$data_in);
	}

	//mengambil data satu karyawan sesuai dengan id_karyawan
	function get_one($id_karyawan)
	{
		$this->db->where('id_karyawan',$id_karyawan);
		return $this->db->get('karyawan')->result();
	}

	function update_karyawan($data)
	{
		$data_in = array(
			"nama" => $data['nama'],
			"alamat" => $data['alamat'],
			"id_jabatan" => $data['id_jabatan'],
			"username" => $data['username'],
			"password" => md5($data['password']),
			"hire_date" => $data['hire_date'],
		);
		$this->db->where('id_karyawan',$data['id_karyawan']);
		$this->db->update('karyawan',$data_in);
	}
}
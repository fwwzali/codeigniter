<?php 

/**
 * Model Jabatan
 */
class M_jabatan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	//READ
	//ambil data jabatan dari DB
	function get_jabatan($offset, $limit)
	{
		//query SQL
		$off = (int) $offset; //merubah tipe data string ke integer
		$query 	= "SELECT * FROM jabatan LIMIT ?,?";
		$result = $this->db->query($query, array($off, $limit));
		//return data
		return $result->result();
	}

	function get_jabatan_all()
	{
		return $this->db->get('jabatan')->result();
	}

	//INSERT data
	function insert_data($data)
	{
		$data_in = array(
					"nama_jabatan" => $data['nama_jabatan']
				);
		$this->db->insert('jabatan',$data_in);

		//proses masuk session
		$data_session = array("jabatan_terakhir"=>$data['nama_jabatan']);
		$this->session->set_userdata($data_session);

		return $this->db->affected_rows();
	}

	//update
	//mengambil data yg akan diupdate
	function get_jabatan_spec($id_jabatan)
	{
		$this->db->where('id_jabatan',$id_jabatan);
		$update_data = $this->db->get('jabatan');
		return $update_data->result();
	}

	//melakukan proses update
	function update_jabatan($data)
	{
		$sql = "UPDATE jabatan SET nama_jabatan = ?
				WHERE id_jabatan = ?";
		$this->db->query($sql, array($data['nama_jabatan'], $data['id_jabatan']));
		return $this->db->affected_rows();
	}

	function delete_jabatan($id_jabatan)
	{
		$this->db->delete('jabatan', array('id_jabatan' => $id_jabatan));
		return $this->db->affected_rows();
	}

	function get_count_data()
	{
		$sql = "SELECT COUNT(*) as total FROM jabatan";
		return $this->db->query($sql)->result();
	}
}
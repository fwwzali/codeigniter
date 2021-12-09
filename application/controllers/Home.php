<?php 

/**
 * Controller Home
 */
class Home extends CI_Controller
{
	public function index()
	{
		$data['nama'] = "Fawwaz A Akbar";
		$data['asal'] = "Sidoarjo";
		$data['thn_lahir'] = 2000;

		$this->load->view('v_home',$data);
	}

	public function biodata($nama,$job)
	{
		echo "nama : $nama<br>";
		echo "job today : $job";
	}

	public function biodata2()
	{
		echo "nama : fawwaz<br>";
		echo "job today : inixindo";
	}
}
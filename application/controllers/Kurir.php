<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//model
		$this->load->model('login_model');
		
		//variabel 
		$this->data['nama'] = 'PT AAA';
		$this->data['sidebar'] = 'kurir';
	}

	public function index()
	{
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		$this->load->view('kurir_view',$data);
	}

	public function add()
	{
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		$this->load->view('kurir_add',$data);
	}

	public function add_go()
	{
		$data = array(
			'k1' => $this->input->post('k1'),
			'k2' => $this->input->post('k2')		
		);
	
		$this->db->insert('kuesioner', $data);
	

		//redirect
		echo '<script>alert("Data berhasil Diinput!")</script>';
		redirect('/alumni/crud_kuesioner', 'refresh'); //redir		
		var_dump($_POST);
	}
}

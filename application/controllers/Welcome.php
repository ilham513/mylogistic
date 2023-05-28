<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//model
		$this->load->model('crud_model');
		
		//variabel 
		$this->data['nama'] = 'PT AAA';
	}

	public function index()
	{
		$data['nama'] = 'PT AAA';
		
		$this->load->view('homepage',$data);
	}

	public function lacak()
	{
		$data['nama'] = 'PT AAA';
		
		$id_pengiriman = substr($this->input->get('resi_pengiriman'),10);
				
		$data['array_pengiriman'] = $this->crud_model->mengambil_data_join_id('pengiriman','id_pengiriman',$id_pengiriman);

		// var_dump($data);die();
		
		$this->load->view('lacak',$data);
	}
}

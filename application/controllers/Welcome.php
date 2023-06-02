<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//model
		$this->load->model('crud_model');
		
		//variabel 
		$this->data['nama'] = 'PT FESA ANTARAN LOGISTIK';
	}

	public function index()
	{
		//variabel nama
		$data['nama'] = $this->data['nama'];
		
		//tampilkan view
		$this->load->view('homepage',$data);
	}

	public function lacak()
	{
		//variabel lama
		$data['nama'] = $this->data['nama'];
		
		//saring id pengiriman
		$id_pengiriman = substr($this->input->get('resi_pengiriman'),10);
			
		//tampilkan pengiriman
		$data['array_pengiriman'] = $this->crud_model->mengambil_data_join_id('pengiriman','id_pengiriman',$id_pengiriman);

		// var_dump($data);die();
		
		//tampilkan view
		$this->load->view('lacak',$data);
	}
}

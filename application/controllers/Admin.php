<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		//varibel nama
		$data['nama'] = 'PT FESA ANTARAN LOGISTIK';
		$data['sidebar'] = 'dashboard';
		
		//load model login
		$this->load->model('login_model');
		
		//cek session
		$this->login_model->mengecek_session();
		
		//tampilkan view
		$this->load->view('dashboard',$data);
	}
}

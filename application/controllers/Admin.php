<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$data['nama'] = 'PT AAA';
		$data['sidebar'] = 'dashboard';
		
		$this->load->model('login_model');
		
		$this->login_model->mengecek_session();
		
		$this->load->view('dashboard',$data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login_go()
	{		
		$id = $this->input->post('id');
		$password = md5($this->input->post('password')); //enkripsi md5
		
		//cek akun
		$this->login_model->cek_akun($id, $password);
	}
}

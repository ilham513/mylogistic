<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$data['nama'] = 'PT AAA';
		$data['sidebar'] = 'dashboard';
		
		$this->load->view('dashboard',$data);
	}
}

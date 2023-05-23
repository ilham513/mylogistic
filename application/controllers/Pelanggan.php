<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//model
		$this->load->model('login_model');
		$this->load->model('crud_model');
		
		//variabel 
		$this->data['nama'] = 'PT AAA';
		$this->data['sidebar'] = 'pelanggan';
	}

	public function index()
	{
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data
		$data['array_pelanggan'] = $this->crud_model->mengambil_data('pelanggan');
		
		$this->load->view('pelanggan_view',$data);
	}

	public function add()
	{
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		$this->load->view('pelanggan_add',$data);
	}

	public function add_go()
	{
		// var_dump($_POST);die();
		
		$data = array(
			'nama_pelanggan' => $this->input->post('nama_pelanggan'),
			'alamat' => $this->input->post('alamat'),
			'no_telpon' => $this->input->post('no_telpon')		
		);

		$this->crud_model->masukan_data('pelanggan', $data);
	}
	
	public function edit($id)
	{
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		$data['array_pelanggan'] = $this->crud_model->mengambil_data_id('pelanggan','id_pelanggan',$id);
		$data['obj_pelanggan'] = $data['array_pelanggan'][0];
		
		$this->load->view('pelanggan_edit',$data);
	}

	public function edit_go()
	{
		$data = array(
			'nama_pelanggan' => $this->input->post('nama_pelanggan'),		
			'alamat' => $this->input->post('alamat'),		
			'no_telpon' => $this->input->post('no_telpon')		
		);

		$this->crud_model->mengubah_data_id('pelanggan', $data,'id_pelanggan',$this->input->post('id_pelanggan'));
		var_dump($_POST);
	}

	public function hapus($id)
	{
		$this->crud_model->menghapus_data_id('pelanggan','id_pelanggan',$id);
		var_dump($_POST);
	}

}

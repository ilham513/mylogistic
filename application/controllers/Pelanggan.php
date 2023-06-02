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
		$this->data['nama'] = 'PT FESA ANTARAN LOGISTIK';
		$this->data['sidebar'] = 'pelanggan';
		
		//cek session
		$this->login_model->mengecek_session();
	}

	public function index()
	{
		//variabel nama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data
		$data['array_pelanggan'] = $this->crud_model->mengambil_data('pelanggan');
		
		//tampilkan view
		$this->load->view('pelanggan_view',$data);
	}

	public function add()
	{
		//variabel nama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//tampilkan data
		$this->load->view('pelanggan_add',$data);
	}

	public function add_go()
	{
		// var_dump($_POST);die();
		
		//data yang akan ditambahkan
		$data = array(
			'nama_pelanggan' => $this->input->post('nama_pelanggan'),
			'alamat' => $this->input->post('alamat'),
			'no_telpon' => $this->input->post('no_telpon')		
		);

		//tampilkan view
		$this->crud_model->masukan_data('pelanggan', $data);
	}
	
	public function edit($id)
	{
		//variabel nama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//abil data-data
		$data['array_pelanggan'] = $this->crud_model->mengambil_data_id('pelanggan','id_pelanggan',$id);
		$data['obj_pelanggan'] = $data['array_pelanggan'][0];
		
		//tampilkan view
		$this->load->view('pelanggan_edit',$data);
	}

	public function edit_go()
	{
		//variabel data
		$data = array(
			'nama_pelanggan' => $this->input->post('nama_pelanggan'),		
			'alamat' => $this->input->post('alamat'),		
			'no_telpon' => $this->input->post('no_telpon')		
		);

		//mengubah data
		$this->crud_model->mengubah_data_id('pelanggan', $data,'id_pelanggan',$this->input->post('id_pelanggan'));
		var_dump($_POST);
	}

	public function hapus($id)
	{
		//model untuk menghapus data
		$this->crud_model->menghapus_data_id('pelanggan','id_pelanggan',$id);
		var_dump($_POST);
	}

}

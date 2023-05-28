<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//model
		$this->load->model('login_model');
		$this->load->model('crud_model');
		
		//variabel 
		$this->data['nama'] = 'PT AAA';
		$this->data['sidebar'] = 'kurir';
		
		$this->login_model->mengecek_session();
	}

	public function index()
	{
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data
		$data['array_kurir'] = $this->crud_model->mengambil_data('kurir');
		
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
			'nama_kurir' => $this->input->post('nama_kurir'),		
			'merek_kendaraan' => $this->input->post('merek_kendaraan'),		
			'no_telpon' => $this->input->post('no_telpon')		
		);

		$this->crud_model->masukan_data('kurir',$data);
	}
	
	public function edit($id)
	{
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		$data['array_kurir'] = $this->crud_model->mengambil_data_id('kurir','id_kurir',$id);
		$data['obj_kurir'] = $data['array_kurir'][0];
		// var_dump($data['obj_kurir']);die();
		
		$this->load->view('kurir_edit',$data);
	}

	public function edit_go()
	{
		$data = array(
			'nama_kurir' => $this->input->post('nama_kurir'),		
			'merek_kendaraan' => $this->input->post('merek_kendaraan'),		
			'no_telpon' => $this->input->post('no_telpon')		
		);

		$this->crud_model->mengubah_data_id('kurir', $data,'id_kurir',$this->input->post('id_kurir'));
		var_dump($_POST);
	}

	public function hapus($id)
	{
		$this->crud_model->menghapus_data_id('kurir','id_kurir',$id);
		var_dump($_POST);
	}

}

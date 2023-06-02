<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model login, crud
		$this->load->model('login_model');
		$this->load->model('crud_model');
		
		//variabel nama
		$this->data['nama'] = 'PT FESA ANTARAN LOGISTIK';
		$this->data['sidebar'] = 'kurir';
		
		//cek session
		$this->login_model->mengecek_session();
	}

	public function index()
	{
		//varibel nama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data
		$data['array_kurir'] = $this->crud_model->mengambil_data('kurir');
		
		//tampilkan view
		$this->load->view('kurir_view',$data);
	}

	public function add()
	{
		//varibel nama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//tampilkan view
		$this->load->view('kurir_add',$data);
	}

	public function add_go()
	{
		//varibel data kurir
		$data = array(
			'nama_kurir' => $this->input->post('nama_kurir'),		
			'merek_kendaraan' => $this->input->post('merek_kendaraan'),		
			'no_telpon' => $this->input->post('no_telpon')		
		);
		
		//input data kurir
		$this->crud_model->masukan_data('kurir',$data);
	}
	
	public function edit($id)
	{
		//variabel nama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data kurir
		$data['array_kurir'] = $this->crud_model->mengambil_data_id('kurir','id_kurir',$id);
		$data['obj_kurir'] = $data['array_kurir'][0];
		// var_dump($data['obj_kurir']);die();
		
		//tampilkan view
		$this->load->view('kurir_edit',$data);
	}

	public function edit_go()
	{
		//varibel data edit
		$data = array(
			'nama_kurir' => $this->input->post('nama_kurir'),		
			'merek_kendaraan' => $this->input->post('merek_kendaraan'),		
			'no_telpon' => $this->input->post('no_telpon')		
		);

		//ubah data model
		$this->crud_model->mengubah_data_id('kurir', $data,'id_kurir',$this->input->post('id_kurir'));
		var_dump($_POST);
	}

	public function hapus($id)
	{
		//menghapus data model
		$this->crud_model->menghapus_data_id('kurir','id_kurir',$id);
		var_dump($_POST);
	}

}

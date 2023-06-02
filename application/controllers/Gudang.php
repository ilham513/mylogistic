<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model login, crud
		$this->load->model('login_model');
		$this->load->model('crud_model');
		
		//variabel nama
		$this->data['nama'] = 'PT FESA ANTARAN LOGISTIK';
		$this->data['sidebar'] = 'gudang';
		
		//cek session
		$this->login_model->mengecek_session();
	}

	public function index()
	{
		//variabel lama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data
		$data['array_gudang'] = $this->crud_model->mengambil_data('gudang');
		
		//tampilkan view
		$this->load->view('gudang_view',$data);
	}

	public function add()
	{
		//variabel nama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//tampilkan view
		$this->load->view('gudang_add',$data);
	}

	public function add_go()
	{
		// var_dump($_POST);die();
		
		//variabel data
		$data = array(
			'lokasi_gudang' => $this->input->post('lokasi_gudang'),
			'no_telpon' => $this->input->post('no_telpon')		
		);
		
		//tampilkan view
		$this->crud_model->masukan_data('gudang', $data);
	}
	
	public function edit($id)
	{
		//variabel nama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//load model crud
		$data['array_gudang'] = $this->crud_model->mengambil_data_id('gudang','id_gudang',$id);
		$data['obj_gudang'] = $data['array_gudang'][0];
		
		//tampilkan view
		$this->load->view('gudang_edit',$data);
	}

	public function edit_go()
	{
		//varibel data edit
		$data = array(
			'lokasi_gudang' => $this->input->post('lokasi_gudang'),		
			'no_telpon' => $this->input->post('no_telpon')		
		);

		//load model mengubah data
		$this->crud_model->mengubah_data_id('gudang', $data,'id_gudang',$this->input->post('id_gudang'));
		var_dump($_POST);
	}

	public function hapus($id)
	{
		//load model hapus data
		$this->crud_model->menghapus_data_id('gudang','id_gudang',$id);
		var_dump($_POST);
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//model
		$this->load->model('login_model');
		$this->load->model('crud_model');
		
		//variabel 
		$this->data['nama'] = 'PT AAA';
		$this->data['sidebar'] = 'gudang';
	}

	public function index()
	{
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data
		$data['array_gudang'] = $this->crud_model->mengambil_data('gudang');
		
		$this->load->view('gudang_view',$data);
	}

	public function add()
	{
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		$this->load->view('gudang_add',$data);
	}

	public function add_go()
	{
		// var_dump($_POST);die();
		
		$data = array(
			'lokasi_gudang' => $this->input->post('lokasi_gudang'),
			'no_telpon' => $this->input->post('no_telpon')		
		);

		$this->crud_model->masukan_data('gudang', $data);
	}
	
	public function edit($id)
	{
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		$data['array_gudang'] = $this->crud_model->mengambil_data_id('gudang','id_gudang',$id);
		$data['obj_gudang'] = $data['array_gudang'][0];
		
		$this->load->view('gudang_edit',$data);
	}

	public function edit_go()
	{
		$this->crud_model->mengubah_data_id('kurir','id_kurir',$this->input->post('id_kurir'));
		var_dump($_POST);
	}

	public function hapus($id)
	{
		$this->crud_model->menghapus_data_id('kurir','id_kurir',$id);
		var_dump($_POST);
	}

}

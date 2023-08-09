<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model login, crud
		$this->load->model('login_model');
		$this->load->model('crud_model');
		
		//variabel nama
		$this->data['nama'] = 'PT FESA ANTARAN LOGISTIK';
		$this->data['sidebar'] = 'barang';
		
		//cek session
		$this->login_model->mengecek_session();
	}

	public function index()
	{
		//varibel nama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data
		$data['array_barang'] = $this->crud_model->mengambil_data('barang');
		
		//tampilkan view
		$this->load->view('barang_view',$data);
	}

	public function add()
	{
		//varibel nama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//tampilkan view
		$this->load->view('barang_add',$data);
	}

	public function add_go()
	{
		//varibel data barang
		$data = array(
			'nama_barang' => $this->input->post('nama_barang'),		
			'jenis_barang' => $this->input->post('jenis_barang')
		);
		
		//input data barang
		$this->crud_model->masukan_data('barang',$data);
	}
	
	public function edit($id)
	{
		//variabel nama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data kurir
		$data['array_barang'] = $this->crud_model->mengambil_data_id('barang','id_barang',$id);
		$data['obj_barang'] = $data['array_barang'][0];
		
		//tampilkan view
		$this->load->view('barang_edit',$data);
	}

	public function edit_go()
	{
		//varibel data edit
		$data = array(
			'nama_barang' => $this->input->post('nama_barang'),		
			'jenis_barang' => $this->input->post('jenis_barang')
		);

		//ubah data model
		$this->crud_model->mengubah_data_id('barang', $data,'id_barang',$this->input->post('id_barang'));
		var_dump($_POST);
	}

	public function hapus($id)
	{
		//menghapus data model
		$this->crud_model->menghapus_data_id('barang','id_barang', $id);
		var_dump($_POST);
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//model
		$this->load->model('login_model');
		$this->load->model('crud_model');
		
		//variabel 
		$this->data['nama'] = 'PT AAA';
		$this->data['sidebar'] = 'pengiriman';
	}

	public function index()
	{
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data
		$data['array_pengiriman'] = $this->crud_model->mengambil_data_join('pengiriman');
		
		// var_dump($data['array_pengiriman']); die();
		
		$this->load->view('pengiriman_view',$data);
	}

	public function add()
	{
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data
		$data['array_gudang'] = $this->crud_model->mengambil_data('gudang');
		$data['array_kurir'] = $this->crud_model->mengambil_data('kurir');
		$data['array_pelanggan'] = $this->crud_model->mengambil_data('pelanggan');
		
		$this->load->view('pengiriman_add',$data);
	}

	public function add_go()
	{
		// var_dump($_POST);die();
		
		$data = array(
			'id_gudang' => $this->input->post('id_gudang'),
			'id_kurir' => $this->input->post('id_kurir'),
			'id_pelanggan' => $this->input->post('id_pelanggan'),
			'nama_penerima' => $this->input->post('nama_penerima'),
			'alamat_penerima' => $this->input->post('alamat_penerima'),
			'jumlah' => $this->input->post('jumlah'),
			'berat' => $this->input->post('berat'),
			'harga' => $this->input->post('harga')		
		);

		$this->crud_model->masukan_data('pengiriman', $data);
	}
	
	public function edit($id)
	{
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data
		$data['array_gudang'] = $this->crud_model->mengambil_data('gudang');
		$data['array_kurir'] = $this->crud_model->mengambil_data('kurir');
		$data['array_pelanggan'] = $this->crud_model->mengambil_data('pelanggan');

		
		$data['array_pengiriman'] = $this->crud_model->mengambil_data_id('pengiriman','id_pengiriman',$id);
		$data['obj_pengiriman'] = $data['array_pengiriman'][0];
		
		$this->load->view('pengiriman_edit',$data);
	}

	public function edit_go()
	{
		$data = array(
			'id_pengiriman' => $this->input->post('id_pengiriman'),		
			'id_gudang' => $this->input->post('id_gudang'),		
			'id_kurir' => $this->input->post('id_kurir'),		
			'id_pelanggan' => $this->input->post('id_pelanggan'),		
			'nama_penerima' => $this->input->post('nama_penerima'),		
			'alamat_penerima' => $this->input->post('alamat_penerima'),		
			'jumlah' => $this->input->post('jumlah'),		
			'berat' => $this->input->post('berat'),		
			'harga' => $this->input->post('harga')	
		);

		$this->crud_model->mengubah_data_id('pengiriman', $data,'id_pengiriman',$this->input->post('id_pengiriman'));
		var_dump($_POST);
	}

	public function hapus($id)
	{
		$this->crud_model->menghapus_data_id('pengiriman','id_pengiriman',$id);
		var_dump($_POST);
	}

}

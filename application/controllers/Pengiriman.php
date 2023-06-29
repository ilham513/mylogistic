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
		$this->data['nama'] = 'PT FESA ANTARAN LOGISTIK';
		$this->data['sidebar'] = 'pengiriman';
		
		//tampilkan view
		$this->login_model->mengecek_session();
	}

	public function index()
	{
		//variabel nama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data
		$data['array_pengiriman'] = $this->crud_model->mengambil_data_join('pengiriman');
		
		// var_dump($data['array_pengiriman']); die();
		
		//tampilkan view
		$this->load->view('pengiriman_view',$data);
	}

	public function add()
	{
		//varibel nama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data
		$data['array_gudang'] = $this->crud_model->mengambil_data('gudang');
		$data['array_kurir'] = $this->crud_model->mengambil_data('kurir');
		$data['array_pelanggan'] = $this->crud_model->mengambil_data('pelanggan');
		
		//tampilkan view
		$this->load->view('pengiriman_add',$data);
	}

	public function add_go()
	{
		// var_dump($_POST);die();
		
		//variabel data
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

		//masukan data
		$this->crud_model->masukan_data('pengiriman', $data);
	}
	
	public function edit($id)
	{
		//variabel nama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data
		$data['array_gudang'] = $this->crud_model->mengambil_data('gudang');
		$data['array_kurir'] = $this->crud_model->mengambil_data('kurir');
		$data['array_pelanggan'] = $this->crud_model->mengambil_data('pelanggan');

		//ambil model data
		$data['array_pengiriman'] = $this->crud_model->mengambil_data_id('pengiriman','id_pengiriman',$id);
		$data['obj_pengiriman'] = $data['array_pengiriman'][0];
		
		//tampilkan view
		$this->load->view('pengiriman_edit',$data);
	}

	public function edit_go()
	{
		//ambil data yg akan diedit
		$data = array(
			'id_pengiriman' => $this->input->post('id_pengiriman'),		
			'id_gudang' => $this->input->post('id_gudang'),		
			'id_kurir' => $this->input->post('id_kurir'),		
			'id_pelanggan' => $this->input->post('id_pelanggan'),		
			'nama_penerima' => $this->input->post('nama_penerima'),		
			'alamat_penerima' => $this->input->post('alamat_penerima'),		
			'jumlah' => $this->input->post('jumlah'),		
			'berat' => $this->input->post('berat'),		
			'harga' => $this->input->post('harga'),	
			'status' => $this->input->post('status')	
		);

		//load model ubah data
		$this->crud_model->mengubah_data_id('pengiriman', $data,'id_pengiriman',$this->input->post('id_pengiriman'));
		var_dump($_POST);
	}

	public function hapus($id)
	{
		//hapus data
		$this->crud_model->menghapus_data_id('pengiriman','id_pengiriman',$id);
		var_dump($_POST);
	}

	public function interval()
	{
		//variabel nama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		$tanggal_awal = $this->input->get('tanggal_awal');
		$tanggal_akhir = $this->input->get('tanggal_akhir');
		
		//ambil data
		$data['array_pengiriman'] = $this->crud_model->mengambil_data_join_interval('pengiriman', $tanggal_awal, $tanggal_akhir);
		
		//menampilkan view
		$this->load->view('pengiriman_view',$data);
	}

}

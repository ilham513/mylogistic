<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//model
		$this->load->model('login_model');
		$this->load->model('crud_model');
		
		//variabel 
		$this->data['nama'] = 'PT AAA';
		$this->data['sidebar'] = 'laporan';
	}

	public function index()
	{
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data
		$data['array_laporan'] = $this->crud_model->mengambil_data_join('pengiriman');
		
		// var_dump($data['array_laporan']); die();
		
		$this->load->view('laporan_view',$data);
	}

	public function add()
	{
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data
		$data['array_gudang'] = $this->crud_model->mengambil_data('gudang');
		$data['array_kurir'] = $this->crud_model->mengambil_data('kurir');
		$data['array_pelanggan'] = $this->crud_model->mengambil_data('pelanggan');
		
		$this->load->view('laporan_add',$data);
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

		$this->crud_model->masukan_data('laporan', $data);
	}
	
	public function edit($id)
	{
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data
		$data['array_gudang'] = $this->crud_model->mengambil_data('gudang');
		$data['array_kurir'] = $this->crud_model->mengambil_data('kurir');
		$data['array_pelanggan'] = $this->crud_model->mengambil_data('pelanggan');

		
		$data['array_laporan'] = $this->crud_model->mengambil_data_id('laporan','id_laporan',$id);
		$data['obj_laporan'] = $data['array_laporan'][0];
		
		$this->load->view('laporan_edit',$data);
	}

	public function edit_go()
	{
		$data = array(
			'id_laporan' => $this->input->post('id_laporan'),		
			'id_gudang' => $this->input->post('id_gudang'),		
			'id_kurir' => $this->input->post('id_kurir'),		
			'id_pelanggan' => $this->input->post('id_pelanggan'),		
			'nama_penerima' => $this->input->post('nama_penerima'),		
			'alamat_penerima' => $this->input->post('alamat_penerima'),		
			'jumlah' => $this->input->post('jumlah'),		
			'berat' => $this->input->post('berat'),		
			'harga' => $this->input->post('harga')	
		);

		$this->crud_model->mengubah_data_id('laporan', $data,'id_laporan',$this->input->post('id_laporan'));
		var_dump($_POST);
	}

	public function hapus($id)
	{
		$this->crud_model->menghapus_data_id('laporan','id_laporan',$id);
		var_dump($_POST);
	}

}

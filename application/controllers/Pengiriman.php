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
		$data['array_gudang'] = $this->crud_model->mengambil_data('gudang');
		$data['array_kurir'] = $this->crud_model->mengambil_data('kurir');
		$data['array_status'] = $this->crud_model->mengambil_data('status');
		
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
			'kota_tujuan' => $this->input->post('kota_tujuan'),
			'telp_penerima' => $this->input->post('telp_penerima'),
			'jenis_barang' => $this->input->post('jenis_barang'),
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
		$data['array_status'] = $this->crud_model->mengambil_data('status');

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
			'tanggal_pengiriman' => $this->input->post('tanggal_pengiriman'),		
			'id_pelanggan' => $this->input->post('id_pelanggan'),		
			'nama_penerima' => $this->input->post('nama_penerima'),		
			'alamat_penerima' => $this->input->post('alamat_penerima'),		
			'telp_penerima' => $this->input->post('telp_penerima'),		
			'jenis_barang' => $this->input->post('jenis_barang'),		
			'jumlah' => $this->input->post('jumlah'),		
			'berat' => $this->input->post('berat'),		
			'harga' => $this->input->post('harga'),	
			'id_status' => $this->input->post('id_status'),	
			'keterangan' => $this->input->post('keterangan')	
		);

		//load model ubah data
		$this->crud_model->mengubah_data_id('pengiriman', $data,'id_pengiriman',$this->input->post('id_pengiriman'));
		var_dump($_POST);
	}

	public function konfirmasi()
	{
		//variabel nama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data
		$data['array_konfirmasi'] = $this->crud_model->mengambil_data('konfirmasi');
		
		// var_dump($data['array_pengiriman']); die();
		
		//tampilkan view
		$this->load->view('konfirmasi_view',$data);
	}

	public function konfirmasi_go()
	{
		//ambil data yg akan diedit
		$data = array(
			'id_pengiriman' => $this->input->post('id_pengiriman'),		
			'id_gudang' => $this->input->post('id_gudang'),		
			'id_kurir' => $this->input->post('id_kurir'),	
			'id_status' => $this->input->post('id_status'),	
			'keterangan' => $this->input->post('keterangan')	
		);

		//masukan data
		$this->crud_model->masukan_data('konfirmasi', $data, 'pengiriman'); 
	}

	public function terima_go($id_konfirmasi)
	{
		//ambil data id
		$data['array_konfirmasi'] = $this->crud_model->mengambil_data_id('konfirmasi','id_konfirmasi',$id_konfirmasi);
		$array_konfirmasi = $data['array_konfirmasi'][0];
		
		//ambil data id
		$data['array_pengiriman'] = $this->crud_model->mengambil_data_id('pengiriman','id_pengiriman',$array_konfirmasi->id_pengiriman);
		$array_pengiriman = $data['array_pengiriman'][0];
		
		// var_dump($array_pengiriman); die();
		
		//ubah data berdasarkan konfirmasi
		$data = array(
			'id_pengiriman' => $array_konfirmasi->id_pengiriman,		
			'id_gudang' => $array_konfirmasi->id_gudang,		
			'id_kurir' => $array_konfirmasi->id_kurir,		
			'id_pelanggan' => $array_pengiriman->id_pelanggan,		
			'nama_penerima' => $array_pengiriman->nama_penerima,		
			'alamat_penerima' => $array_pengiriman->alamat_penerima,		
			'jumlah' => $array_pengiriman->jumlah,		
			'berat' => $array_pengiriman->berat,		
			'harga' => $array_pengiriman->harga,	
			'id_status' => $array_konfirmasi->id_status,	
			'keterangan' => $array_konfirmasi->keterangan	
		);
		
		//hapus data konfirmasi
		$this->crud_model->menghapus_data_id('konfirmasi','id_konfirmasi',$id_konfirmasi,false);		

		//load model ubah data
		$this->crud_model->mengubah_data_id('pengiriman', $data,'id_pengiriman',$array_konfirmasi->id_pengiriman);
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

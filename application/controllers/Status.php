<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('login_model');
		$this->load->model('crud_model');
		
		//variabel nama
		$this->data['nama'] = 'PT FESA ANTARAN LOGISTIK';
		$this->data['sidebar'] = 'status';
		
		//cek session
		$this->login_model->mengecek_session();
		
		include_once APPPATH . '/third_party/fpdf/fpdf.php';
	}

	public function index()
	{
		//variabel nama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data
		$data['array_pengiriman'] = $this->crud_model->mengambil_data_join('pengiriman');
		$data['array_konfirmasi'] = $this->crud_model->mengambil_data_join('konfirmasi',false);
		
		// var_dump($data['array_konfirmasi']); die();
		
		//menampilkan view
		$this->load->view('status_view',$data);
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
		$this->load->view('status_edit',$data);
	}

	public function hapus($id_konfirmasi)
	{
		//hapus data konfirmasi
		$this->crud_model->menghapus_data_id('konfirmasi','id_konfirmasi',$id_konfirmasi,false);		

		//redirect
		echo '<script>alert("Data berhasil Dihapus!")</script>';
		redirect('/status', 'refresh'); //redir							

		var_dump($_POST);
	}	

	public function status_go($id_konfirmasi)
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
	
}
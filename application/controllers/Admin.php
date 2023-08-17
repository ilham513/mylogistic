<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		//varibel nama
		$data['nama'] = 'PT FESA ANTARAN LOGISTIK';
		$data['sidebar'] = 'dashboard';
		
		//load model login
		$this->load->model('login_model');
		$this->load->model('crud_model');
		
		//cek session
		$this->login_model->mengecek_session();
		
		//ambil model hitung rows
		$data['jumlah_pengiriman'] = $this->crud_model->menghitung_jumlah_row('pengiriman');
		$data['jumlah_kurir'] = $this->crud_model->menghitung_jumlah_row('kurir');
		$data['jumlah_pelanggan'] = $this->crud_model->menghitung_jumlah_row('pelanggan');
		$data['jumlah_gudang'] = $this->crud_model->menghitung_jumlah_row('gudang');
		$data['jumlah_konfirmasi'] = $this->crud_model->menghitung_jumlah_row('konfirmasi');
		$data['grafik'] = $this->crud_model->ambil_grafik('pengiriman');
		$data['array_pengiriman'] = $this->crud_model->mengambil_data_join('pengiriman');
		
		// var_dump($data['grafik']);die();
		
		//tampilkan view
		$this->load->view('dashboard',$data);
	}
}

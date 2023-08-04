<?php

class Crud_model extends CI_Model{

	public function masukan_data($nama_tabel, $data)
	{	
		$this->db->insert($nama_tabel, $data);

		//redirect
		echo '<script>alert("Data berhasil Diinput!")</script>';
		redirect('/'.$nama_tabel, 'refresh'); //redir				
	}

	public function mengambil_data($nama_tabel)
	{
		$this->db->select('*');
		$this->db->from($nama_tabel);
		$query = $this->db->get();
		return $query->result();
	}

	public function mengambil_data_join($nama_tabel)
	{
		$this->db->select('*');
		$this->db->from($nama_tabel);
		$this->db->join('gudang', 'pengiriman.id_gudang = gudang.id_gudang');
		$this->db->join('pelanggan', 'pengiriman.id_pelanggan = pelanggan.id_pelanggan');
		$this->db->join('kurir', 'pengiriman.id_kurir = kurir.id_kurir');
		$this->db->join('barang', 'pengiriman.id_barang = barang.id_barang');
		$this->db->join('status', 'pengiriman.id_status = status.id_status');
		$query = $this->db->get();
		return $query->result();
	}

	public function mengambil_data_join_interval($nama_tabel, $tanggal_awal, $tanggal_akhir)
	{
		$tanggal_awal = "'$tanggal_awal 00:00:01'";
		$tanggal_akhir = "'$tanggal_akhir 00:00:01'";
		
		// var_dump($tanggal_akhir);die();
		
		$this->db->select('*');
		$this->db->from($nama_tabel);
		$this->db->join('gudang', 'pengiriman.id_gudang = gudang.id_gudang');
		$this->db->join('pelanggan', 'pengiriman.id_pelanggan = pelanggan.id_pelanggan');
		$this->db->join('kurir', 'pengiriman.id_kurir = kurir.id_kurir');
		$this->db->where('tanggal BETWEEN ' . $tanggal_awal . ' AND ' . $tanggal_akhir);
		$query = $this->db->get();
		return $query->result();
	}

	public function mengambil_data_join_id($nama_tabel, $nama_colum, $id)
	{
		$this->db->select('*');
		$this->db->from($nama_tabel);
		$this->db->join('gudang', 'pengiriman.id_gudang = gudang.id_gudang');
		$this->db->join('pelanggan', 'pengiriman.id_pelanggan = pelanggan.id_pelanggan');
		$this->db->join('kurir', 'pengiriman.id_kurir = kurir.id_kurir');
		$this->db->join('barang', 'pengiriman.id_barang = barang.id_barang');
		$this->db->where($nama_colum, $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function mengambil_data_id($nama_tabel, $nama_colum, $id)
	{		
		$this->db->select('*');
		$this->db->from($nama_tabel);
		$this->db->where($nama_colum, $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function mengubah_data_id($nama_tabel, $data, $nama_colum, $id)
	{
		
		$this->db->where($nama_colum, $id);
		$this->db->update($nama_tabel,$data);

		//redirect
		echo '<script>alert("Data berhasil Diupdate!")</script>';
		redirect('/'.$nama_tabel, 'refresh'); //redir				
	}

	public function menghapus_data_id($nama_tabel, $nama_colum, $id)
	{
	
		$this->db->where($nama_colum, $id);
		$this->db->delete($nama_tabel);

		//redirect
		echo '<script>alert("Data berhasil Dihapus!")</script>';
		redirect('/'.$nama_tabel, 'refresh'); //redir				
	}

	public function menghitung_jumlah_row($nama_tabel)
	{
		$query = $this->db->query("SELECT * FROM $nama_tabel");

		return $query->result_id->num_rows;
		// var_dump($query->result_id->num_rows);die();		
	}
	
	public function tanggal_indo($tanggal, $cetak_hari = false){
		$hari = array ( 1 =>    'Senin',
					'Selasa',
					'Rabu',
					'Kamis',
					'Jumat',
					'Sabtu',
					'Minggu'
				);
				
		$bulan = array (1 =>   'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);
		$split 	  = explode('-', $tanggal);
		$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
		
		if ($cetak_hari) {
			$num = date('N', strtotime($tanggal));
			return $hari[$num] . ', ' . $tgl_indo;
		}
		return $tgl_indo;
	}	

}
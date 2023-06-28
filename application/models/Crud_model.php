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

		return $query->num_fields();			
	}

}
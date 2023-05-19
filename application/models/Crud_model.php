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
		// $this->db->join('kuesioner', 'alumni.npm = kuesioner.npm', 'left');
		// $this->db->where('alumni.npm', $par);
		$query = $this->db->get();
		return $query->result();
	}

	public function mengambil_data_id($nama_tabel, $nama_colum, $id)
	{		
		$this->db->select('*');
		$this->db->from($nama_tabel);
		// $this->db->join('kuesioner', 'alumni.npm = kuesioner.npm', 'left');
		$this->db->where($nama_colum, $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function mengubah_data_id($nama_tabel, $nama_colum, $id)
	{
		$data = array(
			'nama_kurir' => $this->input->post('nama_kurir'),		
			'merek_kendaraan' => $this->input->post('merek_kendaraan'),		
			'no_telpon' => $this->input->post('no_telpon')		
		);
	
		$this->db->where($nama_colum, $id);
		$this->db->update($nama_tabel,$data);

		//redirect
		echo '<script>alert("Data berhasil Diupdate!")</script>';
		redirect('/kurir', 'refresh'); //redir				
	}

	public function menghapus_data_id($nama_tabel, $nama_colum, $id)
	{
	
		$this->db->where($nama_colum, $id);
		$this->db->delete($nama_tabel);

		//redirect
		echo '<script>alert("Data berhasil Dihapus!")</script>';
		redirect('/kurir', 'refresh'); //redir				
	}

}
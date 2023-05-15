<?php

class Login_model extends CI_Model{

	public function cek_akun($id, $password)
	{
		//query ambil data login
		$query = $this->db->query("SELECT * FROM akun WHERE id='$id' AND password='$password'");
		$result = $query->result_array();
		
		if (count($result) > 0) {
			//set session
			$this->session->set_userdata('login', true);
			echo 'Login berhasil';
			redirect('admin', 'refresh');
		} else {
			echo '<script>alert("Id atau password salah. Mohon periksa kembali!")</script>';
			redirect('login', 'refresh');
		}		
	}

}
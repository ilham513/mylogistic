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

	public function mengecek_session()
	{
		if($this->session->userdata('login')){
			
		}else{
			echo '<script>alert("Silahkan login terlebih dahulu!")</script>';
			redirect('login', 'refresh');
		}
				
	}


	public function menghapus_session()
	{
		$this->session->unset_userdata('login');
		echo '<script>alert("berhasil logout")</script>';
		redirect('login', 'refresh');				
	}

}
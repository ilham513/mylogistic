<?php

class Login_model extends CI_Model{

	public function cek_akun($id, $password)
	{
		echo 'user ada: '.$id.'<br/>password: '.$password;
	}

}
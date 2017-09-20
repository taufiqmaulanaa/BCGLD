<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_model {

	public function getlogin ($u,$p)
	{
		$pwd = md5($p);
		$this->db->where('username',$u);
		$this->db->where('password',$pwd);
		$query = $this->db->get('Akun');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$sess= array('username'	=>$row->username,
					'password'	=>$row->password,
					'roll'		=>$row->roll
							);
			$this->session->set_userdata($sess);
			if ($row->roll == "Manager") {
				redirect('manajer');
			} else if ($row->roll == "Perint") {
				redirect('perint');
			} else if ($row->roll == "Kain") {
				redirect('kain');
			} else if ($row->roll == "Direktur") {
				redirect('direktur');
			} else if ($row->roll == "Packing") {
				redirect('packing');
			} else if ($row->roll == "Jahit") {
				redirect('jahit');
             } else if($row->username == ""){
                            redirect('login');
               }
			
		}
	}
	else
	{
		$this->session->set_flashdata('info','Maaf User Atau Password Salah');
		redirect('login');
	}
}
}

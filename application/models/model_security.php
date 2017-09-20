<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_security extends CI_model {


	public function getsecurity() {
		$username = $this->session->userdata('username');
		if (empty($username)) {
                    $this->session->unset_userdata('username');
                    $this->session->unset_userdata('password');
                    $this->session->unset_userdata('roll');
                    redirect('login');
		}
	}
}

?>

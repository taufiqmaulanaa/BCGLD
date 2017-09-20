<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index()
	{
		$this->load->view('tampilan_login');
	}
	public function getlogin()
	{
		$u=$this->input->post('username');
		$p=$this->input->post('password');
		$this->load->model('Model_login');
		$this->Model_login->getlogin($u,$p);
	}
}

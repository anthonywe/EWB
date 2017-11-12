<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	// register my user
	public function home()
	{
		$this->load->view('users/index');
	}

	public function login()
	{
		$this->load->view('users/login');
	}
	public function register()
	{
		$this->load->view('users/register');
	}
	public function ngo_register()
	{
		$this->load->view('users/ngo-register');
	}

	public function engg_register()
	{
		$this->load->view('users/engg-register');
	}

}
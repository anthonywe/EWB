<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	// register my user
	public function home()
	{
		$this->load->view('users/forum-main');
	}

	public function form_question()
	{
		$this->load->view('users/forum-question');
	}

	public function profile_engineer() 
	{
		$this->load->view('users/profile-engineer');
	}


}
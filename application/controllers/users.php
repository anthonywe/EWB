<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	// register my user
	public function home()
	{
		$this->load->view('users/forum-main');
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
		$this->form_validation->set_rules('inputUserName', 'Username', 'required|is_unique[login.username]');
		$this->form_validation->set_rules('inputPassword', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('inputCPassword', 'Confirm Password', 'required|matches[inputPassword]');
		$this->form_validation->set_rules('inputName', 'Name', 'required');
		$this->form_validation->set_rules('inputEmail', 'Email', 'required|is_unique[engineer.email]');
		$this->form_validation->set_rules('inputExpertise', 'Fields of Expertise', 'required');
		$this->form_validation->set_rules('inputLinkedIn', 'LinkedIn Profile Link', 'required');
		$this->form_validation->set_rules('inputProfilePic', 'Profile Picture', 'required');
		$this->form_validation->set_rules('inputAboutMe', 'About Me', 'required');
		$this->form_validation->set_rules('inputNotRobot', 'Checkbox Im not a robot', 'required');

		if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('users/engg-register');
        }
        else
        {
        	$this->load->model('User');

        	$data = array(
        		'ctl_username'          => $this->input->post('inputUserName', true),
        		'ctl_password'          => $this->input->post('inputPassword', true),
        		'ctl_cpassword'         => $this->input->post('inputCpassword', true),
        		'ctl_name'              => $this->input->post('inputName', true),
        		'ctl_email'             => $this->input->post('inputEmail', true),
        		'ctl_expertise'         => $this->input->post('inputExpertise', true),
        		'ctl_linkedin'          => $this->input->post('inputLinkedIn', true),
        		'ctl_profilepic'        => $this->input->post('inputProfilePic', true),
        		'ctl_aboutme'           => $this->input->post('inputAboutMe', true),
        		'ctl_notrobot'          => $this->input->post('inputNotRobot', true),
        		);


        	$this->session->set_flashdata('success', 'Users successfully added. Thanks');
        	$this->User->addEngineer( $data );
        	redirect(base_url('form-question'));
        }
        	
	}

	public function form_question()
	{
		$this->load->view('users/forum-question');
	}

	public function profile_engineer() 
	{
		$this->load->view('users/profile-engineer');
	}

	public function profile_ngo()
	{
		$this->load->view('users/profile-ngo');
	}





}
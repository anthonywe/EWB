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

	public function ngo_reg()
	{
		$data = array(
			'suc_msg' => $this->session->flashdata('success')
			);
		$this->load->view('users/ngo-register', $data);
	}

	public function ngo_register()
	{
		$config['upload_path']          = './public/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('inputPic'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('users/ngo-register', $error);
		}
		else
		{	
			// picture upload
			$random_digit=rand(0000,9999);
			$image_name = $_FILES["inputPic"] ["name"];
			$new_file_name=$random_digit.$image_name;
			$folder = "./public/".$new_file_name;


				// echo "registration process";
		$this->form_validation->set_rules('inputUserName',    'Your User Name', 'required|is_unique[login.username]');
        $this->form_validation->set_rules('inputPassword',      'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('inputCPassword',      'Confirm Password', 'required|min_length[8]|matches[inputPassword]');
        $this->form_validation->set_rules('inputName',    'Your Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('inputCperson',    'Contact Person Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('inputActivities',    'Fields of Activities', 'required');
        $this->form_validation->set_rules('inputWebsite',    'Fields of Activities', 'required|valid_url');
        //$this->form_validation->set_rules('inputEmail',       'Email', 'required|valid_email|is_unique[users.email]');
          $this->form_validation->set_rules('inputEmail',       'Email', 'required|valid_email');
          $this->form_validation->set_rules('robotCheck',       'I am not a Robot check', 'required');

          if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('users/ngo-register');
			}
			else{

				$this->load->model('User');
				$data = array(
					'ctl_UserName'    => $this->input->post('inputUserName',true),
					'ctl_passwd'   	  => $this->input->post('inputPassword',true),
					'ctl_cpasswd'   	  => $this->input->post('inputCPassword',true),
					'ctl_name'   	  => $this->input->post('inputName',true),
					'ctl_cperson'   	  => $this->input->post('inputCperson',true),
					'ctl_activities'   	  => $this->input->post('inputActivities',true),
					'ctl_website'   	  => $this->input->post('inputWebsite',true),
					'ctl_email'       => $this->input->post('inputEmail',true),
					'ctl_pic'       => $folder,
					'ctl_ngo_engg'       => $this->input->post('inputNgoEngg',true),
				);
				$this->session->set_flashdata('success', 'Registration successfully done. Thanks');
				$last_id = $this->User->addNGOUser( $data );
				//var_dump($last_id); die();
				//var_dump($last_id);
				//$this->User->addNGOtoLogin( $data );
				redirect(base_url('ngo_reg'));
			}
		
		}
	}

	public function engg_register()
	{
		$config['upload_path']          = './public/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('inputProfilePic'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('users/engg-register', $error);
		}
		else
		{	
			// picture upload
			$random_digit=rand(0000,9999);
			$image_name = $_FILES["inputProfilePic"] ["name"];
			$new_file_name=$random_digit.$image_name;
			$folder = "./public/".$new_file_name;

			$this->form_validation->set_rules('inputUserName', 'Username', 'required|is_unique[login.username]');
			$this->form_validation->set_rules('inputPassword', 'Password', 'required|min_length[8]');
			$this->form_validation->set_rules('inputCPassword', 'Confirm Password', 'required|matches[inputPassword]');
			$this->form_validation->set_rules('inputName', 'Name', 'required');
			$this->form_validation->set_rules('inputEmail', 'Email', 'required|is_unique[users.email]');
			$this->form_validation->set_rules('inputExpertise', 'Fields of Expertise', 'required');
			$this->form_validation->set_rules('inputLinkedIn', 'LinkedIn Profile Link', 'required');
			// $this->form_validation->set_rules('inputProfilePic', 'Profile Picture', 'required');
			$this->form_validation->set_rules('inputAboutMe', 'About Me', 'required');
			$this->form_validation->set_rules('inputNotRobot', 'Checkbox Im not a robot', 'required');
			$this->form_validation->set_rules('inputPhone', 'Phone', 'required');

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
					'ctl_name'              => $this->input->post('inputName', true),
					'ctl_email'             => $this->input->post('inputEmail', true),
					'ctl_expertise'         => $this->input->post('inputExpertise', true),
					'ctl_linkedin'          => $this->input->post('inputLinkedIn', true),
					'ctl_profilepic'        => $folder,
					'ctl_aboutme'           => $this->input->post('inputAboutMe', true),
					'ctl_phone'             => $this->input->post('inputPhone', true),
					'ctl_ngo_eng'           => $this->input->post('ngo_eng', true)
					);


				$this->session->set_flashdata('success', 'Users successfully added. Thanks');
				$last_id = $this->User->addEngineer( $data );
				redirect(base_url('form-question'));
			}

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
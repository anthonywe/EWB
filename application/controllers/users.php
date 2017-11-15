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

		$this->form_validation->set_rules('inputUserName',    'User Name', 'required');
		$this->form_validation->set_rules('inputPassword',   'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('robotCheck',       'I am not a Robot check', 'required');
		
        if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('users/login');
        }
        else{

        	$username = $this->input->post('inputUserName', true);
        	$password = $this->input->post('inputPassword', true);


        	// load database/model to use the data
        	$this->load->model('User');
        	$result = $this->User->checkLoginByUsernameAndPass( 
        		$username, $password);

        	

        	if($result) {
        		$this->session->set_userdata('currentUser', $result);
        		redirect(base_url('form-question'));
        		// echo 'I found this user:' . $result['name'];
        		
        	} else {

        		//var_dump($result);die();
        		$this->session->set_flashdata('error_msg', 'User is not found.');
        		//var_dump($error_msg);die();

				$data = array(
					'err_msg' => $this->session->flashdata('error_msg')
					);
				$this->load->view('users/login', $data);
	        		//redirect(base_url(login));
        	}
        }	
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
					'ctl_pic'       => $this->input->post('inputPic',true),
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
        		);


        	$this->session->set_flashdata('success', 'Users successfully added. Thanks');
        	$this->User->addEngineer( $data );
        	redirect(base_url('form-question'));
        }
        	
	}

	public function form_question()
	{
		// if( !$this->session->userdata('currentUser') )
		// {
		// 	redirect(base_url());
		// 	exit();
		// }

		// $this->load->model('post');
		// $result = $this->post->listOfAll();
		// $data = array(
		// 	'cUser' => $this->session->userdata('currentUser'),
		// 	'listOfAllUsersToView' => $result,
		// 		'title' => 'List of my Users'
		// 	);
		// // $data = array(
		// // 		'listOfAllUsersToView' => $result,
		// // 		'title' => 'List of my Users'
		// // 	);

		// $this->load->view('users/timeline', $data);
	
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
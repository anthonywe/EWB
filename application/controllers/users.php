<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {

	// register my user
	public function home()
	{

        $this->load->model('forum');
        $result = $this->forum->listOfAll();
    
        $data = array(
            'cUser' => $this->session->userdata('currentUser'),
            'listOfAllUsersToView' => $result,
            'error_msg' => $this->session->flashdata('error'),
            'title' => 'List of my Users',
            'details' => $result,
            );
		$this->load->view('users/forum-main',$data);
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
        		redirect(base_url());
        		// echo 'I found this user:' . $result['name'];
        	} else {

        		$this->session->set_flashdata('error_msg', 'User is not found.');

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

    public function engg_reg()
    {
        $data = array(
            'suc_msg' => $this->session->flashdata('success')
            );
        $this->load->view('users/engg-register', $data);
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
                    'ctl_passwd'      => $this->input->post('inputPassword',true),
                    'ctl_cpasswd'         => $this->input->post('inputCPassword',true),
                    'ctl_name'        => $this->input->post('inputName',true),
                    'ctl_cperson'         => $this->input->post('inputCperson',true),
                    'ctl_activities'      => $this->input->post('inputActivities',true),
                    'ctl_website'         => $this->input->post('inputWebsite',true),
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
                redirect(base_url('engg_reg'));
            }
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

	public function form_question()
	{
		// if( !$this->session->userdata('currentUser') )
		// {
		// 	redirect(base_url());
		// 	exit();
		// }
		
        		
	   $this->load->model('forum');
         
        $data = array(
            'ctl_questionId'  => $this->input->post('questionId',true),
            );
        //var_dump($data);
        //$this->session->set_userdata('currentComments', $resultComments);
		$this->load->model('User');

		// $this->load->view('users/timeline', $data);
	// 	$current_user = $this->session->userdata('currentUser');
	// 	$id = $current_user['users_id'];
		
	// 	$result = $this->User->oneUser($id);
	// $data = array(
	// 	'cUser' => $this->session->userdata('currentUser'),
	// 	'details' => $result
	// 	);

        $resultQuestion = $this->forum->selectAQuestion($data);
        $resultAnswer = $this->forum->selectAnswers($data);
        // $resultComments = $this->forum->selectComments($data);

        $data = array(
            'cUser' => $this->session->userdata('currentUser'),
            'comments_ans' => $this->session->userdata('currentComments'),
            'ctl_questionId'  => $this->input->post('questionId',true),
            'listOfAllUsersToView' => $resultQuestion,
            'listOfAllAnswers' => $resultAnswer,
            );
        $this->load->view('users/forum-question',$data);


    }
    public function get_comments()
    {
        $this->load->model('forum');

        $data = array(
            'ctl_AnswerId'  => $this->input->post('answerId',true),
            );
        $resultComments = $this->forum->selectComments($data);

        $this->session->set_userdata('currentComments', $resultComments);

         
        $data = array(
            'ctl_questionId'  => $this->input->post('questionId',true),
            );
        //var_dump($data);
        //$this->session->set_userdata('currentComments', $resultComments);

        $resultQuestion = $this->forum->selectAQuestion($data);
        $resultAnswer = $this->forum->selectAnswers($data);
        // $resultComments = $this->forum->selectComments($data);

        $data = array(
            'cUser' => $this->session->userdata('currentUser'),
            'comments_ans' => $this->session->userdata('currentComments'),
            'ctl_questionId'  => $this->input->post('questionId',true),
            'listOfAllUsersToView' => $resultQuestion,
            'listOfAllAnswers' => $resultAnswer,
            );
        $this->load->view('users/forum-question',$data);
        
    }


    public function post_a_question() 
    {


        if( !$this->session->userdata('currentUser') )
        {
            $this->session->set_flashdata('error', 'You need to login to post a question.');
            // var_dump($this->session->flashdata('error')); die();
            redirect(base_url());
            exit();
        }


        $data = array(
            'cUser' => $this->session->userdata('currentUser'),
            'suc_msg' => $this->session->flashdata('successPost')
            );

        $this->load->view('users/post-question',$data);
    }

    public function insert_a_question() 
    {

        $this->form_validation->set_rules('Qtitle', 'Question Title', 'required');
        $this->form_validation->set_rules('Qdesc',    'Question description', 'required');
        $this->form_validation->set_rules('inputDate',    'Date', 'required');
        $this->form_validation->set_rules('inputContact',    'Contact Information', 'required');
        $this->form_validation->set_rules('robotCheck',    'I am not a Robot check', 'required');

         if ($this->form_validation->run() == FALSE)
            {

                    $data = array(
                'cUser' => $this->session->userdata('currentUser')
                );
                $this->load->view('users/post-question', $data);
                    
            }
            else{
                $this->load->model('forum');
                
                $data = array(
                    'ctl_Qtitle'    => $this->input->post('Qtitle',true),
                    'ctl_Qdesc'  => $this->input->post('Qdesc',true),
                    'ctl_inputDate'  => $this->input->post('inputDate',true),
                    'ctl_inputAttach'  => $this->input->post('inputAttach',true),
                    'ctl_inputContact'  => $this->input->post('inputContact',true),
                    'ctl_inputUserid'  => $this->input->post('inputUserid',true),
                );

            $this->session->set_flashdata('successPost', 'Question posted successfully. Thanks');
            $this->forum->addQuestion( $data );
             redirect(base_url('post-question'));
            }
    }

    public function insert_answer() 
    {
        if( !$this->session->userdata('currentUser') )
        {
        $this->session->set_flashdata('error', 'You need to login to post an answer.');
         redirect(base_url());
         exit();
        }

        $this->form_validation->set_rules('inputAnswer', 'Answer', 'required');

         if ($this->form_validation->run() == FALSE)
            {
                //     $data = array(
                // 'cUser' => $this->session->userdata('currentUser')
                // );
                // $this->load->view('users/post-question', $data);
                    
            }
            else{
                $this->load->model('forum');
                
                $data = array(
                    'ctl_inputAnswer'    => $this->input->post('inputAnswer',true),
                    'ctl_inputUserid'  => $this->input->post('inputUserid',true),
                    'ctl_questionId'  => $this->input->post('questionId',true),
                );

            $this->forum->addAnswer( $data );
            
            $data = array(
                    'ctl_questionId'  => $this->input->post('questionId',true),
                );
        $resultQuestion = $this->forum->selectAQuestion($data);
        $resultAnswer = $this->forum->selectAnswers($data);
        // $resultComments = $this->forum->selectComments($data);

        $data = array(
            'cUser' => $this->session->userdata('currentUser'),
            'comments_ans' => $this->session->userdata('currentComments'),
            'ctl_questionId'  => $this->input->post('questionId',true),
            'listOfAllUsersToView' => $resultQuestion,
            'listOfAllAnswers' => $resultAnswer,
            );
        $this->load->view('users/forum-question',$data);

            }
    }

    public function insert_comment() 
    {
        if( !$this->session->userdata('currentUser') )
        {
        $this->session->set_flashdata('error', 'You need to login to post a comment.');
         redirect(base_url());
         exit();
        }

         $this->form_validation->set_rules('InputComment', 'Comment', 'required');

         if ($this->form_validation->run() == FALSE)
            {
                //     $data = array(
                // 'cUser' => $this->session->userdata('currentUser')
                // );
                // $this->load->view('users/post-question', $data);
                    
            }
            else{
                $this->load->model('forum');
                
                $data = array(
                    'ctl_InputComment'    => $this->input->post('InputComment',true),
                    'ctl_inputUserid'  => $this->input->post('inputUserid',true),
                    'ctl_answerId'  => $this->input->post('answerId',true),
                    'ctl_questionId'  => $this->input->post('questionId',true),
                );

            $this->forum->addComment( $data );

            $data = array(
                    'ctl_questionId'  => $this->input->post('questionId',true),
                );

        $resultQuestion = $this->forum->selectAQuestion($data);
        $resultAnswer = $this->forum->selectAnswers($data);
        // $resultComments = $this->forum->selectComments($data);

        $data = array(
            'cUser' => $this->session->userdata('currentUser'),
            'comments_ans' => $this->session->userdata('currentComments'),
            'ctl_questionId'  => $this->input->post('questionId',true),
            'listOfAllUsersToView' => $resultQuestion,
            'listOfAllAnswers' => $resultAnswer,
            );
        $this->load->view('users/forum-question',$data);

            }
    }


    public function send_mail() { 


         $from_email = "reshma1284@gmail.com"; 
         $to_email = "anthony_wever@yahoo.com";  
   
         //Load email library 
    
         //configure email settings I Chose GMAIL
         $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => '465',
            'smtp_user' => 'weveranthony@gmail.com',
            'smtp_pass' => 'restartnetwork',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
            );
            //$this->load->library('email', $config);
           // $this->email->set_newline("\r\n");
                      // $this->load->library('email'); 

            $this->load->library('email');
            $this->email->initialize($config);

        $this->email->from($from_email, 'Reshma'); 
         $this->email->to($to_email);
         $this->email->subject('Email Test'); 
         $this->email->message('Testing the email class.'); 

         //Send mail 
         if($this->email->send()) 
         $this->session->set_flashdata("email_sent","Email sent successfully."); 
         else 
         $this->session->set_flashdata("email_sent","Error in sending Email."); 
      } 
   

	public function profile_engineer() 
	{
		$this->load->model('User');
		$current_user = $this->session->userdata('currentUser');
		$id = $current_user['users_id'];

		$result = $this->User->oneUser($id);

		$data = array(
			'cUser'   => $current_user,
			'details'  => $result
			);

		$this->load->view('users/profile-engineer', $data);
	}


    

	public function profile_ngo()
	{	//load model
		$this->load->model('User');
		//fetch current user id when this user click on "view profile"
		$current_user = $this->session->userdata('currentUser');
		$id = $current_user['users_id'];
		// $data = array(
		// 	'ctl_this_userid'  => $this->input->post('userid', true),
		// 	);

		//pass current user id to model function to fetch details of this user
		$result = $this->User->oneUser($id);

		//var_dump($result); die();
		$data = array(
			'cUser'    => $this->session->userdata('currentUser'),
			'details'  => $result,
			);

		$this->load->view('users/profile-ngo', $data);
	}

	public function updateUserInfoNgo()
	{
		$this->load->model('User');

		$current_user = $this->session->userdata('currectUser');
		$id = $current_user['users_id'];
		$result = $this->User->oneUser($id);


		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('contact-person', 'Contact Person', 'required');
		$this->form_validation->set_rules('field-of-activities', 'Field of Activities', 'required');
		$this->form_validation->set_rules('website', 'Website', 'required');

		if($this->form_validation->run() == FALSE)
		{
			echo 'oops';
			//$this->load->view('users/profile-ngo');
		}
		else
		{
			//$this->load->model('User');

			$data = array(
				'ctl_name'   			 => $this->input->post('name', true),
				'ctl_email'  			 => $this->input->post('email', true),
				'ctl_contact_person'	 => $this->input->post('contact-person', true),
				'ctl_field_activities'   => $this->input->post('field-of-activities', true),
				'ctl_website'  	         => $this->input->post('website', true),
				'ctl_usersid'            => $this->input->post('userid', true)
				);
			//var_dump($data['ctl_name']); die();
			$result = $this->User->updateUserNgo($data);

			redirect(base_url('/'));
		}
	}

	public function updateUserInfoEngg()
	{
		$this->load->model('User');

		$current_user = $this->session->userdata('currectUser');
		$id = $current_user['users_id'];
		$result = $this->User->oneUser($id);

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone Number', 'required');
		$this->form_validation->set_rules('expertise', 'Field of Expertise', 'required');
		$this->form_validation->set_rules('linkedin-profile', 'LinkedIn Profile', 'required');
		$this->form_validation->set_rules('about-me', 'About Me', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			echo 'oops';
		}
		else
		{
			$data = array(
				'ctl_name'      => $this->input->post('name', true),
				'ctl_email'     => $this->input->post('email', true),
				'ctl_phone'     => $this->input->post('phone', true),
				'ctl_expertise' => $this->input->post('expertise', true),
				'ctl_linkedin'  => $this->input->post('linkedin-profile', true),
				'ctl_aboutme'   => $this->input->post('about-me', true),
				'ctl_userid'    => $this->input->post('userid', true)
				);

			$result = $this->User->updateUserEng($data);

			redirect(base_url('/'));
		}
	}

	public function admin_page()
	{
		$this->load->model('User');
		$result = $this->User->adminApproval();
		// var_dump($result); die();
		$data = array(
			'details'  => $result
			);
		$this->load->view('users/admin', $data);

	}

	public function approveUser()
	{
		$this->load->model('User');
		$id = $this->input->post('thisid', true);

		$result = $this->User->userApproveProcess($id);
		$approving = $result['approved'];
		$approving++;

		$data = array(
			'ctl_approving'   => $approving,
			'ctl_userid'      => $id
			);

		$this->User->approvingTheUser($data['ctl_approving'],$data['ctl_userid']);
		redirect(base_url('admin'));

		// $data = array(
		// 	'ctl_userid' => $this->input->post('thisid', true)
		// 	);
	}

	public function adminHome()

	{
		
		$this->load->view('users/admin-home');
	}

	public function adminAnswers()
	{
		$this->load->model('User');
		$result = $this->User->getAllAnswers();
		$data = array(
			'allAnswers'  => $result
			);

		$this->load->view('users/admin-answers', $data);

	}

	public function deleteAnswerProcess()
	{
		$this->load->model('User');
		$id = $this->input->post('thisid', true);

		// $this->User->deleteAnswer($id);

		$this->User->deleteAnswersComments($id);

		$this->User->deleteAnswer($id);

		redirect(base_url('admin/answers'));


	}

	public function adminComments()
	{
		$this->load->model('User');
		$result = $this->User->getAllComments();

		$data = array(
			'allComments'   => $result
			);

		$this->load->view('users/admin-comments', $data);

	}

	public function deleteCommentProcess()
	{
		$this->load->model('User');
		$comment_id = $this->input->post('thisid', true);
		$this->User->deleteComment($comment_id);

		redirect(base_url('admin/comments'));

	}

	public function adminQuestions()
	{
		$this->load->model('User');
		$result = $this->User->getAllQuestion();

		$data = array(
			'allQuestions'   => $result
			);

		$this->load->view('users/admin-questions', $data);

	}

	public function deleteQuestionProcess()

	{
		$this->load->model('User');
		$question_id = $this->input->post('thisid', true);

		$result = $this->User->deleteQuestionPartOne($question_id);
		$answer_id = $result['id'];

		$this->User->deleteAnswersComments($answer_id);

		$this->User->deleteQuestionPartTwo($question_id);

		$this->User->deleteQuestion($question_id);

		redirect(base_url('admin/questions'));

	}



}
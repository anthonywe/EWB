<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
   public function addNGOUser( $item )
   {

       // inserting NGO user details into users table

       $query = "INSERT INTO users (name, contact_person, email, field_of_activities, website, profile_pic, ngo_engg) VALUES ( ?, ?, ?, ?, ?, ?, ?)";
       $values = array(
           $item['ctl_name'],
           $item['ctl_cperson'],
           $item['ctl_email'],
           $item['ctl_activities'],
           $item['ctl_website'],
           $item['ctl_pic'],
           $item['ctl_ngo_engg']
       );
       $this->db->query($query, $values);
       $last_id=$this->db->insert_id();
       
       // inserting user name and password into login table

       $query = "INSERT INTO login (username, password, users_id) VALUES ( ?, ?, ? )";
       $values = array(
           $item['ctl_UserName'],
           $item['ctl_passwd'],
           $last_id
           );
       $this->db->query($query, $values);

   }

    public function checkLoginByUsernameAndPass( $username, $passwd )
    {
        return $this->db->query(
            "SELECT * FROM login WHERE username= ? AND password = ? AND approved = 1" ,
            array($username, $passwd)
            )->row_array();        
    }


   public function addEngineer($item)
   {
       $query = "INSERT INTO users (name, email, field_of_expertise, phone, profile_pic, linkedin_url, about_me, ngo_engg) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
       $values = array(
           $item['ctl_name'],
           $item['ctl_email'],
           $item['ctl_expertise'],
           $item['ctl_phone'],
           $item['ctl_profilepic'],
           $item['ctl_linkedin'],
           $item['ctl_aboutme'],
           $item['ctl_ngo_eng']
           );
       $this->db->query($query, $values);
       $last_id=$this->db->insert_id();

       $query = "INSERT INTO login (username, password, users_id) VALUES ( ?, ?, ?)";
       $values = array(
           $item['ctl_username'],
           $item['ctl_password'],
           $last_id
           );
       $this->db->query($query, $values);

   }

   public function oneUser($id)
   {
         $query = "SELECT * FROM users WHERE id=?";
    return $this->db->query($query, $id)->row_array();



   }

   public function updateUserNgo($data)
   {
      $array = array(
        'name' => $data['ctl_name'],
        'email' => $data['ctl_email'],
        'contact_person' => $data['ctl_contact_person'],
        'field_of_activities' => $data['ctl_field_activities'],
        'website' => $data['ctl_website']
        );
      // var_dump($array); die();

      $this->db->where('id', $data['ctl_usersid']);
      $this->db->update('users', $array);
    }

    public function updateUserEng($data)
    {
      $array = array(
        'name'                => $data['ctl_name'],
        'email'               => $data['ctl_email'],
        'phone'               => $data['ctl_phone'],
        'field_of_expertise'  => $data['ctl_expertise'],
        'linkedin_url'        => $data['ctl_linkedin'],
        'about_me'            => $data['ctl_aboutme']
        );

      $this->db->where('id', $data['ctl_userid']);
      $this->db->update('users', $array);
    }



   public function adminApproval()

   {
    return $this->db->query(
            "SELECT users.id, users.name, users.email, users.field_of_expertise, users.linkedin_url, users.field_of_activities, users.website, users.phone, login.approved
            FROM users
            LEFT JOIN login
            ON users.id=login.users_id
            WHERE login.approved = 0;")->result_array();

   }

   public function userApproveProcess($id)

   {
    $query = "SELECT * FROM login
              WHERE users_id = ?";
          return $this->db->query($query, $id)->row_array();

   }

   public function approvingTheUser($approving, $userID)

   {
    $query ="UPDATE login SET approved = $approving WHERE users_id=$userID";
    $this->db->query($query);

   }

   public function getAllAnswers()
   {
    return $this->db->query(
              "SELECT answers.id, answers.answer, users.name
              FROM answers
              LEFT JOIN users
              ON users_id = users.id;")->result_array();

   }

   public function deleteAnswer($answer_id)
   {
    $query = "DELETE FROM answers WHERE id = $answer_id";
    $this->db->query($query);

   }

   public function deleteAnswersComments($answer_id)

   {
    $query = "DELETE FROM comments WHERE answers_id = $answer_id";
    $this->db->query($query);

   }

   public function getAllComments()
   {
    return $this->db->query(
      "SELECT comments.id, comments.comment, users.name
       FROM comments
       LEFT JOIN users
       ON users_id = users.id;")->result_array();

   }

   public function deleteComment($comment_id)
   {
    $query = "DELETE FROM comments WHERE id = $comment_id";
    $this->db->query($query);

   }

   public function getAllQuestion()
   {
    return $this->db->query("SELECT * FROM questions")->result_array();


   }

   public function deleteQuestionPartOne($q_id)
   {
      $query =  "SELECT * FROM answers
                 Where questions_id = ?";
            return $this->db->query($query, $q_id)->row_array();


   }

   public function deleteQuestionPartTwo($question_id)
   {
    $query = "DELETE FROM answers WHERE questions_id = $question_id";
    $this->db->query($query);

   }

   public function deleteQuestion($question_id)
   {
    $query = "DELETE FROM questions
              WHERE id=?";
     $this->db->query($query, $question_id);

   }




}



<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class forum extends CI_Model
{
    
    public function listOfAll()
    {  

         return $this->db->query("SELECT * FROM questions ORDER BY created_at DESC LIMIT 5")->result_array();  
          
    }

    public function addQuestion( $item )
    {
        $query = "INSERT INTO questions (question, description, deadline, attachment, contact_info, users_id) VALUES ( ?, ?, ?, ?, ?, ?)";
        $values = array(
            $item['ctl_Qtitle'],
            $item['ctl_Qdesc'],
            $item['ctl_inputDate'],
            $item['ctl_inputAttach'],
            $item['ctl_inputContact'],
            $item['ctl_inputUserid']
        );
        $this->db->query($query, $values);
    }

    public function selectAQuestion($qid)
    {
         return $this->db->query(
             "SELECT questions.id, questions.question, questions.description, questions.deadline,questions.attachment, questions.contact_info, questions.created_at,questions.updated_at, questions.users_id, users.name FROM questions LEFT JOIN users ON questions.users_id = users.id WHERE questions.id = ? ",
             array($qid)
             )->row_array();   
    }

    public function selectAnswers($qid)
    {
         return $this->db->query(
             "SELECT answers.id, answers.answer,answers.created_at,answers.updated_at, answers.questions_id, answers.users_id, users.name FROM answers LEFT JOIN users ON answers.users_id = users.id WHERE questions_id=  ? ",
             array($qid)
             )->result_array();   
    }

    public function selectComments($aid)
    {
         return $this->db->query(
             "SELECT comments.id, comments.comment, comments.created_at, comments.updated_at, comments.answers_id, comments.users_id, users.name FROM comments LEFT JOIN users ON comments.users_id = users.id WHERE answers_id= ? ",
             array($aid)
             )->result_array();   
    }
   
   public function addAnswer( $item )
    {
        $query = "INSERT INTO answers (answer,questions_id,users_id) VALUES ( ?, ?, ?)";
        $values = array(
            $item['ctl_inputAnswer'],
             $item['ctl_questionId'],
            $item['ctl_inputUserid']     
        );
        $this->db->query($query, $values);
    }

public function addComment( $item )
    {
        $query = "INSERT INTO comments (comment, answers_id, users_id) VALUES ( ?, ?, ?)";
        $values = array(
            $item['ctl_InputComment'],
            $item['ctl_answerId'],
            $item['ctl_inputUserid']
        );
        $this->db->query($query, $values);
    }


  
}


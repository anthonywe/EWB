<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class forum extends CI_Model
{
    
    public function listOfAll()
    {
         // return $this->db->query("SELECT * FROM users ORDER BY  upvote desc")->result_array();  

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


  //   public function update_upvote($upvote_counter, $post_id)
  //   {
  //       $query = "UPDATE posts SET upvote = $upvote_counter WHERE id=$post_id";
        
  //       $this->db->query($query);
  //   // return $this->db->query("UPDATE posts SET upvote = ?,WHERE id=?"( $upvote_counter, $post_id);
  // }
}


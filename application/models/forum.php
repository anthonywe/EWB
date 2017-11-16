<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class forum extends CI_Model
{
    // public function addPost( $item )
    // {
    //     $query = "INSERT INTO posts (post, users_id) VALUES ( ?, ?)";
    //     $values = array(
    //         $item['ctl_name'],
    //         $item['ctl_userid']
    //     );
    //     $this->db->query($query, $values);
    // }

    public function listOfAll()
    {
         // return $this->db->query("SELECT * FROM users ORDER BY  upvote desc")->result_array();  

         return $this->db->query("SELECT * FROM questions ORDER BY created_at DESC LIMIT 5")->result_array();  

//          return $this->db->query("SELECT posts.id, posts.post, posts.upvote, posts.users_id, users.name 
// FROM reddit.posts left join reddit.users 
// ON posts.users_id=users.id  
// ORDER BY  upvote desc")->result_array();
          
    }

  //   public function update_upvote($upvote_counter, $post_id)
  //   {
  //       $query = "UPDATE posts SET upvote = $upvote_counter WHERE id=$post_id";
        
  //       $this->db->query($query);
  //   // return $this->db->query("UPDATE posts SET upvote = ?,WHERE id=?"( $upvote_counter, $post_id);
  // }
}


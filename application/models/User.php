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

}




}
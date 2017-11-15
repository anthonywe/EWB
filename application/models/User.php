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


    // public function addNGOtoLogin( $item )
    // {
    //     $query = "INSERT INTO ngo (name, contact_person, email, fields_of_activities, website, profile_pic) VALUES ( ?, ?, ?, ?, ?, ?)";
    //     $values = array(
    //         $item['ctl_name'],
    //         $item['ctl_cperson'],
    //         $item['ctl_email'],
    //         $item['ctl_activities'],
    //         $item['ctl_website'],
    //         $item['ctl_pic']
    //     );
    //     $this->db->query($query, $values);
    // }

    // public function checkLoginByEmailAndPass( $email, $passwd )
    // {
    //     return $this->db->query(
    //         "SELECT * FROM users WHERE email= ? AND password = ?",
    //         array($email, $passwd)
    //         )->row_array();        
    // }

    // public function listOfAll()
    // {
    //     return $this->db->query("SELECT * FROM users")->result_array();     
    // }
}

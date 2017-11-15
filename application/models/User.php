<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
    public function addNGO( $item )
    {
        $query = "INSERT INTO ngo (name, contact_person, email, fields_of_activities, website, profile_pic) VALUES ( ?, ?, ?, ?, ?, ?)";
        $values = array(
            $item['ctl_name'],
            $item['ctl_cperson'],
            $item['ctl_email'],
            $item['ctl_activities'],
            $item['ctl_website'],
            $item['ctl_pic']
        );
        $this->db->query($query, $values);
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

    }

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


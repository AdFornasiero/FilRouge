<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Users_model extends CI_Model
{

	public function selectAll(){
        return $this->db->get('users')->result();           
    }

    public function selectOne($id){
    	$this->db->where('userID', $id);
    	return $this->db->get('users')->result();
    }

    public function selectByEmail($email){
        $this->db->where('email', $email);
        return $this->db->get('users')->result();
    }

    public function add($params){
        if($this->db->insert('users', $params)){
            return true;
        }
        else{
            return false;
        }
    	
    }

    public function changePassword($id, $password){
        $this->db->where('userID', $id);
        $this->db->set('password', $password);
        $this->db->update('users');
    }

    public function doesEmailExists($email){
        $this->db->where('email', $email);
        $this->db->select('email');

        if(count($this->db->get('users')->result()) == 1){
            return $this->db->get('users')->result()[0];
        }
        else{
            return false;
        }
    }

    public function getLogs($email){
        $this->db->where('email', $email);
        $this->db->select('email, password');

        return $this->db->get('users')->row();
    }

    public function updateLastSignin($email){
        $date = new Datetime();
        $date->format('Y-m-d');
        $this->db->set('lastsign', $date);
        $this->db->where('email', $email);
        $this->db->update('users');
    }

}

?>
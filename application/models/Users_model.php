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

    public function add($params){
    	$this->db->insert('users', $params);
    }

    public function changePassword($id, $password){
        $this->db->where('userID', $id);
        $this->db->set('password', $password);
        $this->db->update('users');
    }

}

?>
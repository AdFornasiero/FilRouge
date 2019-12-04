<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Products_model extends CI_Model
{

		/*  SELECT ALL PRODUCTS  */
    public function selectAll(){
        return $this->db->get('products')->result();           
    }

    	/*  SELECT ONLY ONE PRODUCT  */
    public function selectOne($id) {
        $this->db->where('productID', $id);
        return $this->db->get('products')->result();           
    }

    	/*  SELECT PRODUCTS DEPENDING ON ONE OR MORE CRITERIA  */
    public function selectWithCriteria($params) {
	    $keys = array_keys($params);

	    foreach($keys as $key){	
	    	$this->db->where($key, $params[$key]);
	    }

	    return $this->db->get('products')->result();       
	}

		/*  SELECT ALL EXISTING MAKERS  */
	public function selectMakers(){
		$makersList = [];
		$this->db->select('maker');
		$this->db->distinct();
		$this->db->order_by('maker', 'ASC');
		$makers = $this->db->get('products')->result();
		foreach($makers as $maker){
			array_push($makersList, $maker->maker);
		}
		return $makersList;
	}

		/*  ADD A PRODUCT  */
	public function add($params){
		$this->db->insert('products', $params);
	}


		/*  UPDATE A PRODUCT  */
	public function update($id,$params){
		$this->db->where('productID', $id);
		$this->db->update('products', $params);
	}

}

?>
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

	    if(isset($params['minprice'])){
	    	$this->db->where('ptprice >= ', $params['minprice']);
	    }
	    if(isset($params['maxprice'])){
	    	$this->db->where('ptprice <= ', $params['maxprice']);
	    }
	    if(isset($params['category'])){
	    	$this->db->where('categoryID = ', $params['category']);
	    }
	    if(isset($params['name'])){
	    	$this->db->like('label', $params['name']);
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
			$makersList[$maker->maker] = $maker->maker;
		}
		array_unshift($makersList, "Sélectionnez");
		return $makersList;
	}

		/*  ADD A PRODUCT  */
	public function add($params){
		var_dump($params);
		$this->db->insert('products', $params);
	}


		/*  UPDATE A PRODUCT  */
	public function update($id,$params){
		$this->db->where('productID', $id);
		$this->db->update('products', $params);
	}

}

?>
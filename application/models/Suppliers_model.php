<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Suppliers_model extends CI_Model
{

	public function selectSuppliers(){
        $suppliersList = [];
        $this->db->select('supplierID, name');
        $this->db->order_by('name');
        $suppliers = $this->db->get('suppliers')->result();
        foreach($suppliers as $supplier){
            $suppliersList[$supplier->supplierID] = $supplier->name;
        }
        return $suppliersList;
    }

}

?>
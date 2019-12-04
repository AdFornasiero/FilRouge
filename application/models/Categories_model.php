<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Categories_model extends CI_Model
{

    public function selectCategories(){
        $categoriesList = [];
        $this->db->select('categoryID, label');
        $categories = $this->db->get('categories')->result();
        foreach($categories as $category){
            $categoriesList[$category->categoryID] = $category->name;
        }
        return $categoriesList;
    }

}

?>
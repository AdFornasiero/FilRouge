<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Categories_model extends CI_Model
{

    public function selectCategories(){
        $categoriesList = [];
        $this->db->select('categoryID, label');
        $categories = $this->db->get('categories')->result();
        foreach($categories as $category){
            $categoriesList[$category->categoryID] = $category->label;
        }
        return $categoriesList;
    }

    public function selectParentsCategories(){
    	$categoriesList = [];
        $this->db->select('categoryID, label');
        $this->db->where('parentID', 0);
        return $this->db->get('categories')->result();

    }

    public function selectSubCategories($parent){
    	$categoriesList = [];
    	$this->db->select('categoryID, label');
        $this->db->where('parentID', $parent);
        $subCats = $this->db->get('categories')->result();
        if(count($subCats) > 0){
        	return $subCats;
        }
        else{
        	return false;
        }
    }

    public function exists($category){
    	$this->db->where('categoryID', $category);

    	if(!empty($this->db->get('categories')->row())){
    		return $this->db->get('categories')->row();
    	}
    	else{
    		return false;
    	}
    	
    }

}

?>
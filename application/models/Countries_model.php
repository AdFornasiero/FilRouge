<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Countries_model extends CI_Model
{

	public function selectCountries(){
        $countriesList = [];
        $countries = $this->db->get('countries')->result();
        foreach($countries as $country){
            $countriesList[$country->charcode] = $country->name;
        }
        return $countriesList;
    }

}

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Category_model extends CI_Model{
     
    function get_category(){
        $query = $this->db->get_where('category', array('category_parent_id' => NULL));
        return $query;  
    }
 
    function get_sub_category($category_id){
        $query = $this->db->get_where('category', array('category_parent_id' => $category_id));
        return $query;
    }
     
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Category extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Category_model','category_model');
    }
 
    function index(){
        $data['category'] = $this->category_model->get_category()->result();
        $this->load->view('category_view', $data);
    }
 
    function get_sub_category(){
        $category_id = $this->input->post('id',TRUE);
        $data = $this->category_model->get_sub_category($category_id)->result();
        echo json_encode($data);
    }
}
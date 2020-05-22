<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class EventCRUD extends CI_Controller {
 
function __construct()
{
        parent::__construct();
 
/* Standard Libraries of codeigniter are required */
//$this->load->database();
$this->load->helper('url');
/* ------------------ */ 
 
$this->load->library('grocery_CRUD');
}
public function events()
{
$crud = new grocery_CRUD();
$crud->set_table('events');
$output = $this->grocery_crud->render();
$this->_example_output($output);
}
function _example_output($output=null){
    $this->load->view('eventCRUD',$output);


//echo "<pre>";
//print_r($output);
//echo "</pre>";
//die();
}
}

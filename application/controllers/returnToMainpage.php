<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainpage extends CI_Controller {
    
	public function index()
	{
            if($this->session->userdata['type']=="admin")
            {
                redirect("mainpageAdmin");
            }
            else
            {
                redirect('mainpageLoggedUser');
            }
		//$this->load->view('mainpage');
	}
}

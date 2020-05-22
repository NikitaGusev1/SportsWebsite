<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Favourites extends CI_Controller {
    function __construct() {
        parent::__construct();
        
        $this->load->model('FetchingDataMainpage');
    }
	public function index()
	{
            $favteams = $this->FetchingDataMainpage->favouriteTeams();
            if(!empty($favteams)){
                $data['favouriteteams'] = $favteams;
            }
            //echo $this->session->userdata();
            $this->load->view('favourites',$data);
	}
}

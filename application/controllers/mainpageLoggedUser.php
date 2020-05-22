<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainpageLoggedUser extends CI_Controller {
    function __construct() {
        parent::__construct();
        
        $this->load->model('FetchingDataMainpage');
    }
	public function index()
	{
                $result = $this->FetchingDataMainpage->displayTeams();
                $events = $this->FetchingDataMainpage->getEvents();
                if(!empty($events)){
                $data['events'] = $events;
                if(!empty($result)){
                $data['teams'] = $result;
            }
		$this->load->view('mainpageLoggedUser',$data);
	}
}
}

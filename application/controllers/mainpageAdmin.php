<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainpageAdmin extends CI_Controller {

	function __construct() {
        parent::__construct();
        
        $this->load->model('FetchingDataMainpage');
        
    }
	public function index()
	{
            $result = $this->FetchingDataMainpage->displayTeams();
            $events = $this->FetchingDataMainpage->getEvents();
            //$maxid = $this->FetchingDataMainpage->maxId();
            if(!empty($events)){
                $data['events'] = $events;
            }
            if(!empty($result)){
                $data['teams'] = $result;
            //$this->load->view('mainpageAdmin', $data);
	}
        $this->load->view('mainpageAdmin', $data);
        }
        public function savingdata() {
            $data = array(
              'homeTeam' => $this->input->post('homeTeam'),
              'awayTeam' => $this->input->post('awayTeam')
            );
            $this->db->insert('events',$data);
            redirect("mainpageAdmin");
        }
//        public function teamname()
//        {
//            $teamname = $this ->input->post('teamname');
//            echo $teamname;
//        }
        
}

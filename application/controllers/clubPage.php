<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClubPage extends CI_Controller {
    function __construct() {
        parent::__construct();
        
        $this->load->model('FetchingDataMainpage');
    }
	public function index()
	{
            $result = $this->FetchingDataMainpage->displayTeams();
            if(!empty($result)){
                $data['teams'] = $result;
            }
            $this->load->view('clubPage',$data);
	}
        public function favouriteTeams() {
 
     $data = array(
              'userId' => $this->input->post('userId'),
              'teamName' => $this->input->post('teamName')
            );
            $this->db->insert('favouriteteams',$data);
            redirect("clubPage");
 }
        public function deleteFavs() {
            $this->db->where('userId', $this->session->userId,'teamName',$team);
            $this->db->delete('favouriteteams');
        }
        public function event1() {
            $this->load->model('FetchingDataMainpage');
            $result = $this->FetchingDataMainpage->comments();
            $data['comments'] = $result;
            //$data['eventid'] = $this->uri->segment(3);
            $this->load->view('event1',$data);
            
        }
        public function event2() {
            $this->load->model('FetchingDataMainpage');
            $result = $this->FetchingDataMainpage->comments();
            $data['comments'] = $result;
            $this->load->view('event2',$data);
            //$data['eventid'] = $this->uri->segment(3);
        }
        public function comment() {
            $data = array(
              'eventid' => $this->input->post('eventid'),
              'userid' => $this->session->userId,
              'username' => $this->session->name,
              'commtext' => $this->input->post('commtext')
                
            );
            $this->db->insert('comments',$data);
            if(($this->session->type) == "admin") {
                
            redirect("mainpageAdmin");
            }
            else {
                redirect("mainpageLoggedUser");
            }
           
        }
}

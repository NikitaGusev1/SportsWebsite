<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comparison extends CI_Controller {
    function __construct() {
        parent::__construct();
        
        $this->load->model('FetchingDataMainpage');
    }
	public function index()
	{
            $result = $this->FetchingDataMainpage->displayTeams();
            if(!empty($result)){
                $data['teams'] = $result;
            //$this->load->view('mainpageAdmin', $data);
	}
            $this->load->view('comparison',$data);
            //return $result;
	}
        public function compare() {
            $result = $this->FetchingDataMainpage->displayTeams();
            if(!empty($result)){
                $data['teams'] = $result;
            }
            $data['compared'] = array(
                'teamOne' => $this->input->post('teamOne'),
                'teamTwo' => $this->input->post('teamTwo')
            );
            $this->load->view('compare',$data);
        }
}

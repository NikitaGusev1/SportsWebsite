<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxsearch extends CI_Controller {
    function __construct() {
        //$id = $this->session->userdata('userId');
        parent::__construct();
        $this->load->model('FetchingDataMainpage');
        //$id = $this->session->userId;
    }

 function index()
 {
//    $favteams = $this->FetchingDataMainpage->favouriteTeams();
//    if(!empty($favteams)){
//                $data['favouriteTeams'] = $favteams;
//            }
    $this->load->view('allTeams');
 }

 function fetch()
 {
  $output = '';
  $query = '';
  $this->load->model('FetchingDataMainpage');
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }
  $data = $this->FetchingDataMainpage->fetch_data($query);
  $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
      <tr>
       <th>Team Name</th>
       <th>Wins</th>
       <th>Losses</th>
       <th>Points</th>
       <th>Competition</th>
      </tr>
  ';
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
    $output .= '
      <tr>
       <td>'.$row->name. ' </td>
       <td>'.$row->wins.'</td>
       <td>'.$row->losses.'</td>
       <td>'.$row->points.'</td>
       <td>'.$row->competition.'</td>
      </tr>
    ';
   }
  }
  else
  {
   $output .= '<tr>
       <td colspan="5">No Data Found</td>
      </tr>';
  }
  $output .= '</table>';
  echo $output;
 // $this->load->view('allTeamsFooter',$data);
 }
 
 
}

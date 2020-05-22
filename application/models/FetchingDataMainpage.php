<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class FetchingDataMainpage extends CI_Model{
    
    function displayteams()
    {
        $query= $this->db->get('teams');
        return $result =  $query -> result();
    }
    function getEvents() {
        $query = $this->db->get('events');
        return $events = $query -> result();
    }
    function maxId() {
        $query = $this->db->get('events');
        $row = $query->last_row();
        return $row -> result();
    }
    function fetch_data($query)
     {
      $this->db->select("*");
      $this->db->from("teams");
      if($query != '')
      {
       $this->db->like('name', $query);
       $this->db->or_like('wins', $query);
       $this->db->or_like('losses', $query);
       $this->db->or_like('points', $query);
       $this->db->or_like('competition', $query);
      }
      $this->db->order_by('name', 'ASC');
      return $this->db->get();
      
 }
    function favouriteTeams() {
        $query= $this->db->get('favouriteteams');
        return $favteams =  $query -> result();
    }
    function comments() {
        $query= $this->db->get('comments');
        return $comments = $query -> result();
    }
 
}

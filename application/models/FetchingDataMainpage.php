<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{
    
    function displayrecords()
    {
        $query= $this->db->get('teams');
        return $query -> result();
    }
}
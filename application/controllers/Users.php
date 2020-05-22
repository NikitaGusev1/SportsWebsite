<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Users extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user');
        
    }
    
    /*
     * User account information
     */
    public function account(){
        $data = array();
        if($this->session->userdata('isUserLoggedIn')){
            $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
            //load the view
            $this->load->view('users/account', $data);
        }else{
            redirect('users/login');
        }
    }
    
    /*
     * User login
     */
    public function login(){
        $data = array();
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if($this->input->post('loginSubmit')){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'email'=>$this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'status' => '1'
                );
                $checkLogin = $this->user->getRows($con);
                if($checkLogin){
                    $this->session->set_userdata('isUserLoggedIn',TRUE);
                    $this->session->set_userdata('userId',$checkLogin['id']);
                    $this->session->set_userdata('name',$checkLogin['name']);
                    $this->session->set_userdata('type',$checkLogin['type']);
                    $this->session->set_userdata('password',$checkLogin['password']);
                    
                    if($checkLogin['type']=="admin")
                    {
                        redirect('mainpageAdmin');
                    }
                    elseif($checkLogin['type']=="user")
                    {
                        redirect('mainpageLoggedUser');
                    }
                }else{
                    $data['error_msg'] = 'Wrong email or password, please try again.';
                }
                
            }
        }
        //load the view
        $this->load->view('users/login', $data);
    }
    
    /*
     * User registration
     */
    public function registration(){
        $data = array();
        $userData = array();
        if($this->input->post('regisSubmit')){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

            $userData = array(
                'name' => strip_tags($this->input->post('name')),
                'email' => strip_tags($this->input->post('email')),
                'password' => md5($this->input->post('password')),
                'gender' => $this->input->post('gender'),
                'phone' => strip_tags($this->input->post('phone')),
                'type' => user
            );

            if($this->form_validation->run() == true){
                $insert = $this->user->insert($userData);
                if($insert){
                    $this->session->set_userdata('success_msg', 'Your registration was successful. Please login to your account.');
                    redirect('users/login');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
        $data['user'] = $userData;
        //load the view
        $this->load->view('users/registration', $data);
    }
    
    /*
     * User logout
     */
    public function logout(){
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('users/login/');
    }
    
    /*
     * Existing email check during validation
     */
    public function email_check($str){
        $con['returnType'] = 'count';
        $con['conditions'] = array('email'=>$str);
        $checkEmail = $this->user->getRows($con);
        if($checkEmail > 0){
            $this->form_validation->set_message('email_check', 'The given email already exists.');
            return FALSE;
        } else {
            return TRUE;
        }   
    }
//    public function _passcheck($passconf){
//        $oldpass = $this->session->password; 
//        if($oldpass== md5($this->input->post($passconf)))
//        {
//       $this->form_validation->set_message('_passcheck', 'New password can\'t match the current password');
//       return false;
//   }
//   return true;
//    }
        
    
    public function changep() {
        if($this->input->post('loginSubmit')){
//            $this->form_validation->set_rules('CurrentPassword', 'CurrentPassword', 'required');
            $this->form_validation->set_rules('password', 'New Password', 'required');
            $this->form_validation->set_rules('passconf', 'Confirm New Password', 'required|matches[password]');
            
            $userData = array( 
                        'password' => md5($this->input->post('password')),
                        'passconf' => md5($this->input->post('passconf'))
                        );
            if ($this->form_validation->run() == TRUE)
                {
                    $changed = $this->user->changep($userData);
                    if(($changed) == TRUE) {
                        redirect("users/login/");
                    }
                    
                }
                else
                {
                    
                    redirect('failure');  
                }
        }
        $this->load->view('users/changep');
    }
}
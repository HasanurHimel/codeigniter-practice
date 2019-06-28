<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $id=$this->session->userdata('id');
        if ($id !=NULL){
            redirect('SuperAdminController', 'refresh');
        }
    }

    public function index(){

        $data=array();
        $this->load->view('Backend/login/login_form');
    }

     public function login_check() {


       $email=$this->input->post('email', true);
       $password=$this->input->post('password', true);
       $result=$this->AdminModel->check_login_info($email , $password);
         $sdata=array();
         if ($result){

             $sdata['name']=$result->name;
             $sdata['id']=$result->id;
             $this->session->set_userdata($sdata);
             redirect('SuperAdminController');
         }
         else{
             $sdata['exception']='User id or password invalid';
             $this->session->set_userdata($sdata);
             redirect('Admin');
         }

     }




}
<?php


class AdminModel extends CI_Model
{

public function check_login_info($email, $password){

    $this->db->select('*');
    $this->db->from('db_admin');
    $this->db->where('email', $email);
    $this->db->where('password', md5($password));
                 $query_result=$this->db->get();
                 $result=$query_result->row();
                 return $result;


}




}
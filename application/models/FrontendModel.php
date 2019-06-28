<?php


class FrontendModel extends CI_Model
{

 public function all_published_category(){
     $query_result=$this->db->select('*')
         ->from('db_category')
         ->where('publication_status', 1)
         ->order_by('id', 'DESC')
         ->get();
     $result=$query_result->result();
     return $result;

 }
 public function all_published_blog(){
     $query_result=$this->db->select('*')
         ->from('db_blog')
         ->where('publication_status', 1)
         ->order_by('id', 'DESC')
         ->get();
     $result=$query_result->result();
     return $result;

 }
 public function blog_detail($id){

    $query_result= $this->db->select('blog_long_description')
         ->from('db_blog')
         ->where('id', $id)
         ->get();
        $result=$query_result->row();
    return $result;


 }

 public function category_blog($id){
     $query_result=$this->db->select('*')
         ->from('db_blog')
         ->where('blog_category', $id )
         ->order_by('id', 'DESC')
         ->get();
     $result=$query_result->result();
     return $result;
 }

}
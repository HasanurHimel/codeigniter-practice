<?php


class SuperAdminModel extends CI_Model
{

    public function category_save($data){

        $this->db->insert('db_category', $data);
    }

    public function get_category_info()
    {
        $query_result= $this->db->select('*')
                                                        ->from('db_category')
//                                                        ->where('publication_status', 1)
                                                        ->order_by("id", 'DESC')
                                                        ->limit(10)
                                                        ->get();

               $result=$query_result->result();
               return $result;

}

 public function unpublished_category($id)
 {
     $query_result= $this->db->set('publication_status', 0)
         ->where('id', $id)
         ->update('db_category');

 }
 public function published_category($id)
 {
     $query_result= $this->db->set('publication_status', 1)
         ->where('id', $id)
         ->update('db_category');

 }
 public function edit_category($id){
        $query_result=$this->db->select('*')
            ->from('db_category')
            ->where('id', $id)
            ->get();
        $result=$query_result->row();
            return $result;
 }

 public function category_update($data, $id){
     $this->db->update('db_category', $data, array('id' => $id));
 }
 public function delete_category($id){
     $this->db->where('id', $id);
     $this->db->delete('db_category');
 }
 public function get_all_published_category_info(){
     $query_result= $this->db->select('*')
         ->from('db_category')
         ->where('publication_status', 1)
         ->order_by("id", 'DESC')
         ->get();

     $result=$query_result->result();
     return $result;
 }

 public function save_blog($data){

        $this->db->insert('db_blog', $data);
 }


 public function get_all_blog_data(){
     $query_result=$this->db->from('db_blog')
          ->join('db_category', 'db_category.id = db_blog.blog_category', 'left')
          ->select('db_category.category_name')
         ->select( 'db_blog.*')
          ->order_by('id', 'DESC')
          ->get();

       $result=$query_result->result();
       return $result;


 }

    public function unpublished_blog($id)
    {
        $query_result= $this->db->set('publication_status', 0)
            ->where('id', $id)
            ->update('db_blog');

    }
    public function published_blog($id)
    {
        $query_result= $this->db->set('publication_status', 1)
            ->where('id', $id)
            ->update('db_blog');

    }
    public function edit_blog($id){
        $query_result=$this->db->select('*')
            ->from('db_blog')
            ->where('id', $id)
            ->get();
        $result=$query_result->row();
        return $result;
    }
    public function update_blog($data, $id){

        $this->db->update('db_blog', $data, array('id' => $id));
    }

    public function delete_blog($id){
        $this->db->where('id', $id);
        $this->db->delete('db_blog');
    }

}
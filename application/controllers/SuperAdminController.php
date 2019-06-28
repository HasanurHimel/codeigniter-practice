        <?php


        defined('BASEPATH') OR exit('No direct script access allowed');


        class SuperAdminController extends CI_Controller
        {

            public function __construct()
            {
                parent::__construct();
                $id=$this->session->userdata('id');
                if ($id ==NULL){
                    redirect('Admin', 'refresh');
                }
            }

            public function logout(){
                $this->session->unset_userdata('id');
                $this->session->unset_userdata('name');

                $sdata=array();
                $sdata['exception']='You have successfully logged out';
                $this->session->set_userdata($sdata);
                redirect('Admin','refresh');
            }
         public function index()
        {
        $data = array();
        $data['main_content'] = $this->load->view('Backend/includes/home_content', $data, true);
        $this->load->view('Backend/master', $data);
        }

        public function create_category()
        {
        $data = array();
        $data['main_content'] = $this->load->view('Backend/includes/create_category', ' ', true);
        $this->load->view('Backend/master', $data);
        }

        public function category_form_validation()
        {
            $this->form_validation->set_rules('category_name', 'Category name',  'required|is_unique[db_category.category_name]');
            $this->form_validation->set_rules( 'category_description', 'category description', 'required|min_length[5]|max_length[120]');
            $this->form_validation->set_rules('publication_status', 'publication status', 'required');




        }
        public function category_save(){

                $this->category_form_validation();

;
            if ($this->form_validation->run() == FALSE)
            {
                $this->create_category();

            }
            else
            {
                $data=array();
                $data['category_name']=$this->input->post('category_name');
                $data['category_description']=$this->input->post('category_description');
                $data['publication_status']=$this->input->post('publication_status');
                $result=$this->SuperAdminModel->category_save($data);
                $sdata=array();
                $sdata['message']='Your category created successfully';
                $this->session->set_userdata($sdata);
                redirect('SuperAdminController/create_category');

            }



        }

        public function manage_category()
        {
        $data = array();
        $data['all_published_data']=$this->SuperAdminModel->get_category_info();

        $data['main_content'] = $this->load->view('Backend/includes/manage_category', $data , true);
        $this->load->view('Backend/master', $data);
        }
        public function unpublished_category($id){


                $this->SuperAdminModel->unpublished_category($id);
                $sdata=array();
                $sdata['message']='Your category Unpublished successfully !! ';
                 $this->session->set_userdata($sdata);
                redirect('SuperAdminController/manage_category');

        }
        public function published_category($id){


                $this->SuperAdminModel->published_category($id);
                $sdata=array();
                $sdata['message']='Your category Published successfully !! ';
                 $this->session->set_userdata($sdata);
                redirect('SuperAdminController/manage_category');

        }

        public function edit_category($id){
                $data=array();
                $data['edit_data'] =$this->SuperAdminModel->edit_category($id);
                $data['main_content'] = $this->load->view('Backend/includes/edit_category', $data , true);
                $this->load->view('Backend/master', $data);
        }

        public function category_update($id){

            $this->category_form_validation();
            ;
            if ($this->form_validation->run() == FALSE)
            {
                $this->edit_category($id);
            }
            else
            {
                $data=array();
                $data['category_name']=$this->input->post('category_name');
                $data['category_description']=$this->input->post('category_description');
                $data['publication_status']=$this->input->post('publication_status');
                $result=$this->SuperAdminModel->category_update($data, $id);
                $sdata=array();
                $sdata['message']='Your category Updated successfully';
                $this->session->set_userdata($sdata);
                redirect('SuperAdminController/manage_category');

            }

        }

        public function delete_category($id){
                $this->SuperAdminModel->delete_category($id);
                $sdata=array();
                $sdata['message']='Your category Deleted successfully';
                $this->session->set_userdata($sdata);
                redirect('SuperAdminController/manage_category');
        }


        public function create_blog()
        {
        $data = array();
        $data['category_name']=$this->SuperAdminModel->get_all_published_category_info();
        $data['main_content'] = $this->load->view('Backend/includes/create_blog', $data, true);
        $this->load->view('Backend/master', $data);
        }

            protected function blog_form_validation(){
                $this->form_validation->set_rules( 'blog_title', 'Blog title', 'required|min_length[5]|max_length[120]');
                $this->form_validation->set_rules( 'blog_short_description', 'Blog short description', 'required|min_length[5]|max_length[200]');
                $this->form_validation->set_rules( 'blog_long_description', 'Blog long description', 'required|min_length[5]');
                $this->form_validation->set_rules('publication_status', 'publication status', 'required');
            }

            protected function blog_photo_upload(){

                    $config['upload_path'] = 'images/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = 200;
                    $config['max_width'] = 1024;
                    $config['max_height'] = 768;
                    $error = '';
                    $fdata = array();
                    $this->load->library('upload', $config);

                if (!$this->upload->do_upload('blog_photo')) {
                    $error = $this->upload->display_errors();

                    echo $error;
                    exit();

                } else {
                    $fdata = $this->upload->data();
//                        echo '<pre>';
//                        print_r($fdata);

                    $image_url= $config['upload_path'].$fdata['file_name'];
                }

                return $image_url;
                }



        public function save_blog() {
            $this->blog_form_validation();
            if ($this->form_validation->run() == FALSE){
               $this->create_blog();
            }
            else {
                $data = array();

                $data['blog_category'] = $this->input->post('blog_category', true);
                $data['blog_title'] = $this->input->post('blog_title', true);
                $data['blog_short_description'] = $this->input->post('blog_short_description', true);
                $data['blog_long_description'] = $this->input->post('blog_long_description', true);
                $data['publication_status'] = $this->input->post('publication_status', true);
                $data['blog_photo']=$this->blog_photo_upload();

                $this->SuperAdminModel->save_blog($data);
                $sdata=array();
                $sdata['message']='Blog created successfully';
                $this->session->set_userdata($sdata);
                redirect('SuperAdminController/create_blog');
            }

            }

        public function manage_blog()
        {
        $data = array();
//        $result=$this->SuperAdminModel->get_all_blog_data();
//        echo '<pre>';
//        print_r($result);
//        exit();
        $data['all_blog_data']=$this->SuperAdminModel->get_all_blog_data();
        $data['main_content'] = $this->load->view('Backend/includes/manage_blog', $data, true);
        $this->load->view('Backend/master', $data);
        }

            public function unpublished_blog($id){


                $this->SuperAdminModel->unpublished_blog($id);
                $sdata=array();
                $sdata['message']='Your Blog Unpublished successfully !! ';
                $this->session->set_userdata($sdata);
                redirect('SuperAdminController/manage_blog');

            }
            public function published_blog($id){


                $this->SuperAdminModel->published_blog($id);
                $sdata=array();
                $sdata['message']='Your Blog Published successfully !! ';
                $this->session->set_userdata($sdata);
                redirect('SuperAdminController/manage_blog');

            }

            public function edit_blog($id){
                $data=array();
                $data['edit_data'] =$this->SuperAdminModel->edit_blog($id);
                $data['category_name']=$this->SuperAdminModel->get_all_published_category_info();
                $data['main_content'] = $this->load->view('Backend/includes/edit_blog', $data, true);
                $this->load->view('Backend/master', $data);
            }

            public function update_blog($id){

                $data=array();

                $this->blog_form_validation();
                ;
                if ($this->form_validation->run() == FALSE)
                {
                    $this->edit_blog($id);

                }
                else
                {
                    $data['blog_category'] = $this->input->post('blog_category', true);
                    $data['blog_title'] = $this->input->post('blog_title', true);
                    $data['blog_short_description'] = $this->input->post('blog_short_description', true);
                    $data['blog_long_description'] = $this->input->post('blog_long_description', true);
                    $data['publication_status'] = $this->input->post('publication_status', true);

                    if (!empty($_FILES['blog_photo']['name'])) {
                        $data['blog_photo']=$this->blog_photo_upload();
                    }
                    $this->SuperAdminModel->update_blog($data, $id);

                    $sdata=array();
                    $sdata['message']='Your blog Updated successfully';
                    $this->session->set_userdata($sdata);
                    redirect('SuperAdminController/manage_blog');

                }

            }


            public function delete_blog($id){
                $this->SuperAdminModel->delete_blog($id);
                $sdata=array();
                $sdata['message']='Your Blog Deleted successfully';
                $this->session->set_userdata($sdata);
                redirect('SuperAdminController/manage_blog');
            }


        }
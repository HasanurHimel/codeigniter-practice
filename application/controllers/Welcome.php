<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


    public function index()
	{
	    $data=array();
	    $data['calendar']=$this->calendar->generate($calendar);
        $data['title']='Home page';
	    $data['all_published_category']=$this->FrontendModel->all_published_category();
	    $data['all_published_blog']=$this->FrontendModel->all_published_blog();
	    $data['welcome_bar']=$this->load->view('Frontend/includes/welcome_display',' ',true);
	    $data['main_content']=$this->load->view('Frontend/includes/home_content',$data,true);
		$this->load->view('Frontend/master', $data);
	}

	public function about(){
	    $data=array();
        $data['title']='About page';
        $data['all_published_category']=$this->FrontendModel->all_published_category();
        $data['main_content']=$this->load->view('Frontend/includes/about', $data,true);
	    $this->load->view('Frontend/master', $data);
    }

    public function category_content($id){
        $data=array();
        $data['title']='category blog';
        $data['all_published_category']=$this->FrontendModel->all_published_category();
        $data['category_blog']=$this->FrontendModel->category_blog($id);
        $data['main_content']=$this->load->view('Frontend/includes/category_blog',$data,true);
        $this->load->view('Frontend/master', $data);
    }

    public function blog_details($id){
        $data=array();
        $data['title']='Blog detail';
        $data['all_published_category']=$this->FrontendModel->all_published_category();
        $data['blog_detail']=$this->FrontendModel->blog_detail($id);
        $data['main_content']=$this->load->view('Frontend/includes/blog_detail', $data ,true);
        $this->load->view('Frontend/master', $data);
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller{

     public function __construct() {
      
        parent::__construct();
        
        $this->load->model('GeneralModel');

       $session = $this->session->userdata('student_login');



     }



     function index()
     {
      
       $data['page']='Student/dashboard';
       
       $data['student']=$this->GeneralModel->all('student');
       
       $this->load->view('common_std/template',$data);
         
     }


     function student_profile(){

        $data['page']='Student/student_profile';
        $data['edit_data']  = $this->db->get_where('student', array(
            'student_id' => $this->session->userdata('student_id')
        ))->result_array();
        
        $this->load->view('common_std/template',$data);
     }




 

}


?>
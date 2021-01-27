
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    function __construct()
    {
        
        parent::__construct();
       
        //Do your magic here
        $session  = $this->session->userdata('admin_login');
       error_reporting(0);
       
       
        
        if ($session =='') {
        redirect('Login');
        }
        $this->load->model('GeneralModel');
        $this->load->model('LiveModel');
    }
    

     function index()
    {
       $data['page']='Admin/dashboard';

       $this->load->view('common/template',$data);
        
    }
//   =====================STUDENT=======================
     function student(){

        $data['page']='Admin/student';

        $data['course'] = $this->GeneralModel->all('course');

        $this->load->view('common/template',$data);

    }

//  ==================== ADD STUDENT=====================

    function add_student(){


        //  Upload Image

        if($_FILES['photo']['name']!=""){

            if($_FILES['photo']['error'] ===0){
                    $config=
                   [
                        'upload_path'=>'./assets/upload/',
                        'allowed_types'=>'png|jpg|jpeg',
                   ];
                   $this->load->library('upload',$config);
                   if(! $this->upload->do_upload('photo')){
                       $error = $this->upload->display_errors();
                       $this->session->set_flashdata("error_msg",$error);
                      
                       redirect('Admin');

                   }
                  
            $data_photo=$this->upload->data();
            $photo = $data_photo['file_name'];

            }

          }

            else{

            $photo=$this->input->post('old');
          }
         
        
        extract($_POST);

        $data=array(

             'student_id' =>$id,
             'first_name'=>$first_name,
             'father_name'=>$father_name,
             'reg_no'=>$reg_no,
             'dob'=>$dob,
             'gender'=>$gender,
             'course_code'=>$class_id,
             'semister_id'=>$semister_id,
             'address'=>$address,
             'contact'=>$contact,
             'photo'=>$photo,
             'email'=>$email,
             'password'=>md5($password),
        );  

             
       
         $insert_id= $this->GeneralModel->add($id,'student',$data);
        
         if($insert_id){
           if($id ==''){
             $this->session->set_flashdata("add_msg",'Record has been added successfully');
             
             redirect('Admin/student');
           }
           else{
            $this->session->set_flashdata("add_msg",'Record has been updated successfully');
            redirect('Admin/student');
           }
         
         }
         else{
   
            $this->session->set_flashdata("error_msg",'Error Updation');
            redirect('Admin/student');
         }            

    }
   

// ============================================SHOW ALL STUDENT================================

 function student_list(){

        $take = $this->input->get('take');
        $skip = $this->input->get('skip');
        $list = $this->GeneralModel->get_student_list($take,$skip);
        $total=count($list);
        
        echo "{\"total\":".$total.",\"data\":" .json_encode($list). "}";

    }

// ==========================================DELETE STUDENT=======================================
 function delete_student(){
    $id = $this->input->post('u_id');

    $this->GeneralModel->delete('student','id',$id);
 }



//   ====================TEACHER=====================
    
    public function teacher(){

        $data['page']='Admin/teacher';

        $this->load->view('common/template',$data);

    }

     function add_teacher(){


        
        if($_FILES['photo']['name']!=""){

            if($_FILES['photo']['error'] ===0){
                    $config=
                   [
                        'upload_path'=>'./assets/upload/',
                        'allowed_types'=>'png|jpg|jpeg',
                   ];
                   $this->load->library('upload',$config);
                   if(! $this->upload->do_upload('photo')){
                       $error = $this->upload->display_errors();
                       $this->session->set_flashdata("error_msg",$error);
                      
                       redirect('Admin');

                   }
                  
            $data_photo=$this->upload->data();
            $photo = $data_photo['file_name'];

            }

          }

            else{

            $photo=$this->input->post('old');
          }
         

        extract($_POST);

        $data = array(
            'id'=>$id,
            'name'=>$name,
            'birthday'=>$birthday,
            'gender'=>$gender,
            'designation'=>$designation,
            'education'=>$education,
            'experience'=>$experience,
            'address'=>$address,
            'phone'=>$phone,
            'photo'=>$photo,
            'email'=>$email,
            'password'=>md5($password)

        );

        $insert_id = $this->GeneralModel->add($id,'teacher',$data);
       
        if($insert_id){
            $this->session->set_flashdata("add_msg",'Record has been added successfully');
             
            redirect('Admin/teacher');
        }

        else{

            $this->session->set_flashdata("error_msg",'Email is already exist please try another email');
            redirect('Admin/teacher');

        }
    }

     function teacher_list(){
        
        $take = $this->input->get('take');
        $skip = $this->input->get('skip');
        $list = $this->GeneralModel->get_teacher_list($take,$skip);
       
        $total=count($list);
        
        echo "{\"total\":".$total.",\"data\":" .json_encode($list). "}";
    }



//  Delete teacher

   function delete_teacher(){
    $id = $this->input->post('u_id');

    $this->GeneralModel->delete('teacher','id',$id);
    }



// ===================== USERS=========================

     function user(){

        $data['page']='Admin/users';

        $this->load->view('common/template',$data);

    }
// =======================CLASS==========================
    
 function classList(){

        $data['page']='Admin/course';

        $this->load->view('common/template',$data);

    }
//  Show all courses()

function add_course(){

    extract($_POST);

    $data =array(

        'id' =>$id,
        'course_code'=>$course_code,
        'course_name'=>$course_name,
        'course_type'=>$course_type
    );


        $insert_id = $this->GeneralModel->save_course($id,'course',$data);
       
        if($insert_id){
            $this->session->set_flashdata("add_msg",'Record has been added successfully');
             
            redirect('Admin/classList');
        }

        else{

            $this->session->set_flashdata("error_msg",'Email is already exist please try another email');
            redirect('Admin/classList');

        }
}


function show_all_course(){

        $take = $this->input->get('take');
        $skip = $this->input->get('skip');
        $list = $this->GeneralModel->all('course',$take,$skip); 

        $total=count($list);
        
        echo "{\"total\":".$total.",\"data\":" .json_encode($list). "}";

}


function delete_course(){

    $id = $this->input->post('u_id');

    $this->GeneralModel->delete('course','id',$id);
}


//=========================SEMISTER======================
    
 function semister(){

        $data['page']='Admin/semister';

        $this->load->view('common/template',$data);

    }


function add_semister(){

    extract($_POST);

    $data =array(

        'id' =>$id,
        'semister_name'=>$semister_name,
        'semister_time'=>$semister_time,
    );

    $insert_id = $this->GeneralModel->add_class($id,'semister',$data);
   
    if($insert_id){
        $this->session->set_flashdata("add_msg",'Record has been added successfully');
         
        redirect('Admin/semister');
    }

    else{

        $this->session->set_flashdata("error_msg",'Email is already exist please try another email');
        redirect('Admin/semister');

    }

}

// =========================SUBJECT====================
    
function subjects(){

        $data['page']='Admin/subject';

        $data['teacher'] = $this->GeneralModel->all('teacher');

       

        $this->load->view('common/template',$data);

    }


//  ADD Subject

 function add_subject(){

    extract($_POST);

    $data =array
    (

        'id'=>$id,
        'subject_name'=>$subject_name,
        'subject_code'=>$subject_code,
        'teacher_id'=>$teacher_id
    );


   $insert_id = $this->GeneralModel->add_subject($id,'subject',$data);
   
    if($insert_id){
        $this->session->set_flashdata("add_msg",'Record has been added successfully');
         
        redirect('Admin/teacher');
    }

    else{

        $this->session->set_flashdata("error_msg",'Error');

    }
 }


  function subject_list(){
        
        $take = $this->input->get('take');
        $skip = $this->input->get('skip');
        $list = $this->GeneralModel->show_subjects_list($take,$skip);
       
       
        $total=count($list);
        
        echo "{\"total\":".$total.",\"data\":" .json_encode($list). "}";
    }



 function delete_subject(){
    $id = $this->input->post('u_id');

    $this->GeneralModel->delete('subject','id',$id);
 }
// ========================DOCUMENT====================
    
     function document(){

        $data['page']='Admin/document';

        $data['teacher'] = $this->GeneralModel->all('teacher');
        $data['course']  = $this->GeneralModel->all('course');
        $data['subject'] =$this->GeneralModel->all('subject');


        $this->load->view('common/template',$data);

    }


    function add_document(){
       
        if($_FILES['link']['name']!=""){

            if($_FILES['link']['error'] ===0){
                    $config=
                   [
                        'upload_path'=>'./assets/document/',
                        'allowed_types'=>'*',
                        'overwrite'=>TRUE,
                        
                   ];
                   $this->load->library('upload',$config);
                   if(!$this->upload->do_upload('link')){
                       $error = $this->upload->display_errors();
                       $this->session->set_flashdata("error_msg",$error);
                      
                       redirect('Admin');

                   }
                  
            $data_photo=$this->upload->data();
            $link = $data_photo['file_name'];
            

            }

          }

            else{

            $link=$this->input->post('old_link');
          }


       extract($_POST);

       $data = array(


        'd_id'=>$id,
        'subject_id'=>$subject_id,
        'teacher_name'=>$teacher_id,
        'month'=>$month,
        'year'=>$year,
        'day'=>$day,
        'course'=>$course,
        'content_type'=>$content_type,
        'link'=>$link

       );


        $insert_id = $this->GeneralModel->save_document($id,'content',$data);
       
        if($insert_id){
            $this->session->set_flashdata("add_msg",'Record has been added successfully');
             
            redirect('Admin/document');
        }

        else{

            $this->session->set_flashdata("error_msg",'Record insertion Failed!!!');
            redirect('Admin/document');

        }
    }


    function list_document(){
        $take = $this->input->get('take');
        $skip = $this->input->get('skip');
        $list = $this->GeneralModel->document_list($take,$skip);


     
       
       
        $total=count($list);
        
        echo "{\"total\":".$total.",\"data\":" .json_encode($list). "}";

    }
//==========================ACCOUNT===================
    
 function Fee(){

        $data['page']='Admin/fee';


        $data['student'] = $this->GeneralModel->all('student');
        $data['course'] = $this->GeneralModel->all('course');

        $this->load->view('common/template',$data);

   }
// ========================SETTINGS==================
   
function setting(){
            
        $data['page']='Admin/setting';

        $this->load->view('common/template',$data);

   }


//  Update status 

 function update_status(){

    $id = $this->input->post('id');

    $this->GeneralModel->updateStatus('teacher','id',$id);


 }

/******MANAGE BILLING / INVOICES WITH STATUS*****/

function invoice($param1 = '', $param2 = '', $param3 = '')
    {
        
        if ($param1 == 'create') {
           
            $data['student_id']         = $this->input->post('student_id');
            $data['title']              = $this->input->post('title');
            $data['description']        = $this->input->post('description');
            $data['amount']             = $this->input->post('amount');
            $data['amount_paid']        = $this->input->post('amount_paid');
            $data['due']                = $data['amount'] - $data['amount_paid'];
            $data['status']             = $this->input->post('status');
            $data['creation_timestamp'] = date("d-m-Y", strtotime($this->input->post('date')));
           
            $this->db->insert('invoice', $data);
            $invoice_id = $this->db->insert_id();

            $data2['invoice_id']        =   $invoice_id;
            $data2['student_id']        =   $this->input->post('student_id');
            $data2['title']             =   $this->input->post('title');
            $data2['description']       =   $this->input->post('description');
            $data2['payment_type']      =  'Fee';
            $data2['method']            =   $this->input->post('method');
            $data2['amount']            =   $this->input->post('amount_paid');
            $data2['timestamp']         =   date("d-m-Y", strtotime($this->input->post('date')));
           
            $this->db->insert('payment' , $data2);

            // $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            echo "addeed";
            redirect(base_url() . 'admin/invoice', 'refresh');
        }
        $page_data['page']  = 'Admin/payment';
        // $page_data['page_title'] = get_phrase('manage_invoice/payment');
        $this->db->order_by('creation_timestamp', 'desc');
        $page_data['invoices'] = $this->db->get('invoice')->result_array();
        $this->load->view('common/template', $page_data);
    }

 
   function edit_payment($invoice_id){
        $invoice_id=$this->uri->segment(3);
        $data['page'] ='Admin/edit_payement';
        $data['edit_data'] = $this->GeneralModel->edit_pay($invoice_id);

        // print_r($data['edit_data']);die;

        $this->load->view('common/template',$data);

   }


   function update_invoice(){
      
      $date = date("d-m-Y", strtotime($this->input->post('date')));
      extract($_POST);
  
      $data = array(

        'invoice_id'=>$invoice_id,
        'student_id'=>$student_id,
        'title'=>$title,
        'description'=>$description,
        'amount'=>$amount,
        'amount_paid'=>$amount_paid,
        'creation_timestamp'=>$date,
        'status'=>$status,
        'payment_method'=>$method
      );

            $this->db->where('invoice_id', $invoice_id);
            $this->db->update('invoice', $data);
            $this->session->set_flashdata('flash_message' ,'updated ');
            redirect(base_url() . 'admin/invoice', 'refresh');
      


   }

   function delete_invoice($invoice_id){
     
     $invoice_id =$this->uri->segment(3);

    $this->db->where('invoice_id',$invoice_id);
    $this->db->delete('invoice');
      redirect(base_url() . 'admin/invoice', 'refresh');


   }


// ************************************Live CLass *************************//


   function live_class(){
   
     


     $page_data['page']='Admin/live_class';

     $page_data['course'] = $this->GeneralModel->all('course');

     $page_data['live_classes']=$this->LiveModel->showLiveClass();
    

    $this->load->view('common/template', $page_data);



   }

   function add_live_class(){


     $arrayLive = array(

            'title'             => html_escape($this->input->post('title')),
            'meeting_id'        => $this->input->post('meeting_id'),
            'meeting_password'  => $this->input->post('meeting_password'),
            'course_id'          => html_escape($this->input->post('course_id')),
            'date'              => strtotime($this->input->post('date')),
            'start_time'        => date("H:i", strtotime($this->input->post('start_time'))),
            'end_time'          => date("H:i", strtotime($this->input->post('end_time'))),
            'remarks'           => html_escape($this->input->post('remarks')),
            'created_by'        => $this->session->userdata('username').'-'.$this->session->userdata('admin_id')

        );


        $insert_id = $this->LiveModel->addClassLive('live_class',$arrayLive);
       
        if($insert_id){
            $this->session->set_flashdata("add_msg",'Record has been added successfully');
             
            redirect('Admin/live_class');
        }

        else{

            $this->session->set_flashdata("error_msg",'Record is not successfully insert');
            redirect('Admin/live_class');

        }

      

   }


   function  edit_live_class($live_class_id){

        $live_class_id = $this->uri->segment(3);

        $data['page'] ='Admin/edit_live_class';

        $data['edit_live_class'] =$this->LiveModel->getLiveClass($live_class_id);

        $this->load->view('common/template',$data);

   }


   function update_live_class(){

        $live_class_id = $this->input->post('live_class_id');

          
     $arrayLive = array(
            'live_class_id'    => $live_class_id,
            'title'             => html_escape($this->input->post('title')),
            'meeting_id'        => $this->input->post('meeting_id'),
            'meeting_password'  => $this->input->post('meeting_password'),
            'course_id'          => html_escape($this->input->post('course_id')),
            'date'              => strtotime($this->input->post('date')),
            'start_time'        => date("H:i", strtotime($this->input->post('start_time'))),
            'end_time'          => date("H:i", strtotime($this->input->post('end_time'))),
            'remarks'           => html_escape($this->input->post('remarks')),
            'created_by'        => $this->session->userdata('username').'-'.$this->session->userdata('admin_id')

        );


        $update_id = $this->LiveModel->updateLiveClass($live_class_id,$arrayLive);
       
        if($update_id){
            $this->session->set_flashdata("add_msg",'Record has been Updated successfully');
             
            redirect('Admin/live_class');
        }

        else{

            $this->session->set_flashdata("error_msg",'Record is not successfully Updated');
            redirect('Admin/live_class');

        }


   }



   function delete_live_class($live_class_id){
     
     $live_class_id =$this->uri->segment(3);

    $this->db->where('live_class_id',$live_class_id);
    $this->db->delete('live_class');
      redirect(base_url() . 'admin/live_class', 'refresh');


   }
 




/* End of file Controllername.php */
}

?>
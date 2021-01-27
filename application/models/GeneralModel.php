<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneralModel extends CI_Model {
  
  function add($id,$table_name,$data){
    
     if ($table_name=='student'){

        $email =$this->input->post('email');

        $query  = $this->db->query("SELECT * FROM $table_name where email ='$email'");

         $count_row = $query->num_rows();


            if ($count_row == 0){
       
               if ($id == '') {
                  $this->db->set('created_date', 'NOW()', FALSE);
                  $this->db->insert($table_name, $data);
                  $insert_id = $this->db->insert_id();
                  return $insert_id;
                } 
           }

    else{
        if ($id!=''){

            $updated=$this->db->where('student_id', $id)->update($table_name, $data);
            
            return $updated;
        }
    }
   

     }

    
 }


 function add_teacher($id,$table_name,$data){
    
     if ($table_name=='teacher'){

        $email =$this->input->post('email');

        $query  = $this->db->query("SELECT * FROM $table_name where email ='$email'");

         $count_row = $query->num_rows();


            if ($count_row == 0){
       
               if ($id == '') {
                  $this->db->set('created_date', 'NOW()', FALSE);
                  $this->db->insert($table_name, $data);
                  $insert_id = $this->db->insert_id();
                  return $insert_id;
                } 
           }

    else{
        if ($id!=''){

            $updated=$this->db->where('id', $id)->update($table_name, $data);
            
            return $updated;
        }
    }
   

     }

    
 }

function get_student_list($take,$skip){
 
      $result=$this->db->select("*")->from('student')->get();
      return $result->result_array();
}

function get_teacher_list($take,$skip){
 
    $result=$this->db->select("*")->from('teacher')->get();
    return $result->result_array();
}


function delete($table_name,$db_field,$value){
	
		$this->db->where($db_field,$value);
		$this->db->delete($table_name);
}

function get_all($table_name){
 
      $result=$this->db->select("id,CONCAT(first_name, ' ', last_name) AS name", FALSE)->from($table_name)->get();

      return $result->result_array();
}

function get_fee_list($take,$skip){

	$result=$this->db->query("SELECT student.father_name, concat(first_name,' ',last_name) as student_name, fee.* from student INNER JOIN fee on fee.student_id=student.id");

	    return $result->result_array();
}

function get_subject_list($take,$skip){

       
       $result= $this->db->select('*')->from('subject')->get();

       return $result->result_array();

}

function all($table_name){


   $result = $this->db->select('*')->from($table_name)->get();

   return $result->result_array();


}
//  Unique email and reg_no


//  update status 

function updateStatus($table_name,$db_field,$value){
 
    $qry = $this->db->query('SELECT * FROM '.$table_name.' WHERE '.$db_field.' = "'.$value.'"');
      $result = $qry->row_array();
      $status = $result['status'];
      if($status=='active'){
      $this->db->set('status','inactive');
      $this->db->where($db_field,$value)->update($table_name);
      }else{
          $this->db->set('status','active');
         $this->db->where($db_field,$value)->update($table_name);
      }


}


function add_subject($id,$table_name,$data){

    if ($id == '') {

        $this->db->set('created_date', 'NOW()', FALSE);
        $this->db->insert($table_name, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
  } 

  else{


      $updated=$this->db->where('id', $id)->update($table_name, $data);
     
      return $updated;

  }

}


function show_subjects_list($take,$skip){
   
  $this->db->select('*');    
  $this->db->from('subject');
  $this->db->join('teacher', 'subject.teacher_id = teacher.id', 'inner');
  $qry = $this->db->get();
  return $qry->result_array();

}

//*************************** Course and class*****************************//

function add_class($id,$table_name,$data){


   if ($id == '') {

        $this->db->set('created_date', 'NOW()', FALSE);
        $this->db->insert($table_name, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
  } 

  else{


      $updated=$this->db->where('id', $id)->update($table_name, $data);
    
      return $updated;

  }

}


  function save_course($id,$table_name,$data){


   if ($id == '') {

        $this->db->set('created_date', 'NOW()', FALSE);
        $this->db->insert($table_name, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
  } 

  else{


      $updated=$this->db->where('id', $id)->update($table_name, $data);

     
   
      return $updated;

  }


  }



  //  Save docuemnt



  function save_document($id,$table_name,$data){


   if ($id == '') {

        $this->db->set('created_date', 'NOW()', FALSE);
        $this->db->insert($table_name, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
  } 

  else{


      $updated=$this->db->where('d_id', $id)->update($table_name, $data);

      
   
      return $updated;

  }


  }


  function document_list($take,$skip){

  $this->db->select('*');    
  $this->db->from('content');
  $this->db->join('subject', 'content.subject_id = subject.id', 'inner');
  $this->db->join('teacher', 'content.teacher_name = teacher.id', 'inner');
  $this->db->join('course', 'content.course = course.id', 'inner');
  $qry = $this->db->get();

  return $qry->result_array();
  }



function get_student_info($student_id) {
        $query = $this->db->get_where('student', array('id' => $student_id));
        return $query->result_array();
    }


  function get_type_name_by_id($type, $type_id = '', $field = 'first_name') {


        $query= $this->db->get_where($type, array($type . '_id' => $type_id))->row()->$field;
        
        return $query;
    }


  function edit_pay($invoice_id){

     $query = $this->db->get_where('invoice', array('invoice_id' => $invoice_id));

      return $query->result_array();
  }




}

/* End of file GerneralModel.php */
/* Location: ./application/models/GerneralModel.php */


?>
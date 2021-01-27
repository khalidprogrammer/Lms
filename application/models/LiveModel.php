<?php 



 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class LiveModel extends CI_Model {



 	function addClassLive($table_name,$data){


 		$insert = $this->db->insert($table_name, $data);

 		return $insert;
 	}


    function  showLiveClass(){


    	$this->db->select('*');
    	$this->db->from('live_class');

    	$this->db->join('course', 'live_class.course_id = course.id', 'inner');

    	$qry = $this->db->get();
        return $qry->result_array();

    }


    function getLiveClass($live_class_id){


      $query = $this->db->get_where('live_class', array('live_class_id' => $live_class_id));

      return $query->result_array();
    }


    function updateLiveClass($live_class_id,$data){



    	  $updated=$this->db->where('live_class_id', $live_class_id)->update('live_class', $data);
    	
            
           return $updated;


    }


 
 	
 
 }
 
 /* End of file LiveModel.php */
 /* Location: ./application/models/LiveModel.php */

 ?>
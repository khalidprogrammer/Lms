<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

   public function index() {

        if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'Admin/index', 'refresh');

        if ($this->session->userdata('student_login') == 1)
            redirect(base_url() . 'Student/index', 'refresh');
        $this->load->view('Login/login');
    }


    function ajax_login() {
       
        $response = array();

        //Recieving post input of email, password from ajax request
        $email = $_POST["email"];
        $password = $_POST["password"];
        $response['submitted_data'] = $_POST;

        //Validating login
        $login_status = $this->validate_login($email, $password);
        $response['login_status'] = $login_status;
        if ($login_status == 'success') {
            $response['redirect_url'] = '';
        }

        //Replying ajax request with validation response
        echo json_encode($response);
    }

     function validate_login($email = '', $password = '') {
        $credential = array('email' => $email, 'password' => $password);


        // Checking login credential for admin
        $query = $this->db->get_where('users', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();

            $this->session->set_userdata('admin_login','1');
            $this->session->set_userdata('admin_id', $row->admin_id);
            $this->session->set_userdata('username', $row->name);
            
            $this->session->set_userdata('login_user_id', $row->admin_id);
           
            $this->session->set_userdata('login_type', 'admin');
            return 'success';
        }

        // Checking login credential for teacher
       
        // Checking login credential for student
        $query = $this->db->get_where('student', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('student_login', '1');
            $this->session->set_userdata('student_id', $row->student_id);
            $this->session->set_userdata('login_user_id', $row->student_id);
             $this->session->set_userdata('first_name', $row->first_name);
            $this->session->set_userdata('login_type', 'student');
            return 'success';
        }

        // Checking login credential for parent
        

        return 'invalid';
    }

 function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url(), 'refresh');
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{


public function index(){

    $data['page']='Home/index.php';

    $this->load->view('common_user/template',$data);


}



public function about(){
    $data['page']='Home/about.php';

    $this->load->view('common_user/template',$data);

}

public function master_program(){

	$data['page']='Home/master_program.php';

    $this->load->view('common_user/template',$data);

}


public function bachelor_program(){

	$data['page']='Home/bachelor_program';

    $this->load->view('common_user/template',$data);

}

public function bba_program(){

	$data['page']='Home/bba_program_vw';

    $this->load->view('common_user/template',$data);

}

public function llb_program(){

	$data['page']='Home/llb_program_vw';

    $this->load->view('common_user/template',$data);

}

public function bcs_program(){

	$data['page']='Home/bcs_program_vw';

    $this->load->view('common_user/template',$data);

}

public function sharia_program(){

	$data['page']='Home/sharia_program_vw';

    $this->load->view('common_user/template',$data);

}

public function foreign_program(){

    $data['page']='Home/foriegn_program_vw';

    $this->load->view('common_user/template',$data);
}

public function it_department(){

	$data['page']='Home/it_department_vw';

    $this->load->view('common_user/template',$data);

}


}




?>
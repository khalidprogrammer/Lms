<?php 

 	$this->load->view('common_std/header_link');
 	$this->load->view('common_std/sidebar');
 	$this->load->view('common_std/header');

 	$this->load->view($page);

 	$this->load->view('common_std/footer');


 ?>

<?php

$this->load->view('common/head_tpl');

$this->load->view('common/header_tpl');

$this->load->view('common/sidebar');

$this->load->view($page);

$this->load->view('common/footer');


?>
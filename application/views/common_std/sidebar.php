<?php 


$method = $this->router->fetch_method();



 ?>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="<?=base_url()?>assets_std/img/sidebar-1.jpg">
   
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
         <?php echo $_SESSION['first_name'];?>
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?php if($method =='index') {echo 'active';} else{ echo '';} ?>">
            <a class="nav-link" href="<?=base_url()?>Student/index">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?php if($method =='student_profile') {echo 'active';} else{ echo '';} ?> ">
            <a class="nav-link" href="<?=base_url()?>Student/student_profile">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./tables.html">
              <i class="material-icons">content_paste</i>
              <p>Teacher List</p>
            </a>
          </li>
           <li class="nav-item ">
            <a class="nav-link" href="./tables.html">
              <i class="material-icons">content_paste</i>
              <p>Online  CLass</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./typography.html">
              <i class="material-icons">library_books</i>
              <p>Student Material</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./icons.html">
              <i class="material-icons">bubble_chart</i>
              <p>Exam Time Table</p>
            </a>
          </li>

           <li class="nav-item ">
            <a class="nav-link" href="./icons.html">
              <i class="material-icons">bubble_chart</i>
              <p>Time Table</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./map.html">
              <i class="material-icons">payment</i>
              <p>Fee Information</p>
            </a>
          </li>
         
          <li class="nav-item ">
            <a class="nav-link" href="./rtl.html">
              <i class="material-icons">language</i>
              <p>Reference Link</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
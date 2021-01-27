<?php
$method = $this->router->fetch_method();
?>


<aside>
          <div id="sidebar" class="nav-collapse " tabindex="0" style="overflow: hidden; outline: none;">
              <!-- sidebar menu start-->
             
              <ul class="sidebar-menu" id="nav-accordion">
              <img alt="" src="<?=base_url()?>assets_front/img/ashana-Logo-1.png" class="img-center">
                  <li>
                      <a class="<?php if($method =='index') {echo 'active';} else{ echo '';} ?>" href="<?=base_url()?>Admin">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a class="<?php if ($method=='student') {echo 'active';} else{ echo '';} ?>"  href="<?=base_url()?>Admin/student">
                          <i class="fa fa-user" aria-hidden="true"></i>
                          <span>Student</span>
                      </a>
                  </li>

                  <li>
                      <a class="<?php if($method =='teacher') {echo 'active';} else{ echo '';} ?>" href="<?=base_url()?>Admin/teacher">
                          <i class="fa fa-bookmark"></i>
                          <span>Teacher</span>
                      </a>
                  </li>

                  <!-- <li>
                      <a class="<?php if($method =='user') {echo 'active';} else{ echo '';} ?>" href="<?=base_url()?>Admin/user">
                          <i class="fa fa-users"></i>
                          <span>User</span>
                      </a>
                  </li>
 -->
                  <li>
                      <a class="<?php if($method =='classList') {echo 'active';} else{ echo '';} ?>" href="<?=base_url()?>Admin/classList">
                          <i class="fa fa-home"></i>
                          <span>Course</span>
                      </a>
                  </li>

                  <li>
                      <a class="<?php if($method =='live_class') {echo 'active';} else{ echo '';} ?>" href="<?=base_url()?>Admin/live_class">
                          <i class="fa fa-home"></i>
                          <span>Live Class</span>
                      </a>
                  </li>

                  <!-- <li>
                      <a class="<?php if($method =='semister') {echo 'active';} else{ echo '';} ?>"  href="<?=base_url()?>Admin/semister">
                          <i class="fa fa-book"></i>
                          <span>Semister</span>
                      </a>
                  </li> -->

                  <li>
                      <a class="<?php if($method =='subjects') {echo 'active';} else{ echo '';} ?>"  href="<?=base_url()?>Admin/subjects">
                          <i class="fa fa-pencil-square"></i>
                          <span>Subjects</span>
                      </a>
                  </li>

                  <li>
                      <a  href="<?=base_url()?>Admin/document">
                          <i class="fa fa-folder"></i>
                          <span>Document</span>
                      </a>
                  </li>

                  <li>
                      <a  href="<?=base_url()?>Admin/invoice"   class="<?php if($method =='invoice') {echo 'active';} else{ echo '';} ?>">
                          <i class="fa fa-briefcase"></i>
                          <span>Account/Fee</span>
                      </a>
                  </li>
                  <li>
                      <a  href="<?=base_url()?>Admin/setting" >
                          <i class="fa fa-cog"></i>
                          <span>Settings</span>
                      </a>
                  </li>
                  <!--multi level menu end-->

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
<!-- <script src="<?=base_url()?>assets_front/js/datepicker.js"></script> -->
<section id="main-content">
  <section class="wrapper site-min-height">
     <?php if($this->session->flashdata("add_msg") != '' || $this->session->flashdata("error_msg") !=''){ ?>
      <div class="col-lg-12 message-box">
        <section class="panel">
          <header class="panel-heading">
            <p style="color:blue;"> <?php echo $this->session->flashdata("add_msg"); ?> </p>
            <p style="color:red;"> <?php echo $this->session->flashdata("error_msg"); ?></p>
          </header>
        </section>
      </div>
      <?php } ?>
    <section class="card">
      <div class="card-body">
        <?php foreach ($edit_live_class as $row) {?>


       
       
       <form action="<?=base_url()?>Admin/update_live_class" class="" target="_top" method="post">
              <div class="row">
                <input type="hidden" id="live_class_id" name="live_class_id" value="<?=$row['live_class_id']?>">
                <div class="col-md-8">
                  <section class="card" data-collapsed="0">
                    <header class="card-header bg-info text-white">
                      <i class="fa fa-home"></i> <span class="mx-2"><strong>UPDATE LIVE CLASS</strong></span>
                      
                    </header>
                    <div class="card-body">
                      <div class="row">
                         <div class="col-sm-6">
                            <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="<?=$row['title']?>">
                          </div>
                       </div>
                       <div class="col-sm-6">
                            <div class="form-group">
                            <label for="">Zoom Meeting ID</label>
                            <input type="text" name="meeting_id" id="meeting_id" class="form-control" value="<?=$row['meeting_id']?>">
                          </div>
                       </div>
                      </div>


                      <div class="row">
                         <div class="col-sm-6">
                            <div class="form-group">
                            <label for="">Zoom Meeting Password</label>
                            <input type="text" name="meeting_password" class="form-control" value="<?=$row['meeting_password']?>">
                          </div>
                       </div>
                       <div class="col-sm-6">
                            <div class="form-group">
                            <label for="">Class</label>
                            <select name="course_id" id="course_id" class="form-control">

                                <?php 
                           
                            $course = $this->db->get('course')->result_array();
                            foreach($course as $value):
                            ?>
                                <option value="<?php echo $value['id'];?>"
                                    <?php if($row['course_id']==$value['id'])echo 'selected';?>>
                                         <?php echo $value['course_name'];?>
                                    </option>
                            <?php endforeach; ?>

                           

                            </select>
                          </div>
                       </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="">Date</label>
                            <input type="text" class="form-control datepicker" name="date" id="date"  value="<?php echo date('Y-m-d', $row['date']);?>">
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group">
                              <label >Time Start</label>
                              <div class="iconic-input right clockpicker" data-placement="right" data-align="top" data-autoclose="true">
                            <i class=" fa fa-clock-o"></i>
                           <input type="text" name="start_time" class="form-control" value="<?php echo $row['start_time'];?>">
                        </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="">Time End</label>
                             <div class="iconic-input right clockpicker" data-placement="right" data-align="top" data-autoclose="true">
                            <i class=" fa fa-clock-o"></i>
                           <input type="text" name="end_time" class="form-control" value="<?=$row['end_time']?>">
                        </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="">Remarks</label>
                            <textarea name="remarks" id="remarks"  class="form-control" ><?=$row['remarks']?></textarea>
                          </div>
                        </div>
                      </div>
                       <button type="submit" class="col-sm-4 btn  btn-primary btn-block">Update</button>
                     </div>

                  </section>
                </div>
               
              </div>
            </form>

          <?php } ?>
       
      </div>
    </section>
  </section>
</section>
<script>

$('.datepicker').datepicker();

$('.clockpicker').clockpicker();
</script>
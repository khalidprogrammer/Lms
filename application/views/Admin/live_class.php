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
        <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false"> <i class="fa fa-home pr-2"></i>Live/Class List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Add Live/Class</a>
          </li>
          
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
              <div class="col-lg-12">
                <section class="card">
                  <header class="card-header">
                    <i class="fa fa-list"></i> Live Class List
                  </header>
                  <div class="card-body">
                    <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Meeting ID</th>
                            <th>Class</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Created By</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php foreach ($live_classes as $row) {?>
                            <th scope="row"><?=$row['title']?></th>
                            <td><?=$row['meeting_id']?></td>
                            <td><?=$row['course_code']?></td>
                            <td><?=date('d M, Y', $row['date'])?></td>
                            <td><?=date("h:i A", strtotime($row['start_time'])); ?></td>
                            <td><?=date("h:i A", strtotime($row['end_time'])); ?></td>
                            <td>
                              <?php
                              $user = explode('-', $row['created_by']);
                              $username =$user[0];
                              echo $username;
                              ?>
                            </td>
                            <td>
                              <?php
                              $status ='<i class="fa fa-clock-o"></i>'. ' Waiting';
                              $labelmode = 'badge-warning';
                              if (strtotime($row['date']) == strtotime(date("Y-m-d")) && strtotime($row['start_time']) <= time() && time() >= strtotime(date("h:i"))) {
                              $status = '<i class="fa fa-camera"></i> ' . 'live';
                              $labelmode = 'badge-success';
                              }
                              if (strtotime($row['date']) < strtotime(date("Y-m-d")) || strtotime($row['end_time']) <= time()) {
                              $status = '<i class="fa fa-times"></i> ' . 'expired';
                              $labelmode = 'badge-danger';
                              }
                              echo "<span class='badge " . $labelmode . " '>" . $status . "</span>";
                              ?>
                            </td>
                            <td>
                              <a href="<?php echo base_url();?>admin/edit_live_class/<?php echo $row['live_class_id'];?>"><button type="button" class="btn btn-info btn-rounded btn-sm"><i class="fa fa-edit"></i> edit</button></a>
                              <a href="<?php echo base_url();?>admin/host_live_class/<?php echo $row['live_class_id'];?>"><button type="button" class="btn btn-success btn-rounded btn-sm"><i class="fa fa-youtube-play"></i> streaming</button></a>
                              <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/delete_live_class/<?php echo $row['live_class_id'];?>');"><button type="button" class="btn btn-danger btn-rounded btn-sm"><i class="fa fa-times"></i> delete</button></a>
                              
                            </td>
                          </tr>
                          <?php } ?>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form action="<?=base_url()?>Admin/add_live_class" class="" target="_top" method="post">
              <div class="row">
                <div class="col-md-8">
                  <section class="card" data-collapsed="0">
                    <header class="card-header bg-info text-white">
                      <i class="fa fa-home"></i> <span class="mx-2"><strong>CREATE NEW LIVE CLASS</strong></span>
                      
                    </header>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="">Zoom Meeting ID</label>
                            <input type="text" name="meeting_id" id="meeting_id" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="">Zoom Meeting Password</label>
                            <input type="text" name="meeting_password" class="form-control">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="">Class</label>
                            <select name="course_id" id="course_id" class="form-control">
                              <option value="select class">Select Class</option>
                              <?php foreach ($course as $value) {?>
                              # code...
                              <option value="<?=$value['id']?>"><?=$value['course_name']?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="">Date</label>
                            <input type="text" class="form-control datepicker" name="date" id="date" value="<?=date(Y-m-d)?>">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label >Time Start</label>
                            <div class="iconic-input right clockpicker" data-placement="right" data-align="top" data-autoclose="true">
                              <i class=" fa fa-clock-o"></i>
                              <input type="text" name="start_time" class="form-control" value="">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="">Time End</label>
                            <div class="iconic-input right clockpicker" data-placement="right" data-align="top" data-autoclose="true">
                              <i class=" fa fa-clock-o"></i>
                              <input type="text" name="end_time" class="form-control" value="">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="">Remarks</label>
                            <textarea name="remarks" id="remarks"  class="form-control" ></textarea>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="col-sm-4 btn  btn-primary btn-block">Save</button>
                    </div>
                  </section>
                </div>
                
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            
            <!--  show All live class -->
          </div>
        </div>
      </div>
    </section>
  </section>
</section>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title" style="text-align:left;"><strong style="color:#FFFFFF">CONFIRMATION&nbsp; <i class="fa fa-times"></i> </strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        ARE YOU SURE YOU WANT TO DELETE THIS INFORMATION ?
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger btn-rounded btn-sm" id="delete_link"><i class="fa fa-check">&nbsp;</i>Delete</a>
        <button type="button" class="btn btn-info btn-rounded btn-sm" data-dismiss="modal"><i class="fa fa-times">&nbsp;</i>Cancel</button>
      </div>
    </div>
  </div>
</div>

<script>
$('.datepicker').datepicker();
$('.clockpicker').clockpicker();
function confirm_modal(delete_url)
{
jQuery('#myModal').modal('show', {backdrop: 'static'});
document.getElementById('delete_link').setAttribute('href' , delete_url);
}
</script>
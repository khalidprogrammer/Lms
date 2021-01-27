<!-- <script src="<?=base_url()?>assets_front/js/datepicker.js"></script> -->
<section id="main-content">
  <section class="wrapper site-min-height">
    <section class="card">
      <div class="card-body">
        <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false"> <i class="fa fa-home pr-2"></i>Invoice/Payment List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Add Invoice/Payment</a>
          </li>
          
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
            <section class="card">
              <header class="card-header">
                invoice List
              </header>
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Title</th>
                    <th>Total</th>
                    <th>Paid</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  foreach($invoices as $row):?>
                  <tr>
                   <td><td><?php echo $this->GeneralModel->get_type_name_by_id('student',$row['student_id']);?></td></td>
                   <td> <?=$row['title']?></td>
                   <td> <?=$row['amount']?></td>
                   <td><?php echo $row['amount_paid'];?></td>
                  <td><?php echo date("d M,Y", strtotime($row['creation_timestamp']));?></td>
                  <td>
                 <span class="label label-<?php if($row['status']=='paid')echo 'success';else echo 'secondary';?>"><?php echo $row['status'];?></span>
                </td>
                 <td> <a class="btn btn-sm btn-primary" href=" <?=base_url()?>Admin/edit_payment/<?=$row['invoice_id']?>">Edit</a></td>

                   <td> <a class="btn btn-sm btn-danger" href=" <?=base_url()?>Admin/delete_invoice/<?=$row['invoice_id']?>">Delete</a></td>

                  </tr>
                <?php   endforeach; ?>
                </tbody>
                 
              </table>
            </section>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form action="<?=base_url()?>Admin/invoice/create" class="" target="_top" method="post">
              <div class="row">
                <div class="col-md-6">
                  <section class="card" data-collapsed="0">
                    <header class="card-header bg-info text-white">
                      <i class="fa fa-home"></i> <span class="mx-2"><strong>Invoice Informations</strong></span>
                      
                    </header>
                    <div class="card-body">
                      
                      <div class="form-group">
                        <label class="col-sm-3 control-label">student</label>
                        <div class="col-sm-9">
                          <select name="student_id" class="form-control" style="">
                            <option value="Select Student">Select Student</option>
                            <?php
                            $this->db->order_by('student_id','asc');
                            $students = $this->db->get('student')->result_array();
                            foreach($students as $row):
                            ?>
                            <option value="<?php echo $row['student_id'];?>">
                              <?=$row['first_name']?>
                            </option>
                            <?php
                            endforeach;
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">title</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="title">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">description</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="description">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">date</label>
                        <div class="col-sm-9">
                          <input type="text" class="datepicker form-control" name="date">
                        </div>
                      </div>
                      
                    </div>
                  </section>
                </div>
                <div class="col-md-6">
                  <section class="card" data-collapsed="0">
                    <header class="card-header bg-info text-white">
                      <i class="fa fa-home"></i> <span class="mx-2"><strong>Payment Informations</strong></span>
                      
                    </header>
                    <div class="card-body">
                      
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Total</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="amount" placeholder="Enter Total Amount">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">payment</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="amount_paid" placeholder="Enter Payment Amount">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">status</label>
                        <div class="col-sm-9">
                          <select name="status" class="form-control">
                            <option value="paid">paid</option>
                            <option value="unpaid">unpaid</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Method</label>
                        <div class="col-sm-9">
                          <select name="method" class="form-control">
                            <option value="1">Cash</option>
                            <option value="2">Check</option>
                            <option value="3">Card</option>
                          </select>
                        </div>
                      </div>
                      
                    </div>
                  </section>
                  <div class="form-group">
                    <div class="col-sm-5">
                      <button type="submit" class="btn btn-sm btn-primary">add invoice</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>
        </div>
      </div>
    </section>
  </section>
</section>


<script>
  
  $('.datepicker').datepicker();
</script>
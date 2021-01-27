<!-- <script src="<?=base_url()?>assets_front/js/datepicker.js"></script> -->
<section id="main-content">
  <section class="wrapper site-min-height">
    <section class="card">
      <div class="card-body">
        <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
         
          <li class="nav-item">
            <a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Update Invoice/Payment</a>
          </li>
          
        </ul>
        <div class="tab-content" id="myTabContent">
         
          <div class="tab-pane active show fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form action="<?=base_url()?>Admin/update_invoice" class="" target="_top" method="post">
              <div class="row">
                <?php                       
                      foreach($edit_data as $row):
                        

                        ?>
                <div class="col-md-6">
                  <input type="hidden" name="invoice_id" value="<?php echo $row['invoice_id']?>">
                  <section class="card" data-collapsed="0">
                    <header class="card-header bg-info text-white">
                      <i class="fa fa-home"></i> <span class="mx-2"><strong>Invoice Informations</strong></span>
                      
                    </header>
                     
                    <div class="card-body">
                    
                      <div class="form-group">
                        <label class="col-sm-3 control-label">student</label>
                        <div class="col-sm-9">
                          <select name="student_id" class="form-control" style="">

                            <?php 
                           
                            $students = $this->db->get('student')->result_array();
                            foreach($students as $row2):
                            ?>
                                <option value="<?php echo $row2['student_id'];?>"
                                    <?php if($row['student_id']==$row2['student_id'])echo 'selected';?>>
                                         <?php echo $row2['first_name'];?>
                                    </option>
                            <?php endforeach; ?>
                          </select>

                        </div>
                      </div>
                      <div class="form-group">  
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">title</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="title" value="<?=$row['title'];?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">description</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="description" value="<?=$row['description']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">date</label>
                        <div class="col-sm-9">
                          <input type="text" class="datepicker form-control" name="date" 
                            value="<?php echo date('d M,Y', strtotime($row['creation_timestamp']));?>"/>
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
                          <input type="text" class="form-control" name="amount" placeholder="Enter Total Amount" value="<?=$row['amount']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">payment</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="amount_paid" placeholder="Enter Payment Amount" value="<?=$row['amount_paid']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">status</label>
                        <div class="col-sm-9">
                          <select name="status" class="form-control">
                            <option value="paid" <?php if($row['status']=='paid')echo 'selected';?>>paid</option>
                            <option value="unpaid" <?php if($row['status']=='unpaid')echo 'selected';?>>unpaid</option>
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
                   <?php endforeach;?>
                  <div class="form-group">
                    <div class="col-sm-5">
                      <button type="submit" class="btn btn-sm btn-info">Update invoice</button>
                    </div>
                  </div>
               
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Contact text goes here...</div>
        </div>
      </div>
    </section>
  </section>
</section>

<script>
  
  $('.datepicker').datepicker();
</script>
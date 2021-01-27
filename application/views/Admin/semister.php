<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-sm-12">
            <section class="card">
                          <header class="card-header bg-dark text-white">
                             <i class="fa fa-home"></i> <span class="mx-2"><strong>Semister</strong></span>
                          </header>
                          <div class="card-body">
                              <div id="semister"></div>
                            
                          </div>
                     </section>
            </div>
        </div>
    </section>
</section>
<!-- ============================================SHOW ALL SEMISTER============================ -->
<!-- =============================================ADD SEMISTER================================== -->
<div class="modal fade" id="SEMISTER_MODAL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header card card-primary bg-dark">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
        <h4 class="modal-title"></h4>
      </div>
      <div class="card card-warning">
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="<?=base_url()?>Admin/add_semister" method="POST">
                  <input type="hidden" name="id" id="id">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label> Semister</label>
                        <input type="text" name="semister_name"  id="semister_name" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label> Semister Type</label>
                        <select name="semister_time" id="semister_time" class="form-control">
                            <option value="">--Select Semister Type--</option>
                            <option value="Morning Shift">Morning Shift</option>
                            <option value="Evening Shift">Evening Shift</option>
                        </select>
                      </div>
                    </div>

                 </div>                  
                    <div class="modal-footer">
                    <button class="btn btn-success" type="submit"> Save</button>
                    <button data-dismiss="modal" class="btn btn-danger empty" type="button">Close</button>
                    </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
  </div>
</div>


<script src="<?=base_url()?>assets/js/admin/semister.js"></script>


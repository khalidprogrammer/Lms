<div class="content">
        <div class="container-fluid">
          <div class="row">
            <?php 
                          
                           foreach($edit_data as $row):
                        ?>
              <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="<?=base_url()?>assets/upload/<?=$row['photo']?>">
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray"><?=$_SESSION['first_name']?></h6>
                  <h4 class="card-title"><?=$row['father_name']?></h4>
                  
                   <button type="submit" class="btn btn-primary ">Update Profile</button>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-5">
                        
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" value="<?=$row['first_name']; ?>" disabled>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Father Name</label>
                          <input type="text" class="form-control" value="<?=$row['father_name']?>" disabled>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" class="form-control" value="<?=$row['email']?>" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Semister</label>
                          <input type="text" class="form-control" value="<?=$row['semister_id']?>" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Faculty</label>
                          <input type="text" class="form-control" value="<?=$row['course_code']?>" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input type="text" class="form-control" value="<?=$row['address']?>" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Contact No</label>
                          <input type="text" class="form-control" value="<?=$row['contact']?>" disabled>
                        </div>
                      </div>
                      
                    </div>
                    <?php endforeach; ?>
                   
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          
          </div>

        </div>
      </div>


      <script>
        

      </script>
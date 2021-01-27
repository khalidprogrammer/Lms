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
    </div>
        <!-- =========================================STUDENT============================= -->
        <div class="row">
            <div class="col-sm-12">
            <section class="card">
                          <header class="card-header bg-dark text-white">
                             <i class="fa fa-user"></i> <span class="mx-2"><strong>Student</strong></span>
                          </header>
                         
                          <div class="card-body">
                          <div id="student"></div>
                          </div>
                      </section>
            </div>
        </div>
    </section>
</section>

<!-- ===============================================STUDENT MODAL ============================ -->

<!-- ================================================ADD MODAL================================= -->

<div class="modal fade" id="ADD_MODAL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header card card-primary bg-dark">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
        <h4 class="modal-title"></h4>
      </div>
      <div class="card card-warning">
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="<?=base_url()?>Admin/add_student" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id" id="id">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="first_name"  id="first_name" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Father Name</label>
                       <input type="text" name="father_name" id="father_name" class="form-control">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Registration No</label>
                        <input type="text" name="reg_no" id="reg_no" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="">DOB</label>
                        <input type="date" id="dob" class="form-control" name="dob">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                          <option value="">--Select Gender--</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Semister</label>
                        <select name="semister_id" id="semister_name" class="form-control">
                            <option value="">--Select Semister--</option>
                            <option value="1st Semister">1st Semister</option>
                            <option value="2nd Semister">2nd Semister</option>
                            <option value="3rd Semister">3rd Semister</option>
                            <option value="4th Semister">4th Semister</option>
                            <option value="5th Semister">5th Semister</option>
                            <option value="6th Semister">6th Semister</option>
                            <option value="7th Semister">7th Semister</option>
                            <option value="8th Semister">8th Semister</option>
                        </select>
                      </div>
                    </div>
                     
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Course Name</label>
                        <select name="class_id" id="class_name" class="form-control">
                            <option value="">--Select Course--</option>
                            <?php foreach ($course as $value): ?>
                              <option value="<?=$value['id']?>"><?=$value['course_name']?></option>
                            <?php endforeach ?>
                        </select>
                      </div>
                    </div>
               
                    <div class="col-sm-6">
                       <div class="form-group">
                         <img id="img_show" class="showimg" width="100" height="100" /><br>
                         <label for="">Upload Your Image</label>
                         <input type="file"  name="photo" id="photo" class="form-control"  onchange="document.getElementById('img_show').src = window.URL.createObjectURL(this.files[0])">
                         <input type="hidden" name="old" id="old">
                       </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="">Address</label>
                        <textarea name="address" id="address" class="form-control"></textarea>
                      </div>
                    </div>

                     <div class="col-sm-6">
                      <div class="form-group">
                        <label for="">Phone No</label>
                        <input type="text" name="contact" id="contact" class="form-control">
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                          <label for="">Email</label>
                      <div class="form-group">
                        <input type="email"  name="email" id="email" class="form-control">
                      </div>
                      </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="">Password</label>
                        <input type="password"  name="password" id="password" class="form-control">
                      </div>
                      </div>


                     
                  </div>
                    <div class="modal-footer">
                    <button class="btn btn-success submit" type="submit"> Save</button>
                    <button data-dismiss="modal" class="btn btn-danger empty" type="button">Close</button>
                    </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
  </div>
</div>



<!-- ================SHOW ALL STUDENT======================= -->

<script>


function user_list(keyword) {
    var keyword = keyword;
    $('#student').kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: "<?php echo base_url()?>Admin/student_list",
                    dataType: 'json',
                    data: {
                        keyword: keyword,
                    }
                },
            },
            schema: {
                total: "total",
                data: "data",
            },
            pageSize: 10,
            pageSizes: true,
            serverPaging: true,
        },
        toolbar: [{
            name: "Add a Student"
        }],
        columns: [{
                field: 'reg_no',
                title: 'Reg No',
                attributes: {
                    class: "reg_no"
                }
            },

            {
              field:'photo',
              title:'Photo',
              template   : "<img src='../assets/upload/#= photo #' alt='image' style='width:30px;'/>",
                attributes:{
              class:'image'
            }

            },

            {
                field: 'first_name',
                title: 'Name',
                attributes: {
                    class: "first_name"
                }
            },

            {

              field:'father_name',
              title:'',
              hidden:true,
              attributes:{
                class:"father_name"
              }
            },

            {
              field :'dob',
              title:'',
              hidden:true,
              attributes:{
                class:'dob'
              }
            },
            {
              field:'gender',
              title:'',
              hidden:true,
              attributes:{
                class :'gender'
              }
            },

            {
              field:'contact',
              title:'',
              hidden:true,
              attributes:{
                class :'contact'
              }
            },
            {
              field :'course_code',
              title:'',
              hidden:true,
              attributes:{
                class:'class_id'
              }
            },

            {
              field:'semister_id',
              title:'',
              hidden:true,
              attributes:{
                class:'semister_id'
              }
            },
            {
              field:'address',
              title:'',
              hidden:true,
              attributes:{
                class:'address'
              }
            },
            
          {
              field:'photo',
              title:'',
              hidden:true,
              attributes:{
                class:'photo'
              }

            },

            {
                field: 'email',
                title: 'Email',

                attributes: {
                    class: "email"
                }
            },

            {
              field:'password',
              title:'',
              hidden:true,
              attributes:{
                class :'password'
              }
            },

            {
                field: 'status',
                title: 'Status',

                attributes: {
                    class: "status"
                }
            },

            {
                command: ["edit", "destroy"],
                title: "ACTION",
                width: "250px"
            },

            {
                field: 'student_id',
                title: "",
                hidden: true,
                attributes: {
                    class: "id"
                }
            },
        ],
        scrollable: true,
        pageable: true,
        selectable: true,
        sortable: true,
        pageable: {
            pageSizes: [10, 15, 20, 25, 30],
            buttonCount: 5,
            refresh: true
        },
    });
}
user_list()

$('.k-grid-AddaStudent').on('click', function() {
    $('#userForm').find(':input').val('');
    $('.modal-title').html('Add New Student');
    $('#ADD_MODAL').modal('show');
});




//  Update the record
$('body').on('click','.k-grid-edit',function(){
   $('.modal-title').text('Update Student');
  $('.submit').text('Update');

  var row =$(this).closest('tr');

  var id = row.find('td.id').text();

  var regno = row.find('td.reg_no').text();
  var name =row.find('td.first_name').text();
  
  var fathername = row.find('td.father_name').text();
  var dob = row.find('td.dob').html();

  var  gender = row.find('td.gender').text();

  var class_id = row.find('td.class_id').text();
  var semister = row.find('td.semister_id').text();
  var password =row.find('td.password').text();
  var photo = row.find('td.photo').text();
 
  var address = row.find('td.address').text();

  var phone = row.find('td.contact').text();

   var base_url = '<?php echo base_url().'assets/upload/'; ?>';

   var detail = base_url + photo;

  $('.showimg').prop('src',detail)
  
  var email_id = row.find('td.email').text();
  
  $('#id').val(id);
  $('#reg_no').val(regno);
  $('#first_name').val(name);
  $('#father_name').val(fathername);
  $('#dob').val(dob);
  $('#gender').val(gender);
  $('#class_name').val(class_id);
  $('#semister_name').val(semister);
  $('#email').val(email_id);
  $('#address').val(address);
  $('#contact').val(phone);
  $('#password').val(password);
  $('#old').val(photo)
  $('#ADD_MODAL').modal('show');
 
})



//  Delete record from student 

$('body').on('click', '.k-grid-delete', function() {
        var row = $(this).closest('tr');
        var u_id = row.find('td.id').text();

        if (confirm("Are you sure to delete?")) {
            $.ajax({
                url: '<?=base_url()?>Admin/delete_student',
                data: {
                    'u_id': u_id
                },
                type: 'post',
                success: function(res) {
                    user_list();
                }
            })
        }
    });






</script>
  
 


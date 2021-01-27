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
        <div class="row">
            <div class="col-sm-12">
               <section class="card">
                          <header class="card-header bg-dark text-white">
                             <i class="fa fa-bookmark"></i> <span class="mx-2"><strong>Teacher</strong></span>
                          </header>
                          <div id="teacher"></div>
                        
               </section>
            </div>
        </div>
    </section>
</section>


<!-- ===============================================TEACHER MODAL ============================ -->

<!-- ================================================ADD MODAL================================= -->

<div class="modal fade" id="TEACHER_MODAL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header card card-primary bg-dark">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
        <h4 class="modal-title"></h4>
      </div>
      <div class="card card-warning">
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="<?=base_url()?>Admin/add_teacher" method="POST" enctype="multipart/form-data" id="formdata">
                  <input type="hidden" name="id" id="id">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label> Teacher Name</label>
                        <input type="text" name="name"  id="name" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Designation</label>
                        <input type="text"  name="designation" id="designation" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-6">

                      <div class="form-group">
                         <label for="">Education</label>
                         <input type="text" name ="education" id="education" class="form-control" >
                      </div>
                    
                    </div>

                    <div class="col-sm-6">
                    
                      <label for="">Experience</label>
                      <input type="text" name ="experience" id="experience" class="form-control">
                    
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">--Select Gender---</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="birthday" id="birthday" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" id="address" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                       
                      </div>
                    </div>
                    <div class="col-sm-6">

                    <div class="form-group">
                     <div>


                     <img id="blah" width="100" height="100" class="showimg"  />

                     </div><br>
             
                     <div class="show-img"></div>

                     <label for="">Upload Image</label>
                    <input type="file" name="photo" id="photo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">    
                    <input type="hidden"  id="old"  name="old" >                
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


<!-- ===================================SHOW TEACHER====================== -->
<script>

function user_list(keyword) {
    var keyword = keyword;
   
    $('#teacher').kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: "<?=base_url()?>Admin/teacher_list",
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
            name: "Add a Teacher"
        }],
        columns: [
         

            {
                field: 'id',
                title: '#',
                width:'30px',
                attributes:{
                  class:'teacher_id'
                }

            },
             {

            field:'photo',
            title:'photo',
            template: "<img src='../assets/upload/#= photo #' alt='image' style='width:30px;'/>",
            attributes:{
              class:'image'
            }

          },


            {
                field: 'name',
                title: 'Name',
                attributes: {
                    class: "name"
                }
            },

            {
              field:'birthday',
              title:'',
              hidden:true,
              attributes:{
                class:'birthday'
              }

            },

          {
            field:'gender',
            title:'',
            hidden:true,
            attributes:{
              class:'gender'
            }
          },
          {
          field:'designation',
          title:'Designation',
          hidden:false,

          attributes:{
            class:'designation'
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
              field:'address',
              title:'',
              hidden:true,
              attributes:{
                class:'address'
              }
            },

            {
              field:'phone',
              title:'',
              hidden:true,
              attributes:{
                class:'phone'
              }
            },
            
            {
              field:'education',
              title:'',
              hidden:true,
              attributes:{
                class:'education'
              }

            },

            {

              field:'experience',
              title:'',
              hidden:true,
              attributes:{
                class:'experience'
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
                width:'100px',
                template:"#if(status=='active'){  # <button class=\"btn btn-sm btn-dark \">Active</button>  # } else{# <button class=\"btn btn-sm btn-danger \">disabled</button> #} #",
                attributes: {
                    class: "status"
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
                command: ["edit", "destroy"],
                title: "ACTION",
                width: "250px"
            },
            // { field: '', title: 'FEE', width: '100px', template: " <a href='<?=base_url()?>Admin/Fee/' class='btn btn-warning fee'>Fees</a>" },
            {
                field: 'id',
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


$('.k-grid-AddaTeacher').on('click', function() {
    $('#userForm').find(':input').val('');
    $('.modal-title').html('Add New Teacher');
    $('#TEACHER_MODAL').modal('show');
});



//  Update teacher 


$('body').on('click','.k-grid-edit',function(){
  $('.modal-title').html('Update Teacher');
  var row = $(this).closest('tr');
  
   var id = row.find('td.teacher_id').text();
   var name = row.find('td.name').text();
   var email = row.find('td.email').text();
   var gender=row.find('td.gender').text();
   var dob = row.find('td.birthday').html();
   
   var designation = row.find('td.designation').text();
   var address =row.find('td.address').text();
   var phone = row.find('td.phone').text();
   var password = row.find('td.password').text();
   var education = row.find('td.education').text();
   var experience = row.find('td.experience').text();
   var photo = row.find('td.photo').text();


   var base_url = '<?php echo base_url().'assets/upload/'; ?>';

   var detail = base_url + photo;

$('.showimg').prop('src',detail)
  
// var path = '<img src="'+base_url + photo+'" height="64px" width="64px">';
  


   // $('.show-img').empty().append(path);
 

  $('#id').val(id);
  $('#name').val(name);
  $('#designation').val(designation);
  $('#gender').val(gender);
  $('#birthday').val(dob);
  $('#address').val(address);
  $('#phone').val(phone);
  $('#email').val(email);
  $('#password').val(password);
  $('#education').val(education);
  $('#experience').val(experience);
  $('#old').val(photo);

 
   $('#TEACHER_MODAL').modal('show');

})

//  delete teacher

$('body').on('click', '.k-grid-delete', function() {
        var row = $(this).closest('tr');
        var u_id = row.find('td.id').text();

        if (confirm("Are you sure to delete?")) {
            $.ajax({
                url: '<?=base_url()?>Admin/delete_teacher',
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

//  Update status

$('body').on('click','.status',function(){

  var row = $(this).closest('tr');

  var id = row.find('td.id').text();

  $.ajax({

    url:'<?=base_url()?>Admin/update_status',
    data:{
      'id' : id
    },
    type:'post',
    success:function(res){
      user_list();
    }


  });





})



</script>
 



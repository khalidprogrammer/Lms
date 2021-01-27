<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-sm-12">
            <section class="card">
                          <header class="card-header bg-dark text-white">
                             <i class="fa fa-home"></i> <span class="mx-2"><strong>Account List</strong></span>
                          </header>
                          <div class="card-body">
                              <div id="account"></div>
                            
                          </div>
                     </section>
            </div>
        </div>
    </section>
</section>
<!-- ============================================SHOW ALL USERs============================ -->
<div class="modal fade" id="FEE_MODAL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header card card-primary bg-dark">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
        <h4 class="modal-title"></h4>
      </div>
      <div class="card card-warning">
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="<?=base_url()?>Admin/add_subject" method="POST">
                  <input type="hidden" name="id" id="id">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Student Name</label>
                         <select name="student_id" id="student_id" class="form-control">
                         	<?php foreach ($student as $value): ?>
                         		<option value="">--Select Student---</option>
                         		<option value="	<?=$value['id']?>"><?=$value['first_name']?></option>
                         	<?php endforeach; ?>
                         </select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Teacher</label>
                        <select name="teacher_id" id="teacher_id" class="form-control">
                            <option value="">--Select Teacher--</option>
                           <?php foreach ($course as  $value): ?>

                            <option value="<?=$value['id']?>"><?php echo $value['course_name'] ?></option>
                             
                           <?php endforeach ?>

                        </select>
                      </div>
                    </div>

                     <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="">Subject code</label>
                        <input type="text" name="subject_code" id="subject_code" class="form-control">
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


<script>
  
  function user_list(keyword) {
        var keyword = keyword;
        $('#account').kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "<?=base_url()?>Admin/student",
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
                name: "Add a Fee"
            }],
            columns: [{
                    field: 'reg_no',
                    title: 'Reg No',
                    attributes: {
                        class: "reg_no"
                    }
                },
                {
                    field: 'name',
                    title: 'Student Name',
                    attributes: {
                        class: "first_name"
                    }
                },
                 {
                    field: 'last_name',
                    title: '',
                    hidden:true,
                    attributes: {
                        class: "last_name"
                    }
                },
                {
                    field: 'father_name',
                    title: "Father Name",
                    sortable: true,
                    width: "150px",
                    
                    attributes: {
                        class: "father_name"
                    }
                },

                 {
                    field: 'class',
                    title: "Class Name",
                    sortable: true,
                    width: "100px",
                    
                    attributes: {
                        class: "class_name"
                    }
                },

                {
                    field: 'section',
                    title: "Section Name",
                    sortable: true,
                    width: "100px",

                    
                    attributes: {
                        class: "section_name"
                    }
                },

                {
                    field: 'user_name',
                    title: "Username",
                    sortable: true,
                    width: "100px",
                    hidden:true,
                   
                    
                    attributes: {
                        class: "user_name"
                    },

                },

                {
                    field: 'password',
                    title: "Password",
                    sortable: true,
                    width: "100px",
                    hidden:true,
                   
                    
                    attributes: {
                        class: "password"
                    },

                },

                {
                    command: ["Details","edit","destroy"],
                    title: "ACTION",
                    width: "250px"
                },
                 {field:'',title:'FEE',width:'100px',template:" <a href='<?=base_url()?>Admin/Fee/' class='btn btn-warning fee'>Fees</a>"},
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
            sortable:true,
            pageable: {
                pageSizes: [10,15,20,25,30],
                buttonCount: 5,
                refresh: true
            },
        });
    }
    user_list()

 
  $('.k-grid-AddaFee').click(function(){

  	$('.modal-title').text('Add new Fee');4

  	$('#FEE_MODAL').modal('show');

  })




</script>
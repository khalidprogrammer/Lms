<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-sm-12">
            <section class="card">
                          <header class="card-header bg-dark text-white">
                             <i class="fa fa-home"></i> <span class="mx-2"><strong>Course List</strong></span>
                          </header>
                          <div class="card-body">
                              <div id="classlist"></div>
                            
                          </div>
                     </section>
            </div>
        </div>
    </section>
</section>
<!-- ==============================================ADD CLASS=============================== -->

<div class="modal fade" id="CLASS_MODAL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header card card-primary bg-dark">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
        <h4 class="modal-title"></h4>
      </div>
      <div class="card card-warning">
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="<?=base_url()?>Admin/add_course" method="POST">
                  <input type="hidden" name="id" id="id">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label> Course Name</label>
                        <input type="text" name="course_name"  id="course_name" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>

                     <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label> Course Code</label>
                        <input type="text" name="course_code"  id="course_code" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label> Course Type</label>
                        <select name="course_type" id="course_type" class="form-control">
                          <option value="">Select Course Type</option>
                          <option value="Degree-4 year">Degree-4 year</option>
                          <option value="certification -1 year or 6 month">certification -1 year or 6 month</option>

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


<!-- ============================================SHOW ALL CLASSES============================ -->

<script>
  

  function user_list(keyword) {
    var keyword = keyword;
    $('#classlist').kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: "<?=base_url()?>Admin/show_all_course",
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
            name: "Add a Course"
        }],
        columns: [{
                field: 'id',
                title: '#',
                attributes: {
                    class: "c_id"
                }
            },
            {
                field: 'course_name',
                title: 'Course Name',
                attributes: {
                    class: "course_name"
                }
            },

            {
                field: 'course_code',
                title: 'Course code',
                attributes: {
                    class: "course_code"
                }
            },

            {
                field: 'course_type',
                title: 'Course type',
                attributes: {
                    class: "course_type"
                }
            },


            {
                command: ["edit", "destroy"],
                title: "ACTION",
                width: "250px"
            },

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


$(' .k-grid-AddaCourse').on('click', function() {
    $('#userForm').find(':input').val('');
    $('.modal-title').html('Add New Course');
    $('#CLASS_MODAL').modal('show');
});


$('body').on('click','.k-grid-edit',function(){

  var row = $(this).closest('tr');

  var id = row.find('td.id').text();
  alert(id)
  var course_name = row.find('td.course_name').text();

  var course_code = row.find('td.course_code').text();

  var course_type = row.find('td.course_type').text();




  $('#course_name').val(course_name);

  $('#course_code').val(course_code);

  $('#course_type').val(course_type)


  $('#CLASS_MODAL').modal('show');

});


// delete course

$('body').on('click', '.k-grid-delete', function() {
        var row = $(this).closest('tr');
        var u_id = row.find('td.id').text();

        if (confirm("Are you sure to delete?")) {
            $.ajax({
                url: '<?=base_url()?>Admin/delete_course',
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
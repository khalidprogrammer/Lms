<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-sm-12">
            <section class="card">
                  <header class="card-header bg-dark text-white">
                     <i class="fa fa-home"></i> <span class="mx-2"><strong>Subject List</strong></span>
                  </header>
                   <div id="subject"></div>
                 
              </section>
            </div>
        </div>
    </section>
</section>
<!-- ============================================SHOW ALL SUBJECTS============================ -->

<!-- ===============================================ADD SUBJECTS================================ -->
<div class="modal fade" id="SUBJECT_MODAL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <label>Subject Name</label>
                        <input type="text" name="subject_name"  id="subject_name" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Teacher</label>
                        <select name="teacher_id" id="teacher_id" class="form-control">
                            <option value="">--Select Teacher--</option>
                           <?php foreach ($teacher as  $value): ?>

                            <option value="<?=$value['id']?>"><?php echo $value['name'] ?></option>
                             
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
    $('#subject').kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: "<?=base_url()?>Admin/subject_list",
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
            name: "Add a Subject"
        }],
        columns: [{
                field: 'id',
                title: '#',
                attributes: {
                    class: "S_id"
                }
            },
            {
                field: 'subject_name',
                title: 'Subject Name',
                attributes: {
                    class: "subject_name"
                }
            },
            {
                field: 'subject_code',
                title: 'Subject Code',
                hidden: false,
                attributes: {
                    class: "subject_code"
                }
            },
            {
                field: 'name',
                title: "Teacher",
                sortable: true,
                width: "150px",

                attributes: {
                    class: "teacher"
                }
            },

            {

              field :'status',
              title:'status'

            },

            {

              field:'teacher_id',
              title:'',
              hidden:true,
              attributes:{

                class:'teacher_id'

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

$('.k-grid-AddaSubject').on('click', function() {
    $('#userForm').find(':input').val('');
    $('.modal-title').html('Add New Subject');
    $('#SUBJECT_MODAL').modal('show');
});

$('body').on('click','.k-grid-edit',function(){

   var row = $(this).closest('tr');

   var id = row.find('td.id').text();

   var subject_name = row.find('td.subject_name').text();

   var subject_code = row.find('td.subject_code').text();

   var teacher = row.find('td.teacher_id').text();

   $('#id').val(id);

   $('#subject_name').val(subject_name);
   $('#subject_code').val(subject_code)
   $('#teacher_id').val(teacher)


   $('#SUBJECT_MODAL').modal('show');


});

//  Delete subjects
$('body').on('click', '.k-grid-delete', function() {
        var row = $(this).closest('tr');
        var u_id = row.find('td.id').text();

        if (confirm("Are you sure to delete?")) {
            $.ajax({
                url: '<?=base_url()?>Admin/delete_subject',
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
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-sm-12">
            <section class="card">
                          <header class="card-header bg-dark text-white">
                             <i class="fa fa-home"></i> <span class="mx-2"><strong>Document List</strong></span>
                          </header>
                          <div class="card-body">
                              <div id="document"></div>
                            
                          </div>
                     </section>
            </div>
        </div>
    </section>
</section>
<!-- ============================================SHOW ALL Documents============================ -->

<div class="modal fade" id="DOCUMENT_MODAL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header card card-primary bg-dark">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
        <h4 class="modal-title"></h4>
      </div>
      <div class="card card-warning">
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="<?=base_url()?>Admin/add_document" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id" id="id">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Subject Name</label>
                         <select name="subject_id" id="subject_id" class="form-control">
                             <option value="">--select subject--</option>
                             <?php foreach ($subject as  $value): ?>
                                 <option value="<?=$value['id']?>"><?=$value['subject_name']?></option>
                             <?php endforeach ?>
                         </select>
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
                        <label for="">Month</label>
                        <select name="month" id="month" class="form-control">
                            <option value="">--select month--</option>
                            <option value="January">January</option>
                            <option value="Feburay">Feburay</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="Aguest">Aguest</option>
                        </select>
                        
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Year</label>
                            <select name="year" id="year" class="form-control">
                                <option value="">-- select year--</option>
                                <option value="1399">1399</option>

                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Day</label>
                            <input type="number"  name ="day" id="day" class="form-control">
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Course</label>
                            <select name="course" id="course" class="form-control">
                                <option value="">--Select- Course---</option>
                                 <?php foreach ($course as $value): ?>
                                     <option value="<?=$value['id']?>"><?=$value['course_name']?></option>
                                 <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Material Type</label>
                            <select name="content_type" id="content_type" class="form-control">
                                <option value="">--Select Content Type</option>
                                <option value="video">video</option>
                                <option value="PDF">PDF</option>
                                <option value="audio">audio</option>
                                <option value="PPT">PPT</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                     <div class="form-group">
                         <label for="">Upload Material(Video,audio,image,files)</label>
                         <input type="file" name="link" id="link" class="form-control">
                         <input type="hidden" name="old_link" id="old_link" >
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
        $('#document').kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "<?=base_url()?>Admin/list_document",
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
                name: "Add a Document"
            }],
            columns: [{
                    field: 'd_id',
                    title: '#',
                    attributes: {
                        class: "content_id"
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
                    field: 'course_name',
                    title: 'Course Name',
                    hidden:false,
                    attributes: {
                        class: "course_name"
                    }
                },
                 {
                    field: 'name',
                    title: 'Teacher Name',
                    hidden:false,
                    attributes: {
                        class: "teacher_name"
                    }
                },

                {
                    field:'content_type',
                    title:'Document Type',
                    attributes:{
                        class:'content_type'
                    }
                },

                {
                    field: 'link',
                    title: "Document Download",
                    sortable: true,
                    width: "150px",
                   template:" <a href='<?=base_url()?>./assets/document/#=link#' class='btn btn-warning fee'><i class='fa fa-download'></i></a>",
                    
                    attributes: {
                        class: "link"
                    }
                },


                {

                    field:'link',

                    title:'',

                    hidden:true,

                    attributes:{
                        class:'link_id'
                    }


                },

                {
                    field:'year',

                    title:'',

                    hidden:true,

                    attributes:{
                        class:'year'
                    }

                },


                {
                    field:'month',

                    title:'',

                    hidden:true,

                    attributes:{
                        class:'month'
                    }

                },


                {
                    field:'day',

                    title:'',

                    hidden:true,

                    attributes:{
                        class:'day'
                    }

                },

                {

                    field:'subject_id',
                    title:'',
                    hidden:true,
                    attributes:{

                        class:'subject_id'
                    }

                },

                 {

                    field:'teacher_name',
                    title:'',
                    hidden:true,
                    attributes:{

                        class:'teacher_id'
                    }

                },



                 {

                    field:'course',
                    title:'',
                    hidden:true,
                    attributes:{

                        class:'course_id'
                    }

                },


                
               

                {
                    command: ["edit","destroy"],
                    title: "ACTION",
                    width: "250px"
                },
                 // {field:'',title:'FEE',width:'100px',template:" <a href='<?=base_url()?>Admin/Fee/' class='btn btn-warning fee'>Fees</a>"},
                {
                    field: 'd_id',
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

$('.k-grid-AddaDocument').on('click',function(){

    $('#userForm').find(':input').val('');
    $('.modal-title').html('Add New Document');
    $('#DOCUMENT_MODAL').modal('show');


});


$('body').on('click','.k-grid-edit',function(){

   var row = $(this).closest('tr');

   var id = row.find('td.id').text();

   var subject_name=row.find('td.subject_id').text();

   var teacher_name = row.find('td.teacher_id').text();

   var course = row.find('td.course_id').text();

  
   var link_old = row.find('td.link_id').text();

  var content_type = row.find('td.content_type').text();

  var year = row.find('td.year').text();

  var month = row.find('td.month').text();

  var day   = row.find('td.day').text();

$('#id').val(id);

$('#subject_id').val(subject_name);

$('#teacher_id').val(teacher_name);

$('#course').val(course);



$('#old_link').val(link_old);

$('#content_type').val(content_type);

$('#month').val(month);

$('#year').val(year);

$('#day').val(day);

$('.modal-title').html('Update  Document');
$('#DOCUMENT_MODAL').modal('show');







})







</script>
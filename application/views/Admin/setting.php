<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-sm-12">
            <section class="card">
                          <header class="card-header bg-dark text-white">
                             <i class="fa fa-home"></i> <span class="mx-2"><strong>Settings List</strong></span>
                          </header>
                          <div class="card-body">
                              <div id="setting"></div>
                            
                          </div>
                     </section>
            </div>
        </div>
    </section>
</section>
<!-- ============================================SHOW ALL USERs============================ -->

<script>
  
  function user_list(keyword) {
        var keyword = keyword;
        $('#setting').kendoGrid({
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
                name: "Add a Setting"
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



</script>
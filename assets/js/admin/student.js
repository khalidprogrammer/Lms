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
                field: 'first_name',
                title: 'Name',
                attributes: {
                    class: "first_name"
                }
            },
            {
                field: 'email',
                title: 'Email',

                attributes: {
                    class: "last_name"
                }
            },

            {
                field: 'status',
                title: 'Status',

                attributes: {
                    class: "last_name"
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

$('.k-grid-AddaStudent').on('click', function() {
    $('#userForm').find(':input').val('');
    $('.modal-title').html('Add New Student');
    $('#ADD_MODAL').modal('show');
});
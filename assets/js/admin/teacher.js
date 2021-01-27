function user_list(keyword) {
    var keyword = keyword;
    $('#teacher').kendoGrid({
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
            name: "Add a Teacher"
        }],
        columns: [

            {
                field: 'id',
                title: '#'
            },

            {
                field: 'name',
                title: 'Name',
                attributes: {
                    class: "name"
                }
            },

            {
                field: 'email',
                title: 'Email',
                attributes: {
                    class: "first_name"
                }
            },

            {
                field: 'status',
                title: 'Status',
                attributes: {
                    class: "first_name"
                }
            },

            {
                command: ["Details", "edit", "destroy"],
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
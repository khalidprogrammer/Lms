function user_list(keyword) {
    var keyword = keyword;
    $('#classlist').kendoGrid({
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
            name: "Add a Class"
        }],
        columns: [{
                field: 'reg_no',
                title: '#',
                attributes: {
                    class: "reg_no"
                }
            },
            {
                field: 'name',
                title: 'Name',
                attributes: {
                    class: "first_name"
                }
            },

            {
                field: 'name',
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


$('.k-grid-AddaClass').on('click', function() {
    $('#userForm').find(':input').val('');
    $('.modal-title').html('Add New Class');
    $('#CLASS_MODAL').modal('show');
});
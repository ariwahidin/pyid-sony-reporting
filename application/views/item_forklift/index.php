<style>

</style>
<!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>myassets/gridjs/css/mermaid.min.css" /> -->


<link href="<?= base_url() ?>myassets/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="<?= base_url() ?>myassets/js/jquery-3.7.0.js"></script>
<script src="<?= base_url() ?>myassets/js/jquery.dataTables.min.js"></script>


<div class="container-fluid">
    <div class="row">
        <div class="col col-md-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mt-1">
                <h4 class="mb-sm-0">Master Item Check</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Item Check</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-7">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-success" id="btnRefresh">Refresh</button>
                </div>
                <div class="card-body" id="cardTable">
                    <table id="data-table" class="table display table-sm compact" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Desc</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="modal-title" id="headerForm">Add New Data</h5>
                </div>
                <div class="card-body">
                    <form id="formInput">
                        <div class="row g-2">
                            <div class="col-md-5">
                                <div>
                                    <label for="name" class="form-label">Item Name</label><br>
                                    <input type="text" class="form-control-sm" id="name" name="name" placeholder="" required autocomplete="off">
                                    <input type="hidden" id="id" name="id" value="" readonly>
                                    <input type="hidden" id="form_proses" name="form_proses" value="add_new" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="name" class="form-label">Item Descrption</label><br>
                                    <input type="text" class="form-control-sm" id="desc" name="desc" placeholder="" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="justify-content-center mt-1">
                                    <button type="button" class="btn btn-info" id="btnReset">Reset</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        var table = $('#data-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('itemForklift/testDatatable') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],
        });

        $('#btnRefresh').on('click', function() {
            table.ajax.reload(null, false);
        })

        $('#btnReset').on('click', function() {
            $('#id').val('');
            $('#form_proses').val('add_new');
            $('#name').val('');
            $('#desc').val('');
            $('#name').focus();
            $('#headerForm').text('Add New Data');
        })

        $('#cardTable').on('click', '.linkEdit', function() {
            let id = $(this).data('id');
            $.get('getItemForkliftCheck', {
                id: id
            }, function(response) {
                let data = response.forklift;
                $('#id').val(data.id);
                $('#form_proses').val('edit_data');
                $('#name').val(data.name);
                $('#name').focus();
                $('#desc').val(data.desc);
                $('#headerForm').text('Edit Data');
            }, 'json');
        })

        $('#cardTable').on('click', '.linkDelete', function() {
            let id = $(this).data('id');
            $.post('deleteForklift', {
                id: id
            }, function(response) {
                if (response.success == true) {
                    table.ajax.reload(null, false);
                }
            }, 'json');
        })

        $('#formInput').on('submit', function(e) {
            e.preventDefault();
            let formUser = new FormData(this);
            let form_proses = $('#form_proses').val();

            if (form_proses === 'add_new') {
                $.ajax({
                    url: 'createForklift',
                    type: 'POST',
                    data: formUser,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success == true) {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1000
                            }).then(function() {
                                table.ajax.reload(null, false);
                                $('#btnReset').click().trigger();
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed',
                                text: response.message
                            });
                        }
                    },
                    dataType: 'json'
                });
            } else {
                $.ajax({
                    url: 'editForklift',
                    type: 'POST',
                    data: formUser,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success == true) {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                table.ajax.reload(null, false); // user paging is not reset on reload
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed',
                                text: response.message
                            });
                        }
                    },
                    dataType: 'json'
                });
            }
        });

    });
</script>

<!-- <script>
    $(document).ready(function() {

        $('#formInput').on('submit', function(e) {
            e.preventDefault();
            let formUser = new FormData(this);
            let form_proses = $('#form_proses').val();

            if (form_proses === 'add_new') {
                $.ajax({
                    url: 'createForklift',
                    type: 'POST',
                    data: formUser,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success == true) {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1000
                            }).then(function() {
                                getItemCheck();
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed',
                                text: response.message
                            });
                        }
                    },
                    dataType: 'json'
                });
            } else {
                $.ajax({
                    url: 'editForklift',
                    type: 'POST',
                    data: formUser,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success == true) {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                getItemCheck();
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed',
                                text: response.message
                            });
                        }
                    },
                    dataType: 'json'
                });
            }
        });

        $('#btnRefresh').on('click', function() {
            getItemCheck();
        })

        $('#cardTable').on('click', '.linkEdit', function() {
            $('#id').val($(this).data('id'));
            $('#form_proses').val('edit_data');
            $('#name').val($(this).data('name'));
            $('#desc').val($(this).data('desc'));
        })

        // Menggunakan event delegation untuk tombol edit
        // $(document).on('click', '#edit-button', function() {
        //     let checkedValues = [];
        //     let data = {};

        //     $('#cardTable .item-checkbox:checked').each(function() {
        //         checkedValues.push($(this).val());
        //         data.id = $(this).val();
        //         data.name = $(this).data('name');
        //         data.desc = $(this).data('desc');
        //     });

        //     console.log(checkedValues);
        //     return;

        //     if (checkedValues.length > 0 && checkedValues.length < 2) {
        //         $('#id').val(data.id);
        //         $('#form_proses').val('edit_data');
        //         $('#name').val(data.name);
        //         $('#desc').val(data.desc);

        //     } else if (checkedValues.length > 1) {
        //         Swal.fire({
        //             icon: 'warning',
        //             title: 'Only one data can allowed to edit'
        //         });
        //     } else {
        //         Swal.fire({
        //             icon: 'warning',
        //             title: 'Please select one data to edit'
        //         });
        //     }
        //     console.log("Checked values: ", checkedValues);
        //     // Anda bisa menggunakan checkedValues sesuai kebutuhan
        // });

        getItemCheck();

        function getItemCheck() {
            $.ajax({
                url: 'getItemCheck',
                type: 'POST',
                data: {},
                dataType: "JSON",
                success: function(response) {
                    if (response.success == true) {
                        $('#cardTable').empty();
                        $('#cardTable').html(response.content);
                        $("table#item-table").Grid({
                            search: true,
                            pagination: true,
                            sort: true,
                            resizable: true,
                            fixedHeader: true,
                            height: '400px',
                            className: {
                                td: 'my-custom-td-class',
                                table: 'custom-table-classname',
                                'tbody:tr': 'trCustom'
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                        });
                    }
                },
            });
        }

        // $('#user-table').DataTable();
        // var myTable = new DataTable('#user-table');
        // $('#user-table').on('click', 'tbody tr', function() {
        //     myTable.row(this).edit();
        // });

        // $('#btnAdd').on('click', function() {
        //     $('#headerForm').text('Add new item');
        //     $('#form_proses').val('add_new');
        //     $('#modalForm').modal('show');
        // })

        // $('.btnEdit').on('click', function() {

        //     let dataToPost = {
        //         msg: "msg",
        //         url: "<?= base_url('ItemForklift/editForklift?id=') ?>" + $(this).data('id'),
        //         tabName: "Edit Item Forklift - " + $(this).data('code'),
        //         id: $(this).data('code')
        //     }

        //     window.parent.postMessage(dataToPost, "<?= base_url() ?>");

        //     // $('#headerForm').text('Edit ekspedisi');
        //     // $('#form_proses').val('edit');
        //     // $('#id').val($(this).data('id'));
        //     // $('#name').val($(this).data('name'));
        //     // $('#desc').val($(this).data('desc'));
        //     // $('#modalForm').modal('show');
        // })

        // $('.btnDelete').on('click', function() {
        //     let id = $(this).data('id');
        //     $.post('deleteForklift', {
        //         id: id
        //     }, function(response) {
        //         if (response.success == true) {
        //             Swal.fire({
        //                 position: "top-end",
        //                 icon: "success",
        //                 title: response.message,
        //                 showConfirmButton: false,
        //                 timer: 1500
        //             }).then(function() {
        //                 window.location.href = 'index';
        //             })
        //         } else {
        //             Swal.fire({
        //                 icon: 'error',
        //                 title: 'Failed',
        //                 text: response.message
        //             });
        //         }
        //     }, 'json');
        // })
    });
</script> -->
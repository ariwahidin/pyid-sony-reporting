<link href="<?= base_url() ?>myassets/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="<?= base_url() ?>myassets/js/jquery-3.7.0.js"></script>
<script src="<?= base_url() ?>myassets/js/jquery.dataTables.min.js"></script>

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">List Checker</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <!-- <li class="breadcrumb-item">
                        <a href="javascript: void(0);">Master TOP</a>
                    </li> -->
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col col-md-6">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-success float-right" id="btnAddChecker">Add Checker</button>
            </div>
            <div class="card-body">
                <table id="employe-table" class="display table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($checker->result() as $data) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->name ?></td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                    <button class="btn btn-sm btn-danger btnDelete" data-id="<?= $data->id ?>">Delete</button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addChecker" tabindex="-1" aria-labelledby="createTaskLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-success-subtle">
                <h5 class="modal-title" id="createTaskLabel">Add Checker</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="createTaskBtn-close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="task-error-msg" class="alert alert-danger py-2"></div>
                <form autocomplete="off" id="checker-form">
                    <div class="mb-3">
                        <label for="task-title-input" class="form-label">Checker Name</label>
                        <input type="text" id="checkerName" class="form-control">
                    </div>

                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i class="ri-close-fill align-bottom"></i> Close</button>
                        <button type="button" class="btn btn-primary" id="addNewChecker" data-el-id="">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {


        $('#employe-table').DataTable();

        $('#btnAddChecker').on('click', function() {
            $('#addChecker').modal('show')
        })

        $('#checker-form').on('submit', function(e) {
            e.preventDefault();
            $('#addNewChecker').click();
            $('#addNewChecker').trigger();
        })

        $('.btnDelete').on('click', function() {
            let id = $(this).data('id');
            $.post('deleteChecker', {
                id
            }, function(response) {
                if (response.success == true) {
                    window.location.href = 'listChecker'
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: response.message
                    });
                }
            }, 'json');
        })

        $('#addNewChecker').on('click', function() {
            let checker = $('#checkerName').val();
            if (checker.trim() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Checker name is empty'
                });
            } else {
                $.post('createChecker', {
                    checker
                }, function(response) {
                    if (response.success == true) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.href = 'listChecker'
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: response.message
                        });
                    }
                }, 'json');
            }
        })
    })
</script>
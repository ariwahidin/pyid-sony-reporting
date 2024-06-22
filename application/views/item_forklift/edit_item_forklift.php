<div class="container-fluid">
    <div class="row">
        <div class="col col-md-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mt-1">
                <h4 class="mb-sm-0">Edit Item Forklift </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Item Check</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-10">
            <div class="card">
                <!-- <div class="card-header">
                    <button class="btn btn-primary" id="btnAdd">Add new item</button>
                </div> -->
                <div class="card-body">
                    <?php
                    // var_dump($item->row());
                    $row = $item->row();
                    ?>
                    <form id="ekpsedisiForm">
                        <div class="row g-3">
                            <div class="col-xxl-6">
                                <div>
                                    <label for="name" class="form-label">Code </label>
                                    <input type="text" class="form-control" id="code" name="code" value="<?= $row->code . $row->id ?>" placeholder="" required readonly>
                                    <input type="hidden" id="id" name="id" value="<?= $row->id ?>" readonly>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div>
                                    <label for="name" class="form-label">Item Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $row->name ?>" required>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div>
                                    <label for="name" class="form-label">Item Descrption</label>
                                    <input type="text" class="form-control" id="desc" name="desc" value="<?= $row->desc ?>" placeholder="">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
        $('#btnAdd').on('click', function() {
            $('#headerForm').text('Add new item');
            $('#form_proses').val('add_new');
            $('#modalForm').modal('show');
        })

        $('#ekpsedisiForm').on('submit', function(e) {
            e.preventDefault();
            let formUser = new FormData(this);
            $.ajax({
                url: 'prosesEditForklift',
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
                        }).then(function() {
                            location.reload();
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
        })
    })
</script>
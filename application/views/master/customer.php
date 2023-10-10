<link href="<?= base_url() ?>myassets/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="<?= base_url() ?>myassets/js/jquery-3.7.0.js"></script>
<script src="<?= base_url() ?>myassets/js/jquery.dataTables.min.js"></script>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Customer</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Master Customer</a></li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table id="customer-table" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>CardName</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#customer-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('master/getMasterCustomer'); ?>",
                "type": "POST"
            }
        });
    });
</script>
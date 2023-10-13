<link href="<?= base_url() ?>myassets/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="<?= base_url() ?>myassets/js/jquery-3.7.0.js"></script>
<script src="<?= base_url() ?>myassets/js/jquery.dataTables.min.js"></script>
<style>
    table tr th:first-child{
        max-width: 10px !important;
    }
</style>



<div class="row">
    <div class="col col-md-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Item SKU</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Master Item SKU</a></li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col col-md-10">
        <div class="card">
            <div class="card-body">
                <table id="item-table" class="display table table bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ItemCode</th>
                            <th>FrgnName</th>
                            <th>ItemName</th>
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
        $('#item-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('master/getMasterItem'); ?>",
                "type": "POST"
            }
        });
    });
</script>
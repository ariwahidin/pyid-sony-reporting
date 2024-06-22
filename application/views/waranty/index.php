<style>

</style>


<link href="<?= base_url() ?>myassets/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="<?= base_url() ?>myassets/js/jquery-3.7.0.js"></script>
<script src="<?= base_url() ?>myassets/js/jquery.dataTables.min.js"></script>


<div class="container-fluid">
    <div class="row">
        <div class="col col-md-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mt-1">
                <h4 class="mb-sm-0">Waranty Reguler</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Waranty Reguler</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-7">
            <div class="card">
                <div class="card-header">
                    <a href="<?= base_url('waranty/printWarantyReguler') ?>" class="btn btn-success float-end" id="btnPrint">Print Waranty</a>
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
        <div style="display: none;" class="col-md-5">
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
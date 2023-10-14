<link href="<?= base_url() ?>myassets/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="<?= base_url() ?>myassets/js/jquery-3.7.0.js"></script>
<script src="<?= base_url() ?>myassets/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
<style>
    table tr th:first-child {
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
            <div class="card-header">
                <label for="excel-file-input">Pilih file Excel : </label>
                <input type="file" id="excel-file-input" accept=".xlsx" />
                <!-- <button id="upload-button">Upload</button> -->
            </div>
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

<!-- Mengimpor library SheetJS dari CDN -->

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



    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('excel-file-input');
        const uploadButton = document.getElementById('upload-button');
        
        fileInput.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                const file = e.target.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const data = new Uint8Array(e.target.result);
                    const workbook = XLSX.read(data, {
                        type: 'array'
                    });

                    const firstSheetName = workbook.SheetNames[0];
                    const worksheet = workbook.Sheets[firstSheetName];
                    const excelData = XLSX.utils.sheet_to_json(worksheet);

                    sendDataToBackend(excelData);
                    // console.log(excelData);
                };

                reader.readAsArrayBuffer(file);
            }
        });

        function sendDataToBackend(data) {
            fetch("<?=base_url('master/prosesSimpan')?>", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data),
                })
                .then(response => response.json())
                .then(responseData => {
                    console.log('Response from server:', responseData);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    });
</script>
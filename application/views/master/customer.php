<link href="<?= base_url() ?>myassets/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="<?= base_url() ?>myassets/js/jquery-3.7.0.js"></script>
<script src="<?= base_url() ?>myassets/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>




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
    <div class="col col-md-12">
        <div class="card">
            <div class="card-header">
                <label for="excel-file-input">Pilih file Excel : </label>
                <input type="file" id="excel-file-input" accept=".xlsx" />
                <button id="upload-button">Upload</button>
                <button id="download-button">Download format excel</button>
            </div>
            <div class="card-body">
                <table id="customer-table" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
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
    // $(document).ready(function() {
    // });

    let table = $('#customer-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?php echo site_url('master/getMasterCustomer'); ?>",
            "type": "POST"
        }
    });

    let data_excel = []

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
                    data_excel = excelData
                    // sendDataToBackend(excelData);
                    // console.log(excelData);
                };

                reader.readAsArrayBuffer(file);
            } else {
                data_excel = []
            }
        });
    });

    function sendDataToBackend(data) {
        startLoading()
        fetch("<?= base_url('master/prosesSimpanCustomer') ?>", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(responseData => {
                console.log(responseData);
                if (responseData.success == true) {
                    stopLoading()
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Data customer berhasil disimpan',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        table.ajax.reload();
                    })
                } else {
                    Swal.fire('Error', 'Gagal simpan data customer', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    document.getElementById("upload-button").addEventListener('click', function(e) {
        if (data_excel.length > 0) {

            const obj = data_excel[0];

            if (obj['CardCode'] == undefined) {
                Swal.fire('Warning', 'Kolom CardCode pada file excel tidak tersedia', 'warning')
                return false;
            }

            if (obj['CardName'] == undefined) {
                Swal.fire('Warning', 'Kolom CardName pada file excel tidak tersedia', 'warning')
                return false;
            }

            if (obj['Address'] == undefined) {
                Swal.fire('Warning', 'Kolom Address pada file excel tidak tersedia', 'warning')
                return false;
            }

            if (obj['City'] == undefined) {
                Swal.fire('Warning', 'Kolom City pada file excel tidak tersedia', 'warning')
                return false;
            }

            if (obj['Phone'] == undefined) {
                Swal.fire('Warning', 'Kolom Phone pada file excel tidak tersedia', 'warning')
                return false;
            }

            sendDataToBackend(data_excel);
            // Swal.fire('Selamat', 'Lanjut ke proses selanjutnya', 'success');


        } else {
            Swal.fire('Warning', 'File excel belum diisi', 'warning');
        }
    })

    document.getElementById('download-button').addEventListener('click', function() {
        // Contoh data
        startLoading()
        var data = [
            ["Nama", "Alamat"],
            // ["John Doe", "123 Main St"],
            // ["Jane Smith", "456 Elm St"],
            // Tambahkan data lainnya di sini
        ];

        // Buat workbook baru
        var wb = XLSX.utils.book_new();
        var ws = XLSX.utils.aoa_to_sheet(data);

        // Tambahkan worksheet ke workbook
        XLSX.utils.book_append_sheet(wb, ws, "Data Diri");

        // Simpan workbook ke file Excel
        XLSX.writeFile(wb, "master_customer.xlsx");
        stopLoading()
    });
</script>
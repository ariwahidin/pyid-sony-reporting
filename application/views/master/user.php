<link href="<?= base_url() ?>myassets/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="<?= base_url() ?>myassets/js/jquery-3.7.0.js"></script>
<script src="<?= base_url() ?>myassets/js/jquery.dataTables.min.js"></script>
<style>
    table tr th:first-child {
        max-width: 10px !important;
    }
</style>



<div class="row">
    <div class="col col-md-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Users</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Master Users</a></li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col col-md-10">
        <div class="card">
            <div class="card-header">
                <!-- <label for="excel-file-input">Pilih file Excel : </label>
                <input type="file" id="excel-file-input" accept=".xlsx" /> -->
                <button id="btn-new-subdist" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Add new subdist user</button>
            </div>
            <div class="card-body">
                <table id="user-table" class="display table table bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Role</th>
                            <!-- <th>CardName</th> -->
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Grids in modals -->
<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Add new subdist user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="userForm">
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="Enter password" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <label for="role" class="form-label">Role</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="admin">
                                    <label class="form-check-label" for="inlineRadio1">Admin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="subdist">
                                    <label class="form-check-label" for="inlineRadio2">Subdist</label>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="cardname" class="form-label">Customer Name</label>
                                <select class="form-control" name="customercode" id="selectOptions" required>
                                    <!-- fetch data option -->
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Mengimpor library SheetJS dari CDN -->

<script>
    $(document).ready(function() {
        $('#user-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('master/getMasterUsers'); ?>",
                "type": "POST"
            }
        });
    });


    const userForm = document.getElementById('userForm');

    userForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah pengiriman form HTML tradisional
        const formData = new FormData(userForm);
        fetch("<?= base_url('master/simpanNewUserSubdist') ?>", {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Proses respons dari server (misalnya, tampilkan pesan sukses)
                console.log('Pengguna baru ditambahkan:', data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });


    // Fungsi untuk mengambil data dari API
    function fetchDataSubdist() {
        fetch("<?= base_url('master/getSubdistForNewUser') ?>") // Ganti URL API dengan URL sesuai dengan kebutuhan Anda
            .then(response => response.json())
            .then(data => {
                const selectOptions = document.getElementById('selectOptions');

                // Bersihkan elemen select dengan menghapus semua opsi sebelum menambahkan data baru
                selectOptions.innerHTML = '';

                // Tambahkan opsi default kembali
                const defaultOption = document.createElement('option');
                defaultOption.value = "";
                defaultOption.textContent = "Pilih customer";
                selectOptions.appendChild(defaultOption);

                // Iterasi data dari API dan tambahkan ke elemen select
                data.data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.CardCode; // Ganti dengan properti yang sesuai
                    option.textContent = item.CardName; // Ganti dengan properti yang sesuai
                    selectOptions.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    // Panggil fungsi fetchData untuk mengisi select saat tombol ditekan
    document.getElementById("btn-new-subdist").addEventListener("click", fetchDataSubdist);

    function simpanDataUser() {

    }
</script>
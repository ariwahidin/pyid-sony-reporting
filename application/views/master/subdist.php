<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Master Subdist</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Master Subdist</a></li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0 flex-grow-1">Base Example</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="table-subdist">
                    <table id="data-table">
                        <thead>
                            <tr>
                                <th>CardCode</th>
                                <th>CardName</th>
                                <!-- Tambahkan kolom sesuai dengan data Anda -->
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data akan ditampilkan di sini -->
                        </tbody>
                    </table>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>

<div class="row">
    <div class="col-12">

    </div><!-- end col -->

    <div class="col-xxl-4">

    </div><!-- end col -->
</div><!-- end row -->
<script>
    // Fungsi untuk mengambil data dengan Fetch API
    function fetchData() {
        fetch("http://localhost/subdist/master/getMasterSubdist") // Ganti URL dengan URL yang sesuai
            .then(response => response.json())
            .then(data => {
                // Panggil fungsi untuk membuat tabel dengan List.js
                // console.log(data.subdist);
                createTable(data.subdist);

            })
            .catch(error => {
                console.error('Gagal mengambil data:', error);
            });
    }

    // Fungsi untuk membuat tabel menggunakan List.js
    function createTable(data) {
        console.log(data)
        // // Konfigurasi List.js
        // const options = {
        //     valueNames: ['CardCode', 'CardName'], // Sesuaikan dengan struktur data Anda
        // };

        // // Buat objek List.js
        // const userList = new List('data-table', options);

        // // Hapus semua data yang ada sebelumnya
        // userList.clear();

        // // Tambahkan data ke tabel
        // data.forEach(item => {
        //     userList.add({
        //         nama: item.CardCode, // Sesuaikan dengan nama kolom dalam tabel Anda
        //         usia: item.CardName, // Sesuaikan dengan nama kolom dalam tabel Anda
        //         // Tambahkan kolom lain sesuai dengan struktur data Anda
        //     });
        // });
    }

    // Panggil fungsi fetchData untuk mengambil data saat halaman dimuat
    fetchData();
</script>
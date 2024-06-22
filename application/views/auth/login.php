<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Sign In | Sony Reporting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Piaggio" name="description" />
    <!-- App favicon -->
    <!-- jsvectormap css -->
    <link href="<?= base_url('jar/html/default/') ?>assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('jar/html/default/') ?>assets/images/yusen-kotak.jpg">

    <!-- gridjs css -->
    <link rel="stylesheet" href="<?= base_url('jar/html/default/') ?>assets/libs/gridjs/theme/mermaid.min.css">
    <!-- Layout config Js -->
    <script src="<?= base_url('jar/html/default/') ?>assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?= base_url('jar/html/default/') ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('jar/html/default/') ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('jar/html/default/') ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= base_url('jar/html/default/') ?>assets/css/custom.min.css" rel="stylesheet" type="text/css" />


    <!-- Sweet Alert css-->
    <link href="<?= base_url('jar/html/default/') ?>assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <script src="<?= base_url() ?>myassets/js/jquery-3.7.0.js"></script>
    <script src="<?= base_url() ?>myassets/js/moment.js"></script>
    <script src="<?= base_url() ?>myassets/js/moment-time-zone.js"></script>
    <style>
        #logo {
            border-radius: 10%;
        }
    </style>
</head>

<body>

    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="<?= base_url('jar/html/default/assets/') ?>images/sony-logo.png" alt="" height="50" style="margin-top: 60px;">
                                </a>
                            </div>
                            <p class="mt-0 fs-15 fw-medium"></p>
                        </div>
                    </div>
                </div> -->
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h2 class="text-primary">SONY Reporting</h2>
                                </div>
                                <div class="p-2 mt-4">
                                    <form id="loginForm">

                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" placeholder="Enter username">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>



                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">Log In</button>
                                        </div>

                                        <div id="failedAlert" style="display: none;" class="mt-4">
                                            <div class="alert alert-danger mb-xl-0" role="alert">
                                                <strong> Login gagal! </strong> username atau password salah
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> PT. Puninar Yusen Logistics
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="<?= base_url('jar/html/default/assets/') ?>libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('jar/html/default/assets/') ?>libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url('jar/html/default/assets/') ?>libs/node-waves/waves.min.js"></script>
    <script src="<?= base_url('jar/html/default/assets/') ?>libs/feather-icons/feather.min.js"></script>
    <script src="<?= base_url('jar/html/default/assets/') ?>js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= base_url('jar/html/default/assets/') ?>js/plugins.js"></script>

    <!--Swiper slider js-->
    <script src="<?= base_url('jar/html/default/assets/') ?>libs/swiper/swiper-bundle.min.js"></script>

    <!-- swiper.init js -->
    <script src="<?= base_url('jar/html/default/assets/') ?>js/pages/swiper.init.js"></script>

    <!-- password-addon init -->
    <script src="<?= base_url('jar/html/default/assets/') ?>js/pages/password-addon.init.js"></script>

    <script>
        document.getElementById("username").focus()
        document.getElementById("username").addEventListener("keyup", function(e) {
            if (e.key == "Enter") {
                document.getElementById("password").focus()
            }
        })
        async function loginUser(event) {
            event.preventDefault(); // Mencegah pengiriman form default

            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            // Periksa apakah username atau password kosong sebelum melakukan login
            if (username.trim() === '' || password.trim() === '') {
                console.error('Username dan password harus diisi.');
                return; // Menghentikan fungsi jika ada yang kosong
            }

            const data = {
                username: username,
                password: password
            };

            try {
                const response = await fetch("<?= base_url('auth/proses') ?>", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                if (response.ok) {
                    const responseData = await response.json();
                    if (responseData.success === true) {
                        dashboard(responseData); // Panggil fungsi dashboard jika success adalah true
                    } else {
                        console.error('Login gagal:', responseData.message);
                        document.getElementById("failedAlert").style.display = "block"
                    }
                } else {
                    console.error('Login gagal:', response.status);
                }
            } catch (error) {
                console.error('Terjadi kesalahan:', error);
            }
        }

        function dashboard(data) {
            // Tambahkan logika dashboard sesuai kebutuhan Anda
            console.log('Menampilkan dashboard:', data);

            // Alihkan ke halaman dashboard jika login berhasil
            if (data.success === true) {
                window.location.href = "<?= base_url('dashboard/index') ?>"; // Ganti dengan URL halaman dashboard yang sesuai
            }
        }

        const loginForm = document.getElementById('loginForm');
        loginForm.addEventListener('submit', loginUser);
    </script>
</body>

</html>
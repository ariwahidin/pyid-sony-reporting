</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->

<!-- <footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                PT. Puninar Yusen Logistics Indonesia
            </div>
        </div>
    </div>
</footer> -->
</div>

</div>
<!-- END layout-wrapper -->
<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->

<!--preloader-->
<div id="preloader">
    <div id="status">
        <div class="spinner-border text-primary avatar-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>



<!-- JAVASCRIPT -->
<script src="<?= base_url('jar/html/default/') ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('jar/html/default/') ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url('jar/html/default/') ?>assets/libs/node-waves/waves.min.js"></script>
<script src="<?= base_url('jar/html/default/') ?>assets/libs/feather-icons/feather.min.js"></script>
<script src="<?= base_url('jar/html/default/') ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<!-- <script src="<?= base_url('jar/html/default/') ?>assets/js/plugins.js"></script> -->

<!-- apexcharts -->
<script src="<?= base_url('jar/html/default/') ?>assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Vector map-->
<script src="<?= base_url('jar/html/default/') ?>assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="<?= base_url('jar/html/default/') ?>assets/libs/jsvectormap/maps/world-merc.js"></script>

<!-- projects js -->
<script src="<?= base_url('jar/html/default/') ?>assets/js/pages/dashboard-projects.init.js"></script>
<!-- Dashboard init -->
<script src="<?= base_url('jar/html/default/') ?>assets/js/pages/dashboard-job.init.js"></script>
<!-- App js -->
<script src="<?= base_url('jar/html/default/') ?>assets/js/app.js"></script>




<!-- My JS -->
<script>
    async function logout() {
        try {
            const response = await fetch("<?= base_url('auth/logout') ?>", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                const responseData = await response.json();
                if (responseData.success === true) {
                    window.location.href = "<?= base_url('auth/login') ?>"; // Ganti dengan URL halaman login yang sesuai
                } else {
                    console.error('Logout gagal:', responseData.message);
                }
            } else {
                console.error('Logout gagal:', response.status);
            }
        } catch (error) {
            console.error('Terjadi kesalahan:', error);
        }
    }
    const logoutLink = document.getElementById('logoutLink');
    logoutLink.addEventListener('click', (event) => {
        event.preventDefault(); // Mencegah navigasi ke "#" (atau URL kosong) jika elemen <a> ditekan
        logout(); // Panggil fungsi logout saat tautan Logout diklik
    });

    setTimeout(stopLoading, 1000);
</script>
<script>
    $(document).ready(function() {

        let tabOpen = [];


        // Mendengarkan pesan dari iframes
        window.addEventListener('message', function(event) {
            if (event.data.msg) {
                console.log('Message received:', event.data);
                let url = event.data.url;
                let tabName = event.data.tabName;
                let idMenu = event.data.id;
                openScreen(url, tabName, idMenu)
            }
        });

        $('#containerFrame').html('');
        $('.menuNav').on('click', function(e) {
            e.preventDefault();
            var url = $(this).data('url');
            var tabName = $(this).data('tab-name');
            var id = $(this).data('id');
            openScreen(url, tabName, id);
        });

        function openScreen(url, tabName, id) {
            // Check if the URL is already opened
            let isOpen = tabOpen.some(item => item.id === id);
            $('.iframeOpen').css('display', 'none');
            if (!isOpen) {
                let tab = {};
                let elementFrame = `<iframe id="contentFrame_${id}" class="iframeOpen" data-id="${id}" src="${url}"></iframe>`;
                $('#containerFrame').append(elementFrame);
                tab.id = id;
                tab.url = url;
                tab.tabName = tabName;
                tab.elementFrame = elementFrame;
                tabOpen.push(tab);
                createTabOpen(tabOpen, id);
            } else {
                $('.iframeOpen').css('display', 'none');
                $('#contentFrame_' + id).css('display', 'block');
                createTabOpen(tabOpen, id);
            }
        }

        $('#tabOpenBadge').on('click', '.closeTabBadge', function() {
            let tabOpenExist = [];
            let idMenu = $(this).data('id');
            tabOpen.forEach(function(item) {
                if (item.id != idMenu) {
                    tabOpenExist.push(item);
                }
            });
            $('#contentFrame_' + idMenu).remove();

            tabOpen = tabOpenExist
            createTabOpen(tabOpen);
        });



        $('#tabOpenBadge').on('click', '.spanName', function() {
            let id = $(this).data('id');
            $('.iframeOpen').css('display', 'none');
            $('#contentFrame_' + id).css('display', 'block');
            createTabOpen(tabOpen, id);
        })

        function createTabOpen(tabOpen, idMenu) {
            $('#tabOpenBadge').empty();
            tabOpen.forEach(function(item) {
                let bgColor = "bg-secondary";
                if (item.id === idMenu) {
                    bgColor = "bg-success";
                }
                let elementTab = `<button class="badge badge-label ${bgColor} spanName" data-id="${item.id}"> <i class="mdi mdi-circle-medium"></i> <span>${item.tabName}</span> &nbsp; <span class="badge bg-danger closeTabBadge" data-id="${item.id}""><strong>X</strong></span></button>`;
                $('#tabOpenBadge').append(elementTab);
            })
        }

    })
</script>
</body>



</html>
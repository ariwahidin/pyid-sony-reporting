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

<script>
    $(document).ready(function() {
        setTimeout(stopLoading, 1000);
    })
</script>

</body>



</html>
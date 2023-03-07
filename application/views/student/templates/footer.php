</div>

</div>
<!--**********************************
            Content body end
        ***********************************-->

<!--**********************************
            Footer start
        ***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by <a href="https://instagram.com/alfigofransp" target="_blank">Alfigo Frans Pratama</a> 2023</p>
    </div>
</div>
<!--**********************************
            Footer end
        ***********************************-->





<!--**********************************
           Support ticket button start
        ***********************************-->

<!--**********************************
           Support ticket button end
        ***********************************-->


</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

<!--**********************************
        Scripts
    ***********************************-->
<!-- Required vendors -->
<script src="<?= base_url('assets/') ?>vendor/global/global.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.bundle.min.js"></script>

<!-- Chart piety plugin files -->
<script src="<?= base_url('assets/') ?>vendor/peity/jquery.peity.min.js"></script>

<!-- Apex Chart -->
<script src="<?= base_url('assets/') ?>vendor/apexchart/apexchart.js"></script>

<!-- Dashboard 1 -->
<script src="<?= base_url('assets/') ?>js/dashboard/dashboard-1.js"></script>

<script src="<?= base_url('assets/') ?>vendor/owl-carousel/owl.carousel.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>js/plugins-init/datatables.init.js"></script>
<script src="<?= base_url('assets/') ?>vendor/select2/js/select2.full.min.js"></script>
<script src="<?= base_url('assets/') ?>js/plugins-init/select2-init.js"></script>
<script src="<?= base_url('assets/') ?>vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="<?= base_url('assets/') ?>js/custom.min.js"></script>
<script src="<?= base_url('assets/') ?>js/deznav-init.js"></script>
<script>
    function swal(icn, titles, texts) {
        Swal.fire(
            titles,
            texts,
            icn
        )
    }
</script>
<script>
    $('.delete').on('click', function() {
        var url = $(this).attr('href');
        Swal.fire({
            title: "Are you sure to delete ?",
            text: "You will not be able to recover this data file !!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it !!",

        }).then(result => {
            if (result.value) {
                window.location.href = url;
            }
        })
        return false;
    });
</script>
<script>
    $('.logout').on('click', function() {
        var url = $(this).attr('href');
        Swal.fire({
            title: "Are you sure to log out ?",
            text: "You must input username or email address and password to login again !!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Log Out !!",

        }).then(result => {
            if (result.value) {
                window.location.href = url;
            }
        })
        return false;
    });
</script>


</body>

</html>
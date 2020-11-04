<!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url()?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Input Filter -->
    <script src="<?= base_url()?>assets/plugins/inputfilter/inputFilter.js"></script>
    <!-- InputMask -->
    <script src="<?= base_url()?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url()?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?= base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url()?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url()?>assets/plugins/toastr/toastr.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url()?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url()?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url()?>assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url()?>assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url()?>assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url()?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url()?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url()?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url()?>assets/dist/js/adminlte.min.js"></script>
    <script>
        $('.toastrDefaultSuccess').click(function() {
            toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultInfo').click(function() {
            toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultError').click(function() {
            toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultWarning').click(function() {
            toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
    </script>
</body>
</html>

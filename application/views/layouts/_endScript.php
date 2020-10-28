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
    <script src="../../plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url()?>assets/dist/js/adminlte.min.js"></script>
    <script>
        $(function(){
            $('#userDateB').datetimepicker({
                format : 'DD-MM-YYYY'
            });
            $('#userDateB').datetimepicker({ useCurrent: false });
            // console.log($('#userDateB'));
        });

        $("#userNisn").inputFilter(function(value) {
            return /^\d*$/.test(value) && (value === "" || parseInt(value.length) <= 10);
        });

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

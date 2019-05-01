    
            <footer>
                <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>. © <?= date('Y') ?>. All Rights Reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p>
            </footer>
        </div>
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="<?= base_url() ?>assets/blue/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="<?= base_url() ?>assets/blue/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="<?= base_url() ?>assets/blue/js/jquery.metisMenu.js"></script>

    <?php if(!isset($user) || empty($user) ): ?>

    <!-- Custom Js -->
    <script src="<?= base_url() ?>assets/blue/js/custom-scripts.js"></script>

    <?php else: ?>

    <!-- DATA TABLE SCRIPTS -->
    <script src="<?= base_url() ?>assets/blue/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?= base_url() ?>assets/blue/js/dataTables/dataTables.bootstrap.js"></script>

    <script>
        $(document).ready(function () {
            $('#advanced_data_tables').dataTable();
        });

        function viewModal(elem) {
            $("#activity_desc_modal .modal-body").html($(elem).data('desc'));
            $("#activity_desc_modal").modal('show');
        }
    </script>

    <?php endif; ?>
   
</body>
</html>
<!-- Back-End -->

<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>Copyright © Blog</small>
        </div>
    </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sair do Sistema</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Tem certeza que deseja sair do sistema?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>usuarios/logout">Sair</a>
            </div>
        </div>
    </div>
</div>

       <script src="<?= base_url('assets/datatables/jquery-1.12.4.js') ?>"></script>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>" </script>
<!-- Page level plugin JavaScript-->




</div>
</body>

</html>

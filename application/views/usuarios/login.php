<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Blog</title>
        <!-- Bootstrap core CSS-->
        <link href=" <?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="<?= base_url('assets/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="<?= base_url('assets/css/sb-admin.css') ?>" rel="stylesheet">
    </head>
    <body class="bg-dark">
        <div class="container">
            <div class="card card-login mx-auto mt-5">
                <?php if ($this->session->flashdata('error') == TRUE): ?>
                    <div class="alert alert-danger" align="center">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form class="form-signin" method="post" action="<?= base_url() ?>usuarios/login">
                        <label for="username" class="sr-only">Email</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="username" required autofocus>
                        <br>
                        <label for="password" class="sr-only">Senha</label>
                        <input type="password" id="senha" name="password" class="form-control" placeholder="Password" required>
                        <br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
        <!-- Core plugin JavaScript-->
        <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
    </body>
</html>

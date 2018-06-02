<?php $this->load->view('templates/cabecalho-sistema'); ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Usuário</a>
            </li>
            <li class="breadcrumb-item active">Novo Usuário</li>

            <li>



        </ol>

        <?php echo validation_errors(); ?>

        <form  action="<?= base_url() ?>usuario/novo" method="post" >

            <div class="row">
                <div class="col-md-12 col-md-offset-4">
                    <h1 class="text-center">Novo Usuário</h1>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control" name="name" placeholder="Nome">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" class="form-control" name="telefone" placeholder="(61) 9999-9999">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="email" placeholder="E-mail">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nome de Usuário</label>
                                <input type="text" class="form-control" name="username" placeholder="Nome de Usuário">
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <label>Senha</label>
                                <input type="password" class="form-control" name="password" placeholder="Senha">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Confirmar senha</label>
                                <input type="password" class="form-control" name="password2" placeholder="Confirmar senha">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('templates/rodape-sistema'); ?>

<?php $this->load->view('templates/cabecalho-sistema'); ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Categorias</a>
            </li>
            <li class="breadcrumb-item active">Nova Categoria</li>

            <li>
        </ol>


        <h2>Categoria</h2>

        <?php echo validation_errors(); ?>

        <form  action="<?= base_url() ?>categorias/criar" method="post" >

            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Digite o nome">
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>

    </div>

</div>

<br>
<?php $this->load->view('templates/rodape-sistema'); ?>

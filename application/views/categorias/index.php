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

        <h2><?= $titulo; ?></h2>
        <ul class="list-group">
            <?php foreach ($categorias as $categoria) : ?>
                <li class="list-group-item"><a href="<?php echo site_url('/categorias/posts/' . $categoria['id']); ?>"><?php echo $categoria['nome']; ?></a>
                    <?php if ($this->session->userdata('usuario_id') == $categoria['usuario_id']): ?>
                        <form class="cat-delete" action="categorias/deletar/<?php echo $categoria['id']; ?>" method="POST">
                            <input type="submit" class="btn-link text-danger" value="[X]">
                        </form>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>


    </div>

</div>

<br>
<?php $this->load->view('templates/rodape-sistema'); ?>

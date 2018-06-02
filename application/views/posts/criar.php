<?php $this->load->view('templates/cabecalho-sistema'); ?>
<script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Posts</a>
            </li>
            <li class="breadcrumb-item active">Criar Postagem</li>

            <li>
        </ol>

        <h2>Criar Postagem</h2>

        <?php echo validation_errors(); ?>

        <form action="<?= base_url() ?>posts/criar" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Titulo</label>
                <input type="text" class="form-control" name="titulo" placeholder="Digite o Título">
            </div>
            <div class="form-group">
                <label>Corpo</label>
                <textarea id="editor1" class="form-control" name="conteudo" placeholder="Digite o conteudo"></textarea>
            </div>
            <div class="form-group">
                <label>Categoria</label>
                <select name="categoria_id" class="form-control">
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nome']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Imagem</label>
                <input type="file" name="userfile" size="20">
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>


    </div>

</div>

<script>
    CKEDITOR.replace('editor1');
</script>
<br>
<?php $this->load->view('templates/rodape-sistema'); ?>

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
            <li class="breadcrumb-item active">Editar Postagem</li>

            <li>



        </ol>

        <h2>Editar Postagem</h2>

        <?php echo validation_errors(); ?>


        <form  action="<?= base_url() ?>posts/update" method="post" >

            <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
            <div class="form-group">
                <label>Título</label>
                <input type="text" class="form-control" name="titulo" placeholder="Add Title" value="<?php echo $post['titulo']; ?>">
            </div>
            <div class="form-group">
                <label>Conteudo</label>
                <textarea id="editor1" class="form-control" name="conteudo" placeholder="Add Body"><?php echo $post['conteudo']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Categoria</label>
                <select name="categoria_id" class="form-control">
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nome']; ?></option>
                    <?php endforeach; ?>
                </select>
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

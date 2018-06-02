<?php $this->load->view('templates/cabecalho'); ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4"><?= $titulo ?>
            </h1>
            <?php foreach ($posts as $post) : ?>

                <!-- Blog Post -->
                <div class="card mb-4">
                    <img class="card-img-top" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title"><?= $post['titulo'] ?></h2>
                        <p class="card-text"><?php echo word_limiter($post['conteudo'], 60); ?></p>
                        <a href="<?php echo site_url('/posts/' . $post['slug']); ?>" class="btn btn-danger">Leia Mais &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        <?php echo date('d/m/Y H:i:s', strtotime($post['criado_em'])); ?>
                        <a href="#"><?php echo $post['nome']; ?></a>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="pagination-links">
                <?php echo $this->pagination->create_links(); ?>
            </div>



        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4" style="
    margin-top: 48px;
">
            <br>
            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Pesquisar</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Pesquisar por...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Ir!</button>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categorias</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">

                                <?php foreach ($categorias as $categoria) : ?>

                                    <li>
                                        <a href="#"><?php echo $post['nome']; ?></a>
                                    </li>

                                <?php endforeach; ?>

                           
                            </ul>
                        </div>
                  
                    </div>
                </div>
            </div>

        

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<?php $this->load->view('templates/rodape'); ?>

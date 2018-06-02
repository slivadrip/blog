<?php $this->load->view('templates/cabecalho'); ?>

<div class="container">
    <div class="row"><div class="col-md-12">

            <h2 class="titulo-noticia"><?php echo $post['titulo']; ?></h2>
            <small class="post-date">Postado em: <?php echo $post['criado_em']; ?></small><br>
            <img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" class="img-fluid">
            <div class="post-body">
                <?php echo $post['conteudo']; ?>
            </div>

            <?php if ($this->session->userdata('usuario_id') == $post['usuario_id']): ?>
                <hr>
                <a class="btn btn-info pull-left" href="<?php echo base_url(); ?>posts/editar/<?php echo $post['slug']; ?>">Editar</a>
                <?php echo form_open('/posts/deletar/' . $post['id']); ?>
                <input type="submit" value="Deletar" class="btn btn-danger">
                </form>
            <?php endif; ?>
                <br>
                <hr>
<br>
            <div class="post-comments">
                <header>
                    <h3 class="titulo-comentario">Comentários<span class="no-of-comments">(<?php echo $totalComentarios ?>)</span></h3>
                </header>
                <?php if ($comentarios) : ?>
                    <?php foreach ($comentarios as $comentario) : ?>
                        <div class="comment">
                            <div class="comment-header d-flex justify-content-between">
                                <div class="user d-flex align-items-center">
                                    <div class="image"><img src="https://d19m59y37dris4.cloudfront.net/blog/1-2/img/user.svg" alt="..." class="img-fluid rounded-circle"></div>
                                    <div class="title"><strong><?php echo $comentario['nome']; ?></strong><span class="date"><?php echo date('d/m/Y H:i:s', strtotime($comentario['criado_em']));  ?></span></div>
                                </div>
                            </div>
                            <div class="comment-body">
                                <p><?php echo $comentario['conteudo']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>Nenhum comentário para exibir</p>
                <?php endif; ?>
            </div>
            <hr>
            <h3>Adicionar Comentário</h3>
            <?php echo validation_errors(); ?>
            <?php echo form_open('comentarios/criar/' . $post['id']); ?>
            <div class="row">


                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="nome" class="form-control">
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Comentário</label>
                <textarea name="conteudo" class="form-control"></textarea>
            </div>
            <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
            <div align="center">
                  <button class="btn btn-primary botao-blog" type="submit">Enviar</button>
            </div>
          
            </form>
        </div>
    </div>




</div>


<?php $this->load->view('templates/rodape'); ?>

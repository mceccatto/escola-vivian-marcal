    <?php
    $conexao = conexao::getInstance();

    $sql = "
    SELECT *
    FROM tb_classificacoes
    ORDER BY descricao ASC
    ";
    $stm = $conexao->prepare($sql);
    $stm->execute();
    $classificacoes = $stm->fetchAll(PDO::FETCH_OBJ);

    ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Blog</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>Página exclusiva para a criação e manutenção de postagens.</p>
			<div class="alert alert-danger d-none" role="alert" id="alerta_falha"></div>
			<div class="alert alert-success d-none" role="alert" id="alerta_sucesso"></div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 col-xxl-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">NOVA POSTAGEM</h5>
                    <form id="form_novo_blog" method="post">
                        <div class="row g-3 mb-3">
                            <div class="col-sm-9">
                                <label for="blogTitulo" class="form-label">Título <i class="fas fa-asterisk align-top obrigatorio"></i></label>
                                <input type="text" class="form-control shadow-none" id="blogTitulo" required>
                            </div>
                            <div class="col-sm-3">
                                <label for="blogClassificacao" class="form-label">Classificação <i class="fas fa-asterisk align-top obrigatorio"></i></label>
                                <select class="form-select" id="blogClassificacao" required>
                                    <option value="0">--Selecione</option>
                                    <?php
                                    for($i = 0; $i < count($classificacoes); $i++) {
                                        echo '<option value="'.$classificacoes[$i]->id.'">'.$classificacoes[$i]->descricao.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="blogConteudo" class="form-label">Conteúdo <i class="fas fa-asterisk align-top obrigatorio"></i></label>
                                <textarea class="form-control shadow-none" id="blogConteudo" required></textarea>
                            </div>
                        </div>
						<button class="w-100 btn btn-verde btn-lg shadow-none" id="publicar_blog" type="submit"><i class="fas fa-share"></i> Publicar Postagem</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-4 d-none d-xl-block d-xxl-block">
            <div class="text-center">
                <img class="bi me-2 py-2" src="<?php echo $url; ?>/img/logo.png" alt="logo" id="logo" height="150">
                <h2>Escola Vivian Marçal</h2>
                <p class="lead">Bem vindo(a) ao painel de administração!</p>
            </div>
        </div>
    </div>

    <div class="row mb-5 pb-5">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 col-xxl-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">POSTAGENS REGISTRADAS</h5>
					<div class="input-group mb-3">
						<span class="input-group-text" id="buscaPostagemIcone"><i class="fas fa-search"></i></span>
						<input type="text" class="form-control shadow-none" id="postagem" placeholder="Titulo" aria-label="Titulo" aria-describedby="buscaPostagemIcone">
					</div>
                    <div id="retornoBuscaPostagem"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editarPostagem" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDITAR POSTAGEM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="retornoEditarPostagem"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-vermelho shadow-none" data-bs-dismiss="modal"><i class="fas fa-ban"></i> Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="comentarioPostagem" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">COMENTÁRIOS DA POSTAGEM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="retornoComentarioPostagem"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-vermelho shadow-none" data-bs-dismiss="modal"><i class="fas fa-times"></i> Fechar</button>
                </div>
            </div>
        </div>
    </div>
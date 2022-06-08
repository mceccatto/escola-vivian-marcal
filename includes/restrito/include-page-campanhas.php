    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Campanhas</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>Página exclusiva para a criação e manutenção de campanhas.</p>
			<div class="alert alert-danger d-none" role="alert" id="alerta_falha"></div>
			<div class="alert alert-success d-none" role="alert" id="alerta_sucesso"></div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 col-xxl-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">NOVA CAMPANHA</h5>
                    <form id="form_nova_campanha" method="post">
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="campanhaTitulo" class="form-label">Título <i class="fas fa-asterisk align-top obrigatorio"></i></label>
                                <input type="text" class="form-control shadow-none" id="campanhaTitulo" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="campanhaInicio" class="form-label">Data de início <i class="fas fa-asterisk align-top obrigatorio"></i></label>
                                <input type="date" class="form-control shadow-none" id="campanhaInicio" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="campanhaTermino" class="form-label">Data de termino <i class="fas fa-asterisk align-top obrigatorio"></i></label>
                                <input type="date" class="form-control shadow-none" id="campanhaTermino" required>
                            </div>
                            <div class="col-12">
                                <label for="campanhaConteudo" class="form-label">Conteúdo <i class="fas fa-asterisk align-top obrigatorio"></i></label>
                                <textarea class="form-control shadow-none" id="campanhaConteudo" required></textarea>
                            </div>
                        </div>
						<button class="w-100 btn btn-verde btn-lg shadow-none" id="publicar_campanha" type="submit"><i class="fas fa-share"></i> Publicar Campanha</button>
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
                    <h5 class="mb-4">CAMPANHAS REGISTRADAS</h5>
					<div class="input-group mb-3">
						<span class="input-group-text" id="buscaCampanhaIcone"><i class="fas fa-search"></i></span>
						<input type="text" class="form-control shadow-none" id="campanha" placeholder="Titulo" aria-label="Titulo" aria-describedby="buscaCampanhaIcone">
					</div>
                    <div id="retornoBuscaCampanhas"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editarCampanha" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDITAR CAMPANHA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="retornoEditarCampanhas"></div>
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

    <div class="modal fade" id="historicoCampanha" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">HISTÓRICO DE CAMPANHA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="retornoHistoricoCampanhas"></div>
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
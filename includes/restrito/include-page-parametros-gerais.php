    <!-- https://www.cloudways.com/blog/the-basics-of-file-upload-in-php/ -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">   
        <h1 class="h2">Parâmetros Gerais</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>Página exclusiva para manutenção de parâmetros gerais do website.</p>
			<div class="alert alert-danger d-none" role="alert" id="alerta_falha"></div>
			<div class="alert alert-success d-none" role="alert" id="alerta_sucesso"></div>
            <div class="alert alert-warning d-none" role="alert" id="alerta_alerta"></div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 col-xxl-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">PARÂMETROS</h5>
                    <form id="formParametrosGerais" method="post" enctype="multipart/form-data">
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="nomeWebsite" class="form-label">Nome do website <i class="fas fa-asterisk align-top obrigatorio"></i></label>
                                <input type="text" class="form-control shadow-none" id="nomeWebsite">
                            </div>
                            <div class="col-sm-12">
                                <label for="logo" class="form-label">Logo do website</label>
                                <input type="file" class="form-control shadow-none" id="logo">
                                <small class="small-atencao">Resolução: 170x170<br/><img class="d-none" id="previaLogo" src="" class="img-fluid"></small>
                            </div>
                            <div class="col-sm-12">
                                <label for="urlFacebook" class="form-label">URL Facebook</label>
                                <input type="text" class="form-control shadow-none" id="urlFacebook">
                            </div>
                            <div class="col-sm-12">
                                <label for="urlYoutube" class="form-label">URL Youtube</label>
                                <input type="text" class="form-control shadow-none" id="urlYoutube">
                            </div>
                            <div class="col-sm-12">
                                <label for="urlInstagram" class="form-label">URL Instagram</label>
                                <input type="text" class="form-control shadow-none" id="urlInstagram">
                            </div>
                            <div class="col-sm-12">
                                <label for="banner1" class="form-label">Banner 01</label>
                                <input type="file" class="form-control shadow-none" id="banner1">
                                <small class="small-atencao">Resolução: 1920x600<br/><img class="d-none" id="previaBanner1" src="" class="img-fluid"></small>
                            </div>
                            <div class="col-sm-12">
                                <label for="banner2" class="form-label">Banner 02</label>
                                <input type="file" class="form-control shadow-none" id="banner2">
                                <small class="small-atencao">Resolução: 1920x600<br/><img class="d-none" id="previaBanner2" src="" class="img-fluid"></small>
                            </div>
                            <div class="col-sm-12">
                                <label for="banner3" class="form-label">Banner 03</label>
                                <input type="file" class="form-control shadow-none" id="banner3">
                                <small class="small-atencao">Resolução: 1920x600<br/><img class="d-none" id="previaBanner3" src="" class="img-fluid"></small>
                            </div>
                            <div class="col-sm-12">
                                <small class="small-atencao">Formatos compatíveis para upload: PNG, JPG ou JPEG.</small>
                            </div>
                        </div>
						<button class="w-100 btn btn-verde btn-lg shadow-none" id="atualizarParametrosGerais" type="submit"><i class="fas fa-save"></i> Salvar Alterações</button>
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
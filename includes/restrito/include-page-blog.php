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
                    <form id="form_nova_campanha" method="post">
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label for="campanhaTitulo" class="form-label">Título <i class="fas fa-asterisk align-top obrigatorio"></i></label>
                                <input class="form-control" type="text" aria-label="">
                            </div>
                            <div class="col-12">
                                <label for="campanhaConteudo" class="form-label">Conteúdo <i class="fas fa-asterisk align-top obrigatorio"></i></label>
                                <textarea class="form-control shadow-none" id="campanhaConteudo" required></textarea>
                            </div>
                        </div>
						<button class="w-100 btn btn-verde btn-lg shadow-none" id="publicar_campanha" type="submit"><i class="fas fa-share"></i> Publicar Postagem</button>
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
						<span class="input-group-text" id="buscaCampanhaIcone"><i class="fas fa-search"></i></span>
						<input type="text" class="form-control shadow-none" id="campanha" placeholder="Titulo" aria-label="Titulo" aria-describedby="buscaCampanhaIcone">
					</div>
                    <!-- Button trigger modal -->
                    <div class="histo-blog-cont modal-border-top modal-lista-contario-cin">
                        <p  class="modal-p">Dia das Crianças</p>
                        <div class="botao-lat-com">
                        <button type="button" class="btn corEditar" data-bs-toggle="modal" data-bs-target="#exampleModal3"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 40.5 35.993">
                        <defs>
                            <style>
                            .cls-edit {
                                fill: #fff;
                            }
                            </style>
                        </defs>
                        <path id="Icon_awesome-edit" data-name="Icon awesome-edit" class="cls-edit" d="M28.308,5.85l6.342,6.342a.687.687,0,0,1,0,.97L19.294,28.519l-6.525.724a1.368,1.368,0,0,1-1.512-1.512l.724-6.525L27.337,5.85A.687.687,0,0,1,28.308,5.85ZM39.7,4.24,36.267.809a2.75,2.75,0,0,0-3.881,0L29.9,3.3a.687.687,0,0,0,0,.97l6.342,6.342a.687.687,0,0,0,.97,0L39.7,8.121a2.75,2.75,0,0,0,0-3.881ZM27,24.342V31.5H4.5V9H20.658a.865.865,0,0,0,.6-.246l2.813-2.812a.844.844,0,0,0-.6-1.441H3.375A3.376,3.376,0,0,0,0,7.875v24.75A3.376,3.376,0,0,0,3.375,36h24.75A3.376,3.376,0,0,0,31.5,32.625V21.53a.845.845,0,0,0-1.441-.6l-2.812,2.813A.865.865,0,0,0,27,24.342Z" transform="translate(0 -0.007)"/>
                        </svg></button>
                            <button class="btn corAtivo"> <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 33 22.5">
                            <defs>
                                <style>
                                .cls-vis {
                                    fill: #fff;
                                }
                                </style>
                            </defs>
                            <path id="Icon_material-visibility" data-name="Icon material-visibility" class="cls-vis" d="M18,6.75A17.74,17.74,0,0,0,1.5,18a17.725,17.725,0,0,0,33,0A17.74,17.74,0,0,0,18,6.75ZM18,25.5A7.5,7.5,0,1,1,25.5,18,7.5,7.5,0,0,1,18,25.5Zm0-12A4.5,4.5,0,1,0,22.5,18,4.494,4.494,0,0,0,18,13.5Z" transform="translate(-1.5 -6.75)"/>
                            </svg></button>
                            <button type="button" class="corHistorico btn" data-bs-toggle="modal" data-bs-target="#exampleModal2"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 33.207 28">
                            <defs>
                                <style>
                                .cls-his {
                                    fill: #fff;
                                }
                                </style>
                            </defs>
                            <path id="Icon_material-restore" data-name="Icon material-restore" class="cls-his" d="M19.5,4.5A13.5,13.5,0,0,0,6,18H1.5l5.835,5.835.105.21L13.5,18H9a10.55,10.55,0,1,1,3.09,7.41L9.96,27.54A13.5,13.5,0,1,0,19.5,4.5ZM18,12v7.5l6.42,3.81,1.08-1.815-5.25-3.12V12Z" transform="translate(-0.293 -4)"/>
                            </svg></button>
                            <button type="button" class="corComentario btn padin-btn-cont" data-bs-toggle="modal" data-bs-target="#exampleModal1"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 30.25 30.25">
                            <defs>
                                <style>
                                .cls-1 {
                                    fill: #fff;
                                    stroke: #fff;
                                }
                                </style>
                            </defs>
                            <g id="Icon_ionic-ios-chatbubbles" data-name="Icon ionic-ios-chatbubbles" transform="translate(-2.875 -2.875)">
                                <path id="Caminho_1" data-name="Caminho 1" class="cls-1" d="M30.3,22.542a1.7,1.7,0,0,1,.232-.858,2.368,2.368,0,0,1,.148-.218,11.393,11.393,0,0,0,1.941-6.349A11.961,11.961,0,0,0,20.412,3.375,12.129,12.129,0,0,0,8.438,12.72a11.3,11.3,0,0,0-.26,2.4A11.927,11.927,0,0,0,20.2,27.014a14.48,14.48,0,0,0,3.319-.541c.795-.218,1.582-.506,1.786-.584a1.859,1.859,0,0,1,.654-.12,1.828,1.828,0,0,1,.71.141l3.987,1.413a.951.951,0,0,0,.274.07.56.56,0,0,0,.563-.562.9.9,0,0,0-.035-.19Z"/>
                                <path id="Caminho_2" data-name="Caminho 2" class="cls-1" d="M22.395,27.6c-.253.07-.577.148-.928.225a12.977,12.977,0,0,1-2.391.316A11.927,11.927,0,0,1,7.052,16.249a13.293,13.293,0,0,1,.105-1.5c.042-.3.091-.6.162-.9.07-.316.155-.633.246-.942L7,13.4A10.464,10.464,0,0,0,3.375,21.27a10.347,10.347,0,0,0,1.744,5.766c.162.246.253.436.225.563s-.837,4.359-.837,4.359a.564.564,0,0,0,.19.541.573.573,0,0,0,.359.127.5.5,0,0,0,.2-.042L9.2,31.029a1.1,1.1,0,0,1,.844.014,11.834,11.834,0,0,0,4.268.844,11.043,11.043,0,0,0,8.445-3.874s.225-.309.485-.675C22.985,27.429,22.69,27.52,22.395,27.6Z"/>
                            </g>
                            </svg></button>
                        </div>
                    </div>

                    <div class="histo-blog-cont modal-lista-comentario">
                        <p  class="modal-p">Dia das Crianças</p>
                        <div class="botao-lat-com">
                        <button type="button" class="btn corEditar" data-bs-toggle="modal" data-bs-target="#exampleModal3"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 40.5 35.993">
                        <defs>
                            <style>
                            .cls-edit {
                                fill: #fff;
                            }
                            </style>
                        </defs>
                        <path id="Icon_awesome-edit" data-name="Icon awesome-edit" class="cls-edit" d="M28.308,5.85l6.342,6.342a.687.687,0,0,1,0,.97L19.294,28.519l-6.525.724a1.368,1.368,0,0,1-1.512-1.512l.724-6.525L27.337,5.85A.687.687,0,0,1,28.308,5.85ZM39.7,4.24,36.267.809a2.75,2.75,0,0,0-3.881,0L29.9,3.3a.687.687,0,0,0,0,.97l6.342,6.342a.687.687,0,0,0,.97,0L39.7,8.121a2.75,2.75,0,0,0,0-3.881ZM27,24.342V31.5H4.5V9H20.658a.865.865,0,0,0,.6-.246l2.813-2.812a.844.844,0,0,0-.6-1.441H3.375A3.376,3.376,0,0,0,0,7.875v24.75A3.376,3.376,0,0,0,3.375,36h24.75A3.376,3.376,0,0,0,31.5,32.625V21.53a.845.845,0,0,0-1.441-.6l-2.812,2.813A.865.865,0,0,0,27,24.342Z" transform="translate(0 -0.007)"/>
                        </svg></button>
                            <button class="btn corInativo"> <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 33 22.5">
                            <defs>
                                <style>
                                .cls-vis {
                                    fill: #fff;
                                }
                                </style>
                            </defs>
                            <path id="Icon_material-visibility" data-name="Icon material-visibility" class="cls-vis" d="M18,6.75A17.74,17.74,0,0,0,1.5,18a17.725,17.725,0,0,0,33,0A17.74,17.74,0,0,0,18,6.75ZM18,25.5A7.5,7.5,0,1,1,25.5,18,7.5,7.5,0,0,1,18,25.5Zm0-12A4.5,4.5,0,1,0,22.5,18,4.494,4.494,0,0,0,18,13.5Z" transform="translate(-1.5 -6.75)"/>
                            </svg></button>
                            <button type="button" class="corHistorico btn" data-bs-toggle="modal" data-bs-target="#exampleModal2"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 33.207 28">
                            <defs>
                                <style>
                                .cls-his {
                                    fill: #fff;
                                }
                                </style>
                            </defs>
                            <path id="Icon_material-restore" data-name="Icon material-restore" class="cls-his" d="M19.5,4.5A13.5,13.5,0,0,0,6,18H1.5l5.835,5.835.105.21L13.5,18H9a10.55,10.55,0,1,1,3.09,7.41L9.96,27.54A13.5,13.5,0,1,0,19.5,4.5ZM18,12v7.5l6.42,3.81,1.08-1.815-5.25-3.12V12Z" transform="translate(-0.293 -4)"/>
                            </svg></button>
                            <button type="button" class="corComentario btn padin-btn-cont" data-bs-toggle="modal" data-bs-target="#exampleModal1"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 30.25 30.25">
                            <defs>
                                <style>
                                .cls-1 {
                                    fill: #fff;
                                    stroke: #fff;
                                }
                                </style>
                            </defs>
                            <g id="Icon_ionic-ios-chatbubbles" data-name="Icon ionic-ios-chatbubbles" transform="translate(-2.875 -2.875)">
                                <path id="Caminho_1" data-name="Caminho 1" class="cls-1" d="M30.3,22.542a1.7,1.7,0,0,1,.232-.858,2.368,2.368,0,0,1,.148-.218,11.393,11.393,0,0,0,1.941-6.349A11.961,11.961,0,0,0,20.412,3.375,12.129,12.129,0,0,0,8.438,12.72a11.3,11.3,0,0,0-.26,2.4A11.927,11.927,0,0,0,20.2,27.014a14.48,14.48,0,0,0,3.319-.541c.795-.218,1.582-.506,1.786-.584a1.859,1.859,0,0,1,.654-.12,1.828,1.828,0,0,1,.71.141l3.987,1.413a.951.951,0,0,0,.274.07.56.56,0,0,0,.563-.562.9.9,0,0,0-.035-.19Z"/>
                                <path id="Caminho_2" data-name="Caminho 2" class="cls-1" d="M22.395,27.6c-.253.07-.577.148-.928.225a12.977,12.977,0,0,1-2.391.316A11.927,11.927,0,0,1,7.052,16.249a13.293,13.293,0,0,1,.105-1.5c.042-.3.091-.6.162-.9.07-.316.155-.633.246-.942L7,13.4A10.464,10.464,0,0,0,3.375,21.27a10.347,10.347,0,0,0,1.744,5.766c.162.246.253.436.225.563s-.837,4.359-.837,4.359a.564.564,0,0,0,.19.541.573.573,0,0,0,.359.127.5.5,0,0,0,.2-.042L9.2,31.029a1.1,1.1,0,0,1,.844.014,11.834,11.834,0,0,0,4.268.844,11.043,11.043,0,0,0,8.445-3.874s.225-.309.485-.675C22.985,27.429,22.69,27.52,22.395,27.6Z"/>
                            </g>
                            </svg></button>
                        </div>
                    </div>

                    <div class="histo-blog-cont modal-lista-contario-cin">
                        <p  class="modal-p">Dia das Crianças</p>
                        <div class="botao-lat-com">
                        <button type="button" class="btn corEditar" data-bs-toggle="modal" data-bs-target="#exampleModal3"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 40.5 35.993">
                        <defs>
                            <style>
                            .cls-edit {
                                fill: #fff;
                            }
                            </style>
                        </defs>
                        <path id="Icon_awesome-edit" data-name="Icon awesome-edit" class="cls-edit" d="M28.308,5.85l6.342,6.342a.687.687,0,0,1,0,.97L19.294,28.519l-6.525.724a1.368,1.368,0,0,1-1.512-1.512l.724-6.525L27.337,5.85A.687.687,0,0,1,28.308,5.85ZM39.7,4.24,36.267.809a2.75,2.75,0,0,0-3.881,0L29.9,3.3a.687.687,0,0,0,0,.97l6.342,6.342a.687.687,0,0,0,.97,0L39.7,8.121a2.75,2.75,0,0,0,0-3.881ZM27,24.342V31.5H4.5V9H20.658a.865.865,0,0,0,.6-.246l2.813-2.812a.844.844,0,0,0-.6-1.441H3.375A3.376,3.376,0,0,0,0,7.875v24.75A3.376,3.376,0,0,0,3.375,36h24.75A3.376,3.376,0,0,0,31.5,32.625V21.53a.845.845,0,0,0-1.441-.6l-2.812,2.813A.865.865,0,0,0,27,24.342Z" transform="translate(0 -0.007)"/>
                        </svg></button>
                            <button class="btn corInativo"> <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 33 22.5">
                            <defs>
                                <style>
                                .cls-vis {
                                    fill: #fff;
                                }
                                </style>
                            </defs>
                            <path id="Icon_material-visibility" data-name="Icon material-visibility" class="cls-vis" d="M18,6.75A17.74,17.74,0,0,0,1.5,18a17.725,17.725,0,0,0,33,0A17.74,17.74,0,0,0,18,6.75ZM18,25.5A7.5,7.5,0,1,1,25.5,18,7.5,7.5,0,0,1,18,25.5Zm0-12A4.5,4.5,0,1,0,22.5,18,4.494,4.494,0,0,0,18,13.5Z" transform="translate(-1.5 -6.75)"/>
                            </svg></button>
                            <button type="button" class="corHistorico btn" data-bs-toggle="modal" data-bs-target="#exampleModal2"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 33.207 28">
                            <defs>
                                <style>
                                .cls-his {
                                    fill: #fff;
                                }
                                </style>
                            </defs>
                            <path id="Icon_material-restore" data-name="Icon material-restore" class="cls-his" d="M19.5,4.5A13.5,13.5,0,0,0,6,18H1.5l5.835,5.835.105.21L13.5,18H9a10.55,10.55,0,1,1,3.09,7.41L9.96,27.54A13.5,13.5,0,1,0,19.5,4.5ZM18,12v7.5l6.42,3.81,1.08-1.815-5.25-3.12V12Z" transform="translate(-0.293 -4)"/>
                            </svg></button>
                            <button type="button" class="corComentario btn padin-btn-cont" data-bs-toggle="modal" data-bs-target="#exampleModal1"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 30.25 30.25">
                            <defs>
                                <style>
                                .cls-1 {
                                    fill: #fff;
                                    stroke: #fff;
                                }
                                </style>
                            </defs>
                            <g id="Icon_ionic-ios-chatbubbles" data-name="Icon ionic-ios-chatbubbles" transform="translate(-2.875 -2.875)">
                                <path id="Caminho_1" data-name="Caminho 1" class="cls-1" d="M30.3,22.542a1.7,1.7,0,0,1,.232-.858,2.368,2.368,0,0,1,.148-.218,11.393,11.393,0,0,0,1.941-6.349A11.961,11.961,0,0,0,20.412,3.375,12.129,12.129,0,0,0,8.438,12.72a11.3,11.3,0,0,0-.26,2.4A11.927,11.927,0,0,0,20.2,27.014a14.48,14.48,0,0,0,3.319-.541c.795-.218,1.582-.506,1.786-.584a1.859,1.859,0,0,1,.654-.12,1.828,1.828,0,0,1,.71.141l3.987,1.413a.951.951,0,0,0,.274.07.56.56,0,0,0,.563-.562.9.9,0,0,0-.035-.19Z"/>
                                <path id="Caminho_2" data-name="Caminho 2" class="cls-1" d="M22.395,27.6c-.253.07-.577.148-.928.225a12.977,12.977,0,0,1-2.391.316A11.927,11.927,0,0,1,7.052,16.249a13.293,13.293,0,0,1,.105-1.5c.042-.3.091-.6.162-.9.07-.316.155-.633.246-.942L7,13.4A10.464,10.464,0,0,0,3.375,21.27a10.347,10.347,0,0,0,1.744,5.766c.162.246.253.436.225.563s-.837,4.359-.837,4.359a.564.564,0,0,0,.19.541.573.573,0,0,0,.359.127.5.5,0,0,0,.2-.042L9.2,31.029a1.1,1.1,0,0,1,.844.014,11.834,11.834,0,0,0,4.268.844,11.043,11.043,0,0,0,8.445-3.874s.225-.309.485-.675C22.985,27.429,22.69,27.52,22.395,27.6Z"/>
                            </g>
                            </svg></button>
                        </div>
                    </div>

                    <!-- Modal comentarios -->
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Comentários</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <ul class="ul-li-comentario">
                                            <li>Comentário</li>
                                            <li>Ações</li>
                                        </ul>
                                    </div>
                                    <div class="modal-lista-contario-cin modal-border-top">
                                        <p class="modal-p">Muito bom esse trabalho!</p>
                                        <div class="botao-lat-com">
                                            <button class="btn modal-lista-contario-btn modal-btn-cor1"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 29.25 23.313">
                                            <defs>
                                                <style>
                                                    .cls-2 {
                                                        fill: #fff;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="Icon_simple-hipchat" data-name="Icon simple-hipchat" class="cls-2" d="M5.2,20.173s-.126-.076-.325-.206C1.877,17.992,0,15.128,0,11.943,0,6,6.548,1.18,14.621,1.18S29.25,6,29.25,11.943,22.7,22.709,14.627,22.709a19.585,19.585,0,0,1-3.076-.237l-.319-.047a17.107,17.107,0,0,1-7.664,2.069c-.81,0-1.192-.568-.673-1.148a12.5,12.5,0,0,0,2.3-3.173Z" transform="translate(0 -1.181)"/>
                                            </svg></button>
                                            <button class="btn modal-lista-contario-btn modal-btn-cor2"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 29.25 23.313">
                                            <defs>
                                                <style>
                                                    .cls-2 {
                                                        fill: #fff;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="Icon_simple-hipchat" data-name="Icon simple-hipchat" class="cls-2" d="M5.2,20.173s-.126-.076-.325-.206C1.877,17.992,0,15.128,0,11.943,0,6,6.548,1.18,14.621,1.18S29.25,6,29.25,11.943,22.7,22.709,14.627,22.709a19.585,19.585,0,0,1-3.076-.237l-.319-.047a17.107,17.107,0,0,1-7.664,2.069c-.81,0-1.192-.568-.673-1.148a12.5,12.5,0,0,0,2.3-3.173Z" transform="translate(0 -1.181)"/>
                                            </svg></button>
                                        </div>
                                    </div>

                                    <div class="modal-lista-comentario">
                                        <p class="modal-p">Mas que coisa ruim!</p>
                                        <div class="botao-lat-com">
                                            <button class="btn modal-lista-contario-btn modal-btn-cor2"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 29.25 23.313">
                                            <defs>
                                                <style>
                                                    .cls-2 {
                                                        fill: #fff;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="Icon_simple-hipchat" data-name="Icon simple-hipchat" class="cls-2" d="M5.2,20.173s-.126-.076-.325-.206C1.877,17.992,0,15.128,0,11.943,0,6,6.548,1.18,14.621,1.18S29.25,6,29.25,11.943,22.7,22.709,14.627,22.709a19.585,19.585,0,0,1-3.076-.237l-.319-.047a17.107,17.107,0,0,1-7.664,2.069c-.81,0-1.192-.568-.673-1.148a12.5,12.5,0,0,0,2.3-3.173Z" transform="translate(0 -1.181)"/>
                                            </svg></button>
                                            <button class="btn modal-lista-contario-btn modal-btn-cor3"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 29.25 23.313">
                                            <defs>
                                                <style>
                                                    .cls-2 {
                                                        fill: #fff;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="Icon_simple-hipchat" data-name="Icon simple-hipchat" class="cls-2" d="M5.2,20.173s-.126-.076-.325-.206C1.877,17.992,0,15.128,0,11.943,0,6,6.548,1.18,14.621,1.18S29.25,6,29.25,11.943,22.7,22.709,14.627,22.709a19.585,19.585,0,0,1-3.076-.237l-.319-.047a17.107,17.107,0,0,1-7.664,2.069c-.81,0-1.192-.568-.673-1.148a12.5,12.5,0,0,0,2.3-3.173Z" transform="translate(0 -1.181)"/>
                                            </svg></button>
                                        </div>
                                    </div>

                                    <div class="modal-lista-contario-cin">
                                        <p class="modal-p">Que coisa de louco!</p>
                                        <div class="botao-lat-com">
                                            <button class="btn modal-lista-contario-btn modal-btn-cor2"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 29.25 23.313">
                                            <defs>
                                                <style>
                                                    .cls-2 {
                                                        fill: #fff;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="Icon_simple-hipchat" data-name="Icon simple-hipchat" class="cls-2" d="M5.2,20.173s-.126-.076-.325-.206C1.877,17.992,0,15.128,0,11.943,0,6,6.548,1.18,14.621,1.18S29.25,6,29.25,11.943,22.7,22.709,14.627,22.709a19.585,19.585,0,0,1-3.076-.237l-.319-.047a17.107,17.107,0,0,1-7.664,2.069c-.81,0-1.192-.568-.673-1.148a12.5,12.5,0,0,0,2.3-3.173Z" transform="translate(0 -1.181)"/>
                                            </svg></button>
                                            <button class="btn modal-lista-contario-btn modal-btn-cor2"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 29.25 23.313">
                                            <defs>
                                                <style>
                                                    .cls-2 {
                                                        fill: #fff;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="Icon_simple-hipchat" data-name="Icon simple-hipchat" class="cls-2" d="M5.2,20.173s-.126-.076-.325-.206C1.877,17.992,0,15.128,0,11.943,0,6,6.548,1.18,14.621,1.18S29.25,6,29.25,11.943,22.7,22.709,14.627,22.709a19.585,19.585,0,0,1-3.076-.237l-.319-.047a17.107,17.107,0,0,1-7.664,2.069c-.81,0-1.192-.568-.673-1.148a12.5,12.5,0,0,0,2.3-3.173Z" transform="translate(0 -1.181)"/>
                                            </svg></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer modal-ali-footer">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn modal-footer-btn">Anterior</button>
                                    <button type="button" class="btn btn-primary modal-footer-btn">1</button>
                                    <button type="button" class="btn modal-footer-btn">Próximo</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal historico-->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Histórico</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Professor UP (10/06/2022 as 14:59:06)
                                        </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>TÍTULO</strong> 
                                            <p>Dia das Crianças</p><br>
                                            <strong>STATUS (A = ATIVO / I = INATIVO)</strong> 
                                            <p>A</p><br>
                                            <strong>CONTEÚDO</strong>
                                            <p>O Dia das Crianças ou Dia da Criança é uma data comemorativa celebrada anualmente em homenagem às crianças, cujo dia efetivo varia de acordo com o país. Países como Angola, Portugal e Moçambique adotaram o dia 1 de junho.</p>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Professor UP (10/06/2022 as 15:30:25)
                                        </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <strong>TÍTULO</strong> 
                                            <p>Dia das Crianças</p><br>
                                            <strong>STATUS (A = ATIVO / I = INATIVO)</strong> 
                                            <p>A</p><br>
                                            <strong>CONTEÚDO</strong>
                                            <p>O Dia das Crianças ou Dia da Criança é uma data comemorativa celebrada anualmente em homenagem às crianças, cujo dia efetivo varia de acordo com o país. Países como Angola, Portugal e Moçambique adotaram o dia 1 de junho.</p>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Professor UP (10/06/2022 as 15:39:32)
                                        </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <strong>TÍTULO</strong> 
                                            <p>Dia das Crianças</p><br>
                                            <strong>STATUS (A = ATIVO / I = INATIVO)</strong> 
                                            <p>A</p><br>
                                            <strong>CONTEÚDO</strong>
                                            <p>O Dia das Crianças ou Dia da Criança é uma data comemorativa celebrada anualmente em homenagem às crianças, cujo dia efetivo varia de acordo com o país. Países como Angola, Portugal e Moçambique adotaram o dia 1 de junho.</p>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-cancel-modal btn-secondary modal-btn-cor3" data-bs-dismiss="modal"><svg class="svg-inline--fa fa-times fa-w-11" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" data-fa-i2svg=""><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg> Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal edição-->
                    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <h5 class="mb-4">NOVA POSTAGEM</h5>
                                    <form id="form_nova_campanha" method="post">
                                        <div class="row g-3 mb-3">
                                            <div class="col-sm-12">
                                                <label for="campanhaTitulo" class="form-label">Título <i class="fas fa-asterisk align-top obrigatorio"></i></label>
                                                <input class="form-control" type="text" aria-label="">
                                            </div>
                                            <div class="col-12">
                                                <label for="campanhaConteudo" class="form-label">Conteúdo <i class="fas fa-asterisk align-top obrigatorio"></i></label>
                                                <textarea class="form-control shadow-none" id="campanhaConteudo" required></textarea>
                                            </div>
                                        </div>
                                        <p>Editado por Professor UP em 10/06/2022 as 14:59:06</p>
                                        <button class="w-100 btn btn-verde btn-lg shadow-none" id="publicar_campanha" type="submit"><i class="fas fa-share"></i> Atualizar Postagem</button>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary modal-btn-cor3" data-bs-dismiss="modal"><svg class="svg-inline--fa fa-ban fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ban" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119.034 8 8 119.033 8 256s111.034 248 248 248 248-111.034 248-248S392.967 8 256 8zm130.108 117.892c65.448 65.448 70 165.481 20.677 235.637L150.47 105.216c70.204-49.356 170.226-44.735 235.638 20.676zM125.892 386.108c-65.448-65.448-70-165.481-20.677-235.637L361.53 406.784c-70.203 49.356-170.226 44.736-235.638-20.676z"></path></svg> Cancelar</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="editarCampanha" data-bs-backdrop="static" data-bs-keyboard="false">
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
                    <h5 class="modal-title">HISTÓRICO DE POSTAGEM</h5>
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
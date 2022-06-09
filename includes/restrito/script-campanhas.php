<?php

include $_SERVER['DOCUMENT_ROOT'].'/includes/classes/campanha.php';
include $_SERVER['DOCUMENT_ROOT'].'/includes/session.php';

if($_POST) {

    $acao = (isset($_POST['acao']) && $_POST['acao'] != '') ? $_POST['acao'] : null;

    if($acao === 'publicar_campanha') {

        $campanhaTitulo = (isset($_POST['campanhaTitulo']) && $_POST['campanhaTitulo'] != null) ? $_POST['campanhaTitulo'] : null;
        $campanhaInicio = (isset($_POST['campanhaInicio']) && $_POST['campanhaInicio'] != null) ? $_POST['campanhaInicio'] : null;
        $campanhaTermino = (isset($_POST['campanhaTermino']) && $_POST['campanhaTermino'] != null) ? $_POST['campanhaTermino'] : null;
        $campanhaConteudo = (isset($_POST['campanhaConteudo']) && $_POST['campanhaConteudo'] != null) ? $_POST['campanhaConteudo'] : null;
    
        $novaCampanha = new campanhaExecucoes();
        if(!$novaCampanha->cadastrar($campanhaTitulo,$campanhaInicio,$campanhaTermino,$campanhaConteudo,$usuarioId)) {
            $json = array('status' => 'falha', 'mensagem' => $novaCampanha->cadastrarMensagem());
            echo json_encode($json);
        } else {
            $json = array('status' => 'sucesso', 'mensagem' => $novaCampanha->cadastrarMensagem());
            echo json_encode($json);
        }

        die();

    } elseif($acao === 'busca') {

        $limite = '6';
        $pagina = 1;
        if($_POST['pagina'] > 1) {
            $inicio = (($_POST['pagina'] - 1) * $limite);
            $pagina = $_POST['pagina'];
        } else {
            $inicio = 0;
        }

        $sql = 'SELECT * FROM tb_campanhas';

        if($_POST['campanha'] != '') {
            $sql .= " WHERE titulo LIKE '%" . $_POST['campanha'] . "%'";
        }

        $sql .= ' ORDER BY data_cadastro DESC';

        $filtro = $sql . ' LIMIT ' . $inicio . ', ' . $limite;

        $stm = $conexao->prepare($sql);
        $stm->execute();
        $totalRegistros = $stm->rowCount();

        $stm = $conexao->prepare($filtro);
        $stm->execute();
        $retorno = $stm->fetchAll();
        $total_filter_data = $stm->rowCount();

        $saida = '
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <td colspan="2">Total de registros encontrados: '.$totalRegistros.'</td>
                    </tr>
                    <tr>
                        <th scope="col">Campanha</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
        ';
            if ($totalRegistros > 0) {
                foreach ($retorno as $linha) {
                    $saida .= '
                    <tr>
                        <td>'.$linha['titulo'].'</td>
                        <td>
                            <div class="d-inline-flex">
                                <a class="btn btn-azul btn-sm editar editarCampanha" data-id="'.$linha['id'].'" data-bs-toggle="tooltip" title="Editar"><i class="fas fa-edit"></i></a>
                                <div id="retornoStatusCampanha'.$linha['id'].'">';
                                if($linha['status'] === 'A') {
                                    $saida .= '<a class="btn btn-verde btn-sm desativar statusCampanha statusCampanhaId'.$linha['id'].'" data-id="'.$linha['id'].'" data-bs-toggle="tooltip" title="Desativar"><i class="fas fa-eye statusIcone'.$linha['id'].'"></i></a>';
                                } else {
                                    $saida .= '<a class="btn btn-cinza btn-sm ativar statusCampanha statusCampanhaId'.$linha['id'].'" data-id="'.$linha['id'].'" data-bs-toggle="tooltip" title="Ativar"><i class="fas fa-eye-slash statusIcone'.$linha['id'].'"></i></a>';
                                }
                                $saida .= '
                                </div>
                                <a class="btn btn-lilas btn-sm historico historicoCampanha" data-id="'.$linha['id'].'" data-bs-toggle="tooltip" title="Histórico"><i class="fas fa-history"></i></a>
                            </div>
                        </td>
                    </tr>';
                }
            } else {
                    $saida .= '
                    <tr>
                        <td colspan="7" align="center">Nenhuma campanha foi encontrada!</td>
                    </tr>';
            }

        $saida .= '
                </tbody>
            </table>
        </div>
        <nav>
            <ul class="pagination justify-content-center">';

        $totalRegistros = ceil($totalRegistros / $limite);
        $linkAnterior = '';
        $linkPosterior = '';
        $linkPagina = '';

        $paginaArray = array();

        if ($totalRegistros > 4) {
            if ($pagina < 5) {
                for ($contagem = 1; $contagem <= 5; $contagem++) {
                    $paginaArray[] = $contagem;
                }
                $paginaArray[] = '...';
                $paginaArray[] = $totalRegistros;
            } else {
                $fimLimite = $totalRegistros - 5;
                if ($pagina > $fimLimite) {
                    $paginaArray[] = 1;
                    $paginaArray[] = '...';
                    for ($contagem = $fimLimite; $contagem <= $totalRegistros; $contagem++) {
                        $paginaArray[] = $contagem;
                    }
                } else {
                    $paginaArray[] = 1;
                    $paginaArray[] = '...';
                    for ($contagem = $pagina - 1; $contagem <= $pagina + 1; $contagem++) {
                        $paginaArray[] = $contagem;
                    }
                    $paginaArray[] = '...';
                    $paginaArray[] = $totalRegistros;
                }
            }
        } else {
            for ($contagem = 1; $contagem <= $totalRegistros; $contagem++) {
                $paginaArray[] = $contagem;
            }
        }
        if (!$totalRegistros == 0) {
            for ($contagem = 0; $contagem < count($paginaArray); $contagem++) {
                if ($pagina == $paginaArray[$contagem]) {
                    $linkPagina .= '
                    <li class="page-item active">
                        <a class="page-link shadow-none" href="#">' . $paginaArray[$contagem] . '</a>
                    </li>';

                    $idAnterior = $paginaArray[$contagem] - 1;
                    if ($idAnterior > 0) {
                        $linkAnterior = '
                        <li class="page-item">
                            <a class="page-link shadow-none" href="javascript:void(0)" data-page_number="' . $idAnterior . '">Anterior</a>
                        </li>';
                    } else {
                        $linkAnterior = '
                        <li class="page-item disabled">
                        <a class="page-link shadow-none" href="#">Anterior</a>
                        </li>';
                    }
                    $idPosterior = $paginaArray[$contagem] + 1;
                    if ($idPosterior > $totalRegistros) {
                        $linkPosterior = '
                        <li class="page-item disabled">
                        <a class="page-link shadow-none" href="#">Próximo</a>
                        </li>';
                    } else {
                        $linkPosterior = '
                        <li class="page-item">
                            <a class="page-link shadow-none" href="javascript:void(0)" data-page_number="' . $idPosterior . '">Próximo</a>
                        </li>';
                    }
                } else {
                    if ($paginaArray[$contagem] == '...') {
                        $linkPagina .= '
                        <li class="page-item disabled">
                            <a class="page-link shadow-none" href="#">...</a>
                        </li>';
                    } else {
                        $linkPagina .= '
                        <li class="page-item">
                            <a class="page-link shadow-none" href="javascript:void(0)" data-page_number="' . $paginaArray[$contagem] . '">' . $paginaArray[$contagem] . '</a>
                        </li>';
                    }
                }
            }
        }

        $saida .= $linkAnterior . $linkPagina . $linkPosterior;
        $saida .= '
            </ul>
        </nav>
        <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('."'".'[data-bs-toggle="tooltip"]'."'".'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        $(".editarCampanha").on("click", function(event) {
            event.preventDefault();
            acao = "edicao";
            tinymce.remove("#campanhaConteudoEditar");
            id = $(this).data("id");
            $.ajax( {
                url: "../includes/restrito/script-campanhas.php",
                method: "POST",
                data: {
                    acao:acao,
                    id:id
                },
                success: function(retorno) {
                    $("#retornoEditarCampanhas").html(retorno);
                    $("#editarCampanha").modal("show");
                }
            });
        });

        $(".statusCampanha").on("click", function(event) {
            event.preventDefault();
            acao = "status";
            id = $(this).data("id");
            $(".statusCampanha").tooltip("hide");
            $.ajax( {
                url: "../includes/restrito/script-campanhas.php",
                type: "POST",
                dataType: "json",
                async: true,
                data: {
                    acao:acao,
                    id:id
                },
                success: function(retorno) {
                    if(retorno.status == "A") {
                        $(".statusCampanhaId"+retorno.id).removeClass("desativar");
                        $(".statusCampanhaId"+retorno.id).removeClass("btn-verde");
                        $(".statusCampanhaId"+retorno.id).addClass("btn-cinza");
                        $(".statusCampanhaId"+retorno.id).addClass("ativar");
                        $(".statusCampanhaId"+retorno.id).attr("data-bs-original-title", "Ativar");
                        $(".statusCampanhaId"+retorno.id).attr("aria-label", "Ativar");
                        $(".statusIcone"+retorno.id).removeClass("fa-eye");
                        $(".statusIcone"+retorno.id).addClass("fa-eye-slash");
                    } else {
                        $(".statusCampanhaId"+retorno.id).removeClass("ativar");
                        $(".statusCampanhaId"+retorno.id).removeClass("btn-cinza");
                        $(".statusCampanhaId"+retorno.id).addClass("btn-verde");
                        $(".statusCampanhaId"+retorno.id).addClass("desativar");
                        $(".statusCampanhaId"+retorno.id).attr("data-bs-original-title", "Desativar");
                        $(".statusCampanhaId"+retorno.id).attr("aria-label", "Desativar");
                        $(".statusIcone"+retorno.id).removeClass("fa-eye-slash");
                        $(".statusIcone"+retorno.id).addClass("fa-eye");
                    }
                }
            });
        });

        $(".historicoCampanha").on("click", function(event) {
            event.preventDefault();
            acao = "historico";
            tinymce.remove("#campanhaConteudoEditar");
            id = $(this).data("id");
            $.ajax( {
                url: "../includes/restrito/script-campanhas.php",
                method: "POST",
                data: {
                    acao:acao,
                    id:id
                },
                success: function(retorno) {
                    $("#retornoHistoricoCampanhas").html(retorno);
                    $("#historicoCampanha").modal("show");
                }
            });
        });
        </script>
        ';

        echo $saida;

        die();

    } elseif($acao === 'edicao') {
        
        $sql = '
        SELECT A.*,
        B.nome AS usuario_cadastro
        FROM tb_campanhas A
        JOIN tb_usuarios B
        ON A.usuario = B.id
        WHERE A.id = :id
        ';
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':id', (int)$_POST['id']);
        $stm->execute();
        $consulta = $stm->fetch(PDO::FETCH_OBJ);
        
        $saida = '
        <form id="form_editar_campanha" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger d-none" role="alert" id="alerta_falha_editar"></div>
                    <div class="alert alert-success d-none" role="alert" id="alerta_sucesso_editar"></div>
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-sm-12">
                    <label for="campanhaTituloEditar" class="form-label">Título <i class="fas fa-asterisk align-top obrigatorio"></i></label>
                    <input type="text" class="form-control shadow-none" id="campanhaTituloEditar" value="'.$consulta->titulo.'" required>
                </div>
                <div class="col-sm-6">
                    <label for="campanhaInicioEditar" class="form-label">Data de início <i class="fas fa-asterisk align-top obrigatorio"></i></label>
                    <input type="date" class="form-control shadow-none" id="campanhaInicioEditar" value="'.$consulta->data_inicio.'" required>
                </div>
                <div class="col-sm-6">
                    <label for="campanhaTerminoEditar" class="form-label">Data de termino <i class="fas fa-asterisk align-top obrigatorio"></i></label>
                    <input type="date" class="form-control shadow-none" id="campanhaTerminoEditar" value="'.$consulta->data_fim.'" required>
                </div>
                <div class="col-12">
                    <label for="campanhaConteudoEditar" class="form-label">Conteúdo <i class="fas fa-asterisk align-top obrigatorio"></i></label>
                    <textarea class="form-control shadow-none" id="campanhaConteudoEditar" required>'.$consulta->conteudo.'</textarea>
                    <span class="float-end pt-1">Editado por '.$consulta->usuario_cadastro.' em '.date('d/m/Y \à\s H:i:s', strtotime($consulta->data_cadastro)).'</span>
                </div>
            </div>
            <button class="w-100 btn btn-verde btn-lg shadow-none" type="submit" id="atualizarCampanha"><i class="fas fa-sync-alt"></i> Atualizar Campanha</button>
        </form>
        <script>
            tinymce.init( {
                selector: "textarea#campanhaConteudoEditar",
                plugins: "autolink code image insertdatetime link lists media",
                menubar: "",
                toolbar: "fontsize bold italic underline strikethrough forecolor removeformat alignleft aligncenter alignright alignjustify outdent indent numlist bullist insertdatetime table image media link code",
                statusbar: false,
                relative_urls: false,
                remove_script_host: false,
                images_file_types: "gif,jpg,jpeg,png",
                image_advtab: true,
                images_upload_url: "../includes/upload.php",
                images_upload_handler: image_upload,
                height: 400,
            });
        
            $("#atualizarCampanha").on("click", function(event) {
                event.preventDefault();
                acao = "editar";
                tinymce.triggerSave();
                campanhaIdEditar = '.$_POST['id'].';
                campanhaTituloEditar = $("#campanhaTituloEditar").val();
                campanhaInicioEditar = $("#campanhaInicioEditar").val();
                campanhaTerminoEditar = $("#campanhaTerminoEditar").val();
                campanhaConteudoEditar = $("#campanhaConteudoEditar").val();
                $("#alerta_falha_editar").empty();
                $("#alerta_sucesso_editar").empty();
                $.ajax( {
                    url: "../includes/restrito/script-campanhas.php",
                    type: "POST",
                    dataType: "json",
                    async: true,
                    data: {
                        acao:acao,
                        campanhaIdEditar:campanhaIdEditar,
                        campanhaTituloEditar:campanhaTituloEditar,
                        campanhaInicioEditar:campanhaInicioEditar,
                        campanhaTerminoEditar:campanhaTerminoEditar,
                        campanhaConteudoEditar:campanhaConteudoEditar
                    },
                    success: function(retorno) {
                        if(retorno.status == "sucesso") {
                            //$("#form_editar_campanha").trigger("reset");
                            $("#alerta_sucesso_editar").removeClass("d-none");
                            $("#alerta_sucesso_editar").html(retorno.mensagem);
                            setTimeout(function() {
                                $("#alerta_sucesso_editar").addClass("d-none");
                                location.reload();
                            },3000);
                        } else {
                            $("#alerta_falha_editar").removeClass("d-none");
                            $("#alerta_falha_editar").html(retorno.mensagem);
                            setTimeout(function() {
                                $("#alerta_falha_editar").addClass("d-none");
                            },3000);
                        }
                    }
                });
            });
            
            document.addEventListener("focusin", (e) => {
                if (e.target.closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
                    e.stopImmediatePropagation();
                }
            });
        </script>
        ';
        
        echo $saida;

        die();

    } elseif($acao === 'status') {
        
        if(isset($_POST)) {
            $id = (isset($_POST['id']) && $_POST['id'] != null) ? $_POST['id'] : null;
        
            $sql = '
            SELECT id,status
            FROM tb_campanhas
            WHERE id = :id
            ';
            $stm = $conexao->prepare($sql);
            $stm->bindValue(':id', (int)$id);
            $stm->execute();
            $consulta = $stm->fetch(PDO::FETCH_OBJ);
        
            if($consulta->status === 'A') {
                $status = 'I';
            } else {
                $status = 'A';
            }
        
            $statusCampanha = new campanhaExecucoes();
            if(!$statusCampanha->status($id,$status)) {
                $json = array('status' => 'falha');
                echo json_encode($json);
            } else {
                if($status === 'I') {
                    $json = array(
                        'id' => $id,
                        'status' => 'A'
                    );
                } else {
                    $json = array(
                        'id' => $id,
                        'status' => 'I'
                    );
                }
                echo json_encode($json);
            }
        }

        die();

    } elseif($acao === 'historico') {
        
        if(isset($_POST)) {
            $id = (isset($_POST['id']) && $_POST['id'] != null) ? $_POST['id'] : null;
        
            $sql = '
            SELECT A.*,
            B.nome
            FROM tb_campanhas_logs A
            JOIN tb_usuarios B
            ON B.id = A.usuario
            WHERE A.id = :id
            ';
            $stm = $conexao->prepare($sql);
            $stm->bindValue(':id', $id);
            $stm->execute();
            $consultaHistoricos = $stm->fetchAll(PDO::FETCH_OBJ);
        
            $contador = 0;
        
            foreach($consultaHistoricos as $consultaHistorico) {
                $contador = $contador + 1;
                echo '
                <div class="accordion" id="accordionHistorico'.$contador.'">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading'.$contador.'">
                            <button class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse'.$contador.'" aria-expanded="false" aria-controls="flush-collapseOne">
                                '.$consultaHistorico->nome.' ('.date('d/m/Y \a\s H:i:s', strtotime($consultaHistorico->data_cadastro)).')
                            </button>
                        </h2>
                        <div id="flush-collapse'.$contador.'" class="accordion-collapse collapse" aria-labelledby="flush-heading'.$contador.'" data-bs-parent="#accordionHistorico'.$contador.'">
                            <div class="accordion-body">
                                <strong>TÍTULO</strong>
                                <p>'.$consultaHistorico->titulo.'</p>
                                <strong>DATA INÍCIO</strong>
                                <p>'.$consultaHistorico->data_inicio.'</p>
                                <strong>DATA TERMINO</strong>
                                <p>'.$consultaHistorico->data_fim.'</p>
                                <strong>STATUS (A = ATIVO / I = INATIVO)</strong>
                                <p>'.$consultaHistorico->status.'</p>
                                <strong>CONTEÚDO</strong>
                                '.$consultaHistorico->conteudo.'
                            </div>
                        </div>
                    </div>
                </div>
                ';
            }
        }

        die();

    } elseif($acao === 'editar') {
        
        if(isset($_POST)) {
            $campanhaIdEditar = (isset($_POST['campanhaIdEditar']) && $_POST['campanhaIdEditar'] != null) ? $_POST['campanhaIdEditar'] : null;
            $campanhaTituloEditar = (isset($_POST['campanhaTituloEditar']) && $_POST['campanhaTituloEditar'] != null) ? $_POST['campanhaTituloEditar'] : null;
            $campanhaInicioEditar = (isset($_POST['campanhaInicioEditar']) && $_POST['campanhaInicioEditar'] != null) ? $_POST['campanhaInicioEditar'] : null;
            $campanhaTerminoEditar = (isset($_POST['campanhaTerminoEditar']) && $_POST['campanhaTerminoEditar'] != null) ? $_POST['campanhaTerminoEditar'] : null;
            $campanhaConteudoEditar = (isset($_POST['campanhaConteudoEditar']) && $_POST['campanhaConteudoEditar'] != null) ? $_POST['campanhaConteudoEditar'] : null;
        
            $editarCampanha = new campanhaExecucoes();
            if(!$editarCampanha->editar($campanhaIdEditar,$campanhaTituloEditar,$campanhaInicioEditar,$campanhaTerminoEditar,$campanhaConteudoEditar,$usuarioId)) {
                $json = array('status' => 'falha', 'mensagem' => $editarCampanha->editarMensagem());
                echo json_encode($json);
            } else {
                $json = array('status' => 'sucesso', 'mensagem' => $editarCampanha->editarMensagem());
                echo json_encode($json);
            }
        }

        die();

    }

}

?>
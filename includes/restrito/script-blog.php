<?php

include $_SERVER['DOCUMENT_ROOT'].'/includes/classes/blog.php';
include $_SERVER['DOCUMENT_ROOT'].'/includes/session.php';

$conexao = conexao::getInstance();

if($_POST) {

    $acao = (isset($_POST['acao']) && $_POST['acao'] != '') ? $_POST['acao'] : null;

    if($acao === 'publicar_blog') {

        $blogTitulo = (isset($_POST['blogTitulo']) && $_POST['blogTitulo'] != null) ? $_POST['blogTitulo'] : null;
        $blogClassificacao = (isset($_POST['blogClassificacao']) && $_POST['blogClassificacao'] != null) ? (int)$_POST['blogClassificacao'] : null;
        $blogConteudo = (isset($_POST['blogConteudo']) && $_POST['blogConteudo'] != null) ? $_POST['blogConteudo'] : null;
    
        $novoBlog = new blogExecucoes();
        if(!$novoBlog->cadastrar($blogTitulo,$blogClassificacao,$blogConteudo,$usuarioId)) {
            $json = array('status' => 'falha', 'mensagem' => $novoBlog->cadastrarMensagem());
            echo json_encode($json);
        } else {
            $json = array('status' => 'sucesso', 'mensagem' => $novoBlog->cadastrarMensagem());
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

        $sql = 'SELECT * FROM tb_blog';

        if($_POST['postagem'] != '') {
            $sql .= " WHERE titulo LIKE '%" . $_POST['postagem'] . "%'";
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
                        <th scope="col">Postagem</th>
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
                                <a class="btn btn-azul btn-sm editar editarPostagem" data-id="'.$linha['id'].'" data-bs-toggle="tooltip" title="Editar"><i class="fas fa-edit"></i></a>
                                <div id="retornoStatusPostagem'.$linha['id'].'">';
                                if($linha['status'] === 'A') {
                                    $saida .= '<a class="btn btn-verde btn-sm desativar statusPostagem statusPostagemId'.$linha['id'].'" data-id="'.$linha['id'].'" data-bs-toggle="tooltip" title="Desativar"><i class="fas fa-eye statusIcone'.$linha['id'].'"></i></a>';
                                } else {
                                    $saida .= '<a class="btn btn-cinza btn-sm ativar statusPostagem statusPostagemId'.$linha['id'].'" data-id="'.$linha['id'].'" data-bs-toggle="tooltip" title="Ativar"><i class="fas fa-eye-slash statusIcone'.$linha['id'].'"></i></a>';
                                }
                                $saida .= '
                                </div>
                                <!--a class="btn btn-lilas btn-sm historico historicoPostagem" data-id="'.$linha['id'].'" data-bs-toggle="tooltip" title="Histórico"><i class="fas fa-history"></i></a-->
                                <a class="btn btn-laranja btn-sm comentarios comentarioPostagem" data-id="'.$linha['id'].'" data-bs-toggle="tooltip" title="Comentários"><i class="fas fa-comments"></i></a>
                            </div>
                        </td>
                    </tr>';
                }
            } else {
                    $saida .= '
                    <tr>
                        <td colspan="7" align="center">Nenhuma postagem foi encontrada!</td>
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

        $(".editarPostagem").on("click", function(event) {
            event.preventDefault();
            acao = "edicao";
            tinymce.remove("#postagemConteudoEditar");
            id = $(this).data("id");
            $.ajax( {
                url: "../includes/restrito/script-blog.php",
                method: "POST",
                data: {
                    acao:acao,
                    id:id
                },
                success: function(retorno) {
                    $("#retornoEditarPostagem").html(retorno);
                    $("#editarPostagem").modal("show");
                }
            });
        });

        $(".statusPostagem").on("click", function(event) {
            event.preventDefault();
            acao = "status";
            id = $(this).data("id");
            $(".statusPostagem").tooltip("hide");
            $.ajax( {
                url: "../includes/restrito/script-blog.php",
                type: "POST",
                dataType: "json",
                async: true,
                data: {
                    acao:acao,
                    id:id
                },
                success: function(retorno) {
                    if(retorno.status == "A") {
                        $(".statusPostagemId"+retorno.id).removeClass("desativar");
                        $(".statusPostagemId"+retorno.id).removeClass("btn-verde");
                        $(".statusPostagemId"+retorno.id).addClass("btn-cinza");
                        $(".statusPostagemId"+retorno.id).addClass("ativar");
                        $(".statusPostagemId"+retorno.id).attr("data-bs-original-title", "Ativar");
                        $(".statusPostagemId"+retorno.id).attr("aria-label", "Ativar");
                        $(".statusIcone"+retorno.id).removeClass("fa-eye");
                        $(".statusIcone"+retorno.id).addClass("fa-eye-slash");
                    } else {
                        $(".statusPostagemId"+retorno.id).removeClass("ativar");
                        $(".statusPostagemId"+retorno.id).removeClass("btn-cinza");
                        $(".statusPostagemId"+retorno.id).addClass("btn-verde");
                        $(".statusPostagemId"+retorno.id).addClass("desativar");
                        $(".statusPostagemId"+retorno.id).attr("data-bs-original-title", "Desativar");
                        $(".statusPostagemId"+retorno.id).attr("aria-label", "Desativar");
                        $(".statusIcone"+retorno.id).removeClass("fa-eye-slash");
                        $(".statusIcone"+retorno.id).addClass("fa-eye");
                    }
                }
            });
        });

        $(".comentarioPostagem").on("click", function(event) {
            event.preventDefault();
            acao = "comentario";
            id = $(this).data("id");
            $(".comentarioPostagem").tooltip("hide");
            $.ajax( {
                url: "../includes/restrito/script-blog.php",
                type: "POST",
                data: {
                    acao:acao,
                    id:id
                },
                success: function(retorno) {
                    $("#retornoComentarioPostagem").html(retorno);
                    $("#comentarioPostagem").modal("show");
                }
            });
        });

        /*$(".historicoPostagem").on("click", function(event) {
            event.preventDefault();
            acao = "historico";
            tinymce.remove("#postagemConteudoEditar");
            id = $(this).data("id");
            $.ajax( {
                url: "../includes/restrito/script-blog.php",
                method: "POST",
                data: {
                    acao:acao,
                    id:id
                },
                success: function(retorno) {
                    $("#retornoHistoricoPostagem").html(retorno);
                    $("#historicoPostagem").modal("show");
                }
            });
        });*/
        </script>
        ';

        echo $saida;

        die();

    } elseif($acao === 'edicao') {

        $sql = "
        SELECT *
        FROM tb_classificacoes
        ORDER BY descricao ASC
        ";
        $stm = $conexao->prepare($sql);
        $stm->execute();
        $classificacoes = $stm->fetchAll(PDO::FETCH_OBJ);

        $sql = '
        SELECT A.*,
        B.nome AS usuario_cadastro
        FROM tb_blog A
        JOIN tb_usuarios B
        ON A.usuario = B.id
        WHERE A.id = :id
        ';
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':id', (int)$_POST['id']);
        $stm->execute();
        $consulta = $stm->fetch(PDO::FETCH_OBJ);
        
        $saida = '
        <form id="form_editar_blog" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger d-none" role="alert" id="alerta_falha_editar"></div>
                    <div class="alert alert-success d-none" role="alert" id="alerta_sucesso_editar"></div>
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-sm-9">
                    <label for="postagemTituloEditar" class="form-label">Título <i class="fas fa-asterisk align-top obrigatorio"></i></label>
                    <input type="text" class="form-control shadow-none" id="postagemTituloEditar" value="'.$consulta->titulo.'" required>
                </div>
                <div class="col-sm-3">
                    <label for="postagemClassificacaoEditar" class="form-label">Classificação <i class="fas fa-asterisk align-top obrigatorio"></i></label>
                    <select class="form-select" id="postagemClassificacaoEditar" required>
                        <option value="0">--Selecione</option>';
                        for($i = 0; $i < count($classificacoes); $i++) {
                            if($classificacoes[$i]->id === $consulta->classificacao) {
                                $saida .= '<option value="'.$classificacoes[$i]->id.'" selected>'.$classificacoes[$i]->descricao.'</option>';
                            } else {
                                $saida .= '<option value="'.$classificacoes[$i]->id.'">'.$classificacoes[$i]->descricao.'</option>';
                            }
                        }
                    $saida .= '
                    </select>
                </div>
                <div class="col-12">
                    <label for="postagemConteudoEditar" class="form-label">Conteúdo <i class="fas fa-asterisk align-top obrigatorio"></i></label>
                    <textarea class="form-control shadow-none" id="postagemConteudoEditar" required>'.$consulta->conteudo.'</textarea>
                    <span class="float-end pt-1">Cadastrado por '.$consulta->usuario_cadastro.' em '.date('d/m/Y \à\s H:i:s', strtotime($consulta->data_cadastro)).'</span>
                </div>
            </div>
            <button class="w-100 btn btn-verde btn-lg shadow-none" id="atualizarPostagem" type="submit"><i class="fas fa-sync-alt"></i> Atualizar Postagem</button>
        </form>
        <script>
            tinymce.init( {
                selector: "textarea#postagemConteudoEditar",
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
        
            $("#atualizarPostagem").on("click", function(event) {
                event.preventDefault();
                acao = "editar";
                tinymce.triggerSave();
                postagemIdEditar = '.$_POST['id'].';
                postagemTituloEditar = $("#postagemTituloEditar").val();
                postagemClassificacaoEditar = $("#postagemClassificacaoEditar").val();
                postagemConteudoEditar = $("#postagemConteudoEditar").val();
                $("#alerta_falha_editar").empty();
                $("#alerta_sucesso_editar").empty();
                $.ajax( {
                    url: "../includes/restrito/script-blog.php",
                    type: "POST",
                    dataType: "json",
                    async: true,
                    data: {
                        acao:acao,
                        postagemIdEditar:postagemIdEditar,
                        postagemTituloEditar:postagemTituloEditar,
                        postagemClassificacaoEditar:postagemClassificacaoEditar,
                        postagemConteudoEditar:postagemConteudoEditar
                    },
                    success: function(retorno) {
                        if(retorno.status == "sucesso") {
                            //$("#form_editar_blog").trigger("reset");
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

    } elseif($acao === 'editar') {

        $postagemIdEditar = (isset($_POST['postagemIdEditar']) && $_POST['postagemIdEditar'] != null) ? $_POST['postagemIdEditar'] : null;
        $postagemTituloEditar = (isset($_POST['postagemTituloEditar']) && $_POST['postagemTituloEditar'] != null) ? $_POST['postagemTituloEditar'] : null;
        $postagemClassificacaoEditar = (isset($_POST['postagemClassificacaoEditar']) && $_POST['postagemClassificacaoEditar'] != null) ? (int)$_POST['postagemClassificacaoEditar'] : null;
        $postagemConteudoEditar = (isset($_POST['postagemConteudoEditar']) && $_POST['postagemConteudoEditar'] != null) ? $_POST['postagemConteudoEditar'] : null;
    
        $editarPostagem = new blogExecucoes();
        if(!$editarPostagem->editar($postagemIdEditar,$postagemTituloEditar,$postagemClassificacaoEditar,$postagemConteudoEditar,$usuarioId)) {
            $json = array('status' => 'falha', 'mensagem' => $editarPostagem->editarMensagem());
            echo json_encode($json);
        } else {
            $json = array('status' => 'sucesso', 'mensagem' => $editarPostagem->editarMensagem());
            echo json_encode($json);
        }

        die();

    } elseif($acao === 'status') {

        $id = (isset($_POST['id']) && $_POST['id'] != null) ? $_POST['id'] : null;
    
        $sql = '
        SELECT id,
        status
        FROM tb_blog
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
    
        $statusPostagem = new blogExecucoes();
        if(!$statusPostagem->status($id,$status)) {
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

        die();

    } elseif($acao === 'historico') {

    } elseif($acao === 'comentario') {

        $id = (isset($_POST['id']) && $_POST['id'] != null) ? (int)$_POST['id'] : null;

        $sql = '
        SELECT *
        FROM tb_blog_comentarios
        WHERE blog = :id
        ';
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':id', $id);
        $stm->execute();
        $consulta = $stm->fetchAll(PDO::FETCH_OBJ);

        if($consulta) {
            echo 'Em construção!!!';
        } else {
            echo 'Em construção!!!';
        }

        die();

    }

}
?>
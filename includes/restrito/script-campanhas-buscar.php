<?php

include $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
$conexao = conexao::getInstance();

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
    tinymce.remove("#campanhaConteudoEditar");
    id = $(this).data("id");
    $.ajax( {
        url: "../includes/restrito/script-campanhas-edicao.php",
        method: "POST",
        data: {
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
    id = $(this).data("id");
    $(".statusCampanha").tooltip("hide");
    $.ajax( {
        url: "../includes/restrito/script-campanhas-status.php",
        type: "POST",
        dataType: "json",
        async: true,
        data: {
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
    tinymce.remove("#campanhaConteudoEditar");
    id = $(this).data("id");
    $.ajax( {
        url: "../includes/restrito/script-campanhas-historico.php",
        method: "POST",
        data: {
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

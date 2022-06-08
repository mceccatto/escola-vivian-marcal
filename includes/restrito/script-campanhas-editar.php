<?php

include $_SERVER['DOCUMENT_ROOT'].'/includes/classes/campanha.php';
include $_SERVER['DOCUMENT_ROOT'].'/includes/session.php';

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
?>
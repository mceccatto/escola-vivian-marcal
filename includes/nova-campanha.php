<?php

include $_SERVER['DOCUMENT_ROOT'].'/includes/classes/campanha.php';
include $_SERVER['DOCUMENT_ROOT'].'/includes/session.php';

if(isset($_POST)) {
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
}
?>
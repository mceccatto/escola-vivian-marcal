<?php

include $_SERVER['DOCUMENT_ROOT'].'/includes/classes/usuario.php';

if(isset($_POST)) {
    $email = (isset($_POST['email']) && $_POST['email'] != null) ? $_POST['email'] : null;
    $senha = (isset($_POST['senha']) && $_POST['senha'] != null) ? $_POST['senha'] : null;

    $entrarUsuario = new usuarioExecucoes();
    if(!$entrarUsuario->entrar($email,$senha)) {
        $json = array('status' => 'falha', 'mensagem' => $entrarUsuario->entrarMensagem());
        echo json_encode($json);
    } else {
        $json = array('status' => 'sucesso', 'mensagem' => $entrarUsuario->entrarMensagem());
        echo json_encode($json);
    }
}
?>
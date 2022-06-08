<?php

include $_SERVER['DOCUMENT_ROOT'].'/includes/config.php';

//$accepted_origins = array('http://localhost', 'https://localhost', 'http://192.168.1.254', 'https://192.168.1.254', 'http://srv-web', 'https://srv-web');

$data = date('Y-m-d');

if (!file_exists('../uploads/'.$data.'/')) {
    mkdir('../uploads/'.$data.'/');
}

$destinoUpload = '../uploads/'.$data.'/';

reset($_FILES);

$arquivoTemporario = current($_FILES);

if(is_uploaded_file($arquivoTemporario['tmp_name'])) {

    /*if (isset($_SERVER['HTTP_ORIGIN'])) {
        if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
            header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
        } else {
            header('HTTP/1.1 403 Origin Denied');
            return;
        }
    }*/

    if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $arquivoTemporario['name'])) {
        header('HTTP/1.1 400 Invalid file name.');
        return;
    }

    if (!in_array(strtolower(pathinfo($arquivoTemporario['name'], PATHINFO_EXTENSION)), array('gif', 'jpg', 'jpeg', 'png'))) {
        header('HTTP/1.1 400 Invalid extension.');
        return;
    }

    $explode = explode('.',$arquivoTemporario['name']);
    $nomeUpload = md5(uniqid(rand(), true)).'.'.$explode[1];

    $destinoCompleto = $destinoUpload.$nomeUpload;

    move_uploaded_file($arquivoTemporario['tmp_name'], $destinoCompleto);

    $retorno = "$url/uploads/$data/$nomeUpload";

    echo json_encode(array('location' => $retorno));
} else {
    header('HTTP/1.1 500 Server Error');
}
?>
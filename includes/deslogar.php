<?php
session_start();
session_destroy();
$json = array('status' => 'sucesso');
echo json_encode($json);
?>
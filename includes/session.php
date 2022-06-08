<?php

session_start();

if(!isset($_SESSION['evm']) || $_SESSION['evm'] != true) {
	header('Location: ../');
	die();
}

$conexao = conexao::getInstance();

$sql = '
SELECT *
FROM tb_usuarios
WHERE id = :id
';
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $_SESSION['evm_id']);
$stm->execute();
$usuario = $stm->fetch(PDO::FETCH_OBJ);

$usuarioId = $usuario->id;
$usuarioNome = $usuario->nome;
$usuarioNivel = $usuario->nivel;
?>
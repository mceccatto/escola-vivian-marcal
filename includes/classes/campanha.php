<?php

include $_SERVER['DOCUMENT_ROOT'].'/includes/config.php';

class campanhaExecucoes {

    public $mensagem;
    public $retorno;

    function cadastrar($titulo,$data_inicio,$data_fim,$conteudo,$usuario) {
		
		$conexao = conexao::getInstance();
        
        if(empty($titulo)) {
            $this->mensagem = 'O campo TÍTULO é obrigatório!';
            return false;
        }

        if(empty($data_inicio)) {
            $this->mensagem = 'O campo DATA DE INÍCIO é obrigatório!';
            return false;
        }

        if(empty($data_fim)) {
            $this->mensagem = 'O campo DATA DE TERMINO é obrigatório!';
            return false;
        }

        if(empty($conteudo)) {
            $this->mensagem = 'O campo CONTEÚDO é obrigatório!';
            return false;
        }
		
		if(empty($usuario)) {
            $this->mensagem = 'Usuário não informado!';
            return false;
        }

        $data_cadastro = date('Y-m-d H:i:s');
        $status = 'A';
		$classificacao = 3;

        $sql = '
        INSERT INTO tb_campanhas
        (
            titulo,
            data_inicio,
            data_fim,
            conteudo,
            data_cadastro,
            usuario,
			status,
			classificacao
        ) VALUES (
            :titulo,
            :data_inicio,
            :data_fim,
            :conteudo,
            :data_cadastro,
            :usuario,
			:status,
			:classificacao
        )
        ';
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':titulo', $titulo);
        $stm->bindValue(':data_inicio', $data_inicio);
		$stm->bindValue(':data_fim', $data_fim);
        $stm->bindValue(':conteudo', $conteudo);
        $stm->bindValue(':data_cadastro', $data_cadastro);
        $stm->bindValue(':usuario', $usuario);
        $stm->bindValue(':status', $status);
		$stm->bindValue(':classificacao', $classificacao);
        $executar = $stm->execute();

        if($executar) {
            $this->mensagem = 'Campanha cadastrada com sucesso!';
        } else {
            $this->mensagem = 'Não foi possível cadastrar no momento.';
            return false;
        }

        return true;
		
    }

    function cadastrarMensagem() {
		return $this->mensagem;
	}

    function status($id,$status) {
		
		$conexao = conexao::getInstance();
        
        if(empty($id)) {
            $this->mensagem = 'O ID é obrigatório!';
            return false;
        }

        if(empty($status)) {
            $this->mensagem = 'O STATUS é obrigatório!';
            return false;
        }

        $sql = '
        UPDATE tb_campanhas
        SET status = :status
        WHERE id = :id
        ';
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':status', $status);
        $stm->bindValue(':id', $id);
        $executar = $stm->execute();

        if($executar) {
            $this->mensagem = 'Status alterado com sucesso com sucesso!';
        } else {
            $this->mensagem = 'Não foi possível cadastrar no momento.';
            return false;
        }

        return true;
		
    }

    function statusMensagem() {
		return $this->mensagem;
	}

    function statusRetorno() {
		return $this->retorno;
	}

    function editar($id,$titulo,$data_inicio,$data_fim,$conteudo,$usuario) {

        $conexao = conexao::getInstance();

        if(empty($id)) {
            $this->mensagem = 'O ID é obrigatório!';
            return false;
        }
        
        if(empty($titulo)) {
            $this->mensagem = 'O campo TÍTULO é obrigatório!';
            return false;
        }

        if(empty($data_inicio)) {
            $this->mensagem = 'O campo DATA DE INÍCIO é obrigatório!';
            return false;
        }

        if(empty($data_fim)) {
            $this->mensagem = 'O campo DATA DE TERMINO é obrigatório!';
            return false;
        }

        if(empty($conteudo)) {
            $this->mensagem = 'O campo CONTEÚDO é obrigatório!';
            return false;
        }
		
		if(empty($usuario)) {
            $this->mensagem = 'Usuário não informado!';
            return false;
        }

        $data_cadastro = date('Y-m-d H:i:s');
        $status = 'A';
		$classificacao = 3;

        $sql = '
        UPDATE tb_campanhas
        SET titulo = :titulo,
        data_inicio = :data_inicio,
        data_fim = :data_fim,
        conteudo = :conteudo,
        data_cadastro = :data_cadastro,
        usuario = :usuario,
        status = :status,
        classificacao = :classificacao
        WHERE id = :id
        ';
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':titulo', $titulo);
        $stm->bindValue(':data_inicio', $data_inicio);
		$stm->bindValue(':data_fim', $data_fim);
        $stm->bindValue(':conteudo', $conteudo);
        $stm->bindValue(':data_cadastro', $data_cadastro);
        $stm->bindValue(':usuario', $usuario);
        $stm->bindValue(':status', $status);
		$stm->bindValue(':classificacao', $classificacao);
        $stm->bindValue(':id', $id);
        $executar = $stm->execute();

        if($executar) {
            $this->mensagem = 'Campanha atualizada com sucesso!';
        } else {
            $this->mensagem = 'Não foi possível atualizar no momento.';
            return false;
        }

        return true;

    }

    function editarMensagem() {
		return $this->mensagem;
	}
	
}
?>
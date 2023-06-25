<?php

include $_SERVER['DOCUMENT_ROOT'].'/includes/config.php';

class blogExecucoes {

    public $mensagem;
    public $retorno;

    function cadastrar($titulo,$classificacao,$conteudo,$usuario) {
		
		$conexao = conexao::getInstance();
        
        if(empty($titulo)) {
            $this->mensagem = 'O campo TÍTULO é obrigatório!';
            return false;
        }

        if($classificacao === 0) {
            $this->mensagem = 'O campo CLASSIFICAÇÃO é obrigatório!';
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

        $sql = '
        INSERT INTO tb_blog
        (
            titulo,
            conteudo,
            classificacao,
            data_cadastro,
            usuario,
            status
        ) VALUES (
            :titulo,
            :conteudo,
            :classificacao,
            :data_cadastro,
            :usuario,
            :status
        )
        ';
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':titulo', $titulo);
        $stm->bindValue(':conteudo', $conteudo);
		$stm->bindValue(':classificacao', $classificacao);
        $stm->bindValue(':data_cadastro', $data_cadastro);
        $stm->bindValue(':usuario', $usuario);
        $stm->bindValue(':status', $status);
        $executar = $stm->execute();

        if($executar) {
            $this->mensagem = 'Postagem cadastrada com sucesso!';
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
        UPDATE tb_blog
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

    function editar($id,$titulo,$classificacao,$conteudo,$usuario) {

        $conexao = conexao::getInstance();

        if(empty($id)) {
            $this->mensagem = 'O ID é obrigatório!';
            return false;
        }
        
        if(empty($titulo)) {
            $this->mensagem = 'O campo TÍTULO é obrigatório!';
            return false;
        }

        if($classificacao === 0) {
            $this->mensagem = 'O campo DATA DE INÍCIO é obrigatório!';
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

        $sql = '
        UPDATE tb_blog
        SET titulo = :titulo,
        classificacao = :classificacao,
        conteudo = :conteudo,
        usuario = :usuario
        WHERE id = :id
        ';
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':titulo', $titulo);
        $stm->bindValue(':classificacao', $classificacao);
        $stm->bindValue(':conteudo', $conteudo);
        $stm->bindValue(':usuario', $usuario);
        $stm->bindValue(':id', $id);
        $executar = $stm->execute();

        if($executar) {
            $this->mensagem = 'Postagem atualizada com sucesso!';
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
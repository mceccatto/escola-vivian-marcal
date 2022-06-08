<?php

include $_SERVER['DOCUMENT_ROOT'].'/includes/config.php';

class usuarioExecucoes {

    public $mensagem;
    public $retorno;

    function cadastrar($nome,$email,$senha,$nivel) {
		
		$conexao = conexao::getInstance();
        
        if(empty($nome)) {
            $this->mensagem = 'O campo NOME COMPLETO é obrigatório!';
            return false;
        } else {
            $nome = mb_strtoupper($nome, 'UTF-8');
        }

        if(empty($email)) {
            $this->mensagem = 'O campo E-MAIL é obrigatório!';
            return false;
        } else {
            $email = mb_strtoupper($email, 'UTF-8');
        }

        if(empty($senha)) {
            $this->mensagem = 'O campo SENHA é obrigatório!';
            return false;
        } else {
            $senha = md5($senha);
        }

        if(empty($nivel)) {
            $this->mensagem = 'O campo NÍVEL é obrigatório!';
            return false;
        }

        $data_cadastro = date('Y-m-d H:i:s');
        $status = 'A';

        $sql = '
        INSERT INTO tb_usuarios
        (
            nome,
            email,
            senha,
            data_cadastro,
            status,
            nivel
        ) VALUES (
            :nome,
            :email,
            :senha,
            :data_cadastro,
            :status,
            :nivel
        )
        ';
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':nome', $nome);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':senha', $senha);
        $stm->bindValue(':data_cadastro', $data_cadastro);
        $stm->bindValue(':status', $status);
        $stm->bindValue(':nivel', $nivel);
        $executar = $stm->execute();

        if($executar) {
            $this->mensagem = 'Usuário cadastrado com sucesso!';
        } else {
            $this->mensagem = 'Não foi possível cadastrar no momento.';
            return false;
        }

        return true;
		
    }

    function cadastrarMensagem() {
		return $this->mensagem;
	}

    function editar($id,$nome,$email,$senha,$status,$nivel) {
		
		$conexao = conexao::getInstance();
        
        if(empty($id)) {
            $this->mensagem = 'Usuário não informado!';
            return false;
        }
        
        if(empty($nome)) {
            $this->mensagem = 'O campo NOME COMPLETO é obrigatório!';
            return false;
        } else {
            $nome = mb_strtoupper($nome, 'UTF-8');
        }

        if(empty($email)) {
            $this->mensagem = 'O campo E-MAIL é obrigatório!';
            return false;
        } else {
            $email = mb_strtoupper($email, 'UTF-8');
        }

        if(empty($senha)) {
            $this->mensagem = 'O campo SENHA é obrigatório!';
            return false;
        } else {
            $senha = md5($senha);
        }

        if(empty($status)) {
            $this->mensagem = 'O campo STATUS é obrigatório!';
            return false;
        } else {
            $status = mb_strtoupper($status, 'UTF-8');
        }

        if(empty($nivel)) {
            $this->mensagem = 'O campo NÍVEL é obrigatório!';
            return false;
        }

        $sql = '
        UPDATE tb_usuarios
        SET nome = :nome,
        email = :email,
        senha = :senha,
        status = :status,
        nivel = :nivel
        WHERE id = :id
        ';
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':nome', $nome);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':senha', $senha);
        $stm->bindValue(':status', $status);
        $stm->bindValue(':nivel', $nivel);
        $stm->bindValue(':id', $id);
        $executar = $stm->execute();

        if($executar) {
            $this->mensagem = 'Usuário atualizado com sucesso!';
        } else {
            $this->mensagem = 'Não foi possível atualizar no momento.';
            return false;
        }

        return true;

    }

    function editarMensagem() {
		return $this->mensagem;
	}

    function entrar($email,$senha) {
		
		$conexao = conexao::getInstance();

        if(empty($email)) {
            $this->mensagem = 'O campo E-MAIL é obrigatório!';
            return false;
        } else {
            $email = mb_strtoupper($email, 'UTF-8');
        }

        if(empty($senha)) {
            $this->mensagem = 'O campo SENHA é obrigatório!';
            return false;
        } else {
            $senha = md5($senha);
        }

        $sql = '
        SELECT *
        FROM tb_usuarios
        WHERE email = :email
        AND senha = :senha
        ';
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':senha', $senha);
        $stm->execute();
        $executar = $stm->fetch(PDO::FETCH_OBJ);

        if($executar) {
            unset($_SESSION);
            session_start();
            $_SESSION['evm'] = true;
            $_SESSION['evm_id'] = $executar->id;
            $this->mensagem = 'Aguarde... Você será redirecionado!';
        } else {
            $this->mensagem = 'Usuário e/ou senha incorreto(s).';
            return false;
        }

        return true;

    }

    function entrarMensagem() {
		return $this->mensagem;
	}

}
?>
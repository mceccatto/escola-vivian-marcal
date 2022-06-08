<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/config.php';
$conexao = conexao::getInstance();
?>
<!DOCTYPE html>

<html lang="pt-br">

<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/include-head.php'; ?>

<body>

    <div id="loader" class="center"></div>
	<div id="esconder" class="esconder">

	<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/include-menu.php'; ?>

	<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/include-carousel.php'; ?>

    <?php
    if(isset($_GET['page'])) {
        if($_GET['page'] == 'inicio') {
			include $_SERVER['DOCUMENT_ROOT'].'/includes/include-page-inicio.php';
        } elseif($_GET['page'] == 'doacoes') {
			include $_SERVER['DOCUMENT_ROOT'].'/includes/include-page-doacoes.php';
        } elseif($_GET['page'] == 'campanhas') {
			include $_SERVER['DOCUMENT_ROOT'].'/includes/include-page-campanhas.php';
        } elseif($_GET['page'] == 'blog') {
			include $_SERVER['DOCUMENT_ROOT'].'/includes/include-page-blog.php';
        } elseif($_GET['page'] == 'contato') {
			include $_SERVER['DOCUMENT_ROOT'].'/includes/include-page-contato.php';
        } elseif($_GET['page'] == 'entrar') {
			include $_SERVER['DOCUMENT_ROOT'].'/includes/include-page-entrar.php';
        }
    } else {
		include $_SERVER['DOCUMENT_ROOT'].'/includes/include-page-inicio.php';
    }
    ?>

	<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/include-footer.php'; ?>

    </div>

</body>
<script src="<?php echo $url; ?>/frameworks/bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url; ?>/frameworks/fontawesome-free-5.15.4/js/all.min.js"></script>
<script src="<?php echo $url; ?>/js/menu.js"></script>
<?php
if(isset($_GET['page'])) {
    if($_GET['page'] == 'inicio') {
    } elseif($_GET['page'] == 'doacoes') {
    } elseif($_GET['page'] == 'campanhas') {
    } elseif($_GET['page'] == 'blog') {
    } elseif($_GET['page'] == 'contato') {
    } elseif($_GET['page'] == 'entrar') {
        echo '<script src="'.$url.'/frameworks/jquery/jquery-3.6.0.min.js"></script>
        <script>
        $(document).ready(function() {
            $("#entrar").on("click", function(event) {
                event.preventDefault();
                email = $("#loginEmail").val();
                senha = $("#loginSenha").val();
                $("#alerta").empty();
                if(email == "") {
                    $("#container-alerta").removeClass("d-none");
                    $("#alerta").html("O campo USUÁRIO é obrigatório");
                    setTimeout(function() {
                        $("#container-alerta").addClass("d-none");
                    },3000);
                    return false;
                }
                if(senha == "") {
                    $("#container-alerta").removeClass("d-none");
                    $("#alerta").html("O campo SENHA é obrigatório");
                    setTimeout(function() {
                        $("#container-alerta").addClass("d-none");
                    },3000);
                    return false;
                }
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "includes/entrar.php",
                    async: true,
                    data: {
                        email:email,
                        senha:senha
                    },
                    success: function(retorno) {
						if(retorno.status == "sucesso") {
							$("#container-sucesso").removeClass("d-none");
							$("#sucesso").html(retorno.mensagem);
							setTimeout(function() {
								window.location.href = "/restrito";
							},3000);
						} else {
							$("#container-alerta").removeClass("d-none");
							$("#alerta").html(retorno.mensagem);
							setTimeout(function() {
								$("#container-alerta").addClass("d-none");
							},3000);
						}
                    }
                });
            });
        });
        </script>
        ';
    }
}
?>

</html>
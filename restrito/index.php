<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/config.php';
include $_SERVER['DOCUMENT_ROOT'].'/includes/session.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/include-head.php'; ?>

<body>

    <div id="loader" class="center"></div>
	<div id="esconder" class="esconder">

        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/restrito"><i class="fas fa-user-shield"></i> Administração</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="w-100"></div>
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <a class="nav-link deslogar px-3" href="#" id="deslogar"><i class="fas fa-sign-out-alt"></i> Deslogar</a>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">

                <?php
                if (isset($_GET['page'])) {
                    if ($_GET['page'] == 'dashboard') {
                        $activeDashboard = 'active';
                    } elseif ($_GET['page'] == 'doacoes') {
                        $activeDoacoes = 'active';
                    } elseif ($_GET['page'] == 'campanhas') {
                        $activeCampanhas = 'active';
                    } elseif ($_GET['page'] == 'blog') {
                        $activeBlog = 'active';
                    } elseif ($_GET['page'] == 'galeria') {
                        $activeGaleria = 'active';
                    } elseif ($_GET['page'] == 'parametros-gerais') {
                        $activeParametros = 'active';
                    } elseif ($_GET['page'] == 'usuarios') {
                        $activeUsuarios = 'active';
                    } elseif ($_GET['page'] == 'perfil') {
                        $activePerfil = 'active';
                    }
                } else {
                    $activeDashboard = 'active';
                }
                ?>
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link <?php echo @$activeDashboard; ?>" aria-current="page" href="<?php echo $url; ?>/restrito/?page=dashboard">
                                    <i class="fas fa-chart-line feather"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo @$activeDoacoes; ?>" href="<?php echo $url; ?>/restrito/?page=doacoes">
                                    <i class="fas fa-hand-holding-usd feather"></i>
                                    Doações
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo @$activeCampanhas; ?>" href="<?php echo $url; ?>/restrito/?page=campanhas">
                                    <i class="fas fa-heart feather"></i>
                                    Campanhas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo @$activeBlog; ?>" href="<?php echo $url; ?>/restrito/?page=blog">
                                    <i class="fab fa-microblog feather"></i>
                                    Blog
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo @$activeGaleria; ?>" href="<?php echo $url; ?>/restrito/?page=galeria">
                                    <i class="fas fa-images feather"></i>
                                    Galeria
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo @$activeParametros; ?>" href="<?php echo $url; ?>/restrito/?page=parametros-gerais">
                                    <i class="fab fa-whmcs feather"></i>
                                    Parâmetros Gerais
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo @$activeUsuarios; ?>" href="<?php echo $url; ?>/restrito/?page=usuarios">
                                    <i class="fas fa-user feather"></i>
                                    Usuários
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo @$activePerfil; ?>" href="<?php echo $url; ?>/restrito/?page=perfil">
                                    <i class="fas fa-user-cog feather"></i>
                                    Perfil
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <?php
                    if (isset($_GET['page'])) {
                        if ($_GET['page'] == 'dashboard') {
                            include $_SERVER['DOCUMENT_ROOT'].'/includes/restrito/include-page-dashboard.php';
                        } elseif ($_GET['page'] == 'doacoes') {
                            include $_SERVER['DOCUMENT_ROOT'].'/includes/restrito/include-page-doacoes.php';
                        } elseif ($_GET['page'] == 'campanhas') {
                            include $_SERVER['DOCUMENT_ROOT'].'/includes/restrito/include-page-campanhas.php';
                        } elseif ($_GET['page'] == 'blog') {
                            include $_SERVER['DOCUMENT_ROOT'].'/includes/restrito/include-page-blog.php';
                        } elseif ($_GET['page'] == 'galeria') {
                            include $_SERVER['DOCUMENT_ROOT'].'/includes/restrito/include-page-galeria.php';
                        } elseif ($_GET['page'] == 'parametros-gerais') {
                            include $_SERVER['DOCUMENT_ROOT'].'/includes/restrito/include-page-parametros-gerais.php';
                        } elseif ($_GET['page'] == 'usuarios') {
                            include $_SERVER['DOCUMENT_ROOT'].'/includes/restrito/include-page-usuarios.php';
                        } elseif ($_GET['page'] == 'perfil') {
                            include $_SERVER['DOCUMENT_ROOT'].'/includes/restrito/include-page-perfil.php';
                        }
                    } else {
                        include $_SERVER['DOCUMENT_ROOT'].'/includes/restrito/include-page-dashboard.php';
                    }
                    ?>

                </main>
            </div>

            <?php include $_SERVER['DOCUMENT_ROOT'].'/includes/include-footer.php'; ?>

        </div>

    </div>

</body>
<script src="<?php echo $url; ?>/frameworks/bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url; ?>/frameworks/fontawesome-free-5.15.4/js/all.min.js"></script>
<script src="<?php echo $url; ?>/frameworks/jquery/jquery-3.6.0.min.js"></script>
<script>
document.onreadystatechange = function() {
	if (document.readyState !== 'complete') {
		document.querySelector('body').style.visibility = 'hidden';
		document.querySelector('#esconder').style.visibility = 'hidden';
		document.querySelector('#loader').style.visibility = 'visible';
	} else {
		document.querySelector('#loader').style.display = 'none';
		document.querySelector('#esconder').style.visibility = 'visible';
		document.querySelector('body').style.visibility = 'visible';
	}
};
$(document).ready(function() {
    $("#deslogar").on("click", function(event) {
		event.preventDefault();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../includes/deslogar.php",
            async: true,
            success: function(retorno) {
				if(retorno.status == "sucesso") {
					location.reload();
				}
            }
        });
    });
});
</script>
<?php
if (isset($_GET['page'])) {
    if ($_GET['page'] == 'dashboard') {
        echo '';
    } elseif ($_GET['page'] == 'doacoes') {
        echo '';
    } elseif ($_GET['page'] == 'campanhas') {
        echo '<script src="' . $url . '/frameworks/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script src="' . $url . '/js/campanhas.js"></script>
';
    } elseif ($_GET['page'] == 'blog') {
        echo '<script src="' . $url . '/frameworks/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script src="' . $url . '/js/blog.js"></script>
';
    } elseif ($_GET['page'] == 'galeria') {
        echo '';
    } elseif ($_GET['page'] == 'parametros-gerais') {
        echo '<script src="' . $url . '/js/parametros-gerais.js"></script>
';
    } elseif ($_GET['page'] == 'usuarios') {
        echo '';
    } elseif ($_GET['page'] == 'perfil') {
        echo '';
    }
}
?>

</html>
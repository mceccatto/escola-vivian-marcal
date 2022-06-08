    <?php
    if (isset($_GET['page'])) {
        if ($_GET['page'] == 'inicio') {
            $activeInicio = 'active';
        } elseif ($_GET['page'] == 'doacoes') {
            $activeDoacoes = 'active';
        } elseif ($_GET['page'] == 'campanhas') {
            $activeCampanhas = 'active';
        } elseif ($_GET['page'] == 'blog') {
            $activeBlog = 'active';
        } elseif ($_GET['page'] == 'contato') {
            $activeContato = 'active';
        } elseif ($_GET['page'] == 'entrar') {
            $activeEntrar = 'active';
        }
    } else {
        $activeInicio = 'active';
    }
    ?>

    <nav class="bg-azul-claro-topo">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item">
                    <a class="nav-link link-light px-2 telefone-topo"><strong>SEDE:</strong> (41) 3222-7150 | <strong>SUBSEDE:</strong> (41) 3335-3938</a>
                </li>
            </ul>
            <ul class="nav">
                <?php
                if($parametros->url_facebook != '') {
                    echo '
                    <li class="nav-item">
                        <a href="'.$parametros->url_facebook.'" target="_blank" class="nav-link link-dark px-2 icone-social text-light">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    ';
                }
                if($parametros->url_youtube != '') {
                    echo '
                    <li class="nav-item">
                        <a href="'.$parametros->url_youtube.'" target="_blank" class="nav-link link-dark px-2 icone-social text-light">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                    ';
                }
                if($parametros->url_instagram != '') {
                    echo '
                    <li class="nav-item">
                        <a href="'.$parametros->url_instagram.'" target="_blank" class="nav-link link-dark px-2 icone-social text-light">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    ';
                }
                ?>
            </ul>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container">
            <a href="<?php echo $url; ?>/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-dark text-decoration-none">
                <img class="bi me-2 py-2" src="<?php echo $url; ?>/<?php echo $parametros->url_logo; ?>" alt="logo" id="logo" height="150">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuCollapse" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-md-end align-self-end" id="menuCollapse">
            
                <ul id="menu" class="navbar-nav col-12 col-lg-auto d-flex align-self-end my-md-0 text-small">
                    <li>
                        <a href="<?php echo $url; ?>/?page=inicio" class="nav-link text-dark menu <?php echo @$activeInicio; ?>">
                            INÍCIO
                        </a>
                        <div class="inicio-base"></div>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/?page=doacoes" class="nav-link text-dark menu <?php echo @$activeDoacoes; ?>">
                            DOAÇÕES
                        </a>
                        <div class="inicio-doacoes"></div>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/?page=campanhas" class="nav-link text-dark menu <?php echo @$activeCampanhas; ?>">
                            CAMPANHAS
                        </a>
                        <div class="inicio-campanhas"></div>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/?page=blog" class="nav-link text-dark menu <?php echo @$activeBlog; ?>">
                            BLOG
                        </a>
                        <div class="inicio-contato"></div>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/?page=contato" class="nav-link text-dark menu <?php echo @$activeContato; ?>">
                            CONTATO
                        </a>
                        <div class="inicio-contato"></div>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/?page=entrar" class="nav-link text-dark menu <?php echo @$activeEntrar; ?>">
                            ENTRAR
                        </a>
                        <div class="inicio-entrar"></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
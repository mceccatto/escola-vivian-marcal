<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Marcelo Ceccatto, Nathan Pechebovicz, Lucas Eduardo Zandoná, Matheus de Carvalho Pereira Pinto">
    <title><?php echo $parametros->nome; ?></title>
    <link rel="shortcut icon" href="<?php echo $url; ?>/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo $url; ?>/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo $url; ?>/frameworks/bootstrap-5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/frameworks/fontawesome-free-5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/css/buttons.css">
    <?php
    if (strpos($urlCheck,'restrito') === false) {
        echo '<link rel="stylesheet" href="'.$url.'/css/style.css">';
    } else {
        echo '<link rel="stylesheet" href="'.$url.'/css/style-adm.css">';
    }
    ?>
    
</head>
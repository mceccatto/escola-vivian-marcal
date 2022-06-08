<?php

include $_SERVER['DOCUMENT_ROOT'].'/includes/session.php';

if(isset($_POST)) {
    $nomeWebsite = (isset($_POST['nomeWebsite']) && $_POST['nomeWebsite'] != null) ? $_POST['nomeWebsite'] : null;
    $logo = (isset($_FILES['logo']) && $_FILES['logo'] != null) ? $_FILES['logo'] : null;
    $urlFacebook = (isset($_POST['urlFacebook']) && $_POST['urlFacebook'] != null) ? $_POST['urlFacebook'] : null;
    $urlYoutube = (isset($_POST['urlYoutube']) && $_POST['urlYoutube'] != null) ? $_POST['urlYoutube'] : null;
    $urlInstagram = (isset($_POST['urlInstagram']) && $_POST['urlInstagram'] != null) ? $_POST['urlInstagram'] : null;
    $banner1 = (isset($_FILES['banner1']) && $_FILES['banner1'] != null) ? $_FILES['banner1'] : null;
    $banner2 = (isset($_FILES['banner2']) && $_FILES['banner2'] != null) ? $_FILES['banner2'] : null;
    $banner3 = (isset($_FILES['banner3']) && $_FILES['banner3'] != null) ? $_FILES['banner3'] : null;

    if($nomeWebsite === '') {
    
    }
    
}
?>
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
			include "frameworks/pix/phpqrcode/qrlib.php"; 
			include "frameworks/pix/funcoes_pix.php";
			
			$px[00] = "01";
			$px[26][00] = "br.gov.bcb.pix";
			$px[26][01] = strtolower("78174448000119");
			$px[26][02] = "05998507959";
			$px[52] = "0000";
			$px[53] = "986";
			$px[54] = preg_replace("/[^0-9.]/","","10.00");
			$px[58] = "BR";
			$px[59] = "Associacao do Deficiente Motor";
			$px[60] = "Curitiba";
			$px[62][05] = "***";
			$pix = montaPix($px);
			$pix .= "6304";
			$pix .= crcChecksum($pix);
			$linhas = round(strlen($pix)/120)+1;
			ob_start();
			QRCode::png($pix, null,'M',5);
			$imageString = base64_encode( ob_get_contents() );
			ob_end_clean();
			
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
<script src="'.$url.'/js/entrar.js"></script>';
    }
}
?>

</html>
    <?php
    $carousel = '
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="'.$url.'/'.$parametros->url_banner1.'" class="d-block w-100" alt="001">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="'.$url.'/'.$parametros->url_banner2.'" class="d-block w-100" alt="002">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="'.$url.'/'.$parametros->url_banner3.'" class="d-block w-100" alt="003">
            </div>
        </div>
    </div>
    ';

    if(isset($_GET['page'])) {
        if($_GET['page'] == 'inicio') {
            echo $carousel;
        }
    } else {
        echo $carousel;
    }
    ?>
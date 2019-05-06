<?php
session_start();
//INDEX PUBLIC
?>
<!doctype html>
<?php
require './admin/lib/php/admin_liste_include.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        

        <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="admin/lib/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="admin/lib/css/custom.css"/>
		<script scr="./admin/lib/js/jquery.editable.js"></script>
        <script src='admin/lib/js/fonctionsJqueryDA.js'></script>
        <title>Vroom Vroom</title>
    </head>
    <body>
        <header>
            <div class="container">
                <?php
                if (file_exists('./lib/php/p_menu.php')) {
                    require './lib/php/p_menu.php';
                }
                ?>
                <div class="">
                    <a href="index.php?page=login.php">Administration</a>
                </div>
            </div>
        </header>
        <section id="main">
            <div class="container">
                <?php
                if (!isset($_SESSION['page'])) { //premiere ouverture du site
                    $_SESSION['page'] = "accueil.php"; //page par défaut
                }
                if (isset($_GET['page'])) {
                    //on a cliqué sur un lien de menu
                    $_SESSION['page'] = $_GET['page'];
                }
                $path = "./pages/" . $_SESSION['page'];
                if (file_exists($path)) {
                    include ($path);
                } else {
                    include('admin/pages/page404.php'); //remplacer par page spécifique
                }
                ?>
            </div>
        </section>

        
        <footer>
            <div class="container text-center" id="footer">
                Inclure ici la page de footer
            </div>
        </footer>



    </body>
</html>


<!--
        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" class="active "data-ride="carousel" style="width: 80%; height: 60%; margin-left: auto; margin-right: auto; ">
                <ol class="carousel-indicators">
                    <li data-target="Le GOAT" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>

                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./admin/images/voiture.jpg" href="" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Notre catalogue</h5>
                            <a class="btn btn-primary btn-lg" href="./index.php?page=voiture_loc.php" role="button">En savoir plus</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./admin/images/dede.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>


        <footer>
            <div class="jumbotron p-3 fixed-bottom- bg-dark" style="margin-bottom: 0px; border-radius: 0; color: white; margin-top: 50px; ">
                <div class="row">
                    <div class="col-md-12 text-center mt-2">
                        <h4 class="font-weight-light">Merci de votre visite sur le site</h4>
                    </div>

                </div> 
            </div>
        </footer>-->
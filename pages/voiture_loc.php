<hgroup>
    <h3 class="aligner txtGras">Voiture en location</h3>
    <h4 class="text-muted aligner">Voiture automatique - Voiture manuelle</h4>
</hgroup>

<?php
//récupération des types pour la liste déroulante
$typ = new TypeDB($cnx);
$types = $typ->getType();
$nbr_type = count($types);

//récupération des produits
$vue = new Vue_voiture_couleurDB($cnx);

$liste = array();
$liste = null;
//sans filtre de produits
if (!isset($_GET['submit_choix_type'])) {
    $liste = $vue->getAllVoitures();
}
//avec filtre si on a fait un choix dans la liste déroulante: 
else {
    if (isset($_GET['choix_type']) && $_GET['choix_type'] != "") {
        $liste = $vue->getVoitures($_GET['choix_type']);
    } else {
        $liste = $vue->getAllVoitures();
    }
}
?>



<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
        <div class="row">  
            <div class="col-sm-1 hidden-sm txtGras text-right">Filtrer</div>               
            <div class="col-sm-11">
                <select name="choix_type" id="choix_type">
                    <option value="">Voiture</option>
                    <?php
                    for ($i = 0; $i < $nbr_type; $i++) {
                        ?>
                        <option value="<?php print $types[$i]->type; ?>">
                            <?php
                            print $types[$i]->nom_type;
                            ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <input type="submit" name="submit_choix_type" id="submit_choix_type">
            </div>
        </div>
    </form>
</div>


<?php
if ($liste != null) {
    $nbr = count($liste);
    ?>
    <div class="container ecartTop3pc">
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <div class="row">
                <div class="col-sm-3 offset-1 demiContour text-center">
                   <img src="admin/images/<?php print $liste[$i]['image']; ?>" alt="Photo"/><br/><br/>
                </div>
                <div class="col-sm-5 text-center borderBottom">
                    <?php
                    print "<br/>" . $liste[$i]['marque'] . "<br/><br/>";
                    print $liste[$i]['modele'] . "<br/><br/>";
                    print $liste[$i]['nomcouleur'] . " <br/><br/>";
                    
                    ?>
                    <p>
                        <br/>
                        <a href="index.php?page=client.php&id_voiture=<?php print $liste[$i]['id_voiture']; ?> " > 
                            LOUER
                        </a>
                    </p>

                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}//fin if $nbr >0
else {
    ?>
    <div class="container">
        <p>( contenu signifiant un problème ... )</p>
    </div>
    <?php
}

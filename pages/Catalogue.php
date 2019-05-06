<hgroup>
    <h3 class="aligner txtGras">Gestion des instruments de musiques</h3>
	</br>
    <h4 class="text-muted aligner">Pianos digitaux - Guitares électriques</h4>
</hgroup>
<?php
//2016-2017
//récupération des produits
$vue = new VoitureDB($cnx);
$liste = array();
$liste = null;

$liste = $vue->getVoiture();
$nbr = count($liste);
?>

<div class="row">
    <div class="col-sm-12">
        <a href="./pages/printCatalogue.php" class="pull-right" target="_blank">Imprimer</a>
    </div>
</div>

<br/>

<h2 id="titre">Illustration d'un tableau dynamique</h2>

<div class="container table">
    <table class="table-responsive">
        <tr>
            <th class="ecart">Id</th>
            <th class="ecart">Marque</th>
            <th class="ecart">Modèle</th>
            <th class="ecart">Couleur</th>
            <!--<th class="ecart">Stocks</th>-->
        </tr>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <tr>
                <td class="ecart"><?php print $liste[$i]['id_voiture']; ?></td>
                <td><span contenteditable="true" name="marque" class="ecart" id="<?php print $liste[$i]['marque']; ?>">
                        <?php print $liste[$i]['marque']; ?></span>
                </td>
                <td><span contenteditable="true" name="modele" class="ecart" id="<?php print $liste[$i]['modele']; ?>">
                        <?php print $liste[$i]['modele']; ?></span>
                </td>
                <td><span contenteditable="true" name="couleur" class="ecart" id="<?php print $liste[$i]['couleur']; ?>">
                        <?php print $liste[$i]['couleur']; ?></span>
                </td>
               
            </tr>
            <?php
        }
        ?>
    </table>  
</div>
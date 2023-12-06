<?php
// se connecte a la B.D.
$pdo = new \PDO('mysql:host=localhost;dbname=gsb;port=3307', 'root', '');

// 2 requetes
$statement=$pdo->query("select * from visiteur ");
$statement2=$pdo->query("select * from fichefrais ");

// 3 . Recupere
$visiteurs=$statement->fetchAll(PDO::FETCH_ASSOC);
$fichesfrais=$statement2->fetchAll(PDO::FETCH_ASSOC);
var_dump($visiteurs);
var_dump($fichesfrais);

// on recupere les 2 tableau
//On les affiche dans le formulaire avec les 2 listes deroulantes et le bouton ‘valide
?>
<form action="test2.php">
    <select name="visiteurs" id="visiteurs" >
    <?php
                    foreach ($visiteurs as $visiteur) {
                        $id = $visiteur['id'];
                        $nom = $visiteur['nom'];
                            ?>
        <option value="<?=$id?>"><?=$nom?></option>
        <?php }?>
    </select>
    <select name="fichesfrais" id="fichesfrais" >
    <?php
                     foreach ($fichesfrais as $unMois){ ?>
                        <option value= <?=  $unMois['mois']  ?> > <?= $unMois['mois'] ?>  </option>
                    <?php } ?>
       
    </select>

</form>

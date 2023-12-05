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
                     foreach ($fichefrais as $unMois){ ?>
                        <option value= <?= 'mois' ?> > <?= $unMois['mois'] ?>  </option>
                    <?php } ?>
       
    </select>

</form>

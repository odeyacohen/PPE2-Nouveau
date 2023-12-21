<h2>Valider les frais</h2>
<div class="row">
    <div class="col-md-4">
        <h3>Sélectionner un visiteur et un mois : </h3>
    </div>
    <div class="col-md-4">


<form action="index.php?uc=validerfrais&action=affichefrais" method="POST">
<div class="form-group">
    
    <select name="visiteurs" id="visiteurs" class="form-control" >
    <?php
                    foreach ($visiteurs as $visiteur) {
                        
                        
                        $nom = $visiteur['nom'];

                       
                            ?>
        <option value="<?=$visiteur['id']?>"><?=$nom?></option>
        <?php }?>
        
    </select>
    <select name="mois" id="mois" class="form-control">
    <?php
                     foreach ($mois as $unMois){ ?>
                        <option value= <?=  $unMois['mois']  ?>  > <?= $unMois['mois'] ?>  </option>
                    <?php } ?>
       
    </select>
    <?php
    switch ($action) {
        
    }
    ?>
    
    <button class="btn btn-success" type="submit">Envoyer</button>
</div>
</form>

    </div>
</div>

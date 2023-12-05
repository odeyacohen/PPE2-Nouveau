<?php
$visiteurs=$pdo->getVisiteurs();
$fichefrais=$pdo->getFichesFrais();
       

var_dump($fichefrais);

require 'vues/v_validerfrais.php'
?>
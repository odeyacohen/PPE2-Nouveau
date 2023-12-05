<?php
$visiteurs=$pdo->getVisiteurs();
$fichefrais=$pdo->getFichesFrais();
       echo "je suis dans la bonne page ";
var_dump($visiteurs);
var_dump($fichefrais);
?>
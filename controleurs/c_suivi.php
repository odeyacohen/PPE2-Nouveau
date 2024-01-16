<?php
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$idVisiteur = $_SESSION['idVisiteur'];
switch ($action) {
case 'suiviPaiement':
    $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
    // Afin de sélectionner par défaut le dernier mois dans la zone de liste
    // on demande toutes les clés, et on prend la première,
    // les mois étant triés décroissants
    $visiteurs=$pdo->getVisiteurs();
    $mois=$pdo->getMois();
    $leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
    $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
    $moisASelectionner = $leMois;

    $lesCles = array_keys($mois);
    $moisASelectionner = $lesCles[0];

   require 'vues/v_paiement.php';
   break;
   
case 'selectionnerPaiement':
    
    $idVisiteur = $_SESSION['visiteur_selection'];
    $leMois = $_SESSION['mois_selection'];
    
    $leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
    $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
    $visiteurs=$pdo->getVisiteurs();
    $moisASelectionner = $leMois;    

    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
    $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
    $numAnnee = substr($leMois, 0, 4);
    $numMois = substr($leMois, 4, 2);
    $libEtat = $lesInfosFicheFrais['libEtat'];
    $montantValide = $lesInfosFicheFrais['montantValide'];
    $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
    $dateModif = dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
require 'vues/v_selectionnerPaiement.php';
break;

case 'mettreEnPaiement';
$idVisiteur = $_SESSION['visiteur_selection'];
     $mois = $_SESSION['mois_selection'];
     
     $etat= 'MP';
     $valider=$pdo->majEtatFicheFrais($idVisiteur, $mois, $etat);   
     $leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
     $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
     $visiteurs=$pdo->getVisiteurs();
     $moisASelectionner = $leMois;    
 
     $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
     $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
     $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
     $numAnnee = substr($leMois, 0, 4);
     $numMois = substr($leMois, 4, 2);
     $libEtat = $lesInfosFicheFrais['libEtat'];
     var_dump($lesInfosFicheFrais);
     $montantValide = $lesInfosFicheFrais['montantValide'];
     $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
     $dateModif = dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
    
     

require 'vues/v_selectionnerPaiement.php';
 break;
    
 } ?>
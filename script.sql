-- qui execute ce code : 
-- quand : le 10 du mois
-- requete SQL dont l'obj est de MAJ les fiches de frais de l etat créé à l'état cloturé
-- il faut la tester pour verifier si elle fonctionne bien

UPDATE fichefrais
SET idEtat = 'CL'
WHERE idEtat = 'CR' ;

    
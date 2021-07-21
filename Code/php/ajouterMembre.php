<?php 
session_start();
if(isset($_POST['formMemberAdd'])) 
{
	include'database.php';
	global $db;
	
	$idCreateur = $_SESSION['Id'];
    $newMember = $_POST['new_member'];
    $compteurMembres = 1;
    echo $newMember;

//J'arrive pas a le faire en auto increment....


	try{

		//Our SQL query that will alter the table and add the new column.
		//$sql = "ALTER TABLE  `equipe` ADD  `Membre.$compteurMembres.Id` INT NOT NULL";
		//Execute the query.
		//$db->query($sql);

		$q2 = $db->prepare("SELECT idUtilisateur FROM utilisateur WHERE Email= :Email"); 
		$q2->execute(array('Email' => $newMember));	
		$resultat = $q2->fetch();
$chercheId = $resultat['idUtilisateur'];
echo $chercheId;

		$q3 = $db->prepare("SELECT idUtilisateur FROM membres_equipe WHERE idUtilisateur= :Id"); 
		$q3->execute(array('Id' => $chercheId));	
		$resultat2 = $q3->fetchAll();
var_dump($resultat2['idUtilisateur']);
echo "babab";

		if ($resultat2==NULL) {
			
			$q = $db->prepare("INSERT INTO membres_equipe(idUtilisateur,idGestionnaire) VALUES ('$chercheId','$idCreateur')"); 
			$q->execute();	
			?><script type="text/javascript">
    			var reponse = alert("Le membre a été ajouté à votre équipe");
        		document.location.href="Rechercher_membre.php";
			</script> <?php
			$_SESSION['Team']=1;
			$compteurMembres =+1;
		}
		else 
		{
			?><script type="text/javascript">
    			var reponse = alert("L'utilisateur associé à l'email saisi est déja inscit dans une autre équipe");
        		document.location.href="Rechercher_membre.php";
			</script> <?php

		
		
}



			




		//$q = $db->prepare("INSERT INTO equipe(Membre.$compteurMembres.Id) VALUES ('$newMember') WHERE "); 
		//$q->execute();			
		

//CA MARCHE PAS CA EN AUTO

		//$updateTable = $db->prepare('UPDATE equipe SET `Membre.$compteurMembres.Id` = : `Membre.$compteurMembres.Id` WHERE idGestionnaire = :idGestionnaire');
	//$updateTable->execute(['`Membre.$compteurMembres.Id`' => $newMember,'idGestionnaire' => $_SESSION['Id']]);


//TENTER DE FAIRE AVEC DES TABLES PREFAITES AVEC GENRE LIMITATION 
		//$updateTable = $db->prepare('UPDATE equipe SET `Membre.$compteurMembres.Id` = : `Membre.$compteurMembres.Id` WHERE idGestionnaire = :idGestionnaire');
	//$updateTable->execute(['`Membre.$compteurMembres.Id`' => $newMember,'idGestionnaire' => $_SESSION['Id']]);
			

			
			//J'incrémente le compteur de membres
			
  				}
      catch(PDOException $e){
          echo "Erreur : " . $e->getMessage();
      }
	}
	else 
	{
		echo "rien d'écrit";
	}

	?>
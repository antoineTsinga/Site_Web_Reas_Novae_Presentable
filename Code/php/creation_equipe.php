<?php 
session_start();
if(isset($_POST['formteam'])) 
{
	include'database.php';
	global $db;
	$NomEquipe = $_POST['nom_equipe'];
	$idCreateur = $_SESSION['Id'];

	try
	{	
		$q = $db->prepare("INSERT INTO equipe(nomEquipe,idGestionnaire) VALUES ('$NomEquipe','$idCreateur')"); 
		$q->execute();			
			header("Location:Rechercher_membre.php");
				exit();
			$_SESSION['Team']=1;

			
			
  	}
    catch(PDOException $e)
    {
          echo "Erreur : " . $e->getMessage();
    }
}
else 
{
	echo "rien d'écrit";
}

	?>
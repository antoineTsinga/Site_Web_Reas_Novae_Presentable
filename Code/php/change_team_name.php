<?php 
session_start();
if(isset($_POST['formteamName'])) 
{
	include'database.php';
	global $db;
	
	$idCreateur = $_SESSION['Id'];
	//$actual_team_name = htmlspecialchars($_POST['nom_actuel']);
    $new_team_name = $_POST['nouveau_nom'];

	try{
		$updateName = $db->prepare('UPDATE equipe SET nomEquipe = :nomEquipe WHERE idGestionnaire =:idGestionnaire');
	$updateName->execute(['nomEquipe' => $new_team_name,'idGestionnaire' => $_SESSION['Id']]);
			

			header("Location:Monprofil.php");
			exit();
			$_SESSION['Team']=1;

			
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
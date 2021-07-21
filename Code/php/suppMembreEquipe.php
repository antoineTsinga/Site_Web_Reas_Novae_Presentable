<?php 
session_start();
if(isset($_POST['formMemberDelete'])) 
{
	include'database.php';
	global $db;
	
	$idCreateur = $_SESSION['Id'];
    $deleteMember = $_POST['delete_member'];
    
	try{
				//Cherche email associé
		$q2 = $db->prepare("SELECT Email,idUtilisateur FROM utilisateur WHERE Email= :Email"); 
		$q2->execute(array('Email' => $deleteMember));	
		$resultat = $q2->fetch();
		$chercheId = $resultat['idUtilisateur'];

				//Cherche l'utilisateur associé à la table des membres équipes
		$q3 = $db->prepare("SELECT idUtilisateur,idGestionnaire FROM membres_equipe WHERE idUtilisateur= :Id"); 
		$q3->execute(array('Id' => $chercheId));	
		$resultat2 = $q3->fetch();

		if ($resultat2['idGestionnaire']==$idCreateur) {
			$q = $db->prepare("DELETE FROM membres_equipe WHERE idUtilisateur= :Id"); 
			$q->execute(array('Id' => $chercheId));	

			?><script type="text/javascript">
    			var reponse = alert("Le membre a été retiré de l'équipe");
        		document.location.href="Rechercher_membre.php";
			</script> <?php
			}
			
			else if ($resultat2['idGestionnaire']!='') {
				
			?><script type="text/javascript">
    		var reponse = alert("Le membre existe déja dans une autre équipe ");
        	document.location.href="Rechercher_membre.php";
			</script>
<?php
			}

			else  {
				
				?><script type="text/javascript">
    			var reponse = alert("Le membre n'existe pas dans une équipe");
        		/*document.location.href="Rechercher_membre.php";*/
        		</script> <?php
			}
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
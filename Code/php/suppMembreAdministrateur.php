<?php 
session_start();
if(isset($_POST['formMemberDelete'])) 
{
	include'database.php';
	global $db;
	
	$idCreateur = $_SESSION['Id'];
    $deleteMember = $_POST['delete_member'];
    
   
	try
	{
		/*$q2 = $db->prepare("SELECT idUtilisateur FROM utilisateur WHERE Email= :Email"); 
		$q2->execute(array('Email' => $deleteMember));	
		$resultat = $q2->fetch();
		$chercheId = $resultat['idUtilisateur'];
		*/

							// UTILISATEUR	
		$q=$db->prepare("SELECT * FROM utilisateur  WHERE Email =:Email"); 
		$q->execute(['Email' => $deleteMember]);
		$result =$q->fetch();

									// GESTIONNAIRE
		$q2=$db->prepare("SELECT * FROM gestionnaire WHERE Email =:Email");
		$q2->execute(['Email' => $deleteMember]);
		$result2 =$q2->fetch();	

									// ADMIN
		$q3=$db->prepare("SELECT * FROM administrateur WHERE Email =:Email");
		$q3->execute(['Email' => $deleteMember]);
		$result3 =$q3->fetch();	


		if ($result == true) {  //Si l'email entré est celui d'un compte utilisateur
			//On récupère l'ID associé au compte
			$chercheId = $result['idUtilisateur'];

			//On supprime le compte maintenant que la relation est brisée
			$suppressionQ1 = $db->prepare("DELETE FROM utilisateur WHERE Email= :Email"); 
			$suppressionQ1->execute(array('Email' => $deleteMember));	

				?><script type="text/javascript">
	    			var reponse = alert("Le compte utilisateur saisi a correctement été supprimé");
	        		document.location.href="gestion_membres.php";
				</script> <?php
			}
			
		else if ($result2 == true) {	//Si l'email entré est celui d'un compte gestionnaire

			//On récupère l'ID associé au compte
			$chercheId2 = $result2['idGestionnaire'];

			//on supprime les relations d'équipe du gestionnaire
			$suppressionQ2EquipeMembres = $db->prepare("DELETE FROM membres_equipe WHERE idGestionnaire= :Id"); 
			$suppressionQ2EquipeMembres->execute(array('Id' => $chercheId2));

			$suppressionQ2Equipe = $db->prepare("DELETE FROM equipe WHERE idGestionnaire= :Id"); 
			$suppressionQ2Equipe->execute(array('Id' => $chercheId2));

			//On supprime le compte maintenant que la relation est brisée
			$suppressionQ2 = $db->prepare("DELETE FROM gestionnaire WHERE Email= :Email"); 
			$suppressionQ2->execute(array('Email' => $deleteMember));
			?>
			<script type="text/javascript">
	   			var reponse = alert("Le compte Gestionnaire saisi a correctement été supprimé");
	        		document.location.href="gestion_membres.php";	
	       	</script>
			<?php
		}
		else if ($result3 == true) { //Si l'email entré est celui d'un compte Administrateur
			$suppressionQ3 = $db->prepare("DELETE FROM administrateur WHERE Email= :Email"); 
			$suppressionQ3->execute(array('Email' => $deleteMember));
			?>
			<script type="text/javascript">
	    		var reponse = alert("Le compte Administrateur saisi a correctement été supprimé");
	        	document.location.href="gestion_membres.php";	
	        </script>
			<?php
		}
		else {?>
			<script type="text/javascript">
	    		var reponse = alert("L'email saisi ne correspond à auncun de nos comptes");
	        	document.location.href="gestion_membres.php";	
	        </script><?php
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
<?php 
    session_start();
    if(!isset($_SESSION['Id'])){
        header('Location:Connexion.php');
        die();
    }    
?>

<?php
include 'database.php';
global $db;
error_reporting(E_ALL ^ E_NOTICE);
//Annule les notifications de notice


/*function majAvatar($typeUser,$idUser,$Chemin)
{
		if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) 
		{
		$taillemax = 2097152;
		$extensionsValides = array('jpg','jpeg','gif','png');
		if ($_FILES['avatar']['size'] <= $taillemax) 
		{
			
			$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'),1));
				if(in_array($extensionUpload, $extensionsValides)) 
				{
				
					$chemin = $Chemin.$_SESSION['Id'].".".$extensionUpload;
					//On deplace le fichier que la personne a enregistré
					$resultat =move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
					if ($resultat) 
					{
						
							$updateAvatar = $db->prepare('UPDATE $typeUser SET avatar = :avatar WHERE $idUser =:$idUser');
							$updateAvatar->execute(array(
								'avatar' => $_SESSION['Id'].'.'.$extensionUpload,
								'$idUser' => $_SESSION['Id']
								));
							echo "normalement c bon";

					}
					else
					{
						echo "ERREUR durant l'importation du fichier";
					}
				}
				else
				{
					echo "Votre photo doit être au format jpeg, jpg, gif ou png";
				}
		}
		else
		{
			echo "Votre photo de profil ne doit pas dépasser 2 Mega Octets";
		}
	}
}
*/

if ($_SESSION['Type'] == "utilisateur") {
	//majAvatar("utilisateur","idUtilisateur","membres/avatars/");

if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) 
		{
		$taillemax = 2097152;
		$extensionsValides = array('jpg','jpeg','gif','png');
		if ($_FILES['avatar']['size'] <= $taillemax) 
		{
			$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'),1));
				if(in_array($extensionUpload, $extensionsValides)) 
				{
					$chemin = "../img/membres/avatars/".$_SESSION['Id'].".".$extensionUpload;
					//On deplace le fichier que la personne a enregistré
					$resultat =move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
					if ($resultat) 
					{
							$updateAvatar = $db->prepare('UPDATE utilisateur SET avatar = :avatar WHERE idUtilisateur =:idUtilisateur');
							$updateAvatar->execute(array(
								'avatar' => $_SESSION['Id'].'.'.$extensionUpload,
								'idUtilisateur' => $_SESSION['Id']
								));
							//echo "normalement c bon";
							
							

					}
					else
					{
						//echo "ERREUR durant l'importation du fichier";
						?>
					<script type="text/javascript">
    			var reponse = alert("Erreur durant l'importation du fichier");
					</script> <?php
					}
				}
				else
				{
					//echo "Votre photo doit être au format jpeg, jpg, gif ou png";
					?>
					<script type="text/javascript">
    			var reponse = alert("Votre photo doit être au format jpeg, jpg, gif ou png");
					</script> <?php
				}
		}
		else
		{
			//echo "Votre photo de profil ne doit pas dépasser 2 Mega Octets";
			?>
					<script type="text/javascript">
    			var reponse = alert("Votre photo ne doit pas dépasser 2 Mega Octets");
					</script> <?php
		}
	}
	
}	
else if ($_SESSION['Type'] == "gestionnaire") 
{
	//majAvatar("gestionnaire","idGestionnaire","membres/avatars_gestion/");
	
	if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) 
		{
		$taillemax = 2097152; //2Mo
		$extensionsValides = array('jpg','jpeg','gif','png');
		if ($_FILES['avatar']['size'] <= $taillemax) 
		{
			$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'),1));
				if(in_array($extensionUpload, $extensionsValides)) 
				{
					$chemin = "../img/membres/avatars_gestion/".$_SESSION['Id'].".".$extensionUpload;
					//On deplace le fichier que la personne a enregistré
					$resultat =move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
					if ($resultat) 
					{
							$updateAvatar = $db->prepare('UPDATE gestionnaire SET avatar = :avatar WHERE idGestionnaire =:idGestionnaire');
							$updateAvatar->execute(array(
								'avatar' => $_SESSION['Id'].'.'.$extensionUpload,
								'idGestionnaire' => $_SESSION['Id']
								));
							//echo "normalement c bon";
							
					}
					else
					{
						//echo "ERREUR durant l'importation du fichier";
						?>
					<script type="text/javascript">
    			var reponse = alert("Erreur durant l'importation du fichier");
					</script> <?php
					}
				}
				else
				{
					//echo "Votre photo doit être au format jpeg, jpg, gif ou png";
					?>
					<script type="text/javascript">
    			var reponse = alert("Votre photo doit être au format jpeg, jpg, gif ou png");
					</script> <?php
				}
		}
		else
		{
			//echo "Votre photo de profil ne doit pas dépasser 2 Mega Octets";
			?><script type="text/javascript">
    			var reponse = alert("Votre photo ne doit pas dépasser 2 Mega Octets");
					</script> <?php
		}
	}
	
}
else if ($_SESSION['Type'] == "administrateur") 
{
	//majAvatar("administrateur","idAdministrateur","membres/avatars_admin/");
	if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) 
		{
		$taillemax = 2097152; //2Mo
		$extensionsValides = array('jpg','jpeg','gif','png');
		if ($_FILES['avatar']['size'] <= $taillemax) 
		{
			$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'),1));
				if(in_array($extensionUpload, $extensionsValides)) 
				{
					$chemin = "../img/membres/avatars_admin/".$_SESSION['Id'].".".$extensionUpload;
					//On deplace le fichier que la personne a enregistré
					$resultat =move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
					if ($resultat) 
					{
							$updateAvatar = $db->prepare('UPDATE administrateur SET avatar = :avatar WHERE idAdministrateur =:idAdministrateur');
							$updateAvatar->execute(array(
								'avatar' => $_SESSION['Id'].'.'.$extensionUpload,
								'idAdministrateur' => $_SESSION['Id']
								));
							//echo "normalement c bon";
							
					}
					else
					{
						//echo "ERREUR durant l'importation du fichier";
						?>
					<script type="text/javascript">
    			var reponse = alert("Erreur durant l'importation du fichier");
					</script> <?php
					}
				}
				else
				{
					//echo "Votre photo doit être au format jpeg, jpg, gif ou png";
					?>
					<script type="text/javascript">
    			var reponse = alert("Votre photo doit être au format jpeg, jpg, gif ou png");
					</script> <?php
				}
		}
		else
		{
			//echo "Votre photo de profil ne doit pas dépasser 2 Mega Octets";
		?><script type="text/javascript">
    			var reponse = alert("Votre photo ne doit pas dépasser 2 Mega Octets");
					</script> <?php
		}
	}
}


?>

<?php

							//USER
	$recherchepp = $db -> prepare('SELECT avatar FROM utilisateur WHERE idUtilisateur=:idUtilisateur');
	$recherchepp->execute(array('idUtilisateur' => $_SESSION['Id']));
	$resultatpp = $recherchepp->fetch();
	//Je crée cette variable pour l'appeler dans le menu
	$_SESSION['Avatar']=$resultatpp['avatar'];
	
	//echo $resultatpp['avatar']; //nom du fichier

							//Gestionnaire
	$recherchepp2 = $db -> prepare('SELECT avatar FROM gestionnaire WHERE idGestionnaire=:idGestionnaire');
	$recherchepp2->execute(array('idGestionnaire' => $_SESSION['Id']));
	$resultatpp2 = $recherchepp2->fetch();
	//Je crée cette variable pour l'appeler dans le menu
	$_SESSION['AvatarGest']=$resultatpp2['avatar'];
	

							//Gestionnaire
	$recherchepp3 = $db -> prepare('SELECT avatar FROM administrateur WHERE idAdministrateur=:idAdministrateur');
	$recherchepp3->execute(array('idAdministrateur' => $_SESSION['Id']));
	$resultatpp3 = $recherchepp3->fetch();
	//Je crée cette variable pour l'appeler dans le menu
	$_SESSION['AvatarAdmin']=$resultatpp3['avatar'];
	
	?>

<html>
	<head>
		<meta charset="utf-8" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/Monprofil.css">
		<title>Res Novae - Tests Psychotechniques</title>
	</head>

	<body>
		<div id="bloc_page">

			<?php include("menuc.php"); ?>
			<ul class="breadcrumb">
 				<li><a href="Accueil.php">Accueil</a></li>
  				<li><a href="Connexion.php" onclick="deco()">Connexion</a></li>
  				<li><a href="Monprofil.php">Mon profil</a></li>	
			</ul>
<br><br>

<?php  if ($_SESSION['Type'] == "utilisateur") //USER
    	{   

    	
    			?>
    		
      		<div id="corps">
					<div id="container" >
		            	<div id="menu_vertical">
					            <div class="limenu" ><a href="" >Mon profil</a></div>
					            <div class="limenu"><a href="Mesresultats.php" >Mes résultats</a></div>
					            
					            <div class="limenu"><a href="" >Paramètres</a></div>
		            	</div>

		            	<div id="info_form">
			            	<div id="info_personnel">
			            		<h1 class="phrase">Bonjour <?php echo $_SESSION['Prenom']; ?>, voici vos informations personnelles</h1>
			            		<hr>

		            		<!-- C CETTE LIGNE QUI FAIT MERDER-->
	            				<div id="photo_profil">

	            					<?php if ($_SESSION['Avatar'] == NULL) {
	            						//SI Y A PAS d'AVATAR
	            						?> 
	            						<img src="../img/circulaire.png" width="170" height="150">
	            						<?php
	            					}
	            					else { //L'avatar existe 
	            						?>


	            				<img src="../img/membres/avatars/<?php echo $resultatpp['avatar'];?>" width="150" height="150">
		            				<?php echo $resultatpp['avatar']; 
		            			}
		            			?>

		            				<form method="post" enctype="multipart/form-data" >
	            						<input type="file" name="avatar"> 
	            						<div id="blocEnvoi"><a><input type="submit" name="avatarchange" value="Changer de photo de profil" onclick="changerpdp()"></a></div>
	            					</form>
		            			</div>
<script type="text/javascript">
    function changerpdp(){
        var result = confirm("Voulez-vous vraiment changer de photo de profil ?");
        if (result == true) {
            
        }
        else {
        event.preventDefault();	
        }
    }
</script>

	            			<table id="recapitulatif_info">
						    		<tr>
						    			<td class="nom">Nom :</td>
						    			<td class="nom"> <?php echo "  ".$_SESSION['Nom']; ?></td>
						    		</tr>
						    		<tr> <td><br></td></tr>
						    		<tr>
						    			<td class="prenom">Prénom :</td>
						    			<td class="prenom"> <?php echo "  ".$_SESSION['Prenom']; ?></td>
						    		</tr>
						    		<tr> <td><br></td></tr>
						    		<tr>
						    			<td class="indentifiant">Identifiant (Email) :</td>
						    			<td class="indentifiant"> <?php echo "  ".$_SESSION['Email']; ?></td>
						    		</tr>
						    		<tr> <td><br></td></tr>
						    		<tr>
						    			<td class="indentifiant">Type :</td><td class="indentifiant"> Utilisateur</td>
						    		</tr>
						    		<tr> <td><br></td></tr>
						    		<tr>

<?php $askTeamName = $db->prepare('SELECT nomEquipe FROM equipe NATURAL JOIN membres_equipe WHERE idUtilisateur= :idUtilisateur');
$askTeamName->execute(array('idUtilisateur' => $_SESSION['Id']));
$execution = $askTeamName->fetch();
$_SESSION['nomEquipe'] = $execution['nomEquipe'];

if ($execution==false) 
	{ ?>
		<td class="indentifiant">Equipe Esport :</td>
		<td class="indentifiant">Vous n'êtes pas encore membre d'une équipe</td>
<?php
}
else{

	?>					    			<td class="indentifiant">Equipe Esport :</td>
						    			<td class="indentifiant"> <?php echo "  ". $_SESSION['nomEquipe']; ?></td>
						    		</tr>
<?php }?>
						    	</table>
		            		</div>

	            			<fieldset>
	            				<legend>Voulez-vous changer de mot de Passe ?</legend>
	            				<form action="change_password.php" method="POST">
	            					<p class="info_mp">
	            						<label for='mdp_actuel'>Mot de passe actuel :</label>
		                            	<input type="password" id="mdp_actuel" name="mdp_actuel" class="form-control" required/>
	            					</p>
	            					<p class="info_mp">
	            						<label for='nouveau_mdp'>Nouveau mot de passe :</label>
		                            	<input type="password" id="nouveau_mdp" name="nouveau_mdp" class="form-control" required/>
	            					</p>
	            					<p class="info_mp">
	            						<label for='nouveau_mdp_retape'>Retapez le nouveau mot de passe :</label>
		                            	<input type="password" id="nouveau_mdp_retape" name="nouveau_mdp_retape" class="form-control" required/>
	            					</p>
		                            
		                            <div id="bouton_sauvegarde"><button type="submit" class="btn btn-soumettre">Sauvegarder</button></div>
		                        </form>
	            			</fieldset>	

	        				<div id="btn_supprime"><a href="Deconnexion.php" onclick="supprimer()" > Supprimer le compte</a></div>
		            	</div>
		            </div>
        		</div>
}
<?php
			
  		}								//GESTIONNAIRE
  		else if ($_SESSION['Type'] == "gestionnaire") 
  		{ 
  			
  		
  				?>
  			<div id="corps">
					<div id="container" >
		            	<div id="menu_vertical">
				            <div class="limenu"><a href="">Mon profil</a></div>
				            <div class="limenu"><a href="resultat_equipe.php" >Résultats de l'équipe</a></div>
				            
				            <div class="limenu"><a href="Rechercher_membre.php" >Rechercher un membre</a></div>
				            <div class="limenu"><a href="" >Paramètres</a></div>
	            	</div>

	            	<div id="info_form">
		            	<div id="info_personnel">
		            		<h1 class="p-5">Bonjour <?php echo $_SESSION['Prenom']; ?>, voici vos informations personnelles</h1>


							<div id="photo_profil">
								<?php if ($_SESSION['AvatarGest'] == NULL) {
	            						//SI Y A PAS d'AVATAR
	            						?> 
	            						<img src="../img/circulaire.png" width="170" height="150">
	            						<?php
	            					}
	            					else { //L'avatar existe 
	            						?>

	            				<img src="../img/membres/avatars_gestion/<?php echo $resultatpp2['avatar'];?>" width="150" height="150">
		            			<?php echo $resultatpp2['avatar']; 
		            		}?>
		            			<form method="post" enctype="multipart/form-data" >
	            					<input type="file" name="avatar"> 
	            					<div id="blocEnvoi"><a><input type="submit" name="avatarchange" value="Changer de photo de profil"></a></div>
	            				</form>
		            		</div>

	            			<table id="recapitulatif_info">
						    		<tr>
						    			<td class="nom">Nom :</td>
						    			<td class="nom"> <?php echo "  ".$_SESSION['Nom']; ?></td>
						    		</tr>
						    		<tr> <td><br></td></tr>
						    		<tr>
						    			<td class="prenom">Prénom :</td>
						    			<td class="prenom"> <?php echo "  ".$_SESSION['Prenom']; ?></td>
						    		</tr>
									<tr> <td><br></td></tr>
						    		<tr>
						    			<td class="indentifiant">Identifiant (Email) :</td>
						    			<td class="indentifiant"> <?php echo "  ".$_SESSION['Email']; ?></td>
						    		</tr>
						    		<tr> <td><br></td></tr>
						    		<tr>
						    			<td class="indentifiant">Type :</td><td class="indentifiant"> Gestionnaire</td>
						    		</tr>
						    		<tr> <td><br></td></tr>
						    		<tr>

<?php $askTeamName2 = $db->prepare('SELECT nomEquipe FROM equipe NATURAL JOIN membres_equipe WHERE idGestionnaire= :idGestionnaire');
$askTeamName2->execute(array('idGestionnaire' => $_SESSION['Id']));
$execution2 = $askTeamName2->fetch();
$_SESSION['nomEquipe2'] = $execution2['nomEquipe'];

if ($execution2==false) 
	{ ?>
		<td class="indentifiant">Equipe Esport :</td>
		<td class="indentifiant">Vous n'êtes pas encore membre d'une équipe</td>
<?php
}
else{

	?>					    			<td class="indentifiant">Equipe Esport :</td>
						    			<td class="indentifiant"> <?php echo "  ".$_SESSION['nomEquipe2']; ?></td>
						    		</tr>
<?php }?>
						    	</table>
		            		</div>

	            			<fieldset>
	            				<legend>Voulez-vous changer de mot de Passe ?</legend>
	            				<form action="change_password.php" method="POST">
	            					<p class="info_mp">
	            						<label for='mdp_actuel'>Mot de passe actuel :</label>
		                            	<input type="password" id="mdp_actuel" name="mdp_actuel" class="form-control" required/>
	            					</p>
	            					<p class="info_mp">
	            						<label for='nouveau_mdp'>Nouveau mot de passe :</label>
		                            	<input type="password" id="nouveau_mdp" name="nouveau_mdp" class="form-control" required/>
	            					</p>
	            					<p class="info_mp">
	            						<label for='nouveau_mdp_retape'>Retapez le nouveau mot de passe :</label>
		                            	<input type="password" id="nouveau_mdp_retape" name="nouveau_mdp_retape" class="form-control" required/>
	            					</p>
		                            
		                            <div id="bouton_sauvegarde"><button type="submit" class="btn btn-soumettre">Sauvegarder</button></div>
		                        </form>
	            			</fieldset>	

	        				<div id="btn_supprime"><a href="Deconnexion.php" onclick="supprimer()"> Supprimer le compte</a></div>
	        				<script type="text/javascript">
    function supprimer(){
        var result = confirm("Voulez-vous vraiment supprimer votre compte ?");
        if (result == true) {
            alert("Votre compte a été supprimé");
        }
        else {    
        alert("Votre compte n'a pas été supprimé");
        event.preventDefault();
        }
    }
</script>
		            	</div>
		            </div>
        		</div>
  <?php
		
        
  }
  else if ($_SESSION['Type'] == "administrateur") 
  		{ 
  	
  				?>
  			<div id="corps">
					<div id="container" >
		            	<div id="menu_vertical">
				            <div class="limenu"><a href="">Mon profil</a></div>
				           
				            
				            <div class="limenu"><a href="gestion_membres.php" >Gestion de membres</a></div>
				            <div class="limenu"><a href="" >Paramètres</a></div>
	            	</div>

	            	<div id="info_form">
		            	<div id="info_personnel">
		            		<h1 class="p-5">Bonjour <?php echo $_SESSION['Prenom']; ?>, voici vos informations personnelles</h1>


							<div id="photo_profil">
								<?php if ($_SESSION['AvatarAdmin'] == NULL) {
	            						//SI Y A PAS d'AVATAR
	            						?> 
	            						<img src="../img/circulaire.png" width="170" height="150">
	            						<?php
	            					}
	            					else { //L'avatar existe 
	            						?>

	            				<img src="../img/membres/avatars_admin/<?php echo $resultatpp3['avatar'] ;?>" width="150" height="150">
		            			<?php echo $resultatpp3['avatar']; 
		            		}?> 
		            			<form method="post" enctype="multipart/form-data" >
	            					<input type="file" name="avatar"> <br>
	            					<div id="blocEnvoi"><a><input type="submit" name="avatarchange" value="Changer de photo de profil"></a></div>
	            				</form>
		            		</div>

	            			<table id="recapitulatif_info">
						    		<tr>
						    			<td class="nom">Nom :</td>
						    			<td class="nom"> <?php echo "  ".$_SESSION['Nom']; ?></td>
						    		</tr>
						    		<tr> <td><br></td></tr>
						    		<tr>
						    			<td class="prenom">Prénom :</td>
						    			<td class="prenom"> <?php echo "  ".$_SESSION['Prenom']; ?></td>
						    		</tr>
						    		<tr> <td><br></td></tr>
						    		<tr>
						    			<td class="indentifiant">Identifiant (Email) :</td>
						    			<td class="indentifiant"> <?php echo "  ".$_SESSION['Email']; ?></td>
						    		</tr>
						    		<tr> <td><br></td></tr>
						    		<tr>
						    			<td class="indentifiant">Type :</td><td class="indentifiant"> Administrateur</td>
						    		</tr>
						    	</table>
		            		</div>

	            			<fieldset>
	            				<legend>Voulez-vous changer de mot de Passe ?</legend>
	            				<form action="change_password.php" method="POST">
	            					<p class="info_mp">
	            						<label for='mdp_actuel'>Mot de passe actuel :</label>
		                            	<input type="password" id="mdp_actuel" name="mdp_actuel" class="form-control" required/>
	            					</p>
	            					<p class="info_mp">
	            						<label for='nouveau_mdp'>Nouveau mot de passe :</label>
		                            	<input type="password" id="nouveau_mdp" name="nouveau_mdp" class="form-control" required/>
	            					</p>
	            					<p class="info_mp">
	            						<label for='nouveau_mdp_retape'>Retapez le nouveau mot de passe :</label>
		                            	<input type="password" id="nouveau_mdp_retape" name="nouveau_mdp_retape" class="form-control" required/>
	            					</p>
		                            
		                            <div id="bouton_sauvegarde"><button type="submit" class="btn btn-soumettre">Sauvegarder</button></div>
		                        </form>
	            			</fieldset>	

	        				<div id="btn_supprime"><a href="Deconnexion.php" onclick="supprimer()"> Supprimer le compte</a></div>
		            	</div>
		            </div>
        		</div>
  <?php
        
  }
  ?>
            <?php include("footerc.php"); ?>

		</div>
	</body>
</html>
<script type="text/javascript">
    function deco(){
        var result = confirm("Voulez-vous vraiment vous déconnecter?");
        if (result == true) {
            alert("Merci de votre visite");
        }
        else {    
        alert("Merci de rester avec nous");
        event.preventDefault();
        }
    }
</script>

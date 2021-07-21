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

	if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) 
		{
		$taillemax = 2097152; //2Mo
		$extensionsValides = array('jpg','jpeg','gif','png');
		if ($_FILES['avatar']['size'] <= $taillemax) 
		{
			$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'),1));
				if(in_array($extensionUpload, $extensionsValides)) 
				{
					$chemin = "../img/membres/avatars_gestion/".$_GET['id'].".".$extensionUpload;
					//On deplace le fichier que la personne a enregistré
					$resultat =move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
					if ($resultat) 
					{
							$updateAvatar = $db->prepare('UPDATE gestionnaire SET avatar = :avatar WHERE idGestionnaire =:idGestionnaire');
							$updateAvatar->execute(array(
								'avatar' => $_GET['id'].'.'.$extensionUpload,
								'idGestionnaire' => $_GET['id']
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
  				<li><a href="Monprofil.php">Mon profil</a></li>	
  				<li><a href="gestion_membres.php">Gestion de membres</a></li>
  				<li><a href="voirProfilGestionnaire.php">Consulter profil gestionnaire</a></li>
			</ul>
<br><br>


    	<?php 

		$requeteInfo = $db->prepare('SELECT Nom,Prenom,Email,Telephone,idGestionnaire,Sexe,avatar,Adresse FROM gestionnaire WHERE idGestionnaire= :idGestionnaire');
		$requeteInfo->execute(['idGestionnaire' => $_GET['id']]);
		$informations = $requeteInfo->fetch();
		?>
    		
      		<div id="corps">
					<div id="container" >
		            	<div id="menu_vertical">
					            <div class="limenu" ><a href="Monprofil.php" >Mon profil</a></div>
					            <div class="limenu"><a href="Mesresultats.php" >Mes résultats</a></div>
					            <div class="limenu"><a href="gestion_membres.php" >Gestion Membres</a></div>
					            <div class="limenu"><a href="Aide.php" >Paramètres</a></div>
		            	</div>

		            	<div id="info_form">
			            	<div id="info_personnel">
			            		<h1 class="phrase">Bonjour, voici les informations personnelles du compte</h1>
			            		<hr>

		            		
	            				<div id="photo_profil">
	            				<img src="../img/membres/avatars_gestion/<?php echo $informations['avatar'];?>" width="150" height="150">
		            				<?php echo $resultatpp['avatar']; 
		            			
		            			?>

		            				<form method="post" enctype="multipart/form-data" >
	            						<input type="file" name="avatar"> 
	            						<input type="submit" name="avatarchange" value="Changer de photo de profil">
	            					</form>
		            			</div>

	            			<table id="recapitulatif_info">
	            					<tr>
						    			<td class="indentifiant">Id :</td>
						    			<td class="indentifiant"> <?php echo "  ".$informations['idGestionnaire']; ?></td>
						    		</tr>
						    		<tr> <td><br></td></tr>
						    		<tr>
						    			<td class="indentifiant">Genre :</td>
						    			<td class="indentifiant"> <?php echo "  ".$informations['Sexe']; ?></td>
						    		</tr>
						    		<tr> <td><br></td></tr>
						    		<tr>
						    			<td class="nom">Nom :</td>
						    			<td class="nom"> <?php echo "  ".$informations['Nom']; ?></td>
						    		</tr>
						    		<tr> <td><br></td></tr>
						    		<tr>
						    			<td class="prenom">Prénom :</td>
						    			<td class="prenom"> <?php echo "  ".$informations['Prenom']; ?></td>
						    		</tr>
						    		<tr> <td><br></td></tr>
						    		<tr>
						    			<td class="indentifiant">Identifiant (Email) :</td>
						    			<td class="indentifiant"> <?php echo "  ".$informations['Email']; ?></td>
						    		</tr>
						    		<tr> <td><br></td></tr>
						    		<tr>
						    			<td class="indentifiant">Type :</td><td class="indentifiant"> Gestionnaire</td>
						    		</tr>
						    		<tr> <td><br></td></tr>
						    		<tr>
						    			<td class="indentifiant">Adresse :</td>
						    			<td class="indentifiant"> <?php echo "  ".$informations['Adresse']; ?></td>
						    		</tr>
						    		<tr> <td><br></td></tr>
						    		<tr>
						    			<td class="indentifiant">Telephone :</td>
						    			<td class="indentifiant"> <?php echo "  ".$informations['Telephone']; ?></td>
						    		</tr>
						    		<tr> <td><br></td></tr>
						    		<tr>

<?php $askTeamName2 = $db->prepare('SELECT nomEquipe FROM equipe NATURAL JOIN membres_equipe WHERE idGestionnaire= :idGestionnaire');
$askTeamName2->execute(array('idGestionnaire' => $_GET['id']));
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
						    			<td class="indentifiant"> <?php echo "  ". $_SESSION['nomEquipe2']; ?></td>
						    		</tr>
<?php }?>
						    	</table>
						    	<a href="gestion_membres.php">Retourner à la page de gestion de membres</a>
		            		</div>

	            			
		            	</div>
		            	
		            </div>
        		</div>

  
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

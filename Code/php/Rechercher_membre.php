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
include 'menuc.php';

$askTeamName = $db->prepare('SELECT nomEquipe FROM equipe WHERE idGestionnaire= :idGestionnaire');
$askTeamName->execute(array('idGestionnaire' => $_SESSION['Id']));
$execution = $askTeamName->fetch();
$_SESSION['nomEquipe'] = $execution['nomEquipe'];


?>


<html>
	<head>
		<meta charset="utf-8" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/Rechercher_membre.css">
		<title>Res Novae - Tests Psychotechniques</title>
	</head>

	<body>
		<div id="bloc_page">
			<ul class="breadcrumb">
 				<li><a href="Accueil.php">Accueil</a></li>
  				<li><a href="Monprofil.php">Mon profil</a></li>	
  				<li><a href="Rechercher_membre.php">Rechercher un membre</a></li>	
			</ul>
<br><br>
			<div id="corps">
				<div id="container" >
		           	<div id="menu_vertical">
			            <div class="limenu"><a href="Monprofil.php">Mon profil</a></div>
			            <div class="limenu"><a href="resultat_equipe.php" >Résultats de l'équipe</a></div>
			            
			            <div class="limenu"><a href="Rechercher_membre.php" >Rechercher un membre</a></div>
				        <div class="limenu"><a href="Aide.php" >Paramètres</a></div>
	            	</div>

	            	<div id="info_form">
		            	<div id="info_personnel">
		            		<?php 
		            		if ($execution==false) // LA TEAM EXISTE PAS
		           			{ ?>
		            		<h1 class="phrase">Bonjour <?php echo $_SESSION['Prenom']; ?>,</h1> 
		            		<h1>vous pouvez créer ici votre propre équipe et y ajouter des membres.</h1>	<?php }
		            		else 
		            		{?>
		            			<h1 class="phrase">Bonjour <?php echo $_SESSION['Prenom']; ?>,</h1> <h1>vous pouvez modifier votre nom d'équipe et y ajouter des membres.</h1>
		            	<?php  } ?>		
		            	</div>
		            	<fieldset>
		            		<?php if ($execution==false) // LA TEAM EXISTE PAS
		           			{ ?>
	            			<legend>Créer votre équipe</legend>
	           				<form action="creation_equipe.php" method="POST"> 					
	            				<p class="info_mp">
	            					<label for='creation_equipe'>Nom de l'équipe :</label>
		                           	<input type="text" id="nom_equipe" name="nom_equipe" class="form-control" required/>
	            				</p>		                            
		                        <input type="submit" name="formteam" id="formteam" value="Créer votre équipe"  style="font-size: 13pt; font-family: Zen Dots"  />
		                    </form>
		                    <?php }


		                    //LA TEAM EXISTE DEJA
		                    else 
		                    { 
		                    	$nomEquipeAChanger=$db->prepare("SELECT nomEquipe FROM equipe WHERE idGestionnaire =:idGestionnaire");
								$nomEquipeAChanger->execute(['idGestionnaire' => $_SESSION['Id']  ]);
								$changement =$nomEquipeAChanger->fetch();	
		                    	?>
		                    	<legend>Changer le nom votre équipe</legend>
	            				<form action="change_team_name.php" method="POST">
	            					
	            					<p class="nomEquipe" style="width:60%;">
	            						<label for='nom_equipe'>Nom de l'équipe actuel :</label><?php echo $changement['nomEquipe']; ?>  
	            								                            	
	            					</p>
	            					<p class="info_mp">
	            						<label for='nouveau_nom_equipe'>Nouveau Nom de l'équipe :</label> 
		                            	<input type="text" id="nouveau_nom" name="nouveau_nom" class="form-control" required/>
	            					</p>
	            					<br>
		                             <div id="blocEnvoi"><a><input type="submit" name="formteamName" id="formteamName" value="Renommer votre équipe"  style="font-size: 13pt; font-family: Zen Dots" /></a></div>
		                        </form>
		                        <?php
		                    }
		                    ?>
	            			</fieldset>	
	            			<br>
	            			<fieldset>
	            				
	            				<legend>Rechercher des membres</legend>
	            				
	            				<div class="box">
	            					
	            				<div id="formrecherche">
	            				<form name="Rechercher_membre" method="GET">
	            					
	            					
	            					<p class="info_mp">
	            					
	            						<input type="search" id="search-member" name="search-member" placeholder="Saisissez un nom ou prénom " class="form-control" style="font-size: 11pt; font-family: Zen Dots" required/>	
	            					</p>                
		                            <input type="submit" name="formSearch" id="formSearch" value="Rechercher"  style="font-size: 11pt; font-family: Zen Dots" />
		                        </form>
		                        
		                    	</div>
		                    	  </div>


		                    	<?php
//$serialNames = $db->query('SELECT Nom FROM utilisateur ORDER BY idUtilisateur DESC');
		    //On recupère l'ID
if (isset($_GET['search-member']) AND !empty($_GET['search-member'])) 
{
	$q = htmlspecialchars($_GET['search-member']);
	$serialNames2 = $db->prepare('SELECT Nom,Prenom,Email,Telephone FROM utilisateur WHERE Nom LIKE "%'.$q.'%" OR Prenom LIKE "%'.$q.'%" ORDER BY idUtilisateur DESC');
	$serialNames2->execute();
	$afficheNames = $serialNames2->fetchAll();

?>
<table><?php 
				if ($afficheNames==NULL) {
					?>
				<tr> 
					<td>Aucun résultat</td>

				</tr><?php
				}
				else { ?>
				<tr>					
					<td><p align="left" style="color: blue;">Nom</p></td>
					<td><p align="left" style="color: blue;">Prenom</p></td>
					<td><p align="left" style="color: blue;">Email</p></td>
					<td><p align="left" style="color: blue;">Telephone</p></td>
					
				</tr>
				<tr>
					
				</tr>
	<?php for ($i=0; $i <count($afficheNames) ; $i++) 
	{ ?>	
				<tr>
					<td align="left"><?php echo $afficheNames[$i][0]." "; ?></td>
					<td align="left"><?php echo $afficheNames[$i][1]." "; ?></td>
					<td align="left"><?php echo $afficheNames[$i][2]." "; ?></td>
					<td align="left"><?php echo $afficheNames[$i][3]." "; ?></td>
					
					
				</tr>
			<tr>
					
				</tr>
				<tr>
					
				</tr>
	<?php }
	}?>
	</table> <?php
}
else 
{
	echo "Aucun résultat pour : ".$q;
}
?>

<!--
	            					<?php /*while($a = $serialNames->fetch()) 
	            					{?>
	            						<li><?=$a['Nom,Prenom']?></li>
	            					<?}*/

?>
-->

		                  
	            			</fieldset>	
<br>
	            			<fieldset>
	            				<legend>Ajouter des membres</legend>
	            				<form action="ajouterMembre.php"method="POST">
	            					
	            					<p class="info_mp" >
	            						<label for='nouveau_membre'>Email de l'utilisateur à ajouter dans l'équipe :</label>
		                            	<input type="text" id="new_member" name="new_member" class="form-control" required/>
	            					</p>
	            					
		                            
		                            <div id="blocEnvoi"><a><input type="submit" name="formMemberAdd" id="formMemberAdd" value="Ajouter ce membre"  style="font-size: 13pt ; font-family: Zen Dots"  /></a></div>
		                        </form>
	            			</fieldset>	
<br>
	            			<fieldset>
	            				<legend>Supprimer des membres</legend>
	            				<form action="suppMembreEquipe.php" method="POST">
	            					
	            					<p class="info_mp">
	            						<label for='delete_membre'>Email de l'utilisateur à supprimer de l'équipe :</label>
		                            	<input type="text" id="delete_member" name="delete_member" class="form-control" required/>
	            					</p>
	            					
		                            <!--<div id="btn_supprime"><a href="suppMembreEquipe.php"> Supprimer le membre </a></div>-->
		                            <div id="blocEnvoi"><a><input type="submit" name="formMemberDelete" id="formMemberDelete" value="Supprimer ce membre"  style="font-size: 13pt ; font-family: Zen Dots"  /></a></div>
		                        </form>
	            			</fieldset>	

	        				      	<script type="text/javascript">			
 function supprimer(){
        var result = confirm("Voulez-vous vraiment supprimer le compte de votre équipe ?");
        if (result == true) {
            alert("Le compte a été supprimé");
        }
        else {    
        alert("Le compte n'a pas été supprimé");
        event.preventDefault();
        }
    }
</script>
		            	</div>
		            </div>
        		</div>
        		<?php include("footerc.php"); ?>

		</div>
	</body>
</html>


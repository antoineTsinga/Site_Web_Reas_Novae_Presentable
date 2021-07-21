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
  				<li><a href="gestion_membres.php">Gestion de membres</a></li>	
			</ul>
<br><br>
			<div id="corps">
				<div id="container" >
		           	<div id="menu_vertical">
			            <div class="limenu"><a href="Monprofil.php">Mon profil</a></div>
			            <div class="limenu"><a href="Tests_Psycho.php" >Messagerie</a></div>
			            <div class="limenu"><a href="gestion_membres.php" >Gestion de membres</a></div>
				        <div class="limenu"><a href="Aide.php" >Paramètres</a></div>
	            	</div>

	            	<div id="info_form">
		            	<div id="info_personnel">
		
		            		<h1 class="p-5">Bonjour <?php echo $_SESSION['Prenom']; ?>, </h1>  <h1>vous pouvez ici rechercher, ajouter et supprimer des membres.</h1>	
		            	</div>
		            
	            			<br>
	            			<fieldset>
	            				
	            				<legend>Rechercher des membres</legend>
	            				
	            				<div class="box">  <!-- Bloc de recherche classique -->
	            					<p>
  					 			
	            				<div id="formrecherche">
       		
	            				<form name="Rechercher_membre" method="POST">
            					
	            					<p class="info_mp">
	            					
	            						<input type="search" id="search-member" name="search-member" placeholder="Saisissez un nom ou prénom " class="form-control" style="font-size: 11pt; font-family: Zen Dots" required/>	
	            					</p>                
		                            <input type="submit" name="formSearch" id="formSearch" value="Rechercher"  style="font-size: 11pt; font-family: Zen Dots" />

		                            </div>

		                           	
		                        </div>

		                        
		                        <button id="togg1"  name="advancedSearch" value="Recherche avancée"  style="font-size: 11pt; font-family: Zen Dots">Recherche avancée</button>
		                        
		                        <!-- Fin bloc de recherche classique et début avancé -->
		                       

		                        <div id="d1">
						        
    
 						<br>

							<script>
								let togg1 = document.getElementById("togg1");
								let togg2 = document.getElementById("togg2");
								let d1 = document.getElementById("d1");
								let d2 = document.getElementById("d2");
								togg1.addEventListener("click", () => {
								  if(getComputedStyle(d1).display != "none"){
								    d1.style.display = "none";
								  } else {
								    d1.style.display = "block";
								  }
								})

								function togg(){
								  if(getComputedStyle(d2).display != "none"){
								    d2.style.display = "none";
								  } else {
								    d2.style.display = "block";
								  }
								};
								togg2.onclick = togg;
								 
							</script>


		                            <!-- Recherche par critère -->
		                              
                                Civilité : 
                                
                              <input type="radio" name="civilité" value="mademoiselle" id="mademoiselle" >
                              <label for="mademoiselle">Mlle</label>
    
                              <input type="radio" name="civilité" value="madame" id="madame">
                              <label for="madame">Mme</label>
                                    
                                    
                                    
                              <input type="radio" name="civilité" value="monsieur" id="monsieur" checked="">
                              <label for="monsieur">M.</label>
                                    
                                    
                                <p></p>

                            		
                                
                                    <label for="date_de_naissance">Date de naissance : </label>
                                    <input type="date" name="date_de_naissance" id="date_de_naissance"  />
                                
                            

                            
                               
                                    <label for="adresse">Adresse : </label>
                                    <input type="text" name="adresse" id="adresse"  />
                                
                           

                           
                                <br>
                                    <label for="code postal">Code postal : </label>
                                    <input type="number" name="code postal" id="code postal"  pattern="[0-9]{5}" />
                                
                            

                           
                               
                                    <label for="ville">Ville : </label>
                                    <input type="text" name="ville" id="ville"  />
                                
                            

                            <div> 
                                <p class="info_perso">
                                    <label for="pays">Pays : </label>
                                    <select name="pays" id="pays" >
                                       <optgroup label="Europe">
                                           <option value="france">France</option>
                                           <option value="espagne">Espagne</option>
                                           <option value="italie">Italie</option>
                                           <option value="royaume-uni">Royaume-Uni</option>
                                       </optgroup>
                                       <optgroup label="Amérique">
                                           <option value="canada">Canada</option>
                                           <option value="etats-unis">Etats-Unis</option>
                                       </optgroup>
                                       <optgroup label="Asie">
                                           <option value="chine">Chine</option>
                                           <option value="japon">Japon</option>
                                       </optgroup>
                                   </select>
                               </p>
                            </div>
                            <input type="submit" name="formSearch" id="formSearch" value="Rechercher"  style="font-size: 11pt; font-family: Zen Dots" />
                            <br>


		                        </form>



		                        <?php 
 
 
if(isset($_POST['search-member'])) 
{	
	if (!empty($_POST['search-member'])) {
		
	
	// CAS DE RECHERCHE AVANCE
	if (!empty($_POST['civilité'])) 
	{
		$Sexe = $_POST['civilité'];

		//echo $Sexe; "%'.$Sexe.'%"
									//UTILISATEUR
		$q11 = htmlspecialchars($_POST['search-member']);
		$serialNames2 = $db->prepare('SELECT Nom,Prenom,Email,Telephone,idUtilisateur,Sexe FROM utilisateur WHERE Sexe= :Sexe AND Nom LIKE "%'.$q11.'%" OR Prenom LIKE "%'.$q11.'%" ORDER BY idUtilisateur');
		$serialNames2->execute(array('Sexe' => $Sexe));
		$afficheNames = $serialNames2->fetchAll();

		/*echo $afficheNames[0][0];echo $afficheNames[0][1];echo $afficheNames[0][2];echo $afficheNames[0][3];echo $afficheNames[0][4];*/
		

									//Gestionnaires
		$q22 = htmlspecialchars($_POST['search-member']);
		$serialNamesGestion = $db->prepare('SELECT Nom,Prenom,Email,Telephone,idGestionnaire,Sexe FROM gestionnaire WHERE Sexe= :Sexe AND Nom LIKE "%'.$q22.'%" OR Prenom LIKE "%'.$q22.'%" ORDER BY idGestionnaire');
		$serialNamesGestion->execute(array('Sexe' => $Sexe));
		$afficheNamesGestion = $serialNamesGestion->fetchAll();

									//Administrateurs
		$q3 = htmlspecialchars($_POST['search-member']);
		$serialNamesAdmin = $db->prepare('SELECT Nom,Prenom,Email,Telephone,idAdministrateur,Sexe FROM administrateur WHERE Sexe= :Sexe AND Nom LIKE "%'.$q33.'%" OR Prenom LIKE "%'.$q33.'%" ORDER BY idAdministrateur');
		$serialNamesAdmin->execute(array('Sexe' => $Sexe));
		$afficheNamesAdmin = $serialNamesAdmin->fetchAll();

		
	}
}

	else {  //RECHERCHE SIMPLE 

	//Utilisateurs
	/*$q = htmlspecialchars($_POST['search-member']);
	$serialNames2 = $db->prepare('SELECT Nom,Prenom,Email,Telephone,idUtilisateur,Sexe FROM utilisateur WHERE Nom LIKE "%'.$q.'%" OR Prenom LIKE "%'.$q.'%" ORDER BY idUtilisateur');
	$serialNames2->execute();
	$afficheNames = $serialNames2->fetchAll();

//Gestionnaires
	$q2 = htmlspecialchars($_POST['search-member']);
	$serialNamesGestion = $db->prepare('SELECT Nom,Prenom,Email,Telephone,idGestionnaire,Sexe FROM gestionnaire WHERE Nom LIKE "%'.$q2.'%" OR Prenom LIKE "%'.$q2.'%" ORDER BY idGestionnaire');
	$serialNamesGestion->execute();
	$afficheNamesGestion = $serialNamesGestion->fetchAll();

//Administrateurs
	$q3 = htmlspecialchars($_POST['search-member']);
	$serialNamesAdmin = $db->prepare('SELECT Nom,Prenom,Email,Telephone,idAdministrateur,Sexe FROM administrateur WHERE Nom LIKE "%'.$q3.'%" OR Prenom LIKE "%'.$q3.'%" ORDER BY idAdministrateur');
	$serialNamesAdmin->execute();
	$afficheNamesAdmin = $serialNamesAdmin->fetchAll();

*/
	}

}

else 
{
	echo "Aucun résultat pour : ".$q;
}

?>
               
						    	</div>    	
<br>
	
		       <?php

				//AFFICHAGE TABLEAU
?>
				
<table>			
				<tr> <td></td><!--Espace--></tr>
				<tr> <td></td><!--Espace--></tr>
				<tr>
					<td><h4 style="color: green;">Utilisateurs</h4> </td>
				</tr>
				<tr> <td></td><!--Espace--></tr>
				<tr> <td></td><!--Espace--></tr>
				<?php 
				if ($afficheNames==NULL) {
					?>
				<tr> 
					<td>Aucun résultat</td>

				</tr><?php
				}
				else {
				?>

				<tr>					
					<td><p align="left" style="color: blue;">Nom</p></td>
					<td><p align="left" style="color: blue;">Prenom</p></td>
					<td><p align="left" style="color: blue;">Email</p></td>
					<td><p align="left" style="color: blue;">Telephone</p></td>
				</tr>

					<tr> <td></td><!--Espace--></tr>

	<?php for ($i=0; $i <count($afficheNames) ; $i++) 
	{ ?>	
				<tr>
					<td align="left"><?php echo $afficheNames[$i][0]." "; ?></td>
					<td align="left"><?php echo $afficheNames[$i][1]." "; ?></td>
					<td align="left"><?php echo $afficheNames[$i][2]." "; ?></td>
					<td align="left"><?php echo $afficheNames[$i][3]." "; ?></td>

					<td align="left"> <a href="voirProfil.php?id=<?=$afficheNames[$i][4]?>">Voir le profil</td>
					
				</tr>
				<tr> <td></td><!--Espace--></tr>

				<?php }
	}?>

				<tr> <td></td><!--Espace--></tr>
				<tr> <td></td><!--Espace--></tr>

				<!-- Gestionnaires -->

				<tr>
					<td><h4 style="color: green;">Gestionnaires</h4>  </td>
					
				</tr>
				<tr> <td></td><!--Espace--></tr>
				<tr> <td></td><!--Espace--></tr>

				<?php 


				if ($afficheNamesGestion==NULL) {
					?>
				<tr> 
					<td>Aucun résultat</td>

				</tr><?php
				}
				else {
				?>

				<tr>					
					<td><p align="left" style="color: blue;">Nom</p></td>
					<td><p align="left" style="color: blue;">Prenom</p></td>
					<td><p align="left" style="color: blue;">Email</p></td>
					<td><p align="left" style="color: blue;">Telephone</p></td>
				</tr>

				<tr> <td></td><!--Espace--></tr>
				<tr> <td></td><!--Espace--></tr>

	<?php for ($i=0; $i <count($afficheNamesGestion) ; $i++) 
	{ ?>
				<tr>
					
					<td align="left"><?php echo $afficheNamesGestion[$i][0]." "; ?></td>
					<td align="left"><?php echo $afficheNamesGestion[$i][1]." "; ?></td>
					<td align="left"><?php echo $afficheNamesGestion[$i][2]." "; ?></td>
					<td align="left"><?php echo $afficheNamesGestion[$i][3]." "; ?></td>
					<td align="left"> <a href="voirProfilGestionnaire.php?id=<?=$afficheNamesGestion[$i][4]?>">Voir le profil</td>	
				</tr>
				<tr> <td></td><!--Espace--></tr>
		<?php }
	}?>
		<!--Espace-->	<tr> <td></td></tr>  <tr> <td></td></tr>	<tr> <td></td></tr>
			
			<!-- Administrateurs -->
				<tr>
					<td><h4 style="color: green;">Administrateurs</h4>  </td>
				</tr>

		<!--Espace-->		<tr> <td></td></tr>   <tr> <td></td></tr>    <tr> <td></td></tr>
				<?php 
				if ($afficheNamesAdmin==NULL) {
					?>
				<tr> 
					<td>Aucun résultat</td>
				</tr><?php
				}
				else {
				?>
				<tr>					
					<td><p align="left" style="color: blue;">Nom</p></td>
					<td><p align="left" style="color: blue;">Prenom</p></td>
					<td><p align="left" style="color: blue;">Email</p></td>
					<td><p align="left" style="color: blue;">Telephone</p></td>
				</tr>

				<tr> <td></td><!--Espace--></tr>
				<tr> <td></td><!--Espace--></tr>

	<?php for ($i=0; $i <count($afficheNamesAdmin) ; $i++) 
	{ ?>
				<tr>			
					<td align="left"><?php echo $afficheNamesAdmin[$i][0]." "; ?></td>
					<td align="left"><?php echo $afficheNamesAdmin[$i][1]." "; ?></td>
					<td align="left"><?php echo $afficheNamesAdmin[$i][2]." "; ?></td>
					<td align="left"><?php echo $afficheNamesAdmin[$i][3]." "; ?></td>
					<td align="left"> <a href="voirProfilAdministrateur.php?id=<?=$afficheNamesAdmin[$i][4]?>">Voir le profil</td>	
				</tr>
				<tr> <td></td><!--Espace--></tr>
	<?php 
}
	/*print_r('SELECT Nom,Prenom,Email,Telephone,idAdministrateur,Sexe FROM administrateur WHERE Nom LIKE "%'.$q3.'%" OR Prenom LIKE "%'.$q3.'%" ORDER BY idAdministrateur');
	echo 'SELECT Nom,Prenom,Email,Telephone,idAdministrateur,Sexe FROM administrateur WHERE Nom LIKE "%'.$q3.'%" OR Prenom LIKE "%'.$q3.'%" ORDER BY idAdministrateur';

	*/
	}?>
	</table>          


					<!-- CAS DE RECHERCHE AVANCEE -->


	            			</fieldset>	
							<br>
	            			<fieldset>
	            				<legend>Inscrire des membres</legend>
	            				<form method="POST">
	            					
	            					<!--<p class="info_mp">
	            						<label for='nouveau_membre'>Email de l'utilisateur à ajouter :</label>
		                            	<input type="number" id="new_member" name="new_member" class="form-control" required/>
	            					</p>-->
	            						                            
		                            <div id="selectionPourInscription">
		                            	
		                            <!--<div id="btn_supprime"><a><input type="submit" name="formMemberAdd" id="formMemberAdd" value="Inscrire un utilisateur"  style="font-size: 13pt ; font-family: Zen Dots"  /></a>-->
		                            <div id="btn_supprime"><a href="Admin_inscrit_User.php" onclick="supprimer()"> Utilisateur</a>

		                            <!--<a><input type="submit" name="formMemberAdd" id="formMemberAdd" value="Inscrire un gestionnaire"  style="font-size: 13pt ; font-family: Zen Dots"  /></a>-->
		                            <a href="Admin_inscrit_Gestionnaire.php" onclick="supprimer()">Gestionnaire</a>
		                        	
		                        	<a href="Admin_inscrit_Admin.php" onclick="supprimer()"> Administrateur</a>
		                        	</div>
		                        </form>
	            			</fieldset>	
							<br>
	            			<fieldset>
	            				<legend>Supprimer des membres</legend>
	            				<form method="POST" action="suppMembreAdministrateur.php">
	            					
	            					<p class="info_mp" >
	            						<label for='delete_membre'>Email de l'utilisateur à supprimer :</label>
		                            	<input type="text" id="delete_member" name="delete_member" class="form-control" required/>
	            					</p>
	            					
	            					 <div id="blocEnvoi"><a><input type="submit" name="formMemberDelete" id="formMemberDelete" value="Supprimer ce membre"  style="font-size: 13pt ; font-family: Zen Dots" /></a></div>

		                            <!--<div id="btn_supprime"><a href="suppMembreAdministrateur.php" onclick="supprimer()"> Supprimer le membre</a></div>
		                            -->
		                        </form>
	            			</fieldset>	

	        	<!--<script type="text/javascript">			
 function supprimer(){
        var result = confirm("Voulez-vous vraiment supprimer le compte saisi ?");
        if (result == true) {
            alert("Le compte va être supprimé");
        }
        else {    
        alert("Le compte n'a pas été supprimé");
        event.preventDefault();
        }
    }
</script>
-->
							<fieldset>
	            				<legend>Bannir des membres</legend>
	            				<form action="Delete_Ban_utilisateur.php" method="POST">

	            					<p class="info_mp">
	            						<label for='ban_membre'>Adresse de l'utilisateur à bannir :</label>
		                            	<input type="text" id="ban_member" name="ban_member" class="form-control" required/>
	            					</p>

		                            <div id="blocEnvoi"><a><input type="submit" name="formMemberBan" id="formMemberBan" value="Bannir le membre" style="font-size: 13pt ; font-family: Zen Dots"  /></a></div>
		                        </form>
	            			</fieldset>
					</div>	
		            	</div>
        		</div>
        		<?php include("footerc.php"); ?>

		</div>
	</body>
</html>
<?php
if(isset($_POST['formsend'])) 
	{
		include'database.php';
		global $db;
		$Nom = $_POST['nom'];
	$Prenom = $_POST['prenom'];
	$Date_de_naissance = $_POST['date_de_naissance'];
	$Adresse = $_POST['adresse'];
	$Email = $_POST['email'];

	//$Sexe = 'homme';
	$Sexe = $_POST['civilité'];

	$Mdp = $_POST['mdp'];
	$MdpC = $_POST['cmdp'];
	$Telephone = $_POST['telephone'];
	$avatar= "circulaire.png";

			if ($Mdp == $MdpC) 	//Si le mot de passe est confirmé, on Hash
			{
				$Mdp = password_hash($Mdp, PASSWORD_DEFAULT);


				//Si l'email existe déja
				$c= $db->prepare('SELECT Email FROM utilisateur WHERE Email = :Email');
				//fetch recupère la ligne et met en tab
				//execute va execute la valeur du formulaire et de la variable, c lui qui verifie
				$c->execute(array('Email'=>$Email));
				$valideEmail = $c->fetch();

				$result =$c->rowCount();		
				if ($result==0) 
				{
					if (strpos($Email, "@")=== false) 
						{
							if (strpos($Email, ".") === false)  
						 {
							echo "EMAIL invalide";
						}
						echo "Email invalide";
					}
					else
					 {
					 	$ban = $db->prepare('SELECT Email FROM banissements WHERE Email = ?');
					 	$ban->execute(array($Email));
					 	$Email_ban = $ban->fetch();
					 	if ($Email_ban == null) {


					//$q = "INSERT INTO utilisateur(Nom,Prenom,Date_de_naissance,Sexe,Adresse,Email,Mot_de_passe,Telephone) VALUES ('$Nom','$Prenom','$Date_de_naissance','$Sexe','$Adresse','$Email','$Mdp','$Telephone')"; 
					 	$q = $db->prepare("INSERT INTO utilisateur(Nom,Prenom,Date_de_naissance,Sexe,Adresse,Email,Mot_de_passe,Telephone,avatar) VALUES (?,?,?,?,?,?,?,?,?)");

					
					
	/*Sexe, Date_de_naissance, Adresse, Email, Mot_de_passe, Telephone, Gestionnaire_identifiant) VALUES ('Tambi', 'Arya','Homme','2000-02-10','64 bd Barbusse','rey.kaneki@gmail.com', 'bg', '06 64 06 63 12', '0')";
*/
					//$db->exec($q);
					$q->execute(array($Nom,$Prenom,$Date_de_naissance,$Sexe,$Adresse,$Email,$Mdp,$Telephone,$avatar));
					/*echo "Votre compte a été crée ! Redirection en cours...";
					//sleep(5);
					//header("refresh:3;url=Accueil.php");
					header("Location:Connexion.php");
					die();
  					exit();*/
  					?>
			<script type="text/javascript">
    			var reponse = alert("Votre compte utilisateur a bien été crée!");
        		document.location.href="Connexion.php";
			</script>
			
  					<a href="Accueil.php">Accéder à l'Accueil</a> <br>
  					<a href="monprofil.php">Accéder à votre espace client</a> <br>
  					<a href="Tests_Psycho.php">Accéder à la page de Tests</a>
		<?php


						
					

					}
					else
					{
						//echo "Vous avez été bannis";
						?>
  					<script type="text/javascript">
    					var reponse = alert("Votre addresse Email est bannie de notre site");
					</script>
			<?php

					}
				}

				}
				else 
				{
					//echo "L'Email saisi est utilisé par un autre utilisateur, veuillez en saisir un autre";
					?>
					<script type="text/javascript">
    			var reponse = alert("L'Email saisi est utilisé par un autre utilisateur, veuillez en saisir un autre");
					</script> <?php
				}
			}	
			else
			{
				//echo "Les mots de passe saisis sont différents";
				?>
					<script type="text/javascript">
    			var reponse = alert("Les mots de passe saisis sont différents");
					</script> <?php
			}
		}
?>
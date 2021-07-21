<?php
if(isset($_POST['formsend']))   //USER
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

					 	$q = $db->prepare("INSERT INTO utilisateur(Nom,Prenom,Date_de_naissance,Sexe,Adresse,Email,Mot_de_passe,Telephone,avatar) VALUES (?,?,?,?,?,?,?,?,?)");

					$q->execute(array($Nom,$Prenom,$Date_de_naissance,$Sexe,$Adresse,$Email,$Mdp,$Telephone,$avatar));
					/*echo "Votre compte a été crée ! Redirection en cours...";
					//sleep(5);
					//header("refresh:3;url=Accueil.php");
					header("Location:Connexion.php");
					die();
  					exit();*/
?>
  					<script type="text/javascript">
    			var reponse = alert("Le compte utilisateur a bien été crée");
        		document.location.href="gestion_membres.php";
			</script>

  					
  					<a href="Accueil.php">Accéder à l'Accueil</a> <br>
  					<a href="monprofil.php">Accéder à votre espace client</a> <br>
  					<a href="Tests_Psycho.php">Accéder à la page de Tests</a>
		<?php


								

					}
					else
					{
						echo "Vous avez été bannis";
					}
				}

				}
				else 
				{
					echo "L'Email saisi est utilisé par un autre utilisateur, veuillez en saisir un autre";
				}
			}	
			else
			{
				echo "Les mots de passe saisis sont différents";
			}
		}
?>

<?php  							//Gestionnaire
if(isset($_POST['formsend2'])) 
	{
		include'database.php';
		global $db;
		$Nom = $_POST['nom'];
	$Prenom = $_POST['prenom'];
	//$Date_de_naissance = $_POST['date_de_naissance'];
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
		$c= $db->prepare('SELECT Email FROM gestionnaire WHERE Email = :Email');
		//fetch recupère la ligne et met en tab
		//execute va execute la valeur du formulaire et de la variable, c lui qui verifie
		$c->execute(array('Email'=>$Email));
		$valideEmail = $c->fetch();

		$result =$c->rowCount();		
		if ($result==0) 
		{
			try{
			//$q = $db->prepare("INSERT INTO gestionnaire(Nom,Prenom,Sexe,Email,Mot_de_passe,Telephone,Adresse) VALUES ('$Nom','$Prenom','$Sexe','$Email','$Mdp','$Telephone','$Adresse')"); 
	
		//$q->execute();


		$ban = $db->prepare('SELECT Email FROM banissements WHERE Email = ?');
					 	$ban->execute(array($Email));
					 	$Email_ban = $ban->fetch();
					 	if ($Email_ban == null) {		

$q = $db->prepare("INSERT INTO gestionnaire(Nom,Prenom,Sexe,Email,Mot_de_passe,Telephone,Adresse,avatar) VALUES (?,?,?,?,?,?,?,?)");
$q->execute(array($Nom,$Prenom,$Sexe,$Email,$Mdp,$Telephone,$Adresse,$avatar));

				$ban = $db->prepare('SELECT Email FROM banissements WHERE Email = ?');
					 	$ban->execute(array($Email));
					 	$Email_ban = $ban->fetch();
					 	if ($Email_ban == null) {

				$q = $db->prepare("INSERT INTO gestionnaire(Nom,Prenom,Sexe,Email,Mot_de_passe,Telephone,Adresse) VALUES (?,?,?,?,?,?,?)");
				$q->execute(array($Nom,$Prenom,$Sexe,$Email,$Mdp,$Telephone,$Adresse));

			/*echo "Votre compte a été crée ! Redirection en cours...";
			header("Location:Connexion.php");
					die();
  					exit();*/
?>
  			<script type="text/javascript">
    			var reponse = alert("Le compte gestionnaire a bien été crée");
        		document.location.href="gestion_membres.php";
			</script>
			<?php
  						}
  					}
  				else {
  					echo "Vous avez été bannis";
  				}
  			}
      catch(PDOException $e){
          echo "Erreur : " . $e->getMessage();
      }
				}
				else 
				{
					echo "L'Email saisi est utilisé par un autre utilisateur, veuillez en saisir un autre";
				}
			}
			else
			{
				echo "Les mots de passe saisis sont différents";
			}
		}	
		
?>


<?php 					//ADMIN
if(isset($_POST['formsend3'])) 
	{
		include'database.php';
		global $db;
		$Nom = $_POST['nom'];
	$Prenom = $_POST['prenom'];
	//$Date_de_naissance = $_POST['date_de_naissance'];
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
		$c= $db->prepare('SELECT Email FROM administrateur WHERE Email = :Email');
		//fetch recupère la ligne et met en tab
		//execute va execute la valeur du formulaire et de la variable, c lui qui verifie
		$c->execute(array('Email'=>$Email));
		$valideEmail = $c->fetch();

		$result =$c->rowCount();		
		if ($result==0) 
		{
			try{
								
		$q = $db->prepare("INSERT INTO administrateur(Adresse,Nom,Prenom,Sexe,Email,Mot_de_passe,Telephone,avatar) VALUES (?,?,?,?,?,?,?,?)");
		$q->execute(array($Adresse,$Nom,$Prenom,$Sexe,$Email,$Mdp,$Telephone,$avatar));


			/*echo "Votre compte a été crée ! Redirection en cours...";
			header("Location:Connexion.php");
					die();
  					exit();*/

  					?>
  			<script type="text/javascript">
    			var reponse = alert("Le compte utilisateur a bien été crée");
        		document.location.href="gestion_membres.php";
			</script>
			<?php
  				}
      	catch(PDOException $e){
         	 echo "Erreur : " . $e->getMessage();
     	 }
		}
				else 
				{
					echo "L'Email saisi est utilisé par un autre utilisateur, veuillez en saisir un autre";
				}
			}
			else
			{
				echo "Les mots de passe saisis sont différents";
			}
		}	
		
?>


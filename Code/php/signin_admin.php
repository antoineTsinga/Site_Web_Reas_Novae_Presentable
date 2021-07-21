<?php
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
				
		//	$q = $db->prepare("INSERT INTO administrateur(Adresse,Nom,Prenom,Sexe,Email,Mot_de_passe,Telephone) VALUES ('$Adresse','$Nom','$Prenom','$Sexe','$Email','$Mdp','$Telephone')"); 
		//$q->execute();		


		$ban = $db->prepare('SELECT Email FROM banissements WHERE Email = ?');
					 	$ban->execute(array($Email));
					 	$Email_ban = $ban->fetch();
					 	if ($Email_ban == null) {


		$q = $db->prepare("INSERT INTO administrateur(Adresse,Nom,Prenom,Sexe,Email,Mot_de_passe,Telephone,avatar) VALUES (?,?,?,?,?,?,?,?)");
$q->execute(array($Adresse,$Nom,$Prenom,$Sexe,$Email,$Mdp,$Telephone,$avatar));

			//echo "Votre compte a été crée ! Redirection en cours...";
			/*header("Location:Connexion.php");
					die();
  					exit();*/

?>
  					<script type="text/javascript">
    			var reponse = alert("Votre compte Administrateur a bien été crée!");
        		document.location.href="Connexion.php";
			</script>
<?php }
  				else { ?>
  					<script type="text/javascript">
    			var reponse = alert("Votre addresse Email est bannie de notre site");

        		
			</script>
			<?php
  				}
  			}
      catch(PDOException $e){
          echo "Erreur : " . $e->getMessage();
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
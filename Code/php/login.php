<?php
    session_start();
    
	if(isset($_POST['formlogin']))
	{
		include'database.php';
		global $db;
		$Email = $_POST['email'];
		$Mdp = $_POST['mdp'];
		$MdpAdmin = $_POST['mdp'];

									// UTILISATEUR	
		$q=$db->prepare("SELECT * FROM utilisateur  WHERE Email =:Email"); //?
		//La requete prepare n'a pas de valeur et execute le fetch pour le la valeur que je veux donc email
		//$q->execute(array($_POST['email']));
		$q->execute(['Email' => $Email]);
		$result =$q->fetch();
		//fetch convertit en array	

									// GESTIONNAIRE
		$q2=$db->prepare("SELECT * FROM gestionnaire WHERE Email =:Email");
		$q2->execute(['Email' => $Email]);
		$result2 =$q2->fetch();	

									// ADMIN
		$q3=$db->prepare("SELECT * FROM administrateur WHERE Email =:Email");
		$q3->execute(['Email' => $Email]);
		$result3 =$q3->fetch();	


// ATTENTION : execute RENVOIE TOUJOURS TRUE OU FALSE DONC PAS BESOIN DE COMPARER APRES IL LE FAIT DIRECT AVEC CE QUE TU VEUX
		if ($result == true)
		{
			//le compte existe parmi les utilisateurs
			if(password_verify($Mdp,$result['Mot_de_passe']))
			{
				//if(password_verify('$Mdp, $result['Mot_de_passe']))
				?> <a>"Mot de passe validé! Connexion en cours..."</a>;
				<?php
				$_SESSION['Email'] = $result['Email'];
				$_SESSION['connexion']=1;
				$_SESSION['Nom'] = $result['Nom'];
				$_SESSION['Prenom'] = $result['Prenom'];
				$_SESSION['Date_de_naissance'] = $result['Date_de_naissance'];
				$_SESSION['Id'] = $result['idUtilisateur'];
				$_SESSION['Email'] = $result['Email'];
				
				$_SESSION['Type'] = "utilisateur";
				header("Location:Monprofil.php");
				exit();
			}
			else 
			{
				?> <a>"Mot de passe refusé" </a>;
				<?php
				//echo $Mdp;
				//echo $result['Mot_de_passe'];
				$_SESSION['connexion']=0;
			}
		}
								//GESTIONNAIRE
		else if ($result2 == true) 
		{
			if(password_verify($Mdp,$result2['Mot_de_passe']))
			{
			?> <a>"Mot de passe validé! Connexion en cours..."</a>;
			<?php
				$_SESSION['Email'] = $result2['Email'];
				$_SESSION['connexion']=1;
				$_SESSION['Nom'] = $result2['Nom'];
				$_SESSION['Prenom'] = $result2['Prenom'];
				$_SESSION['Id'] = $result2['idGestionnaire'];
				$_SESSION['Email'] = $result2['Email'];
				//$_SESSION['Avatar'] = "Avatar";
				$_SESSION['Team'] = 0;
				$_SESSION['Type'] = "gestionnaire";
				
				header("Location:Monprofil.php");
				exit();
			}
			else 
			{
				echo "Mot de passe refusé";
			}
		}				//Admin

		else if ($result3 == true) 
		{
			//if($MdpAdmin == $result3['Mot_de_passe'])
			if(password_verify($Mdp,$result3['Mot_de_passe']))
			{
			?> <a>"Mot de passe validé! Connexion en cours..."</a>;
			<?php
				$_SESSION['Email'] = $result3['Email'];
				$_SESSION['connexion']=1;
				$_SESSION['Nom'] = $result3['Nom'];
				$_SESSION['Prenom'] = $result3['Prenom'];
				$_SESSION['Id'] = $result3['idAdministrateur'];
				$_SESSION['Email'] = $result3['Email'];
				//$_SESSION['Avatar'] = "Avatar";

				$_SESSION['Type'] = "administrateur";
				
				header("Location:Monprofil.php");
				exit();
			}
			else if ($MdpAdmin == $result3['Mot_de_passe']) 
			{
			?> <a>"Mot de passe validé! Connexion en cours..."</a>;
			<?php
				$_SESSION['Email'] = $result3['Email'];
				$_SESSION['connexion']=1;
				$_SESSION['Nom'] = $result3['Nom'];
				$_SESSION['Prenom'] = $result3['Prenom'];
				$_SESSION['Id'] = $result3['idAdministrateur'];
				$_SESSION['Email'] = $result3['Email'];
				//$_SESSION['Avatar'] = "Avatar";

				$_SESSION['Type'] = "administrateur";
				
				header("Location:Monprofil.php");
				exit();
			}
			else 
			{
				echo "Mot de passe refusé";
			}
		}
		else 
		{
			//le compte existe pas
			echo "Aucun de nos comptes n'est associé à l'adresse " .$Email. "Vérifiez l'addresse. ";
			$_SESSION['connexion']=0;
		}
  }

?>

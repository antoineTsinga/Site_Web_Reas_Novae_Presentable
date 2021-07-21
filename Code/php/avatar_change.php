<?php
try
	{
		if (isset($_FILES['Avatar']) AND !empty($_FILES['Avatar']['Nom'])) 
		{
	
		$taillemax = 2097152;
		$extensionsValides = array('jpg','jpeg','gif','png');
		if ($_FILES['Avatar']['size'] <= $taillemax) 
		{
			$extensionUpload = strtolower(substr(strrchr($_FILES['Avatar']['Nom'], '.'),1);
				if (in_array($extensionUpload, $extensionsValides)) 
				{
					$chemin = "../img/membres/avatars".$_SESSION['Id'].".".$extensionUpload;
					//On deplace le fichier que la personne a enregistré
					$deplacement =move_uploaded_file($_FILES['Avatar']['tmp_name'], $chemin);
					if ($deplacement) 
					{
						try {
							$updateAvatar = $db->prepare('UPDATE utilisateur SET Avatar = :Avatar WHERE idUtilisateur =:idUtilisateur');
							$updateAvatar->execute(array(
								'Avatar' => $_SESSION['Id'].".".$extensionUpload,
								'idUtilisateur' => $_SESSION['Id']
								));
							}
							catch(PDOException $e)
    						{
         					echo "Erreur : " . $e->getMessage();
    						}
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
catch(PDOException $e)
{
         echo "Erreur : " . $e->getMessage();
}

?>
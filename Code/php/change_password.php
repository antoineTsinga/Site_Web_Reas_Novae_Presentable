<?php   
    // Démarrage de la session 
    session_start();
    // Include de la base de données
    require_once 'database.php';


    // Si la session n'existe pas 
    if(!isset($_SESSION['Id']))
    {
        header('Location:Connexion.php');
        die();
    }


    // Si les variables existent 
    if(!empty($_POST['mdp_actuel']) && !empty($_POST['nouveau_mdp']) && !empty($_POST['nouveau_mdp_retape'])){
        // XSS 
        $mdp_actuel = htmlspecialchars($_POST['mdp_actuel']);
        $nouveau_mdp = htmlspecialchars($_POST['nouveau_mdp']);
        $nouveau_mdp_retape = htmlspecialchars($_POST['nouveau_mdp_retape']);


        $check_password  = $db->prepare('SELECT Mot_de_passe FROM utilisateur WHERE Email = :Email');
        $check_password->execute(['Email' => $_SESSION['Email']]);
        
        $data_password = $check_password->fetch();

        if(password_verify($mdp_actuel, $data_password['Mot_de_passe']))
        {
            if($nouveau_mdp == $nouveau_mdp_retape){

                $nouveau_mdp = password_hash($nouveau_mdp, PASSWORD_DEFAULT);
                $update = $db->prepare('UPDATE utilisateur SET Mot_de_passe = :Mot_de_passe WHERE Email = :Email');
                $update->execute(['Mot_de_passe' => $nouveau_mdp, 'Email' => $_SESSION['Email']]);
                header('Location: Connexion.php?err=success_password');
                die();
            }
        }
        else{
            echo $mdp_actuel;
        }
    }
?> 



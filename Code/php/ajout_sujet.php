<?php
    // Démarrage de la session
    session_start();
    // Include de la base de données


    // Si la session n'existe pas
    if(!isset($_SESSION['Id']))
    {
        header('Location:Connexion.php');
        die();
    }
    else{
        include'database.php';
		global $db;
        // Si les variables existent
        if(isset($_POST['sujet']) AND isset($_POST['question'])){
            $Titre_sujet = nl2br(htmlspecialchars($_POST['sujet']));
            $Corps = nl2br(htmlspecialchars($_POST['question']));
            $Id = $_SESSION['Id'];
            $Date = date("Y-m-d");
            $Heure = date("H:i:s");
            $Sujet = $db->prepare("INSERT INTO sujet(Titre_sujet, Corps, Date, Heure, Utilisateur_idUtilisateur) VALUES (?,?,?,?,?)");
            $Sujet ->execute(array($Titre_sujet, $Corps, $Date, $Heure, $Id));
            $id = $db->prepare("SELECT idSujet FROM sujet WHERE Utilisateur_idUtilisateur = ? and Heure = ?");
            $id->execute(array($Id, $Heure));
            $id = $id->fetch();
            $idSujet = $id['idSujet'];
            header("Location: Forum.php?idSujet=$idSujet ");

            die();
        }
    }
?>
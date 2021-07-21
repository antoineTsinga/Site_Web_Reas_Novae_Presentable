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
        if(isset($_POST['reponse']) AND isset($_POST['question']) AND isset($_POST['type'])) {
            $Reponse = nl2br(htmlspecialchars($_POST['reponse']));
            $Question = nl2br(htmlspecialchars($_POST['question']));
            $Type = nl2br(htmlspecialchars($_POST['type']));
            $Sujet = $db->prepare("INSERT INTO faq(Question, Reponse, Type_question) VALUES (?,?,?)");
            $Sujet ->execute(array($Question, $Reponse,$Type));
            header("Location: faq.php");

            die();
        }}
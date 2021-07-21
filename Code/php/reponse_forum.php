<?php
    // Démarrage de la session
    session_start();
    // Include de la base de données


    // Si la session n'existe pas
        include'database.php';
		global $db;
        // Si les variables existent
        if(isset($_GET['idSujet'])) {
            $idSujet = (int)$_GET['idSujet'];
            $req = $db->query("SELECT idSujet FROM sujet WHERE idSujet = $idSujet");
            $sujet = $req->fetch();
            if (!empty($sujet)) {
                if (isset($_POST['reponse']) AND isset($_POST['formsend'])  AND $_SESSION['Type'] == 'utilisateur') {
                    $texte = nl2br(htmlspecialchars($_POST['reponse']));
                    $Id = $_SESSION['Id'];
                    $date_et_heure = date("Y-m-d H:i:s");

                    if ( isset($_GET['id_message'])){
                        $reponse_idmessage = (int) $_GET['id_message'];
                        $Sujet = $db->prepare("INSERT INTO reponse (texte, date_et_heure, Sujet_idSujet, Utilisateur_idUtilisateur, reponse_idmessage ) VALUES (?,?,?,?,?)");
                        $Sujet->execute(array($texte, $date_et_heure, $idSujet, $Id, $reponse_idmessage));

                    }
                    else{
                        $Sujet = $db->prepare("INSERT INTO reponse (texte, date_et_heure, Sujet_idSujet, Utilisateur_idUtilisateur ) VALUES (?,?,?,?)");
                        $Sujet->execute(array($texte, $date_et_heure, $idSujet, $Id));
                    }
                    header("Location: page_du_sujet.php?idSujet=$idSujet");
                    die();
                } else {
                    echo "<h1>ERREUR 404: PAGE NON TROUVEE :(</h1>";
                }
            } else {
                echo "<h1>ERREUR 404: PAGE WEB TROUVEE :(</h1>";
            }

        }else{
            echo "<h1>ERREUR 404: PAGE WEB TROUVEE :(</h1>";
        }

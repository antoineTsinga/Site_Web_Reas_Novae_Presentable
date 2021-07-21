<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/page_du_sujet.css">
		<title>Res Novae - Tests Psychotechniques</title>
	</head>

	<body>
		<div id="bloc_page">
            <?php
                if(isset($_SESSION['Id'])){
                     include'menuc.php';
                }
                else{
                    header('Location:Connexion.php');
                die();
                }

            ?>

            <div id="corps">
			    <div id="container">
                    <div id="bloc_createur_sujet">
                        <?php
                        include 'database.php';
                        global $db;
                        if(isset($_GET['idSujet'])){
                            $idSujet = $_GET['idSujet'];
                            $req = $db -> prepare('SELECT idUtilisateur, Nom, Prenom, avatar, Titre_sujet, Corps, Date, Heure FROM sujet INNER JOIN utilisateur ON (sujet.Utilisateur_idUtilisateur = utilisateur.idUtilisateur) WHERE idSujet = ?');
                            $req -> execute(array($idSujet));
                            $createur = $req -> fetch();
                        }
                        ?>
                        <div class="tete">
                            <img src="../img/membres/avatars/<?php echo $createur['avatar'];?>" width="80" height="80">
                            <div class="info_perso">
                                <p><?php echo $createur['Prenom'].' '.$createur['Nom'];?></p>
                                <p>publié le <?php echo $createur['Date'].' à '.$createur['Heure'];?></p>
                            </div>
                        </div>
                        <div class="texte">
                            <div class="titre"><p><h1><?php echo $createur['Titre_sujet'];?></h1></p></div>
                            <div class="corps"><p><?php echo $createur['Corps'];?></p></div>
                            <?php $req->closeCursor();?>
                        </div>
                    </div>

                        <?php
                        include 'database.php';
                        global $db;
                        if(isset($_GET['idSujet'])){
                            $idSujet = $_GET['idSujet'];
                            $req = $db -> prepare("SELECT Nom, Prenom, avatar,reponse1.idmessage, reponse1.texte as message, reponse2.texte as message_repondu,reponse2.idmessage AS idmessage_repondu, DATE_FORMAT(reponse1.date_et_heure, 'publié le %d/%m/%Y à %Hh%imin%ss') AS date_et_heure FROM ((sujet INNER JOIN reponse AS reponse1 ON (sujet.idSujet= reponse1.Sujet_idsujet)) LEFT OUTER JOIN utilisateur ON (reponse1.Utilisateur_idUtilisateur = utilisateur.idUtilisateur)) LEFT OUTER JOIN reponse AS reponse2 ON (reponse1.reponse_idmessage = reponse2.idmessage) WHERE idSujet = ? ORDER BY idmessage");
                            $req -> execute(array($idSujet));
                            $id_lien = 1;
                            while ($participant = $req -> fetch()){

                                ?>
                                <div id="bloc_participant">
                                    <hr>
                                    <div class="tete">
                                        <div class="image"> <img src="../img/membres/avatars/<?php echo $participant['avatar'];?>" width="80" height="80"></div>
                                        <div class="info_perso">
                                            <p><?php echo $participant['Prenom'].' '.$participant['Nom'];?></p>
                                            <p><?php echo $participant['date_et_heure'];?></p>
                                        </div>
                                        <div class="bloc_reponse">
                                            <a class="lien_reponse" id="<?php echo $id_lien;?>" href=#section_reponse onclick="rep(<?php echo $id_lien;?>,<?php echo $participant['idmessage'];?>,<?php echo $_GET['idSujet'];?>)" >répondre </a>
                                        </div>
                                    </div>
                                    <div class="texte">
                                        <p id="message"><?php echo $participant['message'];?></p>
                                        <?php
                                        if (!empty($participant['idmessage_repondu'])){
                                            $idmessage_repondu = $participant['idmessage_repondu'];
                                            $re = $db -> prepare("SELECT Nom, Prenom FROM utilisateur INNER JOIN reponse ON (utilisateur.idUtilisateur = reponse.Utilisateur_idUtilisateur) WHERE idmessage = ?");
                                            $re -> execute(array($idmessage_repondu));
                                            $destinataire = $re -> fetch();
                                            ?>
                                            <div id="message_repondu">
                                                <p style="font-size: small ">De : <?php echo $destinataire['Nom'];?> <?php echo $destinataire['Prenom'];?></p>
                                                <p ><?php echo $participant['message_repondu'];?></p>
                                            </div>

                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <?php
                                $id_lien++;
                            }
                            $req->closeCursor();

                        }
                        if ($_SESSION['Type']==='utilisateur'){
                                ?>
                            <div class="reponse" id="section_reponse">
                                <div id="repac_message_rep">
                                    <p id="tete_rep"></p>
                                    <p id="texte_rep"></p>
                                </div>
                                <form class="zone_saisie" method="post" action="reponse_forum.php?idSujet=<?php echo $_GET['idSujet'];?>">
                                    <div id="message">
                                        <p>
                                            <label for="reponse">Reponse :</label>
                                            <textarea name="reponse" id="reponse" rows="20" cols="80" placeholder="" required ></textarea>
                                        </p>
                                    </div>
                                    <div class="envoi">
                                        <input type="submit" name="formsend" id="formsend" value="Envoyer" >
                                    </div>
                                </form>
                            </div>

                         <?php
                            }
                        ?>

                    <script src="../js/page_du_sujet.js"></script>
                </div>
            </div>

            <?php
                include'footer.php';
            ?>
		</div>
	</body>
</html>

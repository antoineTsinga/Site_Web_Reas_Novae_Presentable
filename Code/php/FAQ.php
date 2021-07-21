<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/FAQ.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">

        <title>Res Novae - Tests Psychotechniques</title>
    </head>

    <body>
        
        <div id="bloc_page">
            <?php
                if(isset($_SESSION['Id'])){
                     include'menuc.php';
                }
                else{
                    include'menu.php';
                }

            ?>            
<ul class="breadcrumb">
                <li><a href="Accueil.php">Accueil</a></li>
                <li><a href="FAQ.php">FAQ</a></li> 
            </ul>
<br><br>
            <div id="corps">


                <div id="container">
                    <div id="description">
                        <h1>Foire aux Questions</h1>
                        <hr>
                          <button class="bouton_question"><strong>Questions Générales</strong></button>
                            <div class="panel">
                                <?php
                                    include 'database.php';
                                    global $db;
                                    $req = $db -> query("SELECT Question, Reponse FROM faq WHERE Type_question LIKE 'general'");
                                    while($question_reponse = $req -> fetch()){
                                        echo "<div align=\"justify\" class=\"box\"><span class=\"question\">".$question_reponse['Question']."</span><p>".$question_reponse['Reponse']."</p></div>";
                                    }
                                    $req->closeCursor();
                                ?>
                            </div>
                              <br>
                              <button class="bouton_question"><strong>Questions : Joueur</strong></button>
                            <div class="panel">
                                <?php
                                    include 'database.php';
                                    global $db;
                                    $req = $db -> query("SELECT Question, Reponse FROM faq WHERE Type_question LIKE 'joueur'");
                                    while($question_reponse = $req -> fetch()){
                                        echo "<div align=\"justify\" class=\"box\"><span class=\"question\">".$question_reponse['Question']."</span><p>".$question_reponse['Reponse']."</p></div>";
                                    }
                                    $req->closeCursor();
                                ?>
                            </div>
                              <br>
                               <button class="bouton_question"><strong>Questions : Gestionnaire</strong></button>
                            <div class="panel">
                                <?php
                                    include 'database.php';
                                    global $db;
                                    $req = $db -> query("SELECT Question, Reponse FROM faq WHERE Type_question LIKE 'gestionnaire'");
                                    while($question_reponse = $req -> fetch()){
                                        echo "<div align=\"justify\" class=\"box\"><span class=\"question\">".$question_reponse['Question']."</span><p>".$question_reponse['Reponse']."</p></div>";
                                    }
                                    $req->closeCursor();
                                ?>
                            </div>
                            <p>Si vous avez d'autres questions, n'hésitez pas à nous contacter via la rubrique <a href="Contact.php">Contact</a>.</p>
                            <?php
                                if(isset($_SESSION['Type']) AND $_SESSION['Type'] == 'administrateur'){
                                   ?>
                                    <button class="bouton_question" id="bouton_ajout"><strong>Ajouter une question</strong></button>
                                    <div class="panel">
                                            <form class="zone_saisie" method="post" action="ajout_faq.php">
                                                <div id="message">
                                                    <p>
                                                        <label for="question" >Question :</label>
                                                        <input type="text" name="question" id="question" required />
                                                    </p>
                                                    <p>
                                                        <label for="reponse">Reponse :</label>
                                                        <textarea name="reponse" id="reponse" rows="20" cols="80" placeholder="" ></textarea>
                                                    </p>
                                                </div>
                                                <div id="type_question">
                                                    <p>
                                                        <input type="radio" name="type" value="general" id="general" >
                                                        <label for="general">General</label>
                                                    </p>

                                                    <p>
                                                        <input type="radio" name="type" value="joueur" id="joueur">
                                                        <label for="joueur">Joueur</label>
                                                    </p>

                                                    <p>
                                                        <input type="radio" name="type" value="gestionnaire" id="gestionnaire" style="visibility:hidden;">
                                                        <label for="gestionnaire">Gestionnaire</label>
                                                    </p>

                                                </div>
                                                <div class="envoi">
                                                    <input type="submit" name="formsend" id="formsend" value="Envoyer" />
                                                </div>
                                            </form>
                                    </div >
                            <?php
                                }
                            ?>
                    </div>
                <script src=../js/FAQ.js></script>
            </div>
        </div>
        <?php
                if(isset($_SESSION['Id'])){
                     include'footerc.php';
                }
                else{
                    include'footer.php';
                }

            ?>
    </body>
</html>
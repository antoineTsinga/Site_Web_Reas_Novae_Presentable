<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/Inscription.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
		<title>Res Novae - Tests Psychotechniques</title>
	</head>

	<body>
		<div id="bloc_page">
            <?php include("menu.php"); ?>

<ul class="breadcrumb">
                <li><a href="Accueil.php">Accueil</a></li>
                <li><a href="Connexion.php">Se connecter</a></li>
                <li><a href="selection_gestio_user.php">Type d'utilisateur</a></li>
                <li><a href="Inscription.php">S'inscrire</a></li>
            </ul>
            <br><br>
            <section>
            	
                <form name="myForm" method="post" onsubmit="return validateForm()">
                	<script>    function validateForm() {
                                            var x = document.forms["myForm"]["mdp"].value;
                                            var y = document.forms["myForm"]["cmdp"].value;
                                            if (x != y) {
                                                alert("Les deux mots de passe sont différents");
                                                document.myForm.mdp.focus();
                                            return false;
                                                        }
                                        }
                            </script>
                    <br/>
                    <h1>Formulaire d'inscription</h1><br/>
                    <fieldset>
                        <div id = "champ_info_perso">
                            <div class="info_perso" id="box" > 
                                <p> 
                                    Civilité : 
                                </p>

                                <div id="case_civilite">
                                    <p>
                                        <input type="radio" name="civilité" value="mademoiselle" id="mademoiselle" >
                                        <label for="mademoiselle">Mlle</label>
                                    </p>
                                    
                                    <p>
                                        <input type="radio" name="civilité" value="madame" id="madame">
                                        <label for="madame">Mme</label>
                                    </p>
                                    
                                    <p>
                                        <input type="radio" name="civilité" value="monsieur" id="monsieur" checked="">
                                        <label for="monsieur">M.</label>
                                    </p>
                                    
                                </div> 
                            </div>
                            <div>
                                <p class="info_perso">
                                    <label for="nom">Nom : </label>
                                    <input type="text" name="nom" id="nom" required />
                                </p>
                            </div>
                            
                            <div> 
                                <p class="info_perso">
                                    <label for="prenom">Prénom : </label>
                                    <input type="text" name="prenom" id="prenom" required />
                                </p>
                            </div>

                            <div> 
                                <p class="info_perso">
                                    <label for="date_de_naissance">Date de naissance : </label>
                                    <input type="date" name="date_de_naissance" id="date_de_naissance" required />
                                </p>
                            </div>

                            <div> 
                                <p class="info_perso">
                                    <label for="adresse">Adresse : </label>
                                    <input type="text" name="adresse" id="adresse" required />
                                </p> 
                            </div>

                            <div> 
                                <p class="info_perso">
                                    <label for="code postal">Code postal : </label>
                                    <input type="number" name="code postal" id="code postal" required pattern="[0-9]{5}" />
                                </p>
                            </div>

                            <div> 
                                <p class="info_perso">
                                    <label for="ville">Ville : </label>
                                    <input type="text" name="ville" id="ville" required />
                                </p>
                            </div>

                            <div> 
                                <p class="info_perso">
                                    <label for="pays">Pays : </label>
                                    <select name="pays" id="pays" required>
                                       <optgroup label="Europe">
                                           <option value="france">France</option>
                                           <option value="espagne">Espagne</option>
                                           <option value="italie">Italie</option>
                                           <option value="royaume-uni">Royaume-Uni</option>
                                       </optgroup>
                                       <optgroup label="Amérique">
                                           <option value="canada">Canada</option>
                                           <option value="etats-unis">Etats-Unis</option>
                                       </optgroup>
                                       <optgroup label="Asie">
                                           <option value="chine">Chine</option>
                                           <option value="japon">Japon</option>
                                       </optgroup>
                                   </select>
                               </p>
                            </div>

                            <div> 
                                <p class="info_perso">
                                <label for="email">Adresse e-mail : </label>
                                <input type="email" name="email" id="email" required /></p>
                            </div>
                            
                            <div> 
                                <p class="info_perso">
                                    <label for="telephone">Téléphone : </label>
                                    <input type="tel" name="telephone" id="telephone" required />
                                </p>
                            </div>

                            <div> 
                                <p class="info_perso">
                                    <label for="password">Choisissez un mot de passe : </label>
                                    <input type="password" name="mdp" id="mdp" required> 
                                </p>
                            </div>

                            <div> 
                                <p class="info_perso">
                                    <label for="password">Confirmer votre mot de passe : </label>
                                    <input type="password" name="cmdp" id="cmdp" required >
                                </p>
                            </div>
                            

                        </div>
                    </fieldset><br/>

                    <div id="bas_form"> 
                            <div>
                                <input type="checkbox" name="conditions" id="conditions" required>
                                <label for="conditions">J'accepte les conditions générales d'utilisation et la charte de confidentialité du site (<a href="../img/Conditions.pdf">En savoir plus</a>).</label>
                            </div>
                            
                            <input type="submit" name="formsend" id="formsend" value="Envoyer le formulaire"  style="font-size: 11pt" />
                    </div>
                </form>

                <?php include'signin.php'?>
            </section>
            <br/>
            <?php include("footer.php"); ?>
        </div>
    </body>
</html>


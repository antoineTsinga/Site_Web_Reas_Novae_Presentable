<header>
	<div id="titre_principal">
        <div id="logo">
            <img src="../img/logo.png" alt="Logo de Res Novae" />    
        </div>
        
    </div>
    
    <nav>
        <ul>
            <li><a href="Accueil.php">Accueil</a></li>
            <li><a href="#" >Mon compte</a>
            <ul>
                <li><a href="Monprofil.php">Mon profil</a></li>
                <li><a href="Mesresultats.php">Mes résultats</a></li>
                <!--<li><a href="#">Messagerie</a></li>-->
                <li><a href="#">Paramètres</a></li>
            </ul>
            </li>
            <li><a href="Tests_Psycho.php" >Tests Psychotechniques</a></li>
            <li><a href="#" >Aide</a>
                <ul>
                <li><a href="Forum.php">Forum</a></li>
                <li><a href="FAQ.php">FAQ</a></li>
                </ul>
            </li>                       
            <li><a href="Contact.php" >Contact</a></li>
            <li><a href="A_propos.php" >A propos</a></li>
        </ul>
    </nav>
     <div id="identification">
        <figure><a id="se_connecter" href="Connexion.php">
        <img src="../img/circulaire.png"/>
        <figcaption style="text-align: center;">
            Se connecter
        </figcaption>
    </a>
    </figure>
    </div>  
</header>

<style>
    header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #24131B;
    font-family: 'Zen Dots', cursive;
    font-size: 13px;
}
#titre_principal{
    display: flex;
    flex-direction: column;
}
#logo{
    display: flex;
    flex-direction: row;
    align-items: baseline;
}
#logo img{
    width: 150px;
    height:150px;
}

header h2{
    font-size: 1.1em;
    margin-top: 0px;
    font-weight: normal;
}
nav ul{
    list-style: none;/*pour annuler <li>*/
    display: flex;
    color: white;
}
nav li{
    margin-right: 10px;
    color: white;
}
nav a{
    font-size: 1.3em;
    padding-bottom: 3px;
    padding-right::12px; 
    padding-left:12px;
    text-decoration: none;
    color: white;
    background: linear-gradient(to top, #F1622A 0%, #F1622A 10%, transparent 10.01%) no-repeat;
    background-size: 0 100%; 
    transition: background-size .5s;
}
nav a:hover{
    color: #F1622A;
    background-size: 100% 100%;
}
/*nav ul ul li a:hover{
    background-color: white;
    background-size: auto;
}*/
nav ul li ul { display:none; } /* Rend le menu déroulant caché par défaut */
 
nav ul li:hover ul { 
z-index:99999;/*détermine l'ordre des différentes couches que formeront les éléments*/
display:list-item !important;
position:absolute;
margin-top:5px;
margin-left:-10px;
padding-top: 5px;
padding-bottom: 5px;
background-color: #24131B;
padding-left: 8px;
padding-right: :8px;
font-size: 11pt;
color: #F1622A;
}
 
nav ul li:hover ul li {
float:none;
}

#se_connecter{
    text-decoration: none;
    color: white;
}
figure{
    text-align: center;
}
</style>

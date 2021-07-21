<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/propos.css">
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
                <li><a href="A_propos.php">A propos</a></li> 
            </ul>


<section>
            
                
                    <br/><br/><br/>
                    <h1 style="color:#F1622A ;font-size:40px">Res Novae : ​Qui sommes-nous ? </h1><br/>

            <div id="123" style="	box-shadow:1px 1px 4px 4px Gray;
	                        width: 80%;
	                        padding: 30px;
                        	margin-top: 0px;
                        	text-align:left;
                        	position:auto;
                        	margin:auto;
                        	left:50%;
                        	right:50%;
                        	font-family: 'Zen Dots', cursive;
                        	color: black;
                         	background-color: white;">
                    - Une start-up dans l’air du temps. </p>
                    - Apporter des solutions dans la conception et le développement d’IOT. </p>
                    - Concrétisation des projets gaming.</p> 
                    - Valorisation du marché E-sport.</p>
                    - Nos Clients: Entreprises en pleine croissance; Associations et sponsors liés au gaming (Infinite Measures, Restart E-sport Club).
            </div>

<style>
body {
background:white
}

ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

.my-swiper {
  position: relative;
  width: 800px;
  height: 550px;
  margin: 100px auto;
  overflow: hidden;
  margin-top:25px;
}

.swiper-list {
  position: absolute;
  top: 0;
  left: 0;
  width: 4000px;
  height: 100%;
  overflow: hidden;
  animation: swiper 10s steps(1, end) infinite;
  transition: left 1s linear;
}

.swiper-slide {
  width: 800px;
  height: 100%;
  float: left;
  overflow: hidden;
}

.swiper-slide a {
  display: block;
  height: 100%;
}

.swiper-slide img {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* 分页 */
.pagination {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  line-height: 45px;
  background: rgba(255, 255, 255, 0.3);
  text-align: center;
}

.dot {
  display: inline-block;
  width: 10px;
  height: 10px;
  margin: 0 2px;
  background: #fff;
  border-radius: 50%;
}
/* orange point */
.dot.active {
  position: absolute;
  left: 356px;
  top: 18px;
  width: 11px;
  height: 11px;
  margin: 0;
  background: tomato;
  animation: swiper-dot 10s steps(1, end) infinite;
  transition: left 1s linear;
}
/* Style the list */
ul.breadcrumb {
  padding: 10px 16px;
  list-style: none;
  position: absolute;
  
}

/* Display list items side by side */
ul.breadcrumb li {
  display: inline;
  font-size: 18px;
  font-family: 'Zen Dots', cursive;
}

/* Add a slash symbol (/) before/behind each list item */
ul.breadcrumb li+li:before {
  padding: 8px;
  color: black;
  content: "/\00a0";
  font-family: 'Zen Dots';
}

/* Add a color to all links inside the list */
ul.breadcrumb li a {
  color: #0275d8;
  text-decoration: none;
}

/* Add a color on mouse-over */
ul.breadcrumb li a:hover {
  color: #01447e;
  text-decoration: underline;
}

@keyframes swiper {

  0%,
  100% {
    left: 0;
  }

  20% {
    left: -800px;
  }

  40% {
    left: -1600px;
  }

  60% {
    left: -2400px;
  }

  80% {
    left: -3200px;
  }

  /* 100% {
    left: -3200px;
  } */
}
@keyframes swiper-dot {

  0%,
  100% {
    left: 358px;
  }

  20% {
    left: 376px;
  }

  40% {
    left: 395px;
  }

  60% {
    left: 413px;
  }

  80% {
    left: 432px;
  }
}

</style>
</head>
<body>

  <div class="my-swiper">
    <ul class="swiper-list">
      <li class="swiper-slide swiper-slide1">
        <a href="javascript:;">
          <img src="../img/logoclear.jpg" alt="logo ResNovae" >
        </a>
      </li>
      <li class="swiper-slide swiper-slide2">
        <a href="javascript:;">
          <img src="../img/iot.png" alt="IOT">
        </a>
      </li>
      <li class="swiper-slide swiper-slide3">
        <a href="javascript:;">
          <img src="../img/gaming.png" alt="Gaming">
        </a>
      </li>
      <li class="swiper-slide swiper-slide4">
        <a href="javascript:;">
          <img src="../img/marche.jpg" alt="Le marché de l'e-sport pèserait $300 millions en Europe d'après SuperData et PayPal">
        </a>
      </li>
      <li class="swiper-slide swiper-slide5">
        <a href="javascript:;">
          <img src="../img/logoim.png" alt="Nos Clients">
        </a>
      </li>
    </ul>
    <div class="pagination">
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot active"></span>
    </div>
  </div>
  




<div class="clearfix"></div>
<div style="padding:6px;">
<h4 style="color:#F1622A ;font-size:40px ;margin-top:-50px">Notre équipe</h4>


<style>
div.img {
    border: 1px solid #ccc;
}

div.img:hover {
    border: 1px solid #777;
}

div.img img {
    width: 90%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
    color:black;
}

* {
    box-sizing: border-box;
}

.responsive {
    padding: 0 6px;
    float: left;
    width: 19.99999%;
    text-align: center;
}

@media only screen and (max-width: 700px){
    .responsive {
        width: 49.99999%;
        margin: 6px 0;
    }
}

@media only screen and (max-width: 500px){
    .responsive {
        width: 100%;
    }
}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
}
</style>


<div class="responsive">
  <div class="img">
    <a target="_blank" href="Notre-equipe.php">
      <img src="../img/Mike.png" alt="Mahmoud Mike Gbadamassi" width="300" height="200">
    </a>
    <div class="desc">Mahmoud Mike Gbadamassi</div>
  </div>
</div>

<div class="responsive">
  <div class="img">
    <a target="_blank" href="Notre-equipe.php">
      <img src="../img/Antoine.png" alt="Antoine Tsinga" width="300" height="200">
    </a>
    <div class="desc">Antoine Tsinga</div>
  </div>
</div>

<div class="responsive">
  <div class="img">
    <a target="_blank" href="Notre-equipe.php">
      <img src="../img/Francois.png" alt="François Tambidore" width="300" height="200">
    </a>
    <div class="desc"> François Tambidore</div>
  </div>
</div>

<div class="responsive">
  <div class="img">
    <a target="_blank" href="Notre-equipe.php">
      <img src="../img/Shixuan.png" alt="Shixuan ZHANG" width="300" height="200">
    </a>
    <div class="desc">Shixuan ZHANG</div>
  </div>
</div>

<div class="responsive">
  <div class="img">
    <a target="_blank" href="Notre-equipe.php">
      <img src="../img/Guillaume01.jpg" alt="Guillaume Froment" width="300" height="200">
    </a>
    <div class="desc"> Guillaume Froment</div>
  </div>
</div>



<div class="clearfix"></div>
<div style="padding:6px;">
<h4 style="color:#F1622A ;font-size:40px ;margin-top:30px">Notre projet</h4>
</div>

<style>
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}

@keyframes zoom {
    from {transform: scale(0.1)} 
    to {transform: scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
</head>
<body>

            <div id="123" style="	box-shadow:1px 1px 4px 4px Gray;
	                        width: 80%;
	                        padding: 30px;
                        	margin-top: 20px;
                        	position:auto;
                        	margin:auto;
                        	left:50%;
                        	right:50%;
                        	text-align:left;
                        	font-family: 'Zen Dots', cursive;
                        	color: black;
                         	background-color: white;">

<h2 style="color:black">Concevoir un appareil de test pour la société Infinite Measures:</h2>
<p style="color:black">Clients de Infinite Measures visés : centres de recherche scientifique pour des analyses comportementales statistiques.</p>
<h2 style="color:black">Notre but:</h2>
<p style="color:black">Etudier les comportements (concentration, réflexes, stress) des joueurs professionnels avant une compétition,  les données obtenues permettant de prédire l’efficacité d’un joueur pendant la compétition.​</p>

</div>

<div style="text-align:center; margin-bottom:50px">
<img id="myImg" src="../img/LOL.png" alt="League of Legends Worlds 2020" width=75% height=75% style="margin-top:50px">
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">×</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
// 获取模态窗口
var modal = document.getElementById('myModal');

// 获取图片模态框，alt 属性作为图片弹出中文本描述
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    modalImg.alt = this.alt;
    captionText.innerHTML = this.alt;
}

// 获取 <span> 元素，设置关闭模态框按钮
var span = document.getElementsByClassName("close")[0];

// 点击 <span> 元素上的 (x), 关闭模态框
span.onclick = function() { 
    modal.style.display = "none";
}
</script>



            </section>


            <?php
                if(isset($_SESSION['Id'])){
                     include'footerc.php';
                }
                else{
                    include'footer.php';
                }

            ?>
        </div>
    </body>
</html>


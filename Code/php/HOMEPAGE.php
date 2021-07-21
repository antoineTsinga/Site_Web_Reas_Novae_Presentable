<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Res Novae - HOME</title>
    <link rel="icon" href="logo.ico">
    <style>
      @font-face {
        font-family: 'Playfair Display';
        font-style: normal;
        font-weight: 900;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/playfairdisplay/v22/nuFiD-vYSZviVYUb_rj3ij__anPXDTzYgEM86xQ.woff2) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
      }
html, body { 
  height: 100%; 
  margin: 0; 
  background: #000; 
}

body {
  display: flex;
  align-items:center;
  justify-content: center;
}
      ul, li{
        list-style: none;
        padding: 0;
        margin: 0;
        font-size: 20px;
        font-family: 'Playfair Display';
      }
      header{
        position: absolute;
        z-index: 1;
        top: 0;
        right: 0;
        left: 0;
        height: 54px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        align-content: center;
        padding: 0 200px;
        color: #fff;
        background: black; 
      }
      .logo{
        cursor: pointer;
        width: 100px;
        height: 30px;
        border-radius: 10px;
        text-align: center;
        font-family: 'Playfair Display';
        font-weight: bold;
        font-size: 20px;
      }
      nav{
        flex: 1;
        font-size: 15px;
      }
      nav ul{
        display: flex;
        justify-content: flex-end;
        padding: 0 25px;
      }
      nav ul li{
        margin-right: 10px;
        cursor: pointer;
      }
      .head-image{
        display: inline-block;
        width: 50px;
        overflow: hidden;
      }
      .head-image img{
        border-radius: 50%;
        width: 100%;
        cursor: pointer;
      }
      .abs{
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        margin: auto;
        text-align: center;
        color: #fff;
        padding-top: 100px;
      }
      .abs h1{
        font-family: 'Playfair Display';
        font-size: 75px;
        margin-bottom: 0;
        font-weight: normal;
      }
      .abs h1:hover {
    animation: orange 1.5s ease-in-out infinite alternate;
      }
      @keyframes orange {
    to {
        text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #ff5722, 0 0 70px #ff5722, 0 0 80px #ff5722, 0 0 100px #ff5722, 0 0 150px #ff5722;
        
    }
    from {
        filter: brightness(110%);
        text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #fff, 0 0 20px #ff5722, 0 0 35px #ff5722, 0 0 40px #ff5722, 0 0 50px #ff5722, 0 0 75px #ff5722;
  }
}
      .abs p{
        margin-top: 0;
        opacity: 0.8;
        font-size: 25px;
      }
      .upload{
        width: 1000px;
        height: 500px;
        margin: 50px auto 0; 
        overflow: hidden;
        border-radius: 80px;
        background: rgb(255 255 255 / 79%);
        /* border: 5px solid rgba(255, 255, 255, 0.36); */
        box-sizing: content-box;
        box-shadow: 2px 2px 6px #011423;
        transition: background-color .35s linear;
        transition-property: background-color, border-radius;
      }
      .upload:hover{
        background: rgb(255 255 255 / 89%);
        border-radius: 30px;
      }
      .upload::before{
        content: 'Born for professional players --- Res Novae';
        color: #444;
        font-size: 30px;
        margin-top: 150px;
        display: block
      }
      .upload li{
        width: 1000px;
        height: 500px;
        color: #b1b6b9;
        font-size: 30px;
        margin-top: 100px;
        display: block
      }
      .upload a{
        font-family: 'Playfair Display';
        text-decoration: none;
        border:solid 5px;
        padding: 0.4em 0.8em;
        color: #444;
        background:rgb(255 255 255 / 49%);
        border-color: #fff#aaa#aaa#fff;
        zoom: 1;
      }
      .upload a:hover{
        background-color: rgb(255 255 255 / 19%);
      }
    </style>
<css-doodle>
  :doodle {
    @grid: 500x1/ 40vmin;
    perspective: 10vmin;
  }
  
  @place-cell: center;
  @size: 40% 1px;
  
  will-change: transform, opacity;
  transform-style: preserve-3d;
  
  background: linear-gradient(to left,
    @multi(@p([2-4]), @p(#00b8a9, #f8f3d4, #f6416c, #ffde7d)),
    transparent @r(50%)
  );

  animation: move @r(1s, 2s, .1) linear infinite;
  animation-delay: -@r(.1s, 2s);

  --trans:
    translateX(50%)
    rotateX(@r(-180deg, 180deg))
    rotateY(@r(-180deg, 180deg))
    rotateZ(@r(-180deg, 180deg));

  transform-origin: 0 center;
  transform: var(--trans) scale(2);
  opacity: 0;

  @keyframes move {
    20% { opacity: 1; }
    100% { transform: var(--trans) scale(0); }
  }
</css-doodle>
  </head>
  <body>
    <script src="https://unpkg.com/css-doodle@0.14.2/css-doodle.min.js"></script>
    <css-doodle use="var(--rule)" click-to-update></css-doodle>
    <header>
      <div class="logo">
        Res Novae
      </div>
      <nav>
        <ul>
          <li>Born for profession</li>
        </ul>
      </nav>
      <span class="head-image">
        <img src="./logo.png" alt="">
      </span>
    </header>
    <div class="abs">
      <h1>Res Novae</h1>
      <p>Bonjour! Nous sommes Res Novae, cliquez sur "Accueil" ci-dessous pour commencer votre voyage.</p>
      <div class="upload">
        <ul>
          <li><a href="Accueil.php">Accueil</a></li>
        </ul>
      </div>
    </div>
  </body>
</html>

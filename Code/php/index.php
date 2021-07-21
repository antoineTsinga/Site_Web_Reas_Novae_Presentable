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
        margin-top:-25px;
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
        margin-top: 0px;
        opacity: 0.8;
        font-size: 25px;
      }
      
      .login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  height: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
  margin-top:60px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
  font-size: 30px;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 20px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}

.login-box form a {
  position: relative;
  display: inline-block;
  left:25%;
  padding: 10px 20px;
  color: #03e9f4;
  font-size: 20px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.login-box a:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 25px #03e9f4,
              0 0 50px #03e9f4,
              0 0 100px #03e9f4;
}

.login-box a span {
  position: absolute;
  display: block;
}

.login-box a span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03e9f4);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.login-box a span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #03e9f4);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box a span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #03e9f4);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box a span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #03e9f4);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}

  :root {
  --colorEyeBlue: #34495e12;
  --colorEyeDark: #07070715;
  --colorBackground: #111;
  
  --sizeEye: 80vmin;
  --sizeBigLine: calc(0.01 * var(--sizeEye));
  --sizeSmallLine: calc(0.003 * var(--sizeEye));;
  --sizeIris: calc(var(--sizeEye) / 2);
}

:root {
  --scifi: (
    :doodle {
      @grid: 1x19 / 100%;    
      position: absolute;
      left: 0;
      top: 0;
    }
    
    @place-cell: center; 
    @size: calc(20% + @i * 4%);
    z-index: 0; 

    border-radius: 100%; 
    border-style: solid;
    border-width: @pick(
      var(--sizeSmallLine),
      var(--sizeSmallLine),
      var(--sizeBigLine)
    );

    border-color: 
      hsla(
        215, @r(40%,50%), @r(70%, 82%), @r(5%, 90%)
      )
      transparent
    ;    


    will-change: transform;
    animation: myanimation @r(4s, 15s) linear alternate infinite;    

    @keyframes myanimation {
      from { transform: rotate(@r(360deg)) }
      to { transform: rotate(@r(360deg)) }
    }    

    @nth(1) { background-color: #000; border: none; z-index: 0; }  
  );
}

:root {
  --iris: (
    :doodle {
      @grid: 1x30 / 100%;
      position: absolute;
      left: 0;
      top: 0;
    }
    @place-cell: center;
    @size: 120%;
    z-index: 0; 

    border-radius: 100%;
    border-style: dashed;
    border-width: var(--sizeIris);    
    border-color: var(--colorEyeBlue) var(--colorEyeDark);
    transform: rotate(@r(179deg));
  );
}

:root {  
  --iris2: (
    :doodle {
      @grid: 1x30 / 100%;
      position: absolute;
      left: 0;
      top: 0;      
    }
    z-index: 0;
    @place-cell: center;
    background-color: var(--colorEyeBlue);
    @size: 150%;
    clip-path: polygon(48% 50%, 50% 100%, 52% 50%, 50% 0%);
    transform: rotate(@r(179deg));
  );
}

html, body {
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  background: var(--colorBackground);
  display: flex;
  align-items: center;
  justify-content: center;
  
}

.art {
  position: relative;
  width: var(--sizeEye);
  height: var(--sizeEye);
}


/*
didn't work in firefox:

  @nth(20) {
    animation: none;        
    border: none;
    --colorEyeBlue: #34495e22;
    --colorEyeOther: transparent;

    --pattern1start: @r(0.5%, 0.75%);
    --pattern1end: calc(var(--pattern1start) * 2);

    --pattern2start: @r(1%, 2%);
    --pattern2end: calc(var(--pattern2start) * 2);

    background:    
      repeating-conic-gradient(var(--colorEyeBlue) 0% var(--pattern1start), var(--colorEyeOther) var(--pattern1start) var(--pattern1end)),
      repeating-conic-gradient(var(--colorEyeBlue) 0% var(--pattern2start), var(--colorEyeOther) var(--pattern2start) var(--pattern2end))
    ;
    background-color: #25c1; 
    z-index: 0;
  }


*/
    </style>

  </head>
  <body>
<!-- partial:index.partial.html -->
<!-- this lets us use <css-doodle> -->
<script src="https://unpkg.com/css-doodle@0.8.5/css-doodle.min.js"></script>

<div class="art">
  <!--  scifi circles  -->
  <css-doodle use="var(--scifi)"></css-doodle>  
  <!--  iris radial from center pattern  -->
  <css-doodle use="var(--iris)"></css-doodle>
  <!--  iris radial from center triangles  -->
  <css-doodle use="var(--iris2)"></css-doodle>
</div>
<!-- partial -->

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
    </div>
    

<div class="login-box">
  <h2>Bienvenue</h2>
  <form>
    <div class="user-box">
      <input type="text" name="" required="">
      <label>Res Novae</label>
    </div>
    <div class="user-box">
      <input type="password" name="" required="">
      <label>Born for profession</label>
    </div>
    <a href="Accueil.php">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Accueil
    </a>
  </form>
</div>
    
  </body>
</html>

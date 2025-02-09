
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>For My Queen</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <style>
        @import url("https://fonts.googleapis.com/css2?family=Bungee+Shade&display=swap");
* {
  position: absolute;
}

#container {
  top: 100px;
  left: 40px;
}

img {
  display: none;
  z-index: 0;
}

.circle {
  z-index: 6;
  width: 300px;
  height: 300px;
  border: 10px solid #343536;
  border-radius: 50%;
  top: 151px;
  left: 239px;
  box-shadow: 0 0 0 999999px #809bc2;
}

.ear {
  z-index: 0;
  background-color: #c3b598;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 10px solid #343536;
}

#leftear {
  top: 220px;
  left: 300px;
}

#rightear {
  top: 220px;
  left: 439px;
}

.body {
  z-index: 1;
  background-color: #715a40;
  width: 175px;
  height: 260px;
  border-radius: 100px;
  border: 10px solid #343536;
  top: 227px;
  left: 302px;
}

.eye {
  z-index: 2;
  width: 20px;
  height: 20px;
  background-color: #343536;
  border-radius: 50%;
  animation: 3s eyes infinite;
}

#lefteye {
  top: 298px;
  left: 346px;
}

#righteye {
  top: 298px;
  left: 432px;
}

.mouthoval {
  z-index: 2;
  background-color: #c3b598;
  width: 100px;
  height: 80px;
  border-radius: 50%;
  top: 311.5px;
  left: 349px;
}

.nose {
  z-index: 3;
  background-color: #343536;
  width: 35px;
  height: 30px;
  top: 320px;
  left: 381px;
  border-radius: 50%;
}

.noseline {
  z-index: 3;
  width: 10px;
  height: 20px;
  top: 342px;
  left: 394px;
  background-color: #343536;
}

.mouth {
  z-index: 3;
  border-bottom: 10px solid #343536;
  border-right: 10px solid #343536;
  border-left: 10px solid #343536;
  width: 35px;
  height: 6px;
  top: 353px;
  left: 372px;
  border-radius: 0 0 20px 20px;
}

.hand {
  z-index: 2;
  background-color: #715a40;
  border: 10px solid #343536;
  width: 52px;
  height: 200px;
  border-radius: 40px;
  top: 312px;
  left: 248px;
  animation: 1s wave infinite;
}

.centerpaw {
  z-index: 3;
  background-color: #c3b598;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  top: 349px;
  left: 272px;
  animation: 1s wave infinite;
}

.pawdot {
  z-index: 3;
  background-color: #c3b598;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  animation: 1s wave infinite;
}

#one {
  top: 343px;
  left: 265px;
}

#two {
  top: 335px;
  left: 275px;
}

#three {
  top: 336px;
  left: 287px;
}

#four {
  top: 343px;
  left: 297px;
}

@keyframes wave {
  0%, 100% {
    transform: translateY(-10px);
  }
  50% {
    transform: translateY(30px);
  }
}
@keyframes eyes {
  0%, 10%, 100% {
    height: 20px;
  }
  5% {
    height: 4px;
  }
}
p {
  z-index: 8;
  background-color: white;
  padding: 50px;
  font-family: "Bungee Shade", cursive;
  font-size: 50px;
  border-radius: 70px;
  left: 90px;
  top: -20px;
}

p:after {
  content: " ";
  position: absolute;
  right: 30px;
  bottom: -35px;
  border-top: 50px solid white;
  border-right: 30px solid transparent;
  border-left: 30px solid transparent;
  border-bottom: none;
  transform: rotate(-20deg);
}
        </style>
    </head>
    <body class="font-sans antialiased">

<div id="container">
  <div class="circle"></div>
  <div class="ear" id="leftear"></div>
  <div class="ear" id="rightear"></div>
  <div class="body"></div>
  <div class="eye" id="lefteye"></div>
  <div class="eye" id="righteye"></div>
  <div class="mouthoval"></div>
  <div class="nose"></div>
  <div class="noseline"></div>
  <div class="mouth"></div>
  <div class="containerpaw">
    <div class="hand"></div>
    <div class="centerpaw"></div>
    <div class="pawdot" id="one"></div>
    <div class="pawdot" id="two"></div>
    <div class="pawdot" id="three"></div>
    <div class="pawdot" id="four"></div>
  </div>
  <p>For my Queen!</p>
</div>    </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css?<?php echo time(); ?>" />
    <title>Merry Christmas</title>
  </head>
  <body>
    <!-- Christmas Cards Container -->
    <audio src="christX.m4a" autoplay></audio>
    <nav>
      <a href="../"><img src="../Resources/images/cross.png" alt=""></a>
    </nav>
    <div id="christmas-cards-container">
      <div class="container">
        <div class="shapes"></div>
        <div class="card1" id="card1" style="display: none;">
          <div class="card">
            <img src="images/snowman2.png" />
            <div class="text-container">
              <h1>Merry Christmas</h1>
              <p>
                May the joy and peace of Christmas Be with you all through the
                Year Wishing you a season of blessings From heaven above Happy
                Christmas and New Year!
              </p>
            </div>
          </div>
        </div>
        <div class="card2" id="card2" style="display: none;">
          <div class="card">
            <img src="images/snowman3.png" />
            <div class="text-container">
              <h1>Merry Christmas</h1>
              <p>
                Wishing you a merry Christmas and a wonderful new year. May your
                holidays be filled with love, laughter and happiness. Thank you
                for being a part of my life.
              </p>
            </div>
          </div>
        </div>
        <div class="card3"  id="card3" style="display: none;">
          <div class="card">
            <img src="images/snowman4.png" />
            <div class="text-container">
              <h1>Merry Christmas</h1>
              <p>
                As we celebrate the miracle of Christmas, let us also pray for a
                better and brighter new year. May you and your loved ones have a
                merry Christmas and a happy New Year!
              </p>
            </div>

          </div>
        </div>
        </div>
      </div>

      <!-- Christmas card images-->
    </div>

    <!-- Bell Icon -->

    <script src="main.js"></script>
  </body>
</html>

<style>
  /* customizable snowflake styling */
  .snowflake {
    color: #fff;
    font-size: 1em;
    font-family: Arial, sans-serif;
    text-shadow: 0 0 5px #000;
  }

  .snowflake,
  .snowflake .inner {
    animation-iteration-count: infinite;
    animation-play-state: running;
  }
  @keyframes snowflakes-fall {
    0% {
      transform: translateY(0);
    }
    100% {
      transform: translateY(110vh);
    }
  }
  @keyframes snowflakes-shake {
    0%,
    100% {
      transform: translateX(0);
    }
    50% {
      transform: translateX(80px);
    }
  }
  .snowflake {
    position: fixed;
    top: -10%;
    z-index: 9999;
    -webkit-user-select: none;
    user-select: none;
    cursor: default;
    animation-name: snowflakes-shake;
    animation-duration: 3s;
    animation-timing-function: ease-in-out;
  }
  .snowflake .inner {
    animation-duration: 10s;
    animation-name: snowflakes-fall;
    animation-timing-function: linear;
  }
  .snowflake:nth-of-type(0) {
    left: 1%;
    animation-delay: 0s;
  }
  .snowflake:nth-of-type(0) .inner {
    animation-delay: 0s;
  }
  .snowflake:first-of-type {
    left: 10%;
    animation-delay: 1s;
  }
  .snowflake:first-of-type .inner,
  .snowflake:nth-of-type(8) .inner {
    animation-delay: 1s;
  }
  .snowflake:nth-of-type(2) {
    left: 20%;
    animation-delay: 0.5s;
  }
  .snowflake:nth-of-type(2) .inner,
  .snowflake:nth-of-type(6) .inner {
    animation-delay: 6s;
  }
  .snowflake:nth-of-type(3) {
    left: 30%;
    animation-delay: 2s;
  }
  .snowflake:nth-of-type(11) .inner,
  .snowflake:nth-of-type(3) .inner {
    animation-delay: 4s;
  }
  .snowflake:nth-of-type(4) {
    left: 40%;
    animation-delay: 2s;
  }
  .snowflake:nth-of-type(10) .inner,
  .snowflake:nth-of-type(4) .inner {
    animation-delay: 2s;
  }
  .snowflake:nth-of-type(5) {
    left: 50%;
    animation-delay: 3s;
  }
  .snowflake:nth-of-type(5) .inner {
    animation-delay: 8s;
  }
  .snowflake:nth-of-type(6) {
    left: 60%;
    animation-delay: 2s;
  }
  .snowflake:nth-of-type(7) {
    left: 70%;
    animation-delay: 1s;
  }
  .snowflake:nth-of-type(7) .inner {
    animation-delay: 2.5s;
  }
  .snowflake:nth-of-type(8) {
    left: 80%;
    animation-delay: 0s;
  }
  .snowflake:nth-of-type(9) {
    left: 90%;
    animation-delay: 1.5s;
  }
  .snowflake:nth-of-type(9) .inner {
    animation-delay: 3s;
  }
  .snowflake:nth-of-type(10) {
    left: 25%;
    animation-delay: 0s;
  }
  .snowflake:nth-of-type(11) {
    left: 65%;
    animation-delay: 2.5s;
  }
</style>
<div class="snowflakes" aria-hidden="true">
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
</div>

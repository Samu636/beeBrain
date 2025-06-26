<!DOCTYPE html>
<html lang="it" id="html-aboutus">
  <head>
    <title>beeBrain - login</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width = device-width, initial-scale=1,  shrink-to-fit=no"
    />
    <!-- css LINK-->
    <link href="/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/AboutUs/aboutus.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/AboutUs/aboutus.js"></script>
    <script>
  $(document).ready(function () {
    $("#img1").hover(
      function () {
        $(this).addClass("blur");
      },
      function () {
        $(this).removeClass("blur");
      }
    );
  });
</script>
<script>
  $(document).ready(function () {
    $("#img2").hover(
      function () {
        $(this).addClass("blur");
      },
      function () {
        $(this).removeClass("blur");
      }
    );
  });
</script>
<script>
  $(document).ready(function () {
    $("#img3").hover(
      function () {
        $(this).addClass("blur");
      },
      function () {
        $(this).removeClass("blur");
      }
    );
  });
</script>
  </head>
  <body id="bodyaboutus">
    <header>
      <?php
        include("../navbar/navbar.php");
      ?>
    </header>
    <main>
      <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img id="img1" src="../immaginiutili/Slide1.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="carousel-text">Siamo Nicolò Marzinotto e Samuel Stefanelli, due studenti</h5>
              <h5 class="carousel-text">dell'Università Sapienza di Roma</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img id="img2" src="../immaginiutili/Slide2.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="carousel-text">Frequentiamo il terzo anno</h5>
              <h5 class="carousel-text">della Laurea triennale in Ingegneria Informatica</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img id="img3" src="../immaginiutili/Slide3.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="carousel-text">E questo è il frutto del nostro progetto</h5>
              <h5 class="carousel-text">per il corso di Linguaggi e Tecnologie per il Web</h5>
            </div>
          </div>
        </div>
      </div>
  </main>
  </body>
</html>
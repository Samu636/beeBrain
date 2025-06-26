<?php 
session_start();
if(!isset($_SESSION['userId'])){
  header("Location: ../index.php?error=deviessereloggato");
  exit();
}
?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>beeBrain</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width = device-width, initial-scale=1,  shrink-to-fit=no"
    />
    <!-- css LINK-->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/prova.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        $(".containerindex").click(function(){
          $("#category").text("Seleziona una categoria!");
          $(".containerindex").animate({
            width: '1200px',
            height: '750px'
          }, 1000);
          $(".content-box-category").show().animate({ opacity: '1'}, 3000)
        });
      });
    </script>
  </head>
  <body id="category-body" class="text-center">
    <header>
      <?php
        include("../navbar/navbar.php");
      ?>
    </header>
    <main>
      <h1> </h1>
      <?php 
          if(isset($_GET['error'])){
            if ($_GET['error'] == 'temposcaduto'){
              echo '<h1 style= "color: red">Tempo scaduto! ';  
              echo $_SESSION['username']; 
              echo ' Devi essere più veloce la prossima volta!</h1>';
            }
          }
      ?>
      <div class="containerindex">
        <h1 id="category" class="text-center">Fai click per scegliere la categoria del quiz!</h1>
        <div class="content-box-category">
        <div class="riga">
          <div class="rigacontent">
            <div class="card">
              <a href="/Quiz/quiz.php?category=geografia">
                <img
                  src="/Quiz/immaginiQuiz/geografia.jpg"
                  onmouseover="this.src='/Quiz/immaginiQuiz/geografiafocus.jpeg'"
                  onmouseout="this.src='/Quiz/immaginiQuiz/geografia.jpg'"
                  class="image"
                  id="sport"
                  style="width: 300px; height: 300px;"
                />
              </a>
              <div class="card-bottom">
                <h5 class="bottom-category">Geografia</h5>
              </div>
            </div>
          </div>
          <div class="rigacontent">
            <div class="card">
              <a href="/Quiz/quiz.php?category=sport">
                <img
                  src="/Quiz/immaginiQuiz/sport.jpg"
                  onmouseover="this.src='/Quiz/immaginiQuiz/sportfocus.jpg'"
                  onmouseout="this.src='/Quiz/immaginiQuiz/sport.jpg'"
                  class="image"
                  style="width: 300px; height: 300px;"
                />
              </a>
              <div class="card-bottom">
                <h5 class="bottom-category">Sport</h5>
              </div>
            </div>
          </div>
          <div class="rigacontent">
            <div class="card">
              <a href="/Quiz/quiz.php?category=general">
                <img
                  src="/Quiz/immaginiQuiz/generale.jpg"
                  onmouseover="this.src='/Quiz/immaginiQuiz/generalefocus.jpg'"
                  onmouseout="this.src='/Quiz/immaginiQuiz/generale.jpg'"
                  class="image"
                  style="width: 300px; height: 300px;"
                />
              </a>
              <div class="card-bottom">
                <h5 class="bottom-category">Cultura Generale</h5>
              </div>
            </div>
          </div>
        </div>
        <div class="riga">
          <div class="last-content">
            <div class="card">
              <a href="/Quiz/quiz.php?category=anime">
                <img
                  src="/Quiz/immaginiQuiz/anime.jpg"
                  onmouseover="this.src='/Quiz/immaginiQuiz/animefocus.jpg'"
                  onmouseout="this.src='/Quiz/immaginiQuiz/pop.webp'"
                  class="image"
                  style="width: 300px; height: 300px;"
                />
              </a>
              <div class="card-bottom">
                <h5 class="bottom-category">Cultura Pop</h5>
              </div>
            </div> 
          </div>
          
        </div>
        
        </div>
      </div>
    </main>
  </body>
</html>
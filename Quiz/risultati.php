

<?php
  session_start();
  require '../dbhandler.php';
  //require '../Quiz/validateQuiz.php';

  //if($dbConnect){
  //    echo 'connesso';
  //}
?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>beeBrain - Quiz</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width = device-width, initial-scale=1,  shrink-to-fit=no"
    />
    <!-- css LINK-->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/prova.css" />
    <link rel="stylesheet" type="text/css" href="/Quiz/quiz.css" />

    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  </head>
  <body>
    <header>
      <?php
        include("../navbar/navbar.php");
      ?>
    </header>
    <main id="main-risultati">
        <div class="container-resoult">
          <div class="container-resoult-top">
            <p class="resoult-header-text">Quiz terminato!</p>
          </div>
          <div class="container-resoult-mid">
            <?php 
             if($_SESSION['punteggio'] == 100){
              echo '<h2 style="color:green">Incredibile! ';
              echo $_SESSION['username'];
              echo ' Hai totalizzato ben '; 
              echo $_SESSION['punteggio']; 
              echo ' punti! è massimo!</h2>';
             }elseif($_SESSION['punteggio'] > 55){
              echo '<h2 style="color:red">Non male ';
                echo $_SESSION['username'];
                echo' Hai totalizzato ben: '; 
                echo $_SESSION['punteggio']; 
                echo 'punti!  </h2>';
             }else{
              echo '<h2 style="color:red">Potevi fare meglio ';
              echo $_SESSION['username'];
              echo'.. hai totalizzato solamente: '; 
              echo $_SESSION['punteggio']; 
              echo 'punti! :( </h2>';
             }
             ?>
             <h3 style="color: green">Giuste: <?php echo $_SESSION['giuste'] ?></h3>
             <h3 style="color: red">Sbagliate: <?php echo $_SESSION['sbagliate'] ?></h3>
              <h3>E' il tuo quiz numero: <?php echo $_SESSION['quizdone'] ?></h3>
             <!--<h3>Punti totalizzati: <?php echo $_SESSION['totalpoints'] ?></h3>
             <h3>Media account: <?php echo $_SESSION['mediaPoints'] ?></h3> -->
          </div>
          <div class="container-resoult-bot">
            <button class="btn" id="loginbtn" onclick="location.href='/index.php'" >Home</button>
            <button class="btn" id="loginbtn" onclick="location.href='/Quiz/categorie.php'">Riprova</button>
          </div>
        </div>

    </main>
</html>

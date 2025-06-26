<?php
session_start();
require "../dbhandler.php";
if(!isset($_SESSION['userId'])){
    header("Location: ../index.php?error=deviessereloggato");
    exit();
}

if(isset($_GET['user'])){
    $utente = $_GET['user'];
}
$sql = "SELECT image, totalPoints, quizDone, mediaPoints, risposteCorr, risposteErr FROM users WHERE username='".$utente."'";
$stmt = mysqli_stmt_init($dbConnect);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../index.php?error=sqlerror");
        exit();
    }
    else{
        mysqli_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($res);
    }
  
?>



<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Statistiche</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width = device-width, initial-scale=1,  shrink-to-fit=no"
    />
    <!-- css LINK-->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../prova.css" />
    <link rel="stylesheet" type="text/css" href="/user/stats.css" />
  </head>
  <body class ="stats-pubbliche">
    <header>
      <?php
        include("../navbar/navbar.php");
      ?>
    </header>
    <div class="stats-container">
            <div class="stats-container-top">
                <p>Ecco le statistiche di <?php echo $utente; ?></p>
            </div>
            <div class="propic-container">
              <div class="propic-container-photo">
                <?php
                    //aggiorno la variabile ad ogni refresh, cosi l'utente NON deve riloggare per
                    //aggiornare la variabile e vedere la sua immagine del profilo.
                      if($row['image'] == NULL){
                        echo "<img class='profile-picture' src='./image/default.png' alt='Default Propic'>";
                      }else{
                        echo "<img class='profile-picture' src='./image/".$row['image']."' alt='Your Propic'>";
                      }
                    
                  
                    ?>
                    </div>
                    </div>
                <div class="stats-container-mid">
                <h4>Ha totalizzato ben: <?php echo $row['totalPoints']; ?> punti!</h4>
                <h4>Ha completato: <?php echo $row['quizDone']; ?> Quiz </h4>
                <h4>Con <?php echo $row['risposteCorr']; ?> risposte corrette e  <?php echo $row['risposteErr']; ?> risposte errate</h4>

                <h4>La sua media punti per quiz è <?php echo $row['mediaPoints']; if($row['mediaPoints'] < 55){echo ' dovrebbe proprio migliorare..';}else{echo ' sta andando benissimo!';}?> </h4>
            </div>
        </div>

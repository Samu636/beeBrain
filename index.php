<?php
  session_start();
  require './dbhandler.php';

  //if($dbConnect){
  //    echo 'connesso';
  //}
?>
<!DOCTYPE html>
<html lang="it" id="html-index">
  <head>
    <title>beeBrain</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width = device-width, initial-scale=1,  shrink-to-fit=no"
    />
    <!-- css LINK-->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="prova.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <html> 
  <head> 
    <script> 
    $(function(){
      $("#lowerbar").load("../navbar/lowerbar.html"); 
    });
    </script> 
  </head> 
</html>
  </head>
  <body class="text-center" id="body-index">
    <header>
      <?php
        include("./navbar/navbar.php");
      ?>
    </header>
    <main class="content">
      <div class="introduzione">
        <?php 
        if(isset($_GET['error'])){
          if($_GET['error'] == 'deviessereloggato'){
            echo '<p class="registration-error" style="font-size:30px">Devi fare il <a class="registration-error-link"  href="/loginPage/login.php">Log In! <a class="registration-error-link" href="/signupPage/registrazione.php"> REGISTRATI</a> se non hai un account.</p>';
          }
        }
        ?>
        <?php
        if (isset($_SESSION['userId'])){
          echo "<p class='welcome'>Bentornato "; echo $_SESSION['username']; echo "! <p>
          <h3>
            Non perdere tempo e inizia subito a fare i quiz!
          </h3>
          <a class='btn btn-outline-dark my-2 mr-sm-2' href='/Quiz/categorie.php'
            >Quiz</a
          >
        </div>
        <br>";
        }else{
          echo "<h1 class='welcome'>Benvenuto su BeeBrain!</h1>
          <h3>
            BeeBrain è un sito gratuito di quiz online su moltissimi argomenti!
            Cerca di rispondere bene a più domande possibili e fai la tua scalata verso la 
            top 10!
          </h3>
          <h3>Puoi fare una prova prima di registrarti!</h3>
          <a class='btn btn-outline-dark my-2 mr-sm-2' href='/provaQuiz/prova.php'
            >PROVA</a
          >
        </div>
        <br>";
        }
        ?>
      <?php
          echo "<div class='tablecontainer'>
          <p class='leaderboard-header'>Top 10</p>";
          echo "<table>
                  <tr>
                    <td class='header-in-table'>Posizione</td>
                    <td class='header-in-table'>Utente</td>
                    <td class='header-in-table'>Punteggio</td>
                  </tr>";
      $rank=1;
      $sql = "SELECT username, mediaPoints FROM users ORDER BY mediaPoints DESC LIMIT 10";
      $stmt = mysqli_stmt_init($dbConnect);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../index.php?error=sqlerror");
        exit();
      }
      else{
        mysqli_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($res)) {
          echo "<tr>";
            echo "<td class='rank-in-table'>{$rank}</td>
                  <td><a class='link-in-table' href='/user/statisticheutenti.php?user=".$row['username']."'>{$row['username']}<a></td>
                  <td class='points-in-table'>{$row['mediaPoints']}</td>";
          echo "</tr>";
            $rank++;
        }
      }
      echo "</table>";
      echo "</div>";
      ?>
    </main>
    <div id="lowerbar"></div>
  </body>

</html>

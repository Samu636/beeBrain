<?php
  session_start();
  require '../dbhandler.php';

  //if($dbConnect){
  //    echo 'connesso';
  //}
  if(!isset($_SESSION['userId'])){
    header("Location: ../index.php?error=deviessereloggato");
    exit();
}
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
    <!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function startTimer(durata, display) {
          var timer = durata, minuti, secondi;
          setInterval(function(){
            minuti = parseInt(timer / 60, 10);
            secondi = parseInt(timer % 60, 10);
            minuti = minuti < 10 ? "0" + minuti : minuti; //if else scritto in modo diverso..si chiama ternary-> condizione ? espressione1 : espressione 2. fornisce direttamente un espressione valutabile.
            secondi = secondi < 10 ? "0" + secondi : secondi;
            display.text(minuti + ":" + secondi);
            if (--timer < 0){
              window.location.href = "/Quiz/categorie.php?error=temposcaduto";
            }
          }, 1000);
        }
        jQuery(function ($){
          var cinqueMin = 60 * 5;
          display= $('#tempo');
          startTimer(cinqueMin, display);
        });
        function storeUserAns() {
          var ele = document.getElementsByClassName("radio");
          const userAns = [];
          console.log("length=" + ele.length);
          for(i=0; i< ele.length; i++){
            console.log(ele[i]);
            if(ele[i].checked){
              console.log("checked:" + ele[i].checked);
              userAns.push(ele[i].value);
            } 
          }
          console.log("userAnslength=" + userAns.length);
          for (i=0; i< userAns.length; i++){
            console.log("index: " + i + " = " + userAns[i]);
            
          }
          var form = $('#quizform');
          var jsonString = JSON.stringify(userAns);
          console.log(jsonString);
          $.ajax({
            type: "post",
            url: "validateQuiz.php",
            data: {'userAns' : jsonString},
            success: function(){
              alert("success");
              //window.location.href = 'validateQuiz.php';
              window.location.href = 'risultati.php';
            }
          });
      }
          
      </script>
  </head>
  <body id ="body-quiz"class="text-center">
  <div class="header">
  <div class="progress-container">
    <div class="progress-bar" id="myBar" style="background-color: #ffe600"></div>
  </div>
</div>
    <header>
      <?php
        include("../navbar/navbar.php");
      ?>
    </header>
    
    <div class="text-center">
    <?php 
    if(isset($_GET['category'])){
      if ($_GET['category'] == 'sport'){
        $_SESSION['categoria'] = 'sport';
      }
      if ($_GET['category'] == 'geografia'){
        $_SESSION['categoria'] = 'geografia';
      }
      if ($_GET['category'] == 'general'){
        $_SESSION['categoria'] = 'generale';
      }
      if ($_GET['category'] == 'anime'){
        $_SESSION['categoria'] = 'anime';
      }
    }
    ?>      
    <div class="media-player text-center my-3">
      <audio id="quiz-audio" controls style="width: 300px; background: #fffbe6; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
      <source src="/Quiz/Music/quizBackgroundMusic.mp3" type="audio/mpeg">
      Il tuo browser non supporta l'audio HTML5.
      </audio>
      <style>
      .media-player audio::-webkit-media-controls-panel {
        background-color: #ffe600;
        border-radius: 8px;
      }
      .media-player {
        display: flex;
        justify-content: center;
        align-items: center;
  
      }
      </style>
    </div>
      <p class="header-text">
        <?php echo $_SESSION['username']; ?>
        Seleziona una risposta tra vero o falso!</p> 
        <p class="header-text"> Non lasciare domande senza risposta o sarai penalizzato!</p>
      <div id="timer"> Tempo rimasto: <span id="tempo">05:00</span> </div>

      <div id="question-card">
          <?php
            $categoria = $_SESSION['categoria'];
            //echo $categoria;
          
            $sql = " SELECT * FROM questions WHERE category= '$categoria' ORDER BY RAND() LIMIT 20";
            $query = mysqli_query($dbConnect, $sql);
            $correctAns = array();
            $index = 0;
            $correctidQ = [];
            while($res = mysqli_fetch_array($query)){
              echo '<div class="text-center" id="question-container">';
              echo '<h3 id="question-text">';
              echo $index+1;
              echo ')';
              echo  $res['questionText'];
              echo '</h3>';
              echo '<h4 id="answer-text">';
              echo '<div class="text-center" id="radio-answer-container">
                      <label class="container">Vero
                        <input class="radio" type="radio"  name="status['. $res['idQ'] .']" value="vero" id="userAns">
                        <span class="checkmark"></span>
                      </label>
                      <label class="container">Falso
                        <input class="radio" type="radio" name="status['. $res['idQ'] .']" value="falso" id="userAns">
                        <span class="checkmark"></span>
                      </label>
                    </div>';
              echo '</h4>';
              echo '</div>
                    <br>';
                    echo '<br>';
                    
              $correctAns[$index] = $res['correctAns'];
              $index++;
            }
            $serializeCorrect = implode(",", $correctAns);
            //print($serializeCorrect);
            // questo ciclo l'ho usato per vedere se le variabili 
            // di correctAns venissero salvate correttamente
          //    $i=0;
          //    for($i; $i<20; $i++){
          //     echo $i+1, $correctAns[$i];
          //     echo '<br>';
          //    }
          ?>
          <button class="btn btn-outline-dark my-2 mr-sm-2"  name="quiz-submit" onclick="storeUserAns()">
          Finito</button>
          <br>
          <?php
          $sqlAns= "UPDATE  correctAns SET ans = ? WHERE id = ? ";
          $stmt =mysqli_stmt_init($dbConnect);
          if(!mysqli_stmt_prepare($stmt, $sqlAns)){
            echo '<h1>Non riesco a connettermi</h1>';
          }else{
            mysqli_stmt_bind_param($stmt, "si", $serializeCorrect, $_SESSION['userId']);
            mysqli_stmt_execute($stmt);
            // echo '<h1>Query eseguita</h1>';
          }
          ?>
        </div>
      </div>
    </body>
    <script>
      window.onscroll = function() {myFunction()};

      function myFunction() {
      var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
      var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
      var scrolled = (winScroll / height) * 100;
      document.getElementById("myBar").style.width = scrolled + "%";
      } 
    </script>
</html>

<?php
session_start();
require "../dbhandler.php";
if(!isset($_SESSION['userId'])){
    header("Location: ../index.php?error=deviessereloggato");
    exit();
}
?>

<?php
  if(isset($_POST['submit'])){
    move_uploaded_file($_FILES['file']['tmp_name'], __DIR__.'/image/'.$_FILES['file']['name']);
    $query = "UPDATE users SET image = '".$_FILES['file']['name']."' WHERE idUsers = '".$_SESSION['userId']."'"; 
    $res= mysqli_query($dbConnect, $query);
    $_SESSION['image'] = $_FILES['file']['name']; //refresho anche questa variabile cosi si aggiorna anche la navbar

  }
?>


<?php 
$sqlDetailedStats = "SELECT t1.animeDone, t1.animeError, t1.animeCorrect, t1.animePoints, t2.generalDone, t2.generalError, t2.generalCorrect, t2.generalPoints, t3.geoDone, t3.geoError, t3.geoCorrect, t3.geoPoints, t4.sportDone, t4.sportError, t4.sportCorrect, t4.sportPoints  
FROM anime t1 
LEFT JOIN generale t2 ON t1.id = t2.id 
LEFT JOIN geografia t3 ON t1.id = t3.id
LEFT JOIN sport t4 ON t1.id = t4.id
WHERE t1.id = '".$_SESSION['userId']."'";
$stmt = mysqli_stmt_init($dbConnect);
if(!mysqli_stmt_prepare($stmt, $sqlDetailedStats)){
  header("Location: ../index.php?error=sqlerror");
  exit();
}
else{
  mysqli_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $rowData = mysqli_fetch_array($res);
  $pieAnime = ['Risposte giuste', 'Risposte errate'];
  $pieAnimedata = [$rowData['animeCorrect'], $rowData['animeError']];
}
?>

<!DOCTYPE html>
<html lang="it" id="html-index">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script
      type="text/javascript"
      src="https://www.gstatic.com/charts/loader.js"
    ></script>
    <script>
      $(document).ready(function () {
        $(".more-stats").click(function () {
          $("#text").text("Ecco le statistiche dettagliate!");
          $(".more-stats").animate(
            {
              // width: '1200px',
              height: "1300px",
            },
            1000
          );
          $(".detailed-stats").show().animate({ opacity: "1" }, 3000);
        });
      });
    </script>
    <script>
      google.charts.load("current", { packages: ["corechart"] });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Risposte Corrette');
        data.addColumn('number', 'Risposte Errate');  
        data.addRow([
          <?php
          echo " '[Risposte Corrette]' ,".$rowData['animeCorrect']."";
          ?>
          ]);
          data.addRow([
          <?php
          echo " '[Risposte Errate]' ,".$rowData['animeError']."";
          ?>
          ]);
        
        var options = {
          legend: 'none',
          backgroundColor: 'none',
          colors: ['green','red'],
          chartArea: {width:'80%',height:'80%'}
        };

        var chart = new google.visualization.PieChart(
          document.getElementById("right-data-pie-anime")
        );

        chart.draw(data, options);
      }
    </script>
        <script>
      google.charts.load("current", { packages: ["corechart"] });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Risposte Corrette');
        data.addColumn('number', 'Risposte Errate');  
        data.addRow([
          <?php
          echo " '[Risposte Corrette]' ,".$rowData['sportCorrect']."";
          ?>
          ]);
          data.addRow([
          <?php
          echo " '[Risposte Errate]' ,".$rowData['sportError']."";
          ?>
          ]);
        
        var options = {
          legend: 'none',
          backgroundColor: 'none',
          colors: ['green','red'],
          chartArea: {width:'80%',height:'80%'}
        };

        var chart = new google.visualization.PieChart(
          document.getElementById("right-data-pie-sport")
        );

        chart.draw(data, options);
      }
    </script>
            <script>
      google.charts.load("current", { packages: ["corechart"] });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Risposte Corrette');
        data.addColumn('number', 'Risposte Errate');  
        data.addRow([
          <?php
          echo " '[Risposte Corrette]' ,".$rowData['geoCorrect']."";
          ?>
          ]);
          data.addRow([
          <?php
          echo " '[Risposte Errate]' ,".$rowData['geoError']."";
          ?>
          ]);
        
        var options = {
          legend: 'none',
          backgroundColor: 'none',
          colors: ['green','red'],
          chartArea: {width:'80%',height:'80%'}
        };

        var chart = new google.visualization.PieChart(
          document.getElementById("right-data-pie-geo")
        );

        chart.draw(data, options);
      }
    </script>
                <script>
      google.charts.load("current", { packages: ["corechart"] });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Risposte Corrette');
        data.addColumn('number', 'Risposte Errate');  
        data.addRow([
          <?php
          echo " '[Risposte Corrette]' ,".$rowData['generalCorrect']."";
          ?>
          ]);
          data.addRow([
          <?php
          echo " '[Risposte Errate]' ,".$rowData['generalError']."";
          ?>
          ]);
        
        var options = {
          legend: 'none',
          backgroundColor: 'none',
          colors: ['green','red'],
          chartArea: {width:'80%',height:'80%'}
        };

        var chart = new google.visualization.PieChart(
          document.getElementById("right-data-pie-general")
        );

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <header>
      <?php
        include("../navbar/navbar.php");
      ?>
    </header>
    <main>
      <div class="stats-container">
        <div class="stats-container-top">
          <p>
            Statistiche di
            <?php echo $_SESSION['username']; ?>
          </p>
        </div>
        <div class="propic-container">
          <div class="propic-container-photo">
            <?php
                    //aggiorno la variabile ad ogni refresh, cosi l'utente NON deve riloggare per
                    //aggiornare la variabile e vedere la sua immagine del profilo.
                    $sql = "SELECT image FROM users where idUsers='".$_SESSION['userId']."'";
                    $stmt = mysqli_stmt_init($dbConnect);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                      header("Location: ../index.php?error=sqlerror");
                      exit();
                    }
                    else{
                      mysqli_execute($stmt);
                      $res = mysqli_stmt_get_result($stmt);
                      $row = mysqli_fetch_assoc($res);
                      if($row['image'] == NULL){
                        echo "<img class='profile-picture' src='./image/default.png' alt='Default Propic'>";
            }else{ echo "<img class='profile-picture'
            src='./image/".$row['image']."' alt='Your Propic'>"; } } ?>
          </div>
          <div class="propic-container-upload">
            <form action="" method="post" enctype="multipart/form-data">
              <!-- da w3schools: No characters are encoded. This value is required when you are using forms that have a file upload control-->
              <label
                for="upload-photo"
                class="label-upload btn btn-outline-dark"
                >Scegli file</label
              >
              <input type="file" name="file" id="upload-photo" />
              <label
                for="submit-photo"
                class="label-upload btn btn-outline-dark"
                >Invia file</label
              >
              <input type="submit" name="submit" id="submit-photo" />
            </form>
          </div>
        </div>
        <div class="stats-container-mid">
          <h4>
            Complimenti! Hai totalizzato ben:
            <?php echo $_SESSION['totalpoints']; ?>
            punti!
          </h4>
          <h4>
            Hai completato
            <?php echo $_SESSION['quizdone']; ?>
            Quiz
          </h4>
          <h4>
            Con
            <?php echo $_SESSION['risposteCorr']; ?>
            risposte corrette e
            <?php echo $_SESSION['risposteErr']; ?>
            risposte errate
          </h4>
          <h4>
            La tua media punti per quiz è
            <?php echo $_SESSION['mediaPoints']; if($_SESSION['mediaPoints'] < 55){echo ' dovresti proprio migliorare..';}else{echo ' stai andando bene! continua cosi!';}?>
          </h4>
          <div class="more-stats">
            <h2 id="text">Qui per vedere statistiche pù approfondite</h2>
            <div class="detailed-stats">
              <div class="stats">
                <div class="anime-stats">
                  <p>Cultura Pop</p>
                  <div class="left-data">
                    <h4>
                      Quiz fatti:
                      <?php echo $rowData['animeDone']?>
                    </h4>
                    <h4>
                      Punti accumulati:
                      <?php echo $rowData['animePoints']?>
                    </h4>
                    <h4>
                      Media punti:
                      <?php  
                      $media = $rowData['animeDone'] > 0 ? $rowData['animePoints'] / $rowData['animeDone'] : 0;
                      echo number_format($media, 2);
                      ?>
                    </h4>
                    <h4>
                      Risposte Corrette:
                      <?php echo $rowData['animeCorrect']?>
                    </h4>
                    <h4>
                      Risposte Errate:
                      <?php echo $rowData['animeError']?>
                    </h4>
                    <h4>
                      <?php if($rowData['animeCorrect'] / $rowData['animeError'] > 1){
                        echo 'Non male.. te la cavi in questa categoria!';
                        }else{
                          echo 'Dovresti proprio impegnarti di più in questa categoria..';
                        }
                        ?>
                    </h4>
                  </div>
                  <div id="right-data-pie-anime"></div>
                </div>
                <div class="sport-stats">
                  <p>Sport</p>
                  <div class="left-data">
                    <h4>
                      Quiz fatti:
                      <?php echo $rowData['sportDone']?>
                    </h4>
                    <h4>
                      Punti accumulati:
                      <?php echo $rowData['sportPoints']?>
                    </h4>
                    <h4>
                      Media punti:
                      <?php  echo $media =$rowData['sportPoints']/ $rowData['sportDone'] ?>
                    </h4>
                    <h4>
                      Risposte Corrette:
                      <?php echo $rowData['sportCorrect']?>
                    </h4>
                    <h4>
                      Risposte Errate:
                      <?php echo $rowData['sportError']?>
                    </h4>
                    <h4>
                      <?php if($rowData['sportCorrect'] / $rowData['sportError'] > 1){
                        echo 'Non male.. te la cavi in questa categoria!';
                        }else{
                          echo 'Dovresti proprio impegnarti di più in questa categoria..';
                        }
                        ?>
                    </h4>
                </div>
                <div id="right-data-pie-sport"></div>
                <div class="geo-stats">
                <p>Geografia</p>
                  <div class="left-data">
                    <h4>
                      Quiz fatti:
                      <?php echo $rowData['geoDone']?>
                    </h4>
                    <h4>
                      Punti accumulati:
                      <?php echo $rowData['geoPoints']?>
                    </h4>
                    <h4>
                      Media punti:
                      <?php  
                      $media = $rowData['geoDone'] > 0 ? $rowData['geoPoints'] / $rowData['geoDone'] : 0;
                      echo number_format($media, 2);
                      ?>
                      
                    </h4>
                    <h4>
                      Risposte Corrette:
                      <?php echo $rowData['geoCorrect']?>
                    </h4>
                    <h4>
                      Risposte Errate:
                      <?php echo $rowData['geoError']?>
                    </h4>
                    <h4>
                      <?php if($rowData['geoCorrect'] / $rowData['geoError'] > 1){
                        echo 'Non male.. te la cavi in questa categoria!';
                        }else{
                          echo 'Dovresti proprio impegnarti di più in questa categoria..';
                        }
                        ?>
                    </h4>
                </div>
                <div id="right-data-pie-geo"></div>
                <div class="generale-stats">
                <p>Cultura Generale</p>
                  <div class="left-data">
                    <h4>
                      Quiz fatti:
                      <?php echo $rowData['generalDone']?>
                    </h4>
                    <h4>
                      Punti accumulati:
                      <?php echo $rowData['generalPoints']?>
                    </h4>
                    <h4>
                      Media punti:
                      <?php  
                      $media = $rowData['generalDone'] > 0 ? $rowData['generalPoints'] / $rowData['generalDone'] : 0;
                      echo number_format($media, 2);
                      ?>
                    </h4>
                    <h4>
                      Risposte Corrette:
                      <?php echo $rowData['generalCorrect']?>
                    </h4>
                    <h4>
                      Risposte Errate:
                      <?php echo $rowData['generalError']?>
                    </h4>
                    <h4>
                      <?php if($rowData['generalCorrect'] / $rowData['generalError'] > 1){
                        echo 'Non male.. te la cavi in questa categoria!';
                        }else{
                          echo 'Dovresti proprio impegnarti di più in questa categoria..';
                        }
                        ?>
                    </h4>
                    </div>
                    <div id="right-data-pie-general"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>

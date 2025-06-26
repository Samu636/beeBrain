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

<?php
  if(isset($_POST['submit'])){
    move_uploaded_file($_FILES['file']['tmp_name'], __DIR__.'/image/'.$_FILES['file']['name']);
    $query = "UPDATE users SET image = '".$_FILES['file']['name']."' WHERE idUsers = '".$_SESSION['userId']."'"; 
    $res= mysqli_query($dbConnect, $query);
    $_SESSION['image'] = $_FILES['file']['name'];

  }
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
    <link rel="stylesheet" type="text/css" href="/prova.css" />
    <link rel="stylesheet" type="text/css" href="/user/contattaci.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        $(".container-change-data").click(function(){
          $("#text").text("Compila i campi che vuoi modificare!");
          $(".container-change-data").animate({
            // width: '1200px',
            height: '400px'
          }, 1000);
          $(".form-data-update").show().animate({ opacity: '1'}, 3000)
        });
      });
    </script>
    <script>
            $(document).ready(function(){
        $("#changedata").submit(function(event){
          event.preventDefault();
          var name = $("#name").val();
          var email = $("#mail").val();
          var newPsw = $("#newPsw").val();
          var oldPsw = $("#oldPsw").val();
          var submit = $("#change-submit").val()
          $(".form-message").load("validate-data-update.php", {
            name: name,
            email: email,
            newPsw: newPsw,
            oldPsw: oldPsw,
            submit: submit
          });
        });
      });
    </script>
  </head>
  <body class="text-center" id="body-index">
    <header>
      <?php
        include("../navbar/navbar.php");
      ?>
    </header>
    <main>
      <div class="stats-container">  
        <div class="stats-container-top">
            <p class="settings-header-text">Impostazioni</p>
            <h2 class="settings-header-bot-text">Modifica dati</h2>
        </div>
        <div class="propic-container">
          <h6 class="propic-text">Immagine profilo</h6>
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
                  }else{
                    echo "<img class='profile-picture' src='./image/".$row['image']."' alt='Your Propic'>";
                  }
                }
              
                ?>
          </div>
          <div class="propic-container-upload">
              <form action="" method="post" enctype="multipart/form-data"> <!-- da w3schools: No characters are encoded. This value is required when you are using forms that have a file upload control-->
                <label for="upload-photo" class="label-upload btn btn-outline-dark ">Scegli file</label>
                <input type="file" name="file" id="upload-photo">
                <label for="submit-photo" class="label-upload btn btn-outline-dark ">Invia file</label>
                <input type="submit" name="submit" id="submit-photo">
              </form>
          </div>
        </div>
      <div class = "stats-container-mid">
        <br><br>
        <h3 class="username">Username: </h3> <h3 class="username-text"> <?php echo $_SESSION['username']?></h3><br> <br>
        <h3 class="email">Email: </h3> <h3 class="email-text"><?php echo $_SESSION['email']?> </h3><br> <br>
        <div class="container-change-data"><h2 id="text">Per cambiare i tuoi dati fai click qui</h2>
          <div class="form-data-update">
            <form id="changedata" action ="validate-data-update.php" method="POST">
            <input id ="name" type="text" name="username" placeholder="Nuovo Username" />
            <input id="mail" type="text" name="mail" placeholder="Nuova email" />
            <input id ="newPsw"type="password" name="newPsw" placeholder="Nuova Password" />
            <input id ="oldPsw"type="password" name="oldPsw" placeholder="Vecchia Password" />
            <button id="change-submit" type="submit" name="submit">
              Invia
            </button>
            <h3 class="form-message"></h3>
          </form>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>

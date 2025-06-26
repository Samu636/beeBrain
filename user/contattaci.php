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
    <link rel="stylesheet" type="text/css" href="/user/contattaci.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <header>
      <?php
            include("../navbar/navbar.php");
            ?>
    </header>
    <main>
        <p>Contattaci!</p>
        <h4>Segnalaci qualsiasi bug/errore! Li risolveremo il prima possibile!</h4>
        <h4>Grazie!</h4>
        <form class="contact-form" action="/user/contact-form.php" method="post">
          <input type="text" name="name" placeholder="Nome" />
          <input type="text" name="mail" placeholder="La tua e-mail" />
          <input type="text" name="oggetto" placeholder="Oggetto" />
          <textarea name="message" placeholder="Messaggio"></textarea>
          <button  type="submit" name="submit">
            Invia
          </button>
        </form>
    </main>
  </body>
</html>

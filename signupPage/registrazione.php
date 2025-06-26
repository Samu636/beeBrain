<!DOCTYPE html>
<html id="signup">
  <head>
    <title>beeBrain-Registrazione</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width-device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/prova.css" />
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <script src="/signupPage/registrazioneScript.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  </head>
  <body class="body-signup">
    <header>
    <?php
        include("../navbar/navbar.php");
      ?>
    </header>
    <h1 class="registration-text">
      Registrati
    </h1>
    <p >
      Sei gia un membro? <a  href="/loginPage/login.php">Accedi</a>
    </p>
    <!-- action = /file.php-->
    <form
      action="validateRegistrazione.php"
      method="POST"
      name="registrazione"
      onsubmit="return ValidaForm();"
    >
      <div class="container" id="container-login">
        <div class="d-flex justify-content-center h-100">
          <div class="card" id="card-login">
            <div class="card-header">
              <h3>Registrati</h3>
            </div>
            <div class="card-body">
              <form>
                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <span
                        class="iconify"
                        data-icon="mdi-bee"
                        data-inline="false"
                      ></span>
                    </span>
                  </div>
                  <input
                    type="text"
                    name="username"
                    class="form-control"
                    placeholder="username"
                  />
                </div>
                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <span
                        class="iconify"
                        data-icon="emojione-monotone:honeybee"
                        data-inline="false"
                      ></span>
                    </span>
                  </div>
                  <input
                    type="text"
                    name="email"
                    class="form-control"
                    placeholder="Indirizzo email"
                  />
                </div>
                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <span
                        class="iconify"
                        data-icon="mdi-beehive-outline"
                        data-inline="false"
                      ></span>
                    </span>
                  </div>
                  <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="password"
                  />
                </div>
                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <span
                        class="iconify"
                        data-icon="mdi:beehive-off-outline"
                        data-inline="false"
                      ></span>
                    </span>
                  </div>
                  <input
                    type="password"
                    name="confermapassword"
                    class="form-control"
                    placeholder="conferma password"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="submit"
                    name="signup-submit"
                    value="Registrati"
                    class="btn float-right"
                    id="loginbtn"
                  />
                </div>
              </form>
            </div>
            <div class="card-bottom">
            <?php
                if (isset($_GET['error'])){
                  if ($_GET['error'] == 'invalidemail'){ 
                    echo '<p class="registration-error">Email non valida!</p>';
                  }else if($_GET['error'] == 'sqlerror'){
                    echo '<p class="registration-error">Connessione al server non riuscita</p>';
                  }else if($_GET['error'] == 'usernametaken'){
                    echo '<p class="registration-error">Username già in uso!</p>';
                  }
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </form>
  </body>
  <!-- serve per far funzionare il bottone nella navbar-->
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</html>
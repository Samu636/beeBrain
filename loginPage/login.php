<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="it" id="html-login">
  <head>
    <title>beeBrain - login</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width = device-width, initial-scale=1,  shrink-to-fit=no"
    />
    <!-- css LINK-->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/prova.css" />
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="/loginPage/loginScript.js"></script>
  </head>
  <body id="bodylogin">
    <header>
      <?php
        include("../navbar/navbar.php");
      ?>
    </header>
    <main>
      <div class="container" id="container-login">
        <div class="d-flex justify-content-center h-100">
          <div class="card" id="card-login">
            <div class="card-header">
              <h3>Log In</h3>
              <div class="d-flex justify-content-end social_icon">
                <span><i class="fab fa-facebook-square"></i></span>
              </div>
            </div>
            <div class="card-body">
              <form
              action="validateLogin.php"
              method="POST"
              name="login"
              >
            <div class="card-body">
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
                    placeholder="username / email"
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
                    id="txtPassword"
                    name="password"
                    class="form-control"
                    placeholder="password"
                  />
                </div>
                <div class="row align-items-center" id="login-checkbox">
                  <input type="checkbox" id="cbShowPassword" onclick="showPassword()" />Mostra password
                </div>
                <div class="form-group">
                  <input
                    type="submit"
                    name="login-submit"
                    value="Login"
                    class="btn float-right"
                    id="loginbtn"
                  />
                </div>
              </form>
              <div>
              <?php
                if (isset($_GET['signup'])){
                  if ($_GET['signup'] == 'success'){ 
                    echo '<p class="registration-error">Adesso puoi fare il login!</p>';
                  }
                }
                if (isset($_GET['error'])){
                  if ($_GET['error'] == 'passworderrata'){
                    echo '<p class="registration-error">Password errata!</p>';
                  }
                }
              ?>
              </div>
            </div>
            <div class="card-footer">
              <div class="d-flex justify-content-center">
                Don't have an account?<a
                  class="bottom-card"
                  href="/signupPage/registrazione.php"
                  >Sign Up</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
  <!-- serve per far funzionare il bottone nella navbar-->
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</html>

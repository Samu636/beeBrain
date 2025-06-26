

<html>
<div id="navbar">
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/prova.css" />
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <?php
        session_start();
    ?>
    <nav class="navbar navbar-expand-lg" style="background-color: gold;">
        <img src="/game/grafica/flappyBee.png" width="45" height="45" alt="">
        <a class="beeBrain-navbar" href="#">beeBrain</a>
        <!--qui possiamo mettere un easter egg/animiazione di un ape-->
        
        <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarTop"
        aria-controls="navbarTop"
        aria-expanded="false"
        aria-label="Toggle navigation"
        >
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTop">
        <div class="navbar-nav mr-auto">
            <a class="nav-item nav-link" href="/index.php"
            >Home <span class="sr-only">(current)</span></a
            >
            <a class="nav-item nav-link" href="/Quiz/categorie.php">Quiz</a>
            <a class="nav-item nav-link" href="/AboutUs/aboutus.php">Chi siamo</a>
        </div>
        <?php
            if (isset($_SESSION['userId'])){
                if($_SESSION['image'] == NULL){
                    $imagepath = "Userblack.png";
                }else{
                    $imagepath = $_SESSION['image'];
                }

            echo '<div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img  class="navbar-user-image"src="/user/image/'.$imagepath.'" width="45" height="45" alt="">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/user/statistiche.php">Statistiche</a>
                <a class="dropdown-item" href="/user/impostazioni.php">Impostazioni</a>
                <a class="dropdown-item" href="/user/contattaci.php">Contattaci</a>
                
                <div class="dropdown-divider"></div>
                <form action="/loginPage/logout.php"> <button type="submit" name="logout-submit logo-dropdown" class="dropdown-item">Logout</form></button></form>
            </div>
            </div>';
            }
            else{
            echo '<div class="navbar-nav ml-auto">
            <a
                class="btn btn-outline-dark my-2 mr-sm-2 "
                href="/loginPage/login.php"
                >Log In</a
            >
            <a
                class="btn btn-outline-dark my-2 mr-sm-2"
                href="/signupPage/registrazione.php"
                >Sign Up</a
            >
            </div>';
            }
        ?>
        </div>
    </nav>
</div>
</html>
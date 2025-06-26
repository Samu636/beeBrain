<?php
if(isset($_POST['signup-submit'])) {
    //require '/signupPage/dbhandler.php'; //ci da l'accesso alla variabile dbConn nel file handler
    //require_once $_SERVER['DOCUMENT_ROOT'].'/dbhandler.php';
    require '../dbhandler.php';


    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confermaPassword = $_POST['confermapassword'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ //funzione per email ''validi'' (solo format, non controlla che sia esisteente ovviamente..)
        header("Location: /signupPage/registrazione.php?error=invalidemail&username=".$username);
        exit();
    }
    else { //controllo se il nome utente è gia pèresente nel db
        
        $sql = "SELECT username FROM users WHERE username=?"; //uso un placeholder, altrimenti si puo mettere del codice sql nel text input e creare problemi al db
        $stmt = mysqli_stmt_init($dbConnect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: /signupPage/registrazione.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $username); //stringa -> s; integer->i; boolean->b; double->d; metto una S solo perche c'è solo un parametro.. altrimenti "ss" due parametri, "sss" tre ecc.
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resoultCheck  = mysqli_stmt_num_rows($stmt);
            if($resoultCheck > 0) {
                header("Location: /signupPage/registrazione.php?error=usernametaken&email=".$email);
                exit();
            }else{
                $sql = "INSERT INTO users (username, emailUsers, pwdUsers) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($dbConnect);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: /signupPage/registrazione.php?error=sqlerror");
                    exit();
                }else{
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT); //md5 ecc. non sono piu molto sicuri
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    $sql1="INSERT into geografia(geoDone) values(0)";
                    $sql2="INSERT into anime(animeDone) values(0)";
                    $sql3="INSERT into sport(sportDone) values(0)";
                    $sql4="INSERT into generale(generalDone) values(0)";
                    $sql5="INSERT into correctAns(ans) values('ans')";
                    $res= mysqli_query($dbConnect, $sql1);
                    $res= mysqli_query($dbConnect, $sql2);
                    $res= mysqli_query($dbConnect, $sql3);
                    $res= mysqli_query($dbConnect, $sql4);
                    $res= mysqli_query($dbConnect, $sql5);
                    header("Location: ../loginPage/login.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($dbConnect);
}else{
    header("Location: /signupPage/registrazione.php");
    exit();
}
?>

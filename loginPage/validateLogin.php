<?php

if (isset($_POST['login-submit'])) {
    require '../dbhandler.php';

    $email = $_POST['username']; //ho scelto di usare email, questa variabile vale sia per username che per email dato che si puo fare il login con tutti e due
    $password = $_POST['password'];

    if (empty($email) || empty($password)) { //probabilmente lo gestisco con javascript
        header("Location: /loginPage/login.php?error=emptyfields");
        exit();
    }else {
        $sql = "SELECT * FROM users WHERE username=?  OR emailUsers=?;";
        $stmt = mysqli_stmt_init($dbConnect);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: /loginPage/login.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "ss", $email, $email);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            //adesso devo controllare se esiste o meno l'utente
            if ($row = mysqli_fetch_assoc($res)){
                $pwdCheck = password_verify($password, $row['pwdUsers']); //torna true or false
                if($pwdCheck == false){
                    header("Location: /loginPage/login.php?error=passworderrata");
                    exit();
                }
                else if ($pwdCheck == true){ //qui loggo l'utente, starto la sessione con una variabile globale
                    //credo che devo aggiungere nel db una colonna per il punteggio per implementare una graduatoria tra utenti
                    session_start();        //NOTA VA AGGIUNTA IN TUTTE LE PAGINE IN CUI C'È LA SESSIONE UTENTE
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['emailUsers'];
                    $_SESSION['image'] = $row['image'];
                    $_SESSION['risposteCorr'] = $row['risposteCorr'];
                    $_SESSION['risposteErr'] = $row['risposteErr'];
                    $_SESSION['storeCorrectAns'];
                    $_SESSION['geoQuiz'];
                    $_SESSION['sportQuiz'];
                    $_SESSION['generalQuiz'];
                    $_SESSION['animeQuiz'];
                    $_SESSION['giuste'];
                    $_SESSION['sbagliate'];
                    $_SESSION['punteggio'];
                    $_SESSION['quizdone'] = $row['quizDone'];
                    $_SESSION['totalpoints'] = $row['totalPoints']; 
                    $_SESSION['categoria'];
                    $_SESSION['mediaPoints'] = $row['mediaPoints'];
                    header("Location: ../index.php?login=success");
                }else{ //nel caso password verify non torni ne true ne false.. non credo serva ma non si sa mai
                    header("Location: /loginPage/login.php?error=passworderrata");
                    exit();
                }
            }else{
                header("Location /loginPage/login.php?error=nouser");
                exit();
            }
        }
    }




}else {
    header("Location: ../index.html");
}
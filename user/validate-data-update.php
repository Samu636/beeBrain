<?php
session_start();
require '../dbhandler.php';
if (isset($_POST['submit'])){
    

    $name= $_POST['name'];
    $email= $_POST['email'];
    $newPsw= $_POST['newPsw'];
    $oldPsw= $_POST['oldPsw'];


    $errorEmpty=false;
    $errorEmail = false;
    $errorUsername= false;
    $errorPassword=false;

    $sql = "SELECT username FROM users WHERE username=? AND(idUsers!=?)"; //ovviamente checko per tutti gli altri username tranne il suo, cosi se vuole puo lasciarlo invariato
    $stmt = mysqli_stmt_init($dbConnect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //header("Location: /signupPage/registrazione.php?error=sqlerror");
        echo "<span class='form-error'>Non riesco a connettermi al server</span>";
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "si", $name, $_SESSION['userId']); 
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resoultCheck  = mysqli_stmt_num_rows($stmt);
        if($resoultCheck > 0) {
            echo "<span class='form-error'>Username già in uso!</span>";
            $errorUsername=true;
            exit();
        }
    }

    if (empty($name) || empty($email) || empty($newPsw) ||empty($oldPsw)){
        echo "<span class='form-error'>Devi compilare tutti i campi</span>";
        $errorEmpty=true;
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<span class='form-error'>Email non valida!</span>";
        $errorEmail = true;
    }else {
        $sql2 = "SELECT pwdUsers FROM users WHERE idUsers=?";
        $stmt = mysqli_stmt_init($dbConnect);
        if (!mysqli_stmt_prepare($stmt, $sql2)){
            echo "<span class='form-error'>Non riesco a connettermi al server.. :(</span>";
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "i", $_SESSION['userId']);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($res)){
                $pwdCheck = password_verify($oldPsw, $row['pwdUsers']); //torna true or false
                if($pwdCheck == false){
                    echo "<span class='form-error'>La password non è corretta.</span>";
                    $errorPassword=true;
                }
                elseif ($pwdCheck == true) {
                    //aggiorno tutto, le cose che non vuole cambiare le aggiorno con la stessa stringa.
                    $sql3 ="UPDATE users SET username=?, emailUsers=?, pwdUsers=? WHERE idUsers = '".$_SESSION['userId']."'";
                    $stmt = mysqli_stmt_init($dbConnect);
                    if (!mysqli_stmt_prepare($stmt, $sql3)){
                        echo "<span class='form-error'>Non riesco a connettermi al server.. :(</span>";
                        exit();
                    }else{
                        $hashedPwd = password_hash($newPsw, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
                        mysqli_stmt_execute($stmt);
                        echo "<span class='form-success'>Dati aggiornati correttamente!</span>";
                        echo "<span class='form-success'>Fai il <a href='/loginPage/login.php'>Login</a> con i tuoi nuovi dati</span>";
                    }
                }else{
                    //just in case password verify generi qualche errore
                    echo "<span class='form-error'>Non riesco a verificare la password.....</span>";
                }
            }
        }
    }
}
?>
<script>
    $("#mail,#name,#newPsw,#oldPsw").removeClass("input-error");
    var errorEmpty ="<?php echo $errorEmpty?>";
    var errorEmail ="<?php echo $errorEmail?>";
    var errorUsername ="<?php echo $errorUsername?>";
    var errorPassword ="<?php echo $errorPassword?>";

    if (errorUsername == true){
        $('#name').addClass("input-error");
    }
    if(errorEmpty == true){
        $("#mail,#name,#newPsw,#oldPsw").addClass("input-error");
    }
    if(errorPassword == true){
        $('#oldPsw').addClass("input-error");
    }

    if(errorEmail == true){
        $("#mail").addClass("input-error");
    }
    if (errorEmail == false && errorEmpty == false && errorUsername == false && errorPassword == false){
        $("#mail,#name,#newPsw,#oldPsw").val("");

    }
</script>
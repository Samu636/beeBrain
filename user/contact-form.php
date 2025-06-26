<?php
//Con questo metodo non riesco a mandare mail da localhost.. ne devo trovare uno che funziona con localhost.
// if(isset($_POST['submit'])){
//     $name = $_POST['name'];
//     $oggetto = $_POST['oggetto'];
//     $mailfrom = $_POST['mail'];
//     $message = $_POST['message'];

//     $mailto= "samu220111@gmail.com"; //dobbiamo crearne una per il sito? 
//     $headers= "From: ".$mailfrom;
//     $txt = "Hai ricevuto una e-mail da ".$name.".\n\n".$message;
//     mail($mailto, $oggetto, $txt, $headers);
//     header("Location: contattaci.php?mailsend");
// }

//----METODO FUNZIONANTE CON LOCALHOST----//


use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $oggetto = $_POST['oggetto'];
    $mailfrom = $_POST['mail'];
    $message = $_POST['message'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //SMTP Settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "beebrain.ltw@gmail.com";
    $mail->Password = 'Beebrain98!';
    $mail->Port = 587; //587 o 465
    $mail->SMTPSecure = "tls"; //sls o tls

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($mailfrom, $name);
    $mail->addAddress("beebrain.ltw@gmail.com");
    $mail->Subject = $oggetto;
    $mail->Body = $message;

    if ($mail->send()) {
        header("Location:  contattaci.php?mailsend=true");
        exit();
    } else {
        $status = "failed";
        $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        //header("Location:  contattaci.php?mailsend=false");
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}

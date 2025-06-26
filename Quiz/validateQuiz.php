
<?php
session_start();
    require '../dbhandler.php';
    $myArray = json_decode($_POST['userAns']);
    $i=0;
    $giuste=0;
    $sbagliate=0;
    $sqlCorrette = "SELECT ans FROM correctAns WHERE id = '".$_SESSION['userId']."'";
    $stmt = mysqli_stmt_init($dbConnect);
    if(!mysqli_stmt_prepare($stmt, $sqlCorrette)){
        header("Location: ../index.php?error=sqlerror");
        exit();
    }else{
        mysqli_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($res);
        $answer = explode(",",$row['ans']);
        $i=0;
        $giuste=0;
        $sbagliate=0;
        for($i; $i<20; $i++){
            echo $myArray[$i], $answer[$i];
            if($myArray[$i] == $answer[$i]){
                $giuste++;
                
            }else{
                $sbagliate++;
            }
        }
    }
    $punteggio = $giuste*5 - $sbagliate*2;
    echo '<h3>risposte esatte:<h3>';
    echo $giuste;
    echo '<h3>risposte errate:<h3>';
    echo $sbagliate;
    echo '<h3>punteggio totale:<h3>';
    echo $punteggio;

    $_SESSION['giuste'] = $giuste;
    $_SESSION['sbagliate'] = $sbagliate;
    $_SESSION['punteggio'] = $punteggio;
    $_SESSION['quizdone'] += 1;
    $_SESSION['totalpoints'] += $punteggio;
    $_SESSION['risposteCorr'] += $giuste;
    $_SESSION['risposteErr'] += $sbagliate;
    $categoria = $_SESSION['categoria'];
    echo $categoria;
    if ($_SESSION['categoria'] == 'sport'){
        $sql = "SELECT * FROM sport WHERE id='".$_SESSION['userId']."'";
        $stmt = mysqli_stmt_init($dbConnect);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }else{
            mysqli_execute($stmt);
            $row = mysqli_stmt_get_result($stmt); //row dovrebbe essere res per far capire meglio... ma me ne sono accorto troppo tardi
            $res = mysqli_fetch_array($row);
            $sportDone= $res['sportDone'];
            $sportError= $res['sportError'];
            $sportCorrect= $res['sportCorrect'];
            $sportPoints= $res['sportPoints'];
        }
        $sportDone+=1;
        $sportError += $sbagliate;
        $sportCorrect += $giuste;
        $sportPoints += $punteggio;
        $sqlUpdate = "UPDATE sport SET sportDone='$sportDone', sportError= '$sportError', sportCorrect= '$sportCorrect', sportPoints='$sportPoints' WHERE id='".$_SESSION['userId']."'";
        $resUpdate = mysqli_query($dbConnect, $sqlUpdate);
    }else if($_SESSION['categoria'] == 'generale'){
        $sql = "SELECT * FROM generale WHERE id='".$_SESSION['userId']."'";
        $stmt = mysqli_stmt_init($dbConnect);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }else{
            mysqli_execute($stmt);
            $row = mysqli_stmt_get_result($stmt); //row dovrebbe essere res per far capire meglio... ma me ne sono accorto troppo tardi
            $res = mysqli_fetch_array($row);
            $generalDone= $res['generalDone'];
            $generalError= $res['generalError'];
            $generalCorrect= $res['generalCorrect'];
            $generalPoints= $res['generalPoints'];
        }
        $generalDone+=1;
        $generalError += $sbagliate;
        $generalCorrect += $giuste;
        $generalPoints += $punteggio;
        $sqlUpdate = "UPDATE generale SET generalDone='$generalDone', generalError= '$generalError', generalCorrect= '$generalCorrect', generalPoints='$generalPoints' WHERE id='".$_SESSION['userId']."'";
        $resUpdate = mysqli_query($dbConnect, $sqlUpdate);
                
    }else if($_SESSION['categoria'] == 'geografia'){
        $sql = "SELECT * FROM geografia WHERE id='".$_SESSION['userId']."'";
        $stmt = mysqli_stmt_init($dbConnect);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }else{
            mysqli_execute($stmt);
            $row = mysqli_stmt_get_result($stmt); //row dovrebbe essere res per far capire meglio... ma me ne sono accorto troppo tardi
            $res = mysqli_fetch_array($row);
            $geoDone= $res['geoDone'];
            $geoError= $res['geoError'];
            $geoCorrect= $res['geoCorrect'];
            $geoPoints= $res['geoPoints'];
        }
        $geoDone+=1;
        $geoError += $sbagliate;
        $geoCorrect += $giuste;
        $geoPoints += $punteggio;
        $sqlUpdate = "UPDATE geografia SET geoDone='$geoDone', geoError= '$geoError', geoCorrect= '$geoCorrect', geoPoints='$geoPoints' WHERE id='".$_SESSION['userId']."'";
        $resUpdate = mysqli_query($dbConnect, $sqlUpdate);

    }else if($_SESSION['categoria'] == 'anime'){
        $sql = "SELECT * FROM anime WHERE id='".$_SESSION['userId']."'";
        $stmt = mysqli_stmt_init($dbConnect);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }else{
            mysqli_execute($stmt);
            $row = mysqli_stmt_get_result($stmt); //row dovrebbe essere res per far capire meglio... ma me ne sono accorto troppo tardi
            $res = mysqli_fetch_array($row);
            $animeDone= $res['animeDone'];
            $animeError= $res['animeError'];
            $animeCorrect= $res['animeCorrect'];
            $animePoints= $res['animePoints'];
        }
        $animeDone+=1;
        $animeError += $sbagliate;
        $animeCorrect += $giuste;
        $animePoints += $punteggio;
        $sqlUpdate = "UPDATE anime SET animeDone='$animeDone', animeError= '$animeError', animeCorrect= '$animeCorrect', animePoints='$animePoints' WHERE id='".$_SESSION['userId']."'";
        $resUpdate = mysqli_query($dbConnect, $sqlUpdate);
    }
    $media = $_SESSION['totalpoints'] / $_SESSION['quizdone'];
    $mediaFormatted = number_format((float)$media, 0 ,'.',''); //potevo fare la divisione intera ma volevo provare ad usare 1 o 2 numeri decimale.. ma meglio solo interi. 
    $_SESSION['mediaPoints'] = $mediaFormatted;
    $sql = "UPDATE users SET quizDone=?, risposteCorr=?, risposteErr=?, totalPoints=?, mediaPoints=? WHERE idUsers=?";
    $stmt = mysqli_stmt_init($dbConnect);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../index.php?error=sqlerror");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "iiiiii", $_SESSION['quizdone'],  $_SESSION['risposteCorr'], $_SESSION['risposteErr'], $_SESSION['totalpoints'], $_SESSION['mediaPoints'], $_SESSION['userId']);
        mysqli_stmt_execute($stmt);
        header("Location: ../Quiz/risultati.php?success");
        exit();
    }





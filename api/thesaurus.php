<?php 

    session_start(); 	
    if($_GET["language"]) { 
        $_SESSION["langue"] = $_GET["language"];
    } 
    $i = 1;
    $langue = $_SESSION["langue"];
    if (!isset($langue)) {
        $langue=1;
    }
    include "./../lib/php/db.class.php";
    include "./../lib/php/db.conf.php";
    include "./../langues/".$langue.".php";

    if(isset($_GET["thema"])) {
        $url = $_GET["thema"]; 
        $url = urldecode($url);
        $mots = DB::query( "SELECT * FROM lexique WHERE terme=%s OR synonyme=%s", $url, $url );
        $alire = [];
        foreach( $mots as $mot ) {
            $membre1 = $mot["terme"];
            $membre2 = $mot["synonyme"];
            $lectures = DB::query( "SELECT * FROM dialogues WHERE `thesaurus` LIKE %s AND langueId=%d", "%".$membre1."%",  $langue);

            foreach ( $lectures as $lecture ) {
                $i = $lecture["id"];
                $alire[$i][0] = $lecture["titre"];
                $alire[$i][1] = $lecture["chapeau"];
            }
            
            $nbl = count($alire);
        }
        if($nbl == 0) {
            $data = array("alire" => "Ce terme n'est pas encore illustré dans une lecture,vous pouvez poser une question au double si vous le souhaitez", "status" => "none");
        } else {
            $data = array("alire" => $alire, "status" => "exist");
        }
    }

    header('Content-Type: application/json');
    echo json_encode($data);
?>

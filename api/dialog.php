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

    include "./../langues/".$langue.".php";
    include "./../lib/php/db.class.php";
    include "./../lib/php/db.conf.php";
    
    $data = array();
    
    if(isset($_GET["story"])) {
        $isFavourite = 0;
        $favourite_id = "";
        $dialogueAAfficher = $_GET["story"]; 
        $dialogue = DB::queryFirstRow("SELECT * FROM dialogues WHERE id=%i", $dialogueAAfficher);
        $favourite = DB::query("SELECT * FROM favourites WHERE story_id=%i", $dialogueAAfficher);
        if(count($favourite) > 0) {
            $isFavourite = 1;
            $favourite_id = $favourite[0]["id"];
        }
        if (!isset($dialogue["illustration"])) $illustration = 1;   
        else $illustration = $dialogue["illustration"];

        $dial = $dialogue["dialogue"];
        $doubles = array();
        $obsolettes = array();
        $dial = str_replace("\r\n","", $dial);
        
        preg_match_all("'<div class=\"obsolette\">(.*?)</div>'", $dial, $obsolette_match);
        if($obsolette_match) $obsolettes = $obsolette_match[1];
        preg_match_all("'<div class=\"double\">(.*?)</div>'", $dial, $double_match);
        if($double_match) $doubles = $double_match[1];
        if(count($obsolettes) > count($doubles)) {
            $diff = count($obsolettes) - count($doubles);
            for($i = 0; $i < $diff; $i++) {
                array_push($doubles, "");
            }
        } else {
            $diff = count($doubles) - count($obsolettes);
            for($i = 0; $i < $diff; $i++) {
                array_push($obsolettes, "");
            }
        }
        $data = array('dialogueAAfficher' => $dialogueAAfficher, 'isFavourite' => $isFavourite, 'favourite_id' => $favourite_id, 'illustration' => $illustration, 'titre' => trim($dialogue["titre"]), 'chapeau' => trim($dialogue["chapeau"]), 'obsolettes' => $obsolettes, 'doubles' => $doubles); 
    }

    header('Content-Type: application/json');
    echo json_encode($data);
?>

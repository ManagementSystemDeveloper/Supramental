<?php 
    // session_start();
    include "./../lib/php/db.class.php";
    include "./../lib/php/db.conf.php";
    $data = array("alire" => "Il n'y a pas d'histoire préférée.", "status" => "none");
    if(isset($_GET["email"]) && $_GET["email"] != "") {
        $email = $_GET["email"];
        // $email = 'test@test.com';
        $lectures = DB::query("SELECT d.* FROM favourites f LEFT JOIN dialogues d ON f.story_id = d.id WHERE f.email=%s", $email );
        $alire = [];
        foreach ( $lectures as $lecture ) {
            $i = $lecture["id"];
            $alire[$i][0] = $lecture["titre"];
            $alire[$i][1] = $lecture["chapeau"];
        }
        $nbl = count($alire);
        if($nbl != 0) {
            $data = array("alire" => $alire, "status" => "exist");
        }
    }
    header('Content-Type: application/json');
    echo json_encode($data);
?>

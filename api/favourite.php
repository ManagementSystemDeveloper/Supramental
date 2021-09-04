<?php 

    include "./../lib/php/db.class.php";
    include "./../lib/php/db.conf.php";
    session_start();
    $data = "";
    if(isset($_GET["storyNo"])) {
        $storyNo = $_GET["storyNo"];
        $email = $_GET["email"];
        DB::query( "INSERT INTO favourites (story_id, email) VALUES (%s, %s)", $storyNo, $email);

        $results = DB::query("SELECT id FROM favourites WHERE email=%s", $email );
        foreach ($results as $result) {
            $data = $result["id"];
        }
    }
    header('Content-Type: application/json');
    $response = array("id" => $data);
    echo json_encode($response);
?>

<?php 

    include "./../lib/php/db.class.php";
    include "./../lib/php/db.conf.php";
    session_start();
    $data = "";
    if(isset($_GET["favouriteId"])) {
        $favouriteId = $_GET["favouriteId"];
        $results = DB::query("DELETE FROM favourites WHERE id=%s", $favouriteId );
    }
    header('Content-Type: application/json');
    $response = array("status" => "success");
    echo json_encode($response);
?>

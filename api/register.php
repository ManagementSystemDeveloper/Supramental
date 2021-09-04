<?php 

    include "./../lib/php/db.class.php";
    include "./../lib/php/db.conf.php";
    session_start();
    if(isset($_GET["email"])) {
        $password = $_GET["password"];
        $email = $_GET["email"];
        $password = sha1($password);
        $results = DB::query("SELECT * FROM users WHERE email=%s and `password`=%s", $email, $password );
        if(count($results) > 0) {
            $data = "This email already exists";
        }
        else {
            DB::query( "INSERT INTO users (email, `password`) VALUES ('$email', '$password')");
            $data = "success";
        };
        // var_dump($data);
        header('Content-Type: application/json');
        $response = array("result" => $data);
        echo json_encode($response);
    }
?>
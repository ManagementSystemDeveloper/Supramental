<?php 

    include "./../lib/php/db.class.php";
    include "./../lib/php/db.conf.php";
    session_start();
    // $results = DB::query("DELETE FROM users");
    // $results = DB::query("INSERT INTO users (email, `password`) VALUES ('test1@test.com', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392')");
    $results = DB::query("SELECT * FROM users");

    var_dump($results);die();

    // if(isset($_GET["email"])) {
    //     $password = $_GET["password"];
    //     $email = $_GET["email"];
    //     $password = "123123123";
    //     $email = "test@test.com";
    //     $password = sha1($password);
    //     $results = DB::query("SELECT * FROM users WHERE email=%s and `password`=%s", $email, $password );
    //     if(count($results) > 0) {
    //         $data = "This email already exists";
    //     }
    //     else {
    //         DB::query( "INSERT INTO users (email, `password`) VALUES ('$email', '$password')");

    //         $data = "success";
    //     };
    //     header('Content-Type: application/json');
    //     $response = array("result" => $data);
    //     echo json_encode($response);
    // }
?>

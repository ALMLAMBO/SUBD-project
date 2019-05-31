<?php
    $db_conn = new mysqli("localhost", "root", "guest", "escape_rooms");
    if(mysqli_connect_errno()) {
        die("Failed to connect to MySql: " .mysqli_connect_error());
    }

    if(!isset($_POST["BeginingDate"], $_POST["EndDate"], $_POST["RoomId"])) {
        die('Please select dates and room for reservation');
    }

    if(empty($_POST["BeginingDate"])
        || empty($_POST["EndDate"]) || empty($_POST["RoomId"])) {

        die('Please select dates and room for reservation');
    }

    if($statement = $db_conn ->
        prepare('select BeginingDate, EndDate from reservations where RoomId = ?')) {


    }

    $db_conn -> close();
?>
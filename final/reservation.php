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
        prepare('select BeginingDate, EndDate from reservations where RoomId = ? and BeginingDate = :bdate and EndDate = :edate')) {

        $statement -> bind_param("i", $_POST["RoomId"]);
        $statement -> bind_param(":bdate", $_POST["BeginingDate"]);
        $statement -> bind_param(":edate", $_POST["EndDate"]);
        $statement -> execute();
        $statement -> store_result();
        if($statement -> num_rows > 0) {
            echo "The reservation for selected period of time and room is not available";
        }
        else {
            if($statement = $db_conn -> prepare('insert into reservations value(?, ?, ?)')) {
                $bdate = $_POST["BeginingDate"];
                $edate = $_POST["EndDate"];
                $roomId = $_POST["RoomId"];

                $statement -> bind_param("ssi", $bdate, $edate, $roomId);
                $statement -> execute();
                echo "Reservation has been made successfully!";
            }
            else {
                echo "Could not prepare statement!";
            }
        }
        $statement -> close();
    }
    else {
        echo "Could not prepare statement!";
    }

    $db_conn -> close();
?>
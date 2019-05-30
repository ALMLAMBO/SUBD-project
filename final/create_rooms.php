<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'escape_rooms';
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


    if ($stmt = $conn->prepare('INSERT INTO rooms(roomName, price) VALUES(?, ?)')) {
    	$stmt->bind_param('ss',$_POST['roomName'], $_POST['price'] );
    	$stmt->execute();
    	echo 'You have successfully create room';
    } else {
      echo 'Could not prepare statement!';
    }
	//$stmt->close();

$conn->close();
?>

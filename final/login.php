<?php
$db_conn = new mysqli("localhost", "root", "123456", "escape_rooms");

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $query = $db_conn->prepare(
    "SELECT password FROM users WHERE email = ?"
  );
  $query->bind_param("s", $_REQUEST["email"]);
  $query->execute();

  $result = $query->get_result();

  if ($result->num_rows == 0)
  {
    die("User does not exist");
  }

  $password = $result->fetch_assoc()["password"];

  if ($_REQUEST["password"] == $password)
  {
    echo "<h1> Access granted! </h1>";
  }
  else
  {
    die("Password is not correct!");
  }
}
?>

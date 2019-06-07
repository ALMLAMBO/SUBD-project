<?php
mysql_connext("localhost", "root", "");
mysql_select_db("feedback");

if(isset($_POST["submit"]))
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $country = $_POST['country'];
        $subject = $_POST['subject'];

        $query = "insert into feedback(firstname,lastname,country,subject) values('$firstname','$lastname', '$country', '$subject')";

        if(mysql_query($query))
        {
            echo "your data is insert to the database";
        }
    }
?>
<?php
    include "database.php";
    $database = new database();
    $database->connect();

    $sql = "INSERT INTO lobby VALUES('', now(), '1', '2', '3')";   /*自動編號在SQL(AUTO_INCREMENT) */
    mysqli_query($database->conn, $sql);

    header("location: ../lobby.php");
<?php

require_once "template/header.php";

$id = $_GET['id'];

try {

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    $sql = "DELETE FROM info WHERE id=".$id;

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<h1>Record deleted successfully</h1>";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
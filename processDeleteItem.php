<?php
require_once 'db_connector.php';

$itemToDelete = $_GET['id'];

$sql_statement = "DELETE FROM `recipes_table` WHERE `recipes_table`.`id` = '$itemToDelete'";

if ($connection){
    $result = mysqli_query($connection, $sql_statement);
    if($result){
        echo "Deleted Item " . $itemToDelete . "<br>";
    }

} else {

    echo "Error connecting " . mysqli_connect_error();
}
<?php
// the purpose of this module is to insert a new recipe into the recibies_table
// this module accepts input from the showAddForm.php page.
// show a success message with a link to the index.php page







session_start();

require_once 'db_connector.php';


$recipeTitle = $_GET['recipeTitle'];
$recipeIngredients = $_GET['recipeIngredients'];
$recipeInstructions = $_GET['recipeInstructions'];
$userId = $_SESSION['userid'];
$id = $_GET['id'];
$role = $_SESSION['role'];


if ($connection && isset($_SESSION['userid']) && $role == "admin"){
    $sql_statement = "UPDATE `recipes_table` SET `recipe_title` = '$recipeTitle', `recipe_ingredients` = '$recipeIngredients', `recipe_instructions` = '$recipeInstructions' WHERE `id` = '$id'";

    $result = mysqli_query($connection, $sql_statement);
    if ($result){
        echo "Data inserted successfully";
        echo "click <a href='index.php'>here</a> to return";
    }
    else{
        echo "Error in the sql " . mysqli_error($connection);
    }
}
else{
    echo "Error connecting " . mysqli_connect_error();
}


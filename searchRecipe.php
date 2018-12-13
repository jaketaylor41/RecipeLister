<?php
require_once 'db_connector.php';
$searchForTitle = $_GET['recipeName'];
$searchForIngredients = $_GET['recipeIngredients'];
$searchForInstructions = $_GET['recipeInstructions'];

 $sql_statement = "SELECT * FROM `recipes_table` WHERE `recipe_title` LIKE '%$searchForTitle%' OR `recipe_ingredients` LIKE '%$searchForIngredients%' OR `recipe_instructions` LIKE '%$searchForInstructions%'";

 if ($connection){
$result = mysqli_query($connection, $sql_statement);
if($result){
    while ($row = mysqli_fetch_assoc($result)){
        echo "Recipe ID " . $row['id'] . "<br>";
        echo "Recipe Title " . $row['recipe_title'] . "<br>";
        echo "Recipe Ingredients " . $row['recipe_ingredients'] . "<br>";
        echo "Recipe Instructions " . $row['recipe_instructions'] . "<br>";
        echo "====================<br>";
    }
}

 } else {

     echo "Error connecting " . mysqli_connect_error();
 }
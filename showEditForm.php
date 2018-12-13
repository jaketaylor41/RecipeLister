
<?php

$id = $_GET['id'];

require_once 'db_connector.php';

if ($connection){
    $sql_statement = "SELECT * FROM `recipes_table` WHERE `id` = '$id' LIMIT 1";
    $result = mysqli_query($connection, $sql_statement);
    if ($result){
        while($row = mysqli_fetch_assoc($result)){
            $recipe_name = $row['recipe_title'];
            $recipe_ingredients = $row['recipe_ingredients'];
            $recipe_instructions = $row['recipe_instructions'];
        }

    } else {
        echo "There was a SQL problem " . mysqli_error($connection);
    }

}else{
    echo "ERROR: " . mysqli_connect_error();
}





?>




<div class="form-container">
    <h2>Edit a recipe</h2>
    <p>Fill out all of the fields and submit</p>
    <form action="processEditItem.php">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        Recipe Title:<input type="text" name="recipeTitle" value="<?php echo $recipe_name ?>"><br>
        Recipe Ingredients:<textarea rows="5" cols="50" name="recipeIngredients"><?php echo $recipe_ingredients ?></textarea><br>
        Recipe Instructions:<textarea rows="5" cols="50" name="recipeInstructions"><?php echo $recipe_instructions ?></textarea><br>
        <button type="submit">Submit Changes</button>
    </form>
</div>

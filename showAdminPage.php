<?php

session_start();
require_once 'db_connector.php';


$sql_statement = "SELECT * FROM `recipes_table` ";

if($_SESSION['role'] != 'admin'){
    echo "Please Login as an Admin";
    exit;
}

if ($connection){
    $result = mysqli_query($connection, $sql_statement);
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            echo "Recipe ID " . $row['id'] . "<br>";
            echo "Recipe Title " . $row['recipe_title'] . "<br>";
            echo "Recipe Ingredients " . $row['recipe_ingredients'] . "<br>";
            echo "Recipe Instructions " . $row['recipe_instructions'] . "<br>";
            ?>

            <form action="processDeleteItem.php">
                <label>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                </label>
                <button type="submit">Delete</button>


            </form>
            <form action="showEditForm.php">
                <label>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                </label>
                <button type="submit">Edit</button>


            </form>

            <?php
            echo "====================<br>";
        }
    }

} else {

    echo "Error connecting " . mysqli_connect_error();
}
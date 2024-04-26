<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocktail: Add New Recipe</title>
</head>
<body>
    <form action="validate_new_recipe.php" method="post">
        <input type="text" name="recipe_title">
        <input type="hidden" name="author_id" value="">
        <input type="text" name="">
        <input type="text">
        <input type="text">
    </form>
</body>
</html>
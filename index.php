<?php
include "includes/connDB.php";

// Prepare the SQL query
$sql = "SELECT * FROM mocktail_recipes";

// Create a prepared statement
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}
// Execute the query
if ($stmt->execute() === false) {
    die("Error executing statement: " . $stmt->error);
}

// Get the result set
$result = $stmt->get_result();



echo ("<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
</head>
<body>");
echo ("<form method='post' action='edit_recipe.php' >");
    // Outputting the rows from the array
while ($row = $result->fetch_assoc()) {
    echo "ID: ";
    echo "<input id='rID' type='text' placeholder='"  . $row['id'] . "'><br>";

    echo "User ID: ";
    echo "<input id='uID' type='text' placeholder='" . $row['uid'] . "'><br>";
    
    echo "<input id='title' type='text' placeholder='";
    echo "Recipe Title: " . $row['title'] . "'><br>";
}
echo ("<input type='submit'>");
echo ("</form></body>
</html>");
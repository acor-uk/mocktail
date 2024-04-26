<?php

include 'includes/connDB.php';

// Prepare the SQL query
$sql = "SELECT * FROM mocktail_recipes";

// Create a prepared statement
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters if needed (replace 's' with appropriate type if needed)
// Not usually needed for select statements, but needed for Insert and Update etc. whenever data is sent
//$stmt->bind_param("s", $param_value);

// Execute the query
if ($stmt->execute() === false) {
    die("Error executing statement: " . $stmt->error);
}

// Get the result set
$result = $stmt->get_result();

// Fetch data from the result set (assuming you're fetching associative array)
while ($row = $result->fetch_assoc()) {
    // Process each row
    echo "ID: " . $row['id'] . "<br>";
    echo "User UD: " . $row['uid'] . "<br>";
    echo "Recipe Title: " . $row['title'] . "<br>";
    echo "Ingredients: " . json_encode($row['ingredients']) . "<br>";
    echo "Method: " . json_encode($row['method']) . "<br>";
    $ingredientsArray = json_decode(stripslashes($row['ingredients']), true);
    $methodArray = json_decode(stripslashes($row['method']), true);
    //var_dump($ingredientsArray);
    //var_dump($methodArray);
    //echo($ingredientsArray['ingredients'][0]['name'] . "<br>");
        // Add more columns as needed
        for ($i = 0; $i < count($ingredientsArray['ingredients']); $i++){
            $temp = $ingredientsArray['ingredients'][$i];
            echo $temp['name'] . ": " . $temp['amount'] . " " . $temp['unit'] . "<br>";
        }
    }


// Close the prepared statement and database connection
$stmt->close();
$conn->close();
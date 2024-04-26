<?php

include 'includes/connDB.php';

// Prepare the SQL query
$sql = "SELECT * FROM mocktail_recipes";

// Create a prepared statement
$stmt = $conn->prepare($sql);
// Check for errors
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters if needed (replace 's' with appropriate type if needed)
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
    //echo "ID: " . $row['id'] . "<br>";
    echo "User UD: " . $row['uid'] . "<br>";
    echo "<h2>Recipe: " . $row['title'] . "</h2>";
    echo "<h3>Ingredients:</h3> <ul>";
    $ingredientsArray = json_decode($row['ingredients'], true);
    $methodArray = json_decode(stripslashes($row['method']), true);
    //var_dump($ingredientsArray);
        // Add more columns as needed
        for ($i = 0; $i < count($ingredientsArray['ingredients']); $i++){
            $temp = $ingredientsArray['ingredients'][$i]; 
            echo "<li>" . $temp['name'] . ": " . $temp['amount'] . " " . $temp['unit'] . "</li>";        
        }
        echo "</ul>";
        echo "<h3>Method: </h3><ol>";

        for ($i = 0; $i < count($methodArray['method']['steps']); $i++){
            $temp = $methodArray['method']['steps'][$i]; 
            echo "<li>" . $temp . "</li>";        
        }

        /*foreach ($methodArray["method"]["steps"] as $key => $value){
            echo $value;
        }*/
    }


// Close the prepared statement and database connection
$stmt->close();
$conn->close();

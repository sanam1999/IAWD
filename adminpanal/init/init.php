<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "NearByHome";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$filePath = 'data.json';
$jsonData = file_get_contents($filePath);
$products = json_decode($jsonData, true);

$sql = "INSERT INTO Products (product_id, user_id, category, title, price, stock, description, conditio ,imageUrl) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Statement preparation failed: " . mysqli_error($conn));
}

// Bind parameters
mysqli_stmt_bind_param($stmt, "ssssiisss", $product_id, $user_id, $category, $title, $price, $stock, $description, $condition, $imageUrl);

// Insert data into database
foreach ($products as $product) {
    $product_id = $product['product_id'];
    $user_id = $product['user_id'];
    $category = $product['category'];
    $title = $product['title'];
    $price = $product['price'];
    $stock = $product['stock'];
    $description = $product['description'];
    $imageUrl = "init/initimage/" . $product['imageUrl'];
    $condition = isset($product['conditio']) ? $product['conditio'] : ''; // Use an empty string if 'condition' is not set

    // Execute the statement
    if (!mysqli_stmt_execute($stmt)) {
        echo "Error inserting record: " . mysqli_stmt_error($stmt) . "<br>";
    }
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);

echo "Data inserted successfully.";
?>
<?php
$mysqli = new mysqli("localhost", "root", "", "real_estate");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $minPrice = $_POST['minPrice'];
    $maxPrice = $_POST['maxPrice'];
    $bedrooms = $_POST['bedrooms'];
    $bathrooms = $_POST['bathrooms'];

    $query = "SELECT Property.address, Property.price, House.bedrooms, House.bathrooms
              FROM House
              JOIN Property ON House.address = Property.address
              WHERE Property.price BETWEEN $minPrice AND $maxPrice
              AND House.bedrooms = $bedrooms
              AND House.bathrooms = $bathrooms";

    $result = $mysqli->query($query);
    if ($result->num_rows > 0) {
        echo "<h1>House Search Results</h1>";
        echo "<table border='1'><tr><th>Address</th><th>Price</th><th>Bedrooms</th><th>Bathrooms</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['address']}</td><td>{$row['price']}</td><td>{$row['bedrooms']}</td><td>{$row['bathrooms']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No houses found matching your criteria.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Houses</title>
</head>
<body>
    <h1>Search for Houses</h1>
    <form method="POST">
        <label>Min Price: </label><input type="number" name="minPrice" required><br>
        <label>Max Price: </label><input type="number" name="maxPrice" required><br>
        <label>Bedrooms: </label><input type="number" name="bedrooms" required><br>
        <label>Bathrooms: </label><input type="number" name="bathrooms" required><br>
        <button type="submit">Search</button>
    </form>
</body>
</html>

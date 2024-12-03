<?php
$mysqli = new mysqli("localhost", "root", "", "real_estate");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $minPrice = $_POST['minPrice'];
    $maxPrice = $_POST['maxPrice'];
    $minSize = $_POST['minSize'];
    $maxSize = $_POST['maxSize'];

    $query = "SELECT Property.address, Property.price, BusinessProperty.type, BusinessProperty.size
              FROM BusinessProperty
              JOIN Property ON BusinessProperty.address = Property.address
              WHERE Property.price BETWEEN $minPrice AND $maxPrice
              AND BusinessProperty.size BETWEEN $minSize AND $maxSize";

    $result = $mysqli->query($query);
    if ($result->num_rows > 0) {
        echo "<h1>Business Property Search Results</h1>";
        echo "<table border='1'><tr><th>Address</th><th>Price</th><th>Type</th><th>Size</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['address']}</td><td>{$row['price']}</td><td>{$row['type']}</td><td>{$row['size']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No business properties found matching your criteria.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Business Properties</title>
</head>
<body>
    <h1>Search for Business Properties</h1>
    <form method="POST">
        <label>Min Price: </label><input type="number" name="minPrice" required><br>
        <label>Max Price: </label><input type="number" name="maxPrice" required><br>
        <label>Min Size (sqft): </label><input type="number" name="minSize" required><br>
        <label>Max Size (sqft): </label><input type="number" name="maxSize" required><br>
        <button type="submit">Search</button>
    </form>
</body>
</html>

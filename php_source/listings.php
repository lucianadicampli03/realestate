<?php
$mysqli = new mysqli("localhost", "root", "", "real_estate");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

echo "<h1>Listings</h1>";

$query = "SELECT * FROM Listings JOIN Property ON Listings.address = Property.address";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>MLS Number</th><th>Address</th><th>Price</th><th>Date Listed</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['mlsNumber']}</td><td>{$row['address']}</td><td>{$row['price']}</td><td>{$row['dateListed']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "No listings found.";
}

$mysqli->close();
?>

<?php
$mysqli = new mysqli("localhost", "root", "", "real_estate");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT * FROM Buyer";

$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    echo "<h1>Buyers List</h1>";
    echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Phone</th><th>Type</th><th>Bedrooms</th><th>Bathrooms</th><th>Business Type</th><th>Price Range</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['propertyType']}</td>
                <td>{$row['bedrooms']}</td>
                <td>{$row['bathrooms']}</td>
                <td>{$row['businessPropertyType']}</td>
                <td>\${$row['minimumPreferredPrice']} - \${$row['maximumPreferredPrice']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No buyers found.";
}

$mysqli->close();
?>

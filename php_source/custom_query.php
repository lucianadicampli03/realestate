<?php
$mysqli = new mysqli("localhost", "root", "", "real_estate");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customQuery = $_POST['query'];
    $result = $mysqli->query($customQuery);

    if ($result && $result->num_rows > 0) {
        echo "<h1>Query Results</h1>";
        echo "<table border='1'>";
        $columns = $result->fetch_fields();
        echo "<tr>";
        foreach ($columns as $column) {
            echo "<th>{$column->name}</th>";
        }
        echo "</tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>{$value}</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } elseif ($result) {
        echo "Query executed successfully.";
    } else {
        echo "Error in query: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Custom Query</title>
</head>
<body>
    <h1>

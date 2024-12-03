<?php
$mysqli = new mysqli("localhost", "root", "", "real_estate");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT Agent.agentId, Agent.name AS agentName, Agent.phone, Firm.name AS firmName, Agent.dateStarted
          FROM Agent
          JOIN Firm ON Agent.firmId = Firm.id";

$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    echo "<h1>Agents List</h1>";
    echo "<table border='1'><tr><th>Agent ID</th><th>Name</th><th>Phone</th><th>Firm</th><th>Date Started</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['agentId']}</td><td>{$row['agentName']}</td><td>{$row['phone']}</td><td>{$row['firmName']}</td><td>{$row['dateStarted']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "No agents found.";
}

$mysqli->close();
?>

<?php
require "conn.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Event Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Event Management</h1>
        <?php
        // Fetch events from the database
        $sql = "SELECT * FROM event";
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        // Display events in a table
        echo "<table><tr><th>Event Name</th><th>Location</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . htmlspecialchars($row['name']) . "</td><td>" . htmlspecialchars($row['location']) . "</td></tr>";
        }
        echo "</table>";
        ?>

        <h2>Add New Event</h2>
        <form action="saveevent.php" method="POST">
            <label for="name">Event Name:</label>
            <input type="text" name="name" id="name" required>
            <label for="location">Event Location:</label>
            <input type="text" name="location" id="location" required>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>

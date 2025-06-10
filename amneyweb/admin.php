<?php
// Database connection parameters
$servername = 'localhost';
$username = 'root';
$password_db = ''; // Set your MySQL password here
$dbname = 'donasi';

// Create connection
$conn = new mysqli($servername, $username, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

// Fetch donation data
$sql = "SELECT name, email, gender, amount, date FROM bayaran"; // Adjust the query based on your table structure
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Donation Records</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f8fa;
            color: #222;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #ee0979;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #ee0979;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<h2>Donation Records</h2>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Amount (USD)</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Check if there are results and display them
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['amount']}</td>
                        <td>{$row['date']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No donations found</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
// Close the database connection
$conn->close();
?>

</body>
</html>

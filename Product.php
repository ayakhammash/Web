<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffee";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT itemname, price FROM product";

$result = mysqli_query($conn, $sql);

echo "<h1>Products</h1>";

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Product Name</th><th>Price</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["itemname"] . "</td><td>" . $row["price"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No products found.";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: #FFF8E7;
            font-family: Arial, sans-serif;
        }



        h1 {
            text-align: center;
            color:#4E3629;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #4E3629;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #4E3629;
            color: white;
        }
        tr:nth-child(even) {
        //  background-color: #f2f2f2;
        }
        button {
            background-color: #4E3629;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4E3629;
        }
        h1 {
            text-align: center;
            color: #4E3629;
        }
        .container {
            display: flex;
        }

        .sidebar {
            width: 200px;
            margin-right: 20px;
        }

        .orders-table {
            flex: 1;
        }
    </style>
</head>
<body>
<!-- Your HTML code goes here -->

<button onclick="window.location.href='admain.php';">Back</button>
</body>
</html>

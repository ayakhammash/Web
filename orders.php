<?php
session_start(); // start the session
echo" <h1>Orders</h1>";

// check if the user is logged in
if(!isset($_SESSION['username'])){
    header("location: login.php");

}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffee";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}








// Retrieve shopping items from database
$sql = "SELECT shop.username, product.itemname, product.price,product.itemid
FROM shop
JOIN product ON shop.product = product.itemid;";

$result = mysqli_query($conn, $sql);

// Display items in a table
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>customer email</th><th>Product Name</th><th>Price</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["username"] . "</td><td>" . $row["itemname"] . "</td><td>" . $row["price"] ."</td></tr>";

    }
    echo "</table>";
} else {
    echo "No loves items found.";
}

// Close database connection
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
<!-- Your shopping cart code goes here -->








<button onclick="window.location.href='admain.php';">Back</button>



</body>
</html>


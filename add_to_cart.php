<?php
session_start();

// Get the item name from the form
$name = $_POST['name'];

// Add the item to the cart
$_SESSION['cart'][] = $name;

// Redirect back to the cart page
header('Location: cart.php');
exit();
?>

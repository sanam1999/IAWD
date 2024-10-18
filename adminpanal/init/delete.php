<?php
include('../model/conn.php');
$sql = "DELETE FROM Products";
$conn->query($sql);
$sql = "DELETE FROM Address";
$conn->query($sql);
$sql = "DELETE FROM Orders";
$conn->query($sql);
$sql = "DELETE FROM Reviews";
$conn->query($sql);
$sql = "DELETE FROM Liked";
$conn->query($sql);
$sql = "DELETE FROM Users where  user_id != '123' or role !='Admin'";
$conn->query($sql);

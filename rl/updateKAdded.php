<?php
require('connectDB.php');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("UPDATE payments
								SET kAdded=:add
								WHERE ID=:id");
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':add', $add);
		
		$id = $_POST["userID"];
		$add = $_POST["add"];
		
		$stmt->execute();
?>
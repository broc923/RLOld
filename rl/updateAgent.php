<?php
require('connectDB.php');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("UPDATE payments
								SET Agent=:agent
								WHERE ID=:id");
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':agent', $agent);
		
		$id = $_POST["userID"];
		$agent = $_POST["agent"];
		
		$stmt->execute();
?>
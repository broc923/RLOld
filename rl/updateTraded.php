<?php
require('connectDB.php');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("UPDATE payments
								SET Traded=:trade
								WHERE ID=:id");
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':trade', $trade);
		
		$id = $_POST["userID"];
		$trade = $_POST["trade"];
		
		$stmt->execute();
?>
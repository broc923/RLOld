<?php
require('connectDB.php');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("UPDATE userSoldCrates
								SET Done=:done
								WHERE ID=:id");
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':done', $done);
		
		$id = $_POST["userID"];
		$done = $_POST["done"];
		
		$stmt->execute();
?>
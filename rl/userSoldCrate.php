<?php
require('connectDB.php');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$stmt = $conn->prepare("INSERT INTO userSoldCrates (ID, Paypal, SteamURL, crateCount, crateCount2, Done)
											VALUES ('', :paypalURL, :steamURL, :crateCount, :crateCount2, :done)");
					$stmt->bindParam(':paypalURL', $ppURL);
					$stmt->bindParam(':steamURL', $steamURL);
					$stmt->bindParam(':crateCount', $crateCount);
					$stmt->bindParam(':crateCount2', $crateCount2);
					$stmt->bindParam(':done', $false);
					$ppURL = $_POST['paypal'];
					$steamURL = $_POST['steamURL'];
					$crateCount = $_POST['crateCount'];
					$crateCount2 = $_POST['crateCount2'];
					$false = 0;
		$stmt->execute();
?>
<?php
$servername = "localhost";
$username = "rlctbroc_db";
$password = "r^n9w8sOl^RA";
$dbname = "rlctbroc_rl";
try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
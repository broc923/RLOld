<?php
$allow = array("24.159.57.31", "187.7.176.166", "24.218.203.246");
if (!in_array ($_SERVER['REMOTE_ADDR'], $allow)) {
   header("location: http://rlctrade.com");
   exit();
}
?>
<!DOCTYPE html>
<?php
require('connectDB.php');
$stmt = $conn->prepare("SELECT ID, SteamURL, Email, TransactionID, c0001, c0002, Added, Traded, Agent, PaymentDate FROM payments WHERE (RLKeys <= :count) AND (Traded = :false OR Added = :false)");
$stmt->bindParam(':false', $false);
$stmt->bindParam(':count', $count);
$count = 0;
$false = 0;
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();

$stmt2 = $conn->prepare("SELECT ID, Paypal, SteamURL, crateCount, crateCount2, Done FROM userSoldCrates WHERE Done = :false");
$stmt2->bindParam(':false', $false2);
$false2 = 0;
$stmt2->execute();
$result2 = $stmt2->setFetchMode(PDO::FETCH_ASSOC);
$result2 = $stmt2->fetchAll();

$stmt3 = $conn->prepare("SELECT ID, PaymentDate, Email, TransactionID, SteamURL, RLKeys, Price, kAdded, kTraded FROM payments WHERE (RLKeys >= :count) AND (kTraded = :false OR kAdded = :false)");
$stmt3->bindParam(':false', $false3);
$stmt3->bindParam(':count', $count3);
$false3 = 0;
$count3 = 1;
$stmt3->execute();
$result3 = $stmt3->setFetchMode(PDO::FETCH_ASSOC);
$result3 = $stmt3->fetchAll();

$stmt4 = $conn->prepare("SELECT RLKeys, Price, c0001, c0002 FROM payments");
$stmt4->execute();
$result4 = $stmt4->setFetchMode(PDO::FETCH_ASSOC);
$result4 = $stmt4->fetchAll();

$stmt5 = $conn->prepare("SELECT crateCount FROM userSoldCrates WHERE Done = :true");
$stmt5->bindParam(':true', $true5);
$true5 = 1;
$stmt5->execute();
$result5 = $stmt5->setFetchMode(PDO::FETCH_ASSOC);
$result5 = $stmt5->fetchAll();
?>
<html >
  <head>
	<meta charset="UTF-8">
    <title>Rocket League Crate Trade</title>
	<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/style.css">
	<script>
		var ips = ["24.159.57.31", "24.218.203.246"];
		var userip;
		function buy() {
			$('#buy').appendTo("body").modal('show');
		}
		function sell() {
			$('#sell').appendTo("body").modal('show');
		}
		function RlKeys() {
			if(ips.indexOf(userip) >= 0) {
				$('#keysell').appendTo("body").modal('show');
			} else {
				alert("Sorry, no access to this panel.");
			}
		 }
		function switchAdd(id,add) {
			//alert(id + " - " + add);
			var x = confirm("Are you sure you've added this person?");
			if(x == true) {
				if(document.getElementById("add"+id).innerHTML == "0") {
					document.getElementById("add"+id).innerHTML = "1";
					add = 1;
				} else if(document.getElementById("add"+id).innerHTML == "1") {
					document.getElementById("add"+id).innerHTML = "0";
					add = 0;
				}
				$.ajax({
					url: '/updateAdded.php',
					type: 'POST',
					dataType: "json",
					data: {
						userID: id,
						add: add
					}
				}).done(function(data){
						alert("Success");
				});
			}
		}
		function switchTrade(id,trade) {
			//alert(id + " - " + trade);
			var y = confirm("Are you sure you've traded this person?");
			if(y == true) {
				if(document.getElementById("trade"+id).innerHTML == "0") {
					document.getElementById("trade"+id).innerHTML = "1";
					trade = 1;
				} else if(document.getElementById("trade"+id).innerHTML == "1") {
					document.getElementById("trade"+id).innerHTML = "0";
					trade = 0;
				}
				$.ajax({
					url: '/updateTraded.php',
					type: 'POST',
					dataType: "json",
					data: {
						userID: id,
						trade: trade
					}
				}).done(function(data){
						alert("Success");
				});
			}
		}
		function claim(id,agent) {
			//alert(id + " - " + agent);
			var agent = prompt("Please enter your name", "Ex: Broc");
			document.getElementById("agent"+id).innerHTML = agent;
			$.ajax({
				url: '/updateAgent.php',
				type: 'POST',
				dataType: "json",
				data: {
					userID: id,
					agent: agent
				}
			}).done(function(data){
					alert("Success");
			});
		}
		function done(id,done) {
			//alert(id + " - " + add);
			var x = confirm("Are you sure you've finished with this person?");
			if(x == true) {
				if(document.getElementById("done"+id).innerHTML == "0") {
					document.getElementById("done"+id).innerHTML = "1";
					done = 1;
				} else if(document.getElementById("done"+id).innerHTML == "1") {
					document.getElementById("done"+id).innerHTML = "0";
					done = 0;
				}
				$.ajax({
					url: '/updateDone.php',
					type: 'POST',
					dataType: "json",
					data: {
						userID: id,
						done: done
					}
				}).done(function(data){
						alert("Success");
				});
			}
		}
		function switchKAdd(id,add) {
            //alert(id + " - " + add);
            var x = confirm("Are you sure you've added this person?");
            if(x == true) {
                if(document.getElementById("kadd"+id).innerHTML == "0") {
                    document.getElementById("kadd"+id).innerHTML = "1";
                    add = 1;
                } else if(document.getElementById("add"+id).innerHTML == "1") {
                    document.getElementById("kadd"+id).innerHTML = "0";
                    add = 0;
                }
                $.ajax({
                    url: '/updateKAdded.php',
                    type: 'POST',
                    dataType: "json",
                    data: {
                        userID: id,
                        add: add
                    }
                }).done(function(data){
                        alert("Success");
                });
            }
        }
        function switchKTrade(id,trade) {
            //alert(id + " - " + trade);
            var y = confirm("Are you sure you've traded this person?");
            if(y == true) {
                if(document.getElementById("ktrade"+id).innerHTML == "0") {
                    document.getElementById("ktrade"+id).innerHTML = "1";
                    trade = 1;
                } else if(document.getElementById("ktrade"+id).innerHTML == "1") {
                    document.getElementById("ktrade"+id).innerHTML = "0";
                    trade = 0;
                }
                $.ajax({
                    url: '/updateKTraded.php',
                    type: 'POST',
                    dataType: "json",
                    data: {
                        userID: id,
                        trade: trade
                    }
                }).done(function(data){
                        alert("Success");
                });
            }
        }
	</script>
	<script type="text/javascript" src="https://l2.io/ip.js?var=userip"></script>
  </head>
  <body>
    <div class="site-outer">
	<nav class="navbar navbar-fixed-top">
		<section class="container-fluid">
			<div class="row">
				<div class="container-menu">
					<div class="logotype">
						<div class="big hero">RLC</div>
					</div>
				</div>
			</div>
		</section>
	</nav>
	<div class="site-inner">
		<section class="container-fluid">
			<!-- ACCORDION ROW -->
			<div class="row">
				<ul class="accordion-group" id="accordion">
					<li style="background-image: url('img/1.jpg');" onclick="sell()">
						<div class="accordion-overlay"></div>
						<h3>Buying Crates from People</h3>
						<section class="hidden-xs">
							<article>
								<p>Access the panel to handle buyng crated from people!</p>
							</article>
						</section>
					</li>
					<li class="out" style="background-image: url('img/2.jpg');" onclick="buy()">
						<div class="accordion-overlay"></div>
						<h3>Selling Crates to People</h3>
						<section class="hidden-xs">
							<article>
								<p>Access the panel to handle selling crates to people!</p>
							</article>
						</section>
					</li>
					<li style="background-image: url('img/3.jpg');" onclick="RlKeys()">
						<div class="accordion-overlay"></div>
						<h3>Keys</h3>
						<section class="hidden-xs">
							<article>
								<p>Access the panel for selling keys to people.</p>
							</article>
						</section>
					</li>
					<li style="background-image: url('img/3.jpg');">
						<div class="accordion-overlay"></div>
						<h3>Statistics</h3>
						<section class="hidden-xs">
							<article>
								<p>
									<?php
										$totalKeys = 0;
										$totalPrice = 0;
										$totalCrateOne = 0;
										$totalCrateTwo = 0;
										$totalAfterPaypalFees = 0;
										foreach( $result4 as $row4 ) {
											$rlKeys = $row4['RLKeys'];
											$orderPrice = $row4['Price'];
											$crateOne = $row4['c0001'];
											$crateTwo = $row4['c0002'];
											$totalKeys += $rlKeys;
											$totalPrice += $orderPrice;
											$totalCrateOne += $crateOne;
											$totalCrateTwo += $crateTwo;
											$totalAfterPaypalFees += ($orderPrice * 0.029) - 0.30;
										}
										$totalAfterPaypalFees = $totalPrice - $totalAfterPaypalFees;
										echo 'Total Earned Before Fees: $' . $totalPrice . '<br />' . 'Total Earned After PayPal Fees: $' . $totalAfterPaypalFees . '<br />' . 'Total Keys Sold: ' . $totalKeys . '<br />' . 'Total Crate Ones Sold: ' . $totalCrateOne . '<br />' . 'Total Crate Twos Sold: ' . $totalCrateTwo;
									?>
								</p>
								<p>
									<?php
										$totalCratesBought = 0;
										foreach( $result5 as $row5 ) {
											$cratesCount = $row5['crateCount'];
											$cratesCount += $row5['crateCount2'];
											$totalCratesBought += $cratesCount;
										}
										$totalBuyCost = $totalCratesBought * 1.40;
										echo 'Total Crates Bought: ' . $totalCratesBought . '<br />' . 'Total Crates Cost: $' . $totalBuyCost;
										$totalCratesLeft = $totalCratesBought - ($totalCrateOne + $totalCrateTwo);
									?>
								</p>
							</article>
						</section>
					</li>
				</ul>
			</div>		
			<!-- footer -->
			<div class="footer">
				<footer class="footer-inner">
					<div class="container">
						<div class="row">
							<div class="col-md-3">
								<h3 class="h3">Useful Pages</h3>
								<ul class="footer-list">
									<li><a href="http://rlctrade.com/">Home Page</a></li>
								</ul>
							</div>
							<div class="col-md-3">
								<h3 class="h3">Staff List</h3>
								<ul class="footer-list">
									<li>Broc</li>
									<li>Beau</li>
									<li>Saco</li>
								</ul>
							</div>
							<div class="col-md-3">
								<h3 class="h3">Tools</h3>
								<ul class="footer-list footer-list-inline">
									<li><a href="tools/calc.html">Price Calculator</a></li>
								</ul>
							</div>
						</div>
					</div>
				</footer>
			</div>
			<!-- MODAL -->
			<aside id="buy" class="modal fade">
				<div class="modal-dialog" role="document">
					<form id="modal-form-buy">
						<input type="hidden" id="userID" name="userID" value="">
						<table border="1">
							<tr>
								<td>
								<a href="/panel.php">Refresh</a>
									<table>
										<tr>
											<th>ID</th>
											<th>Date</th>
											<th>Email</th>
											<th>Steam URL</th>
											<th>Txn ID</th>
											<th>0001</th>
											<th>0002</th>
											<th>Added</th>
											<th>Traded</th>
											<th>Agent</th>
										</tr>
										<?php
											foreach( $result as $row ) {
												$id = $row['ID'];
												$added = $row['Added'];
												$traded = $row['Traded'];
												$agent = $row['Agent'];
												if($agent == "") {
													$agent = "None";
												}
												echo "<tr>
													<td>".$row['ID']."</td>
													<td>".$row['PaymentDate']."</td>
													<td>".$row['Email']."</td>
													<td>".$row['SteamURL']."</td>
													<td>".$row['TransactionID']."</td>
													<td>".$row['c0001']."</td>
													<td>".$row['c0002']."</td>";
												echo '<td id="add'.$id.'" onclick="switchAdd('.$id.','.$added.')">'.$added.'</td>';
												echo '<td id="trade'.$id.'" onclick="switchTrade('.$id.','.$traded.')">'.$traded.'</td>';
												echo '<td id="agent'.$id.'" onclick="claim('.$id.',\''.$agent.'\')">'.$agent.'</td>';
												echo '</tr>';
											}
										?>
										
									</table>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</aside>
			<aside id="sell" class="modal fade">
				<div class="modal-dialog" role="document">
					<form id="modal-form-sell">
						<input type="hidden" id="userID_S" name="userID_S" value="">
						<table border="1">
							<tr>
								<td>
								<a href="/panel.php">Refresh</a>
									<table>
										<tr>
											<th>ID</th>
											<th>PayPal Email</th>
											<th>Steam URL</th>
											<th>Crate #1</th>
											<th>Crate #2</th>
											<th>Done</th>
										</tr>
										<?php
											foreach( $result2 as $row2 ) {
												$id = $row2['ID'];
												$done = $row2['Done'];
												echo "<tr>
													<td>".$row2['ID']."</td>
													<td>".$row2['Paypal']."</td>
													<td>".$row2['SteamURL']."</td>
													<td>".$row2['crateCount']."</td>
													<td>".$row2['crateCount2']."</td>";
												echo '<td id="done'.$id.'" onclick="done('.$id.','.$done.')">'.$done.'</td>';
												echo '</tr>';
											}
										?>
										
									</table>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</aside>
			<aside id="keysell" class="modal fade">
				<div class="modal-dialog" role="document">
					<form id="modal-form-sell-ks">
						<input type="hidden" id="userID_K" name="userID_K" value="">
						<table border="1">
							<tr>
								<td>
								<a href="/panel.php">Refresh</a>
									<table>
										<tr>
                                            <th>ID</th>
											<th>Date</th>
											<th>PayPal</th>
											<th>TxnID</th>
											<th>Steam</th>
											<th>Keys</th>
											<th>kAdded</th>
											<th>kTraded</th>
										</tr>
							             <?php
											foreach( $result3 as $row3){
												$id = $row3['ID'];
												$added3 = $row3['kAdded'];
												$traded3 = $row3['kTraded'];
												echo "<tr>";
												echo "<td>".$id."</td>";
												echo "<td>".$row3['PaymentDate']."</td>";
												echo "<td>".$row3['Email']."</td>";
												echo "<td>".$row3['TransactionID']."</td>";
												echo "<td>".$row3['SteamURL']."</td>";
												echo "<td>".$row3['RLKeys']."</td>";
												echo '<td id="kadd'.$id.'" onclick="switchKAdd('.$id.','.$added3.')">'.$added3.'</td>';
												echo '<td id="ktrade'.$id.'" onclick="switchKTrade('.$id.','.$traded3.')">'.$traded3.'</td>';
												echo '</tr>';
												}
										   ?>
									</table>
								</td>
						</table>
					</form>
				</div>
			</aside>
		</section>
	</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src="js/index.js"></script>
</body>
</html>

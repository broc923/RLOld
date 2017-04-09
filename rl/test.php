<!DOCTYPE html>
<html >
  <head>
	<meta charset="UTF-8">
    <title>Rocket League Crate Trade</title>
	<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/style.css">
	<script>
		function sell() {
			$('#sell').appendTo("body").modal('show');
			//alert("We are not buying anymore crates right now! We have an excess of crates in stock, come back later.");
		}
		function buy() {
			$('#buy').appendTo("body").modal('show');
		}
		function keys() {
			$('#key').appendTo("body").modal('show');
		}
		function faq() {
			$('#FAQ').appendTo("body").modal('show');
		}
		function hostedID1() {
			document.getElementById("hostedID").value = "A969AWA5HNJ74";
		}
		function hostedID2() {
			document.getElementById("hostedID").value = "JGYLJ4KXG7AX6";
		}
		function sellkeys() {
			document.getElementById("SellKeyID").value = "6AGQ3HTE2Z6M4";
		}
		function submitSell() {
			var url = document.getElementById("steamURL_S").value;
			var count = document.getElementById("crateCounter").value;
			var ppURL = document.getElementById("paypalURL_S").value;
			var x = confirm("Are you sure you want to sell us " + count + " crates?");
			if(x == true && url != "" && count != 0 && ppURL != "") {
				$.ajax({
					url: '/userSoldCrate.php',
					type: 'POST',
					dataType: "json",
					data: {
						steamURL: url,
						crateCount: count,
						paypal: ppURL
					}
				}).done(function(data){
						alert("Success");
				});
			} else {
				alert("Please check your sell order information. Something was not filled out!");
			}
		}
	</script>
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
					<div class="checkout">
						<form id="myCart" target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
							<h3><a href="javascript:{}" onclick="document.getElementById('myCart').submit(); return false;" name="submit" alt="PayPal - The safer, easier way to pay online!"><i class="fa fa-shopping-cart red"></i>  View My Cart</a></h3>
						</form>
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
						<h3>Sell</h3>
						<section class="hidden-xs">
							<article>
								<p>Sell us your Rocket League crates for real money!</p>
								<p>Guaranteed Trade within 24 hours. We use real people, not bots, that sadly need to sleep.</p>
								<p>Note: If you are NOT verified on PayPal there will be a fee taken out by PayPal. Get your account verified!</p>
							</article>
						</section>
					</li>
					<li class="out" style="background-image: url('img/2.jpg');" onclick="buy()">
						<div class="accordion-overlay"></div>
						<h3>Buy</h3>
						<section class="hidden-xs">
							<article>
								<p>Buy Rocket League crates from us for a small fee!</p>
								<p>Guaranteed Trade within 24 hours. We use real people, not bots, that sadly need to sleep.</p>
							</article>
						</section>
					</li>
					<li style="background-image: url('img/4.jpg');" onclick="keys()">
						<div class="accordion-overlay"></div>
						<h3>Keys</h3>
						<section class="hidden-xs">
							<article>
								<p>Individual Keys For Sale!!!!</p>
								<p>Guaranteed Trade within 24 hours. We use real people, not bots, that sadly need to sleep.</p>
							</article>
						</section>
					</li>
					<li style="background-image: url('img/3.jpg');">
						<div class="accordion-overlay"></div>
						<h3>Reviews</h3>
						<section class="hidden-xs">
							<article>
								<font color="white">
									<div id="disqus_thread" style="overflow-y: scroll; height: 500px;"></div>
									<script>

									var disqus_config = function () {
										this.page.url = "http://rlctrade.com/";  // Replace PAGE_URL with your page's canonical URL variable
									};

									(function() { // DON'T EDIT BELOW THIS LINE
										var d = document, s = d.createElement('script');
										s.src = '//rlctrade.disqus.com/embed.js';
										s.setAttribute('data-timestamp', +new Date());
										(d.head || d.body).appendChild(s);
									})();
									</script>
									<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
								</font>
							</article>
						</section>
					</li>
				</ul>
			</div>		
			<!-- BEGIN NEW ROW AFTER ACCORDION -->
			<div class="row mg">
				<!-- FIRST ROW -->
				<div class="container">
					<h1 class="text-center head red">How it Works</h1>
					<div class="row">
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="product-box">
								<h2 class="text-center"><i class="fa fa-gears"></i></h2>
								<h3 class="text-center">Buying</h3>
								<p>When the order is placed, you will get a unique transaction number. This number is important if you need to ever contact us about an order! From this point our system will process your request and let the next available agent know you need to be handled! You deal with real people, not bots!</p>
								<p>After an official RLT Agent has been notified you should recieve a friend request and be invited to a party on Rocket League. Simply send a private message to the RLT Agent with your Transaction Number from paypal to ensure you get exactly what you bought! Leave the party and unfriend the RLT Agent to ensure quick future purchases!</p>
								<p>WARNING: Charging back money will result in permanent bans from the system and legal action. We keep logs of all electronic items sold.</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="product-box">
								<h2 class="text-center"><i class="fa fa-flask"></i></h2>
								<h3 class="text-center">Selling</h3>
								<p>When the order is submitted into our system it will process your request and let the next available agent know you need to be handled! You deal with real people, not bots to ensure quality service.</p>
								<p>After an official RLT Agent has been notified you should recieve a friend request and be invited to a party on Rocket League. Simply trade the crates to the agent, and leave the party.</p>
								<p>Keep an eye on your PayPal account specified when you sold the crates! You will be given a transaction ID and will recieve the money in your account shortly after. This can take a few minutes!</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="product-box">
								<h2 class="text-center"><i class="fa fa-balance-scale"></i></h2>
								<h3 class="text-center">FAQ</h3>
								<p>Q - I had to go offline before I got my crates! Will I still get them?</p>
								<p>A - Absolutely! You will stay in our system until entirely taken care of! We deal with real people, so there's always bound to be time issues!</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- footer -->
			<div class="footer">
				<footer class="footer-inner">
					<div class="container">
						<div class="row">
							<div class="col-md-3">
								<h3 class="h3">Sites We Love!</h3>
								<ul class="footer-list">
									<li><a href="http://psyonix.com/">Psyonix</a></li>
									<li><a href="http://www.rocketleaguegame.com/">Rocket League</a></li>
								</ul>
							</div>
							<div class="col-md-3">
								<h3 class="h3">Customer support</h3>
								<ul class="footer-list">
									<li>help@rlctrading.com</li>
								</ul>
							</div>
							<div class="col-md-3">
								<h3 class="h3">Useful Links</h3>
								<ul class="footer-list footer-list-inline">
									<li onclick="faq()"><a href="#">FAQ</a></li>
								</ul>
							</div>
					</div>
				</footer>
			</div>
			<!-- MODAL -->
			<aside id="buy" class="modal fade">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<div class="modal-header-gradient"></div>
							<div class="row">
								<h2 class="white text-center">Choose Crates to Buy</h2>
								<p data-modal-id class="text-center white"></p>
							</div>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-8 col-md-offset-2 col-sm-12">
									<form id="modal-form-buy" action="https://www.paypal.com/cgi-bin/webscr" method="post">
									<input type="hidden" name="cmd" value="_s-xclick">
									<input id="hostedID" type="hidden" name="hosted_button_id" value="">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-plus"></i></span>
												
												<div class="input-group-addon-holder">
													<input type="hidden" name="on0" value="Steam URL">
													<input type="text" name="os0" maxlength="200" size="50" placeholder="Steam Profile URL" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<p>
												<div class="floated_img">
													<input type="image" src="img/crate1.jpg" alt="Submit Form" onclick="hostedID1()" />
												</div>
												<div class="floated_img">
													<input type="image" src="img/crate2.jpg" alt="Submit Form" onclick="hostedID2()" />
												</div>
											</p>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</aside>
			<aside id="sell" class="modal fade">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<div class="modal-header-gradient"></div>
							<div class="row">
								<h2 class="white text-center">Selling Crates</h2>
								<p data-modal-id class="text-center white"></p>
							</div>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-8 col-md-offset-2 col-sm-12">
									<form id="modal-form">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-plus"></i></span>
												<select id="crateCounter" required>
													<option value="0">Champion Crate to Sell (Max 50)</option>
													<?php
														$pricePer = 1.40;
														setlocale(LC_MONETARY, 'en_US');
														for ($i = 1; $i <= 50; $i++) {
															$totalPrice = $pricePer * $i;
															echo '<option value="'.$i.'">'.$i.' - '.money_format('%i', $totalPrice).'</option>';
														}
													?>
												</select>
												<div class="input-group-addon-holder">
													<input type="text" id="steamURL_S" name="steamURL_S" size="50" placeholder="Steam Profile URL" required>
													<input type="text" id="paypalURL_S" name="paypalURL_S" size="50" placeholder="Paypal Email" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<p>
												<button class="button button-red" id="add-item" onclick="submitSell()" data-dismiss="modal">Sell</button>
											</p>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</aside>
			<aside id="key" class="modal fade">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<div class="modal-header-gradient"></div>
							<div class="row">
								<h2 class="white text-center">Choose Keys to Buy</h2>
								<p data-modal-id class="text-center white"></p>
							</div>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-8 col-md-offset-2 col-sm-12">
                                  <form id="modal-form-buy" action="https://www.paypal.com/cgi-bin/webscr" method="post">
									<input type="hidden" name="cmd" value="_s-xclick">
									<input id="SellKeyID" type="hidden" name="hosted_button_id" value="">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-plus"></i></span>
												
												<div class="input-group-addon-holder">
													<input type="hidden" name="on0" value="Steam URL">
													<input type="text" name="os0" maxlength="200" size="50" placeholder="Steam Profile URL" required>
												</div>
											</div>
										</div>
										<div class="form-group">
										    <div class="floated_img_key">
													<input type="image" src="img/key.png" alt="Submit Form" onclick="sellkeys()" />
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</aside>
			<aside id="FAQ" class="modal fade">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<div class="modal-header-gradient"></div>
							<div class="row">
								<h2 class="white text-center">FAQ</h2>
								<p data-modal-id class="text-center white"></p>
							</div>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-8 col-md-offset-2 col-sm-12">
									<p>Q - I had to go offline before I got my crates! Will I still get them?</p>
									<p>A - Absolutely! You will stay in our system until entirely taken care of! We deal with real people, so there's always bound to be time issues!</p>
									<hr />
									<p>Q - If I sell crates but dont want money or use paypal, can you exchange the value of the crates for something else?</p>
									<p>A - Of course! We have real employees here at rlctrade.com meaning we don't use bots. If you want us to add you and gift you a game on steam as long as the value of the crates equals the price of the Game/Item. We would be happy to oblige. (Possibly expanding to Amazon in the future.)<p/>
								</div>
							</div>
						</div>
					</div>
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

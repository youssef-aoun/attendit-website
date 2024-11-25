<!DOCTYPE HTML>
<html>

<head>
	<title>Contact Us - Attend'It</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/main.css">
	<style>
		/* Add some custom styling for the contact section */
		.icon-box {
			background-color: #f4f4f4;
			border: 1px solid #ddd;
			border-radius: 8px;
			text-align: center;
			padding: 20px;
			margin-bottom: 20px;
			transition: box-shadow 0.3s ease, transform 0.3s ease;
		}

		.icon-box:hover {
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
			transform: translateY(-5px);
		}

		.icon-box h3 {
			margin-top: 15px;
			font-size: 1.5em;
			color: #333;
		}

		.icon-box p {
			font-size: 1em;
			color: #555;
			margin-top: 10px;
		}

		.icon-box img {
			max-width: 60px;
			height: auto;
			margin-bottom: 10px;
		}

		/* Adjust rows for better spacing */
		.row {
			display: flex;
			flex-wrap: wrap;
			gap: 20px;
			justify-content: center;
		}

		.row .icon-box {
			flex: 1 1 calc(30% - 20px);
			/* Responsive layout for each box */
			min-width: 250px;
		}

		@media (max-width: 768px) {
			.row .icon-box {
				flex: 1 1 100%;
			}
		}
	</style>
</head>

<body class="subpage">

	<!-- Header -->
	<header id="header">
		<div class="logo"><a href="index.php">Attend'It <span>by Youssef Aoun</span></a></div>
		<a href="#menu">Menu</a>
	</header>

	<!-- Nav -->
	<nav id="menu">
		<ul class="links">
			<li><a href="index.php">Home</a></li>
			<li><a href="aboutus.php">About</a></li>
			<li><a href="contactus.php">Contact us</a></li>
			<li>
				<form action="backend/logout.php" method="POST" style="display: inline;">
					<button type="submit">Logout</button>
				</form>
			</li>
		</ul>
	</nav>

	<!-- Contact Section -->
	<section id="One" class="wrapper style3">
		<div class="inner">
			<header class="align-center">
				<p>Connect with Us</p>
				<h2>Contact Us</h2>
			</header>
		</div>
	</section>

	<!-- Main Content -->
	<div id="main" class="container">
		<section>
			<header class="major align-center">
				<p>Reach out to us through any of the following methods:</p>
			</header>
			<div class="row">
				<div class="icon-box">
					<a href="mailto:y.aoun@outlook.com" class="icon fa-envelope-o" target="_blank" rel="noopener noreferrer">
						<h3>Email Us</h3>
						<p>y.aoun@outlook.com</p>
					</a>
				</div>
				<div class="icon-box">
					<a href="https://github.com/youssef-aoun" target="_blank" class="icon fa-github">
						<h3>GitHub</h3>
						<p>Explore our code repositories.</p>
					</a>
				</div>
				<div class="icon-box">
					<h3>Phone</h3>
					<p>+961 76 861 644</p>
				</div>
				<div class="icon-box">
					<a href="https://linkedin.com/in/youssef-aoun-/" target="_blank" class="icon fa-linkedin">
						<h3>LinkedIn</h3>

						<p>Connect with us professionally.</p>
					</a>
				</div>
				<div class="icon-box">
					<a href="https://www.hackerrank.com/profile/y_aoun" target="_blank">
						<img src="assets/images/hackerrank.png" alt="HackerRank">
						<h3>HackerRank</h3>

						<p>Check out our programming achievements.</p>
					</a>
				</div>
				
			</div>
		</section>
	</div>

	<!-- Footer -->
	<footer id="footer">
		<div class="container">
			<ul class="icons">
				<li><a href="https://github.com/youssef-aoun" class="icon fa-github" target="_blank"><span
							class="label">Github</span></a></li>
				<li><a href="https://linkedin.com/in/youssef-aoun-/" target="_blank" class="icon fa-linkedin"><span
							class="label">LinkedIn</span></a></li>
				<li><a href="https://www.hackerrank.com/profile/y_aoun" target="_blank"><img src="assets/images/hackerrank.png"
							alt="hackerrank profile" style="width: 40px; height: auto;"></a></li>
				<li><a href="mailto:y.aoun@outlook.com" class="icon fa-envelope-o" target="_blank"
						rel="noopener noreferrer"><span class="label">Email</span></a></li>
			</ul>
		</div>
	</footer>
	<div class="copyright">
		<p>Made with love by Youssef Aoun.</p>
	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>
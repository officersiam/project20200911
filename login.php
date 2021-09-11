<?php
    include('functions.php');
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
		<meta name="generator" content="Jekyll v4.0.1">
		<title>alponahousing.com</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<style>
			.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			}

			@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
			}
		</style>
		<!-- Custom styles for this template -->
		<link href="signin.css" rel="stylesheet">
	</head>
	<body class="text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
						<form class="form-signin" method="post" action="index.php">
							<img class="mb-4" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
							<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
							<div class="card-body">
								<div class="form-group mb-3">
									<label>Username</label>
									<div class="input-group">
										<input name="username" type="text" class="form-control form-control-lg" />
									</div>
								</div>
								<div class="form-group mb-3">
									<label>Password</label>
									<div class="input-group">
										<input name="pass" type="password" class="form-control form-control-lg" placeholder="Password" required>
									</div>
								</div>
								<button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
							</div>
						</form>
				</div>
			</div>
		</div>
	</body>
</html>

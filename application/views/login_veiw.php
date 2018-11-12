<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>


 	<script type="text/javascript" src="<?= base_url() ?>vendor/isotope.pkgd.min.js"></script>
 	<script type="text/javascript" src="<?= base_url() ?>vendor/imagesloaded.pkgd.min.js"></script>
 	<script type="text/javascript" src="<?= base_url() ?>1.js"></script>

	<link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url() ?>vendor/font-awesome.css">
	<link rel="stylesheet" href="<?= base_url() ?>1.css">
</head>
<body>
	<br>
	<br>
	<br>
	<div class="container">
		<div class="row">
			<form class="form-inline" action="<?php echo base_url() ?>Login/check" method="POST">
			  <label for="email">Email address:</label>
			  <input name = "email" type="email" class="form-control" id="email">
			  <label for="pwd">Password:</label>
			  <input  name = "password" type="password" class="form-control" id="pwd">
			  <div class="form-check">
			    <label class="form-check-label">
			      <input  class="form-check-input" type="checkbox"> Remember me
			    </label>
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			  <br>
			  <br>
			  <a href="" class="quenmatkhau"> <span class="do">quên mật khẩu ???</span></a>
			</form>
		</div>
	</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin</title>
	
</head>
<body>
	<?php 
		if($this->session->has_userdata('email') && $this->session->has_userdata('password')){
			
			?>
		<?php }

		else{
				redirect('../Login','refresh')
			?>
		<?php }

	 ?>
	<hr>
	<hr>
	<hr>
	<h1>thanh cong</h1>

	
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Gui mail Trong back-end</title>
	<script type="text/javascript" src=" <?php echo base_url(); ?>vendor/bootstrap.js"></script>
  <!-- goi thu vien upload jq -->
  <script type="text/javascript" src=" <?php echo base_url(); ?>1.js"></script>
  <link rel="stylesheet" href=" <?php echo base_url(); ?>vendor/bootstrap.css">
  <link rel="stylesheet" href=" <?php echo base_url(); ?>vendor/font-awesome.css">
  <link rel="stylesheet" href=" <?php echo base_url(); ?>1.css">
</head>
<body>
	<div class="comtainer">
		<div class="row">
			<div class=" col-sm-5 push-sm-3">
				<br>
				<br>
				<br>
				<br>
				<form action="Sendmail/do_sendmail" method="POST">
					  <div class="form-group" >
					    <label for="exampleInputEmail1">Email </label>
					    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
					    <small id="emailHelp" class="form-text text-muted">Bạn Cần Nhập Email Trước Khi Gửi</small>
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Tên Người Gửi</label>
					    <input name="nguoigui" type="text" class="form-control" id="exampleInputPassword1" placeholder="người gửi">
					  </div>
					  <label for="exampleInputPassword1">Nội Dung</label>
					  <br>
					  <textarea name="noidung" id="" cols="50" rows="5">
					  	
					  </textarea>
					  <br>
					 
					  <button type="submit" class="btn btn-success" value="gửi">Submit</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
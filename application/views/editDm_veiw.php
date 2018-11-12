<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<script type="text/javascript" src=" <?php echo base_url(); ?>vendor/bootstrap.js"></script>
  <!-- goi thu vien upload jq -->
  <script type="text/javascript" src=" <?php echo base_url(); ?>1.js"></script>
  <link rel="stylesheet" href=" <?php echo base_url(); ?>vendor/bootstrap.css">
  <link rel="stylesheet" href=" <?php echo base_url(); ?>vendor/font-awesome.css">
  <link rel="stylesheet" href=" <?php echo base_url(); ?>1.css">
</head>
<body>
	<div class="container">
		<div class="row">

			<div class="col-sm-6">
				<div class="jumbotron jumbotron-fluid">
					<div class="container">
						<h1 class="display-4">Sửa Danh mục</h1>
					</div>
				</div>

				<form action="../do_editDm" method="POST">
				<?php foreach ($mangketqua as  $value): ?>
					<fieldset class="form-group">
						<label for="">Tên Danh Mục</label>
						<br>
						<input type="hidden" name="id" value=" <?= $value['id'] ?>">
						<input type="text" name = "name_dm" class="form-group" value=" <?= $value['name_dm'] ?>" >
					</fieldset>
				<?php endforeach ?>

				<fieldset class="form-group">
					<input type="submit" class="form-group" value="Sửa Danh Mục">
				</fieldset>

				</form>
			</div>
		</div>
	</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quản Lý Tin Tức</title>
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
	<!-- them duong link dan toi ckedtitor -->
	<!-- <script src="<?= base_url() ?>ckeditor/ckeditor.js"></script>
	<script src="<?= base_url() ?>ckeditor/ckfinder/ckfinder.js"></script> -->


 	<script type="text/javascript" src="<?= base_url() ?>vendor/isotope.pkgd.min.js"></script>
 	<script type="text/javascript" src="<?= base_url() ?>vendor/imagesloaded.pkgd.min.js"></script>
 	<script type="text/javascript" src="<?= base_url() ?>1.js"></script>

	<link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url() ?>vendor/font-awesome.css">
	<link rel="stylesheet" href="<?= base_url() ?>1.css">
</head>
<body>

	<!-- header -->

<nav class="navbar navbar-dark bg-inverse navbar-fixed-top">
  <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" >
  </button>
  <div class="collapse navbar-toggleable-xs " id="exCollapsingNavbar2">
  	<a href=" <?php echo base_url() ?> " class="navbar-brand"><img src="http://icons.iconarchive.com/icons/graphicloads/100-flat/256/home-icon.png" alt="" height="60px"></a>
    <ul class="nav navbar-nav">
      <li class="nav-item active">
        <a class="nav-link " href="<?php echo base_url() ?>Admin/danhmucmonan">Quản lý Danh Mục Món Ăn <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>Admin/quanlymonan">Quản lý Món Ăn</a>
      </li>
      
    </ul>
  </div>
</nav>

<!-- end-header -->

	<?php 
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	 ?>

	<div class="container mt-2 pt-2">
		<div class="row">
			<div class="col-sm-10 push-sm-1">
			<div class="col-sm-12 suatin">
				<div class="jumbotron text-xs-center">
					<h1 class="display-5">Sửa Món Ăn</h1>
					<p class="lead">Sửa Món Ăn</p>
					<hr class="m-y-md">
				</div>
				<div class="formedit">
					<form action=" <?php echo base_url() ?>/Admin/do_editMa" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
					<?php foreach ($mangdulieuMa as  $value): ?>
							
						<input type="hidden" name="id" class="form-control" id="" value=" <?php echo $value['id'] ?> " >
						<fieldset class="form-group">
							<label for="">Ảnh Món Ăn</label>
							<br>
							<img src=" <?php echo $value['avata_monan'] ?> " alt="ảnh tin" width = "30%">
							<input type="file" name="avata_monan" class="form-control" id="" placeholder="Ảnh Món Ăn">
							<input type="hidden" name="avata_monan2" class="form-control" value="<?php echo $value['avata_monan'] ?>" >
						</fieldset>
						<fieldset class="form-group">
							<label for="">Tiêu Đề Món Ăn</label>
							<input type="text" name="tieude_monan" class="form-control" id=""value="<?php echo $value['tieude_monan'] ?>">
						</fieldset>
						<fieldset class="form-group">
							<label for="">Giá Món Ăn</label>
							<input type="text" name="gia_monan" class="form-control" id=""value="<?php echo $value['gia_monan'] ?>">
						</fieldset>
						
						
						<fieldset class="form-group">
							<!-- load danh muc -->
							<label for="">Danh Mục Món Ăn</label>
							<select name="id_dmma" id="" class="form-control">

								<?php foreach ($mangdulieuDm as $value2 ): ?>
									if(<?php echo $value2['id'] ?>==<?php echo $value['id_dmma'] ?> ){
									<option value=" <?php echo $value2['id'] ?>" selected><?php echo $value2['name_dmma'] ?></option>
								}
								<?php endforeach ?>
								
								
							</select>
							<!-- het load danh mục -->
						</fieldset>
						<fieldset class="form-group">
							<label for="">Món Ăn Mới</label>
							<input type="text" name="new_monan" class="form-control" id="" value="<?php echo $value['new_monan'] ?>">
						</fieldset>
						<fieldset class="form-group">
							<label for="">Miêu Tả</label>
							<br>
							<textarea name="mota_monan" class="noidung" cols="100" rows="5" > <?php echo $value['mota_monan']; ?></textarea>
							<br>
						</fieldset>
						
						<fieldset class="form-group">
							<input type="submit" class="btn btn-outline-success" value="Sửa Tin">
						</fieldset>
				<?php endforeach ?>
					</form>
				</div>
				</div>
			</div>
			</div>
		</div>
	</div>
			
	<!-- them ham cho phep su lt noi dung bang ckedittor -->
	<!-- dat id trung voi id can dua ckeditor vao -->

</body>
</html>
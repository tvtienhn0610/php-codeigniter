<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quản Lý Tin Tức</title>
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
	<!-- them duong link dan toi ckedtitor -->
	<script src="<?= base_url() ?>ckeditor/ckeditor.js"></script>
	<script src="<?= base_url() ?>ckeditor/ckfinder/ckfinder.js"></script>


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
        <a class="nav-link " href="<?php echo base_url() ?>News/danhmuctin">Quản lý danh mục tin <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>News/quanlytin">Quản lý tin</a>
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
					<h1 class="display-5">Sửa Tin Tức</h1>
					<p class="lead">Sửa Tin Tức</p>
					<hr class="m-y-md">
				</div>
				<div class="formedit">
					<form action=" <?php echo base_url() ?>/News/do_editNews" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
						<?php foreach ($mangdulieutin as  $value): ?>
							
						<input type="hidden" name="id" class="form-control" id="" value=" <?php echo $value['id'] ?> " >
						<fieldset class="form-group">
							<label for="">Tiêu Đề Tin</label>
							<input type="text" name="tieude" class="form-control" id="" value=" <?php echo $value['tieude'] ?> " >
						</fieldset>
						<fieldset class="form-group">
							<label for="">Ảnh Tin</label>
							<img src=" <?php echo $value['avata_news'] ?> " alt="ảnh tin" width = "40%">
							<input type="file" name="avata_news" class="form-control" id="" placeholder="ảnh tin" >
							<!-- them input an -->
							<input type="hidden" name="avata_news2" class="form-control" value="<?php echo $value['avata_news'] ?>" >
						</fieldset>
						<fieldset class="form-group">
							<!-- load danh muc -->
							<label for="">Danh Mục Tin</label>
							<select name="id_dm" id="" class="form-control">
								<!-- xet dieu kien them selected de hien thi danh muc -->
								<?php foreach ($mangdanhmuc as $value2 ): ?>
									if(<?php echo $value2['id'] ?> == <?php echo $value['id_dm'] ?> ){
									<option value=" <?php echo $value2['id'] ?>" selected><?php echo $value2['name_dm'] ?></option>
								}
								<?php endforeach ?>
								
							</select>

						</fieldset>
						<fieldset class="form-group">
							<label for="">Trích Dẫn</label>
							<input type="text" name="trichdan" class="form-control" id=""  value=" <?php echo $value['trichdan'] ?> ">
						</fieldset>
						<fieldset class="form-group">
							<label for="">Nội Dung Tin</label>
							<br>
							<textarea name="noidung" id="noidung" class="noidung">
								<?php echo $value['noidung'] ?>
							</textarea>
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
			
	<!-- them ham cho phep su lt noi dung bang ckedittor -->
	<!-- dat id trung voi id can dua ckeditor vao -->

	<script>
		CKEDITOR.replace( 'noidung', {
		    filebrowserBrowseUrl:'http://localhost/php/ckfinder/ckfinder.html',
		    filebrowserImageBrowseUrl:'http://localhost/php/ckfinder/ckfinder.html?Type=Images',
		 
});
	</script>
</body>
</html>
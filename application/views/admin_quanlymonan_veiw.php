<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quản Lý Món Ăn</title>
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
	<?php 
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	 ?>

	 <!-- header -->

<nav class="navbar navbar-dark bg-inverse navbar-fixed-top">
  <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" >
  </button>
  <div class="collapse navbar-toggleable-xs " id="exCollapsingNavbar2">
  	<a href="#" class="navbar-brand"><img src="http://icons.iconarchive.com/icons/graphicloads/100-flat/256/home-icon.png" alt="" height="60px"></a>
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

	<div class="container-fluid mt-3 pt-3 wow fadeInUp">
		<div class="row">
			<div class="col-sm-6 themmoi">
				<div class="jumbotron text-xs-center">
					<h3 class="display-5">Thêm Món Ăn</h1>
					<p class="lead">Thêm Món ăn</p>
				</div>
				<div class="formthemmoi">
					<form action="addMonan" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
						<fieldset class="form-group">
							<label for="">Ảnh Món Ăn</label>
							<input type="file" name="avata_monan" class="form-control" id="" placeholder="Ảnh Món Ăn">
						</fieldset>
						<fieldset class="form-group">
							<label for="">Tiêu Đề Món Ăn</label>
							<input type="text" name="tieude_monan" class="form-control" id="" placeholder="Tiêu Đề">
						</fieldset>
						<fieldset class="form-group">
							<label for="">Giá Món Ăn</label>
							<input type="text" name="gia_monan" class="form-control" id="" placeholder="Giá Món Ăn">
						</fieldset>
						<fieldset class="form-group">
							<!-- load danh muc -->
							<label for="">Danh Mục Món Ăn</label>
							<select name="id_dmma" id="" class="form-control">

								<?php foreach ($mangdulieudanhmuc as $value ): ?>
									<option value=" <?php echo $value['id'] ?> "><?php echo $value['name_dmma'] ?></option>
								<?php endforeach ?>
								
							</select>
							<!-- het load danh mục -->

						</fieldset>
						<fieldset class="form-group">
							<label for="">Món Ăn Mới</label>
							<input type="text" name="new_monan" class="form-control" id="" placeholder="Món Ăn Mới">
						</fieldset>
						<fieldset class="form-group">
							<label for="">Miêu Tả</label>
							<br>
							<textarea name="mota_monan" id="noidung" class="noidung" cols="100" rows="5"></textarea>
							<br>
						</fieldset>
						<fieldset class="form-group">
							<input type="submit" class="btn btn-secondary" value="Thêm Món Ăn">
						</fieldset>
					</form>
				</div>
			</div>
			<div class="col-sm-6 danhsach">
				<div class="jumbotron text-xs-center">
					<h3 class="display-5">Danh Sách Món Ăn </h1>
					<p class="lead">Danh Sách Món Ăn</p>
					
				</div>

				<!-- khoi ds tin -->
				
				<div class="row">
					<div class="card-group">
						<?php foreach ($mangdulieumonan as  $value): ?>
						<div class="col-sm-6">		
							 <div class="card">
							    <img class="card-img-top img-fluid" src=" <?php echo $value['avata_monan'] ?> " alt="Card image cap" width='60%'>
							    <div class="card-body">
							      <h4 class="card-title ">  <?php echo $value['tieude_monan'] ?></h4>
							      <p class="card-text"> Giá: <?php echo $value['gia_monan'] ?>$</p>
							      <p class="card-text"> Trạng Thái: <?php echo $value['new_monan'] ?></p>
							      <p class="card-text"> <?php echo $value['mota_monan'] ?></p>
							      <p class="card-text"><small class="text-muted">Đăng vào Ngày <?= date('d/m/Y',$value['ngaytao_monan']) ?> IN <span class="vang"> </span> <?php echo $value['name_dmma'] ?></small></p>
							      <a  href="editMa/<?php echo $value['id'] ?>" class="nutedit btn btn-secondary"><i class="fa fa-pencil"></i> sửa </a>
							   	<a  href="deleteMa/<?php echo $value['id'] ?>" class="nutxoa btn btn-outline-danger"><i class=" fa fa-remove"></i> xóa </a>
								    </div>
							  </div>		 
						</div> 
					 <?php endforeach ?>
						
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- them ham cho phep su lt noi dung bang ckedittor -->
	<!-- dat id trung voi id can dua ckeditor vao -->

</body>
</html>
<!DOCTYPE html>
<html lang="en"><head>
	<title> Artica  </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&amp;subset=vietnamese" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">


	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>


 	<script type="text/javascript" src="<?= base_url() ?>vendor/isotope.pkgd.min.js"></script>
 	<script type="text/javascript" src="<?= base_url() ?>vendor/imagesloaded.pkgd.min.js"></script>
 	<script type="text/javascript" src="<?= base_url() ?>1.js"></script>

	<link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url() ?>vendor/font-awesome.css">
	<link rel="stylesheet" href="<?= base_url() ?>1.css">
 </head>
<body >

	<?php 
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	 ?>
		
 	<!-- du lieu cho phan header -->
	   <?php foreach ($mangdulieuheader as $key => $value): ?>
      <?php 
          if($key == "mangXH"){
            $mangXH = $value;
          }
          if($key == "soHotLine"){
            $soHotLine = $value;
          }
          if($key == "gioMoCua"){
            $gioMoCua = $value;
          }
          if($key == "logo"){
            $logo = $value;
          }
       ?>

   <?php endforeach ?>
	<!-- du lieu cua menu -->
	<?php foreach ($mangdulieumenuheader as $key => $value): ?>
      <?php 
          if($key == "Home"){
            $Home = $value;
          }
          if($key == "About"){
            $About = $value;
          }
          if($key == "News"){
            $News = $value;
          }
          if($key == "Menu"){
            $Menu = $value;
          }
          if($key == "Contact"){
            $Contact = $value;
          }
          if($key == "Reservation"){
            $Reservation = $value;
          }
       ?>
<!-- phan header -->
   <?php endforeach ?>
 	<?php include('header_veiw.php') ?>
 	<!-- ket thuc header -->
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-xs-center wow  flipInY" data-wow-delay="0s">
					<div class="tdtintuchome">
						<!-- su ly lay uri -->
						<span class="fontdancing">Tips For News Dishes
						</span>
						<h2 class="fontroboto">Lastest News Update</h2>
					</div>
				</div> 
			</div>
		

	</div>  <!-- HET TIN TUC O TRANG HOME -->

	<!-- noi dung tin -->

	<section class="noidungtin">
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<!-- load thong tin cac veiw -->
					<?php foreach ($mangdulieu as  $value): ?>
						
					<div class="mottinchuan mb-3 wow fadeInUp">
						<img src=" <?php echo $value['avata_news'] ?> " alt="">

						<a href="" class=" tieudetin fontoswarld"><?php echo $value['tieude'] ?> </a>

						<div class="ngaythang"> <?php echo date('d/m/Y -G:i - A',$value['ngaytao']) ?> IN <span class="vang"><?php echo $value['name_dm'] ?> </span></div>
						

						<?= $value['noidung'] ?>
					</div>
					<hr>

					<?php endforeach ?>

					<!-- phan trang --> 
					<!-- su dung ham trong model de lay so luong tin de phan trang -->
					
					<!-- het cot 9 -->
					<!-- cot nhung -->
					<div class="row tinlienquan wow fadeInUp">
						<div class="col-sm-12">
							<h3>Các Tin Khác</h3>
							<br>
						</div>
						<?php foreach ($mangdulieunhung as  $value): ?>
					<div class="col-sm-4">
						
						<div class="card-deck-wrapper">
						<div class="card-deck">
							<div class="car">
								<a href="<?php echo base_url() ?>News/chiTietTin/<?php echo $value['id'] ?>"><img class="card-img-top img-fluid" src="<?php echo $value['avata_news'] ?> " alt="" height="30%"></a>
								<div class="card-block">
									<a href="<?php echo base_url() ?>News/chiTietTin/<?php echo $value['id'] ?>" class="card-title display-5"><?php echo $value['tieude']; ?></a>
									<hr>
									<p class="card-text"> IN <span class="vang"><?php echo $value['name_dm'] ?></span></p>
									
								</div>
							</div>
						</div>
					</div>
				
					</div>
						<?php endforeach ?>
				</div>
				</div>

				
				

				<div class="col-sm-3">
					<div class="phanseach wow fadeInUp">
						<input type="text" class="form-control phanseachct" placeholder="Search">
						<button type="submit" class="iconsearch"><i class="fa fa-search"></i></button>
					</div>

					<div class="khoilistlink my-2 wow fadeInUp">
						<h3 class="fontoswarld">Category</h3>
						<ul class="fontroboto">
							<?php foreach ($mangdanhmuc as  $value): ?>
								<li><a href=" <?php echo base_url() ?>/News/danhmuc/<?php echo $value['id'] ?>"><?php echo $value['name_dm'] ?></a></li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>


	<div class="footertop">
		<div class="container">
			<div class="row">
				<div class="col-sm-3 cotf1 mb-2 wow fadeInUp" data-wow-delay="0s">
					<a href=""><img src="<?php echo base_url() ?>/images/logofoot.png" alt="" class="logof"></a>
					<p>Marsh mallow muffin soufflé jelly-o tart cake Marshmallow macaroon jelly jubes dont tiramisu croissant cake.</p>
					<div class="motdong">
						<i class="fa fa-paper-plane-o"></i>
						<span class="textmd">Address : 44 New Design Street,<br>
						Melbourne 005</span>
					</div>
					<div class="motdong">
						<i class="fa fa-phone"></i>
						<span class="textmd">Phone : (01) 800 433 633</span>
					</div>
					<div class="motdong">
						<i class="fa fa-envelope-o"></i>
						<span class="textmd">Email : info@Example.com</span>
					</div>
					

				</div>  <!-- HET COTF1 -->
				<div class="col-sm-2 push-sm-1 cotf2 mb-2  wow fadeInUp" data-wow-delay="0.1s">
					<h2 class="tdft">Userfull Link </h2>
					<ul>
						<li><a href="">About company </a></li>
						<li><a href="">Reservation  </a></li>
						<li><a href="">Help center  </a></li>
						<li><a href="">Our Blog  </a></li>
						<li><a href="">Careers  </a></li>
						<li><a href="">Contact us  </a></li>
					</ul>
				</div>  <!-- HET COTF2 -->
				<div class="col-sm-3  cotf3 mb-2 wow  fadeInUp" data-wow-delay="0.2s">
					<h2 class="tdft">Userfull Link 2 </h2>
					<ul>
						<li><a href="">About company </a></li>
						<li><a href="">Reservation  </a></li>
						<li><a href="">Help center  </a></li>
						<li><a href="">Our Blog  </a></li>
						<li><a href="">Careers  </a></li>
						<li><a href="">Contact us  </a></li>
					</ul>
				</div>  <!-- HET COTF3 -->
				<div class="col-sm-3  cotf4 wow  fadeInUp" data-wow-delay="0.3s">
					<h2 class="tdft">Openning hours </h2>
					<div class="openning1">
						<div class="phai float-xs-right">9:00 am - 23:00 pm</div>
						<div class="trai">Mon — Fri</div>
					</div>
					 <div class="openning1">
						<div class="phai float-xs-right">10:00 am - 23:00 pm</div>
						<div class="trai">Saturday </div>
					</div>
					 <div class="openning1">
						<div class="phai float-xs-right">10:00 am - 23:00 pm</div>
						<div class="trai">Sunday   </div>
					</div>
					 
					<p>Note: Arctica Restaurant is closed on holidays.</p>
				</div>  <!-- HET COTF4 -->
				
			</div>
		</div>
	</div>  <!-- HET FOOTERTOP -->

	<div class="footerbottom text-xs-center fontroboto wow  fadeInUp" data-wow-delay="0s">
		 Copyrights © 2015  All Rights Reserved. 
	</div>

</body>
</html>
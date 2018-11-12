<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Quản Lý Header</title>
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



<!-- end-header -->

  <?php 
  date_default_timezone_set('Asia/Ho_Chi_Minh');
   ?>


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

   <?php endforeach ?>


  <div class="container mt-2 pt-2">
    <div class="row">
      <div class="col-sm-10 push-sm-1">
      <div class="col-sm-12 suatin">
        <div class="jumbotron text-xs-center">
          <h1 class="display-6">Sửa Menu Header</h1>
          <p class="lead">Sửa Menu Header</p>
          <hr class="m-y-md">
        </div>
        <div class="formedit">
          <form action=" <?php echo base_url() ?>/Admin/updateMenuHeader" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              
            <input type="hidden" name="id" class="form-control" id="" value=" " >
            <fieldset class="form-group">
              <label for="">Text Home</label>
              <input type="text" name="text_home" class="form-control" id="" value="<?php echo $Home['text_home'] ?>" >
            </fieldset>
            <fieldset class="form-group">
              <label for="">Link Home</label>
              <input type="text" name="link_home" class="form-control" id="" value="<?php echo $Home['link_home'] ?>" >
            </fieldset>
            <fieldset class="form-group">
              <label for="">Text_About</label>
              <input type="text" name="text_about" class="form-control" id="" value=" <?php echo $About['text_about'] ?> " >
            </fieldset>
             <fieldset class="form-group">
              <label for="">Link_About</label>
              <input type="text" name="link_about" class="form-control" id="" value=" <?php echo $About['link_about'] ?> " >
            </fieldset>

            <fieldset class="form-group">
              <label for="">Text News</label>
              <input type="text" name="text_news" class="form-control" id="" value=" <?php echo $News['text_news'] ?>" >
            </fieldset>
            <fieldset class="form-group">
              <label for="">Link News</label>
              <input type="text" name="link_news" class="form-control" id="" value=" <?php echo $News['link_news'] ?>" >
            </fieldset>
            <fieldset class="form-group">
              <label for="">Text Menu</label>
              <input type="text" name="text_menu" class="form-control" id="" value="<?php echo $Menu['text_menu'] ?>" >
            </fieldset>
             <fieldset class="form-group">
              <label for="">Link Menu</label>
              <input type="text" name="link_menu" class="form-control" id="" value="<?php echo $Menu['link_menu'] ?>" >
            </fieldset>
            <fieldset class="form-group">
              <label for="">Text Contact</label>
              <input type="text" name="text_contact" class="form-control" id="" value="<?php echo $Contact['text_contact'] ?> " >
            </fieldset>
            <fieldset class="form-group">
              <label for="">Link Contact</label>
              <input type="text" name="link_contact" class="form-control" id="" value="<?php echo $Contact['link_contact'] ?> " >
            </fieldset>
              <fieldset class="form-group">
              <label for="">Text Reservation</label>
              <input type="text" name="text_reser" class="form-control" id="" value="<?php echo $Reservation['text_reser'] ?> " >
            </fieldset>
             <fieldset class="form-group">
              <label for="">Link Reservation</label>
              <input type="text" name="link_reser" class="form-control" id="" value="<?php echo $Reservation['link_reser'] ?> " >
            </fieldset>
            <fieldset class="form-group">
              <input type="submit" class="btn btn-outline-success" value="Sửa Tin">
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
      
  <!-- them ham cho phep su lt noi dung bang ckedittor -->
  <!-- dat id trung voi id can dua ckeditor vao -->

  
</body>
</html>
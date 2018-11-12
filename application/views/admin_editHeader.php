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



<!-- end-header -->

  <?php 
  date_default_timezone_set('Asia/Ho_Chi_Minh');
   ?>


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


  <div class="container mt-2 pt-2">
    <div class="row">
      <div class="col-sm-10 push-sm-1">
      <div class="col-sm-12 suatin">
        <div class="jumbotron text-xs-center">
          <h1 class="display-6">Sửa Header</h1>
          <p class="lead">Sửa Header</p>
          <hr class="m-y-md">
        </div>
        <div class="formedit">
          <form action=" <?php echo base_url() ?>/Admin/updateHeader" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              
            <input type="hidden" name="id" class="form-control" id="" value=" " >
            <fieldset class="form-group">
              <label for="">Link FaceBook</label>
              <input type="text" name="linkFB" class="form-control" id="" value="<?php echo $mangXH['linkFB'] ?>" >
            </fieldset>
            <fieldset class="form-group">
              <label for="">linkTwitter</label>
              <input type="text" name="linkTwitter" class="form-control" id="" value=" <?php echo $mangXH['linkTwitter'] ?> " >
            </fieldset>

            <fieldset class="form-group">
              <label for="">linkP</label>
              <input type="text" name="linkP" class="form-control" id="" value=" <?php echo $mangXH['linkP'] ?>" >
            </fieldset>
            <fieldset class="form-group">
              <label for="">linkGP</label>
              <input type="text" name="linkGP" class="form-control" id="" value="<?php echo $mangXH['linkGP'] ?>" >
            </fieldset>
            <fieldset class="form-group">
              <label for="">Text Holine</label>
              <input type="text" name="textHotLine" class="form-control" id="" value="<?php echo $soHotLine['textHotLine'] ?> " >
            </fieldset>
              <fieldset class="form-group">
              <label for="">Số HoLine</label>
              <input type="text" name="sDT" class="form-control" id="" value="<?php echo $soHotLine['sDT'] ?> " >
            </fieldset>
              <fieldset class="form-group">
              <label for="">Text Giờ Mở Cửa</label>
              <input type="text" name="text" class="form-control" id="" value="<?php echo $gioMoCua['text'] ?> " >
            </fieldset>
              <fieldset class="form-group">
              <label for="">Giờ Mở Cửa</label>
              <input type="text" name="gio" class="form-control" id="" value="<?php echo $gioMoCua['gio'] ?>  " >
            </fieldset>


            <fieldset class="form-group">
              <label for="">Ảnh Logo</label>
              <hr>
              <img  class="img-fluid" src=" <?php echo $logo ?> " alt="ảnh tin" width = "20%">
              <input type="file" name="logo" class="form-control" id="" placeholder="ảnh tin" >
              <!-- them input an -->
              <input type="hidden" name="logo2" class="form-control" value="" >
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sua Du lieu</title>
	<script type="text/javascript" src=" <?php echo base_url(); ?>vendor/bootstrap.js"></script>
  <!-- goi thu vien upload jq -->
  <script type="text/javascript" src=" <?php echo base_url(); ?>1.js"></script>
  <link rel="stylesheet" href=" <?php echo base_url(); ?>vendor/bootstrap.css">
  <link rel="stylesheet" href=" <?php echo base_url(); ?>vendor/font-awesome.css">
  <link rel="stylesheet" href=" <?php echo base_url(); ?>1.css">
</head>
<body>

  <nav class="navbar navbar-light bg-faded">
  <a class="navbar-brand" href="#">Lựa Chọn</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href=" <?php echo base_url() ?>Slide/editSlide">Sửa Slide <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="<?php echo base_url() ?>Slide/addSlidev">Thêm Mới</a>
    </div>
  </div>
</nav>


	 <div class="container">
   		 <div class="text-xs-center">
    	  <h3 class="display-3">Sua Slides</h3>
     	 <hr>
     	</div>
    </div>
	 <div class="container">
    <?php $dem=0; ?>
  <!-- chinh phan enctype de chuyen duoc anh len csdl -->
        <form method="post" enctype="multipart/form-data" action="do_editSlide">
          <?php foreach ($mangketqua as $key): ?>
            <?php $dem++ ?>
            <h2>Slide So <?php echo "$dem"; ?></h2>
            <hr>

            <div class="form-group row">
              <div class="col-sm-6">
                  <div class="row">
                    <label for="ten" class="col-sm-4 col-form-label text-xs-right ">Tieu de </label>
                    <div class="col-sm-8">
                   <input name="title[]" type="text" class="form-control" id="title" value="<?= $key->title ?>">
                   </div>
                  </div>
              </div>

              <div class="col-sm-6">
                  <div class="row">
                    <label for="sdt" class="col-sm-4 col-form-label text-xs-right ">Mo ta slide</label>
                    <div class="col-sm-8">
                   <input name="description[]" type="text" class="form-control" id="description" value="<?= $key->description ?>" >
                   </div>
                  </div>
              </div>
           </div>

           <div class="form-group row">
              <div class="col-sm-6">
                  <div class="row">
                    <label for="link" class="col-sm-4 col-form-label text-xs-right ">link cua nut </label>
                    <div class="col-sm-8">
                   <input name="button_link[]" type="text" class="form-control" id="button_link"  value="<?= $key->button_link ?>" >
                   </div>
                  </div>
              </div>

              <div class="col-sm-6">
                  <div class="row">
                    <label for="sdt" class="col-sm-4 col-form-label text-xs-right ">text cua nut</label>
                    <div class="col-sm-8">
                   <input name="button_text[]" type="text" class="form-control" id="button_text"  value="<?= $key->button_text ?>">
                   </div>
                  </div>
              </div>
           </div>

           <div class="form-group row">
              <div class="col-sm-12">
                  <div class="row">
                    <label for="link" class="col-sm-2 col-form-label text-xs-right ">upload anh</label>
                    <div class="col-sm-10">
                   <input name="slide_image[]" type="file" class="form-control" id="slide_image" >
                   <img src="<?= $key->slide_image ?>" alt="" width = "20%">;
                  <input type="hidden" name="slide_image2[]" value="<?= $key->slide_image ?>">
                   </div>
                  </div>
              </div>
           </div>
           <hr>

           <?php endforeach ?>


              
           <div class="form-group row  text-xs-center">
               <div class="col-sm-12">
                <!-- su dung binh thuong -->
                   <button type="submit" class="btn btn-outline-success">Lưu</button>
                    
               </div>
            </div>
        </form>
    </div>
	
</body>
</html>
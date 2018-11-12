<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<script type="text/javascript" src=" <?php echo base_url(); ?>vendor/bootstrap.js"></script>
  <!-- goi thu vien upload jq -->

  <!-- <script type="text/javascript" src=" <?php echo base_url(); ?>jqueryupload/js/vendor/jquery.ui.widget.js"></script>
  <script type="text/javascript" src=" <?php echo base_url(); ?>jqueryupload/js/jquery.fileupload.js"></script> -->

  <!-- <script type="text/javascript" src=" <?php echo base_url(); ?>1.js"></script> -->
	
  <link rel="stylesheet" href=" <?php echo base_url(); ?>vendor/bootstrap.css">
  <link rel="stylesheet" href=" <?php echo base_url(); ?>vendor/font-awesome.css">
  <link rel="stylesheet" href=" <?php echo base_url(); ?>1.css">
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
<!-- header -->

<nav class="navbar navbar-dark bg-inverse navbar-fixed-top">
  <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" >
  </button>
  <div class="collapse navbar-toggleable-xs " id="exCollapsingNavbar2">
  	<a href="#" class="navbar-brand"><img src="http://icons.iconarchive.com/icons/graphicloads/100-flat/256/home-icon.png" alt="" height="60px"></a>
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

	<div class="container-fluid mt-2 pt-2 ">
		<div class="row">
			<div class="col-sm-6">
				<!-- su dung jquery bo form -->
				<!-- <form action="addDm" method="POST"> -->
					  <div class="form-group text-xs-center" >
					  	<br>
					  	<br>
					    <h1 class="display-5">Thêm Danh Mục</h1>
					    <input name="name_dm" type="text" class="form-control" id="name_dm" aria-describedby="emailHelp" placeholder="nhâp tên danh mục">
					  </div>	 
					  <button  type="submit" class="btn btn-success nutxulyajax"   value="Them Danh muc">Thêm Danh Mục</button>
				<!-- </form> -->
			</div>

			<div class="col-sm-6 ">
				<div class="jumbotron jumbotron-fluid text-xs-center">
					<div class="container">
						<h1 class="display-5">Danh Sách Mục Tin</h1>
						<p class="lead">Các Danh Mục Tin Đã Thêm</p>
					</div>
				</div>
				<div class="ajax-add">
				<?php foreach ($mangketqua as  $value): ?>
					
				<div class="card card-inverse card-primary mb-3 text-center " >
				  <div class="card-block">
				    <div class="col-sm-12">
				    	<blockquote class="card-blockquote">    	
							<div class="name_dm">
								<h5 class="card-text"><?php echo $value['name_dm'] ?></h5>
							</div>
							 <fieldset class="form-group hidden-xs-up jquery_dm" col-sm-12>
					    		<input type="text" class="form-control" value="<?php echo $value['name_dm'] ?>" >
					    	</fieldset >
					    	 <fieldset class="form-group hidden-xs-up jquery_id" col-sm-12>
					    	 	 <input type="hidden" class="form-control" value="<?php echo $value['id'] ?> ">
					    	 </fieldset>
					    	<div class=" jquery_button  text-xs-right hidden-xs-up">
					    	<!-- duong link chi chu id cua phan tu -->
					    		<a href="" class="nutluu btn btn-success"> Lưu </a>
					    	</div>
					    	 <div class="col-sm-12 text-xs-right thaotac">
					    	<!-- duong link chi chu id cua phan tu -->
						    	<a  data-href="<?php echo $value['id'] ?>" class="nutedit btn btn-danger"><i class="fa fa-pencil"></i> sửa </a>
						   		<a  data-href="<?php echo $value['id'] ?>" class="nutxoa btn btn-success"><i class=" fa fa-remove"></i> xóa </a>
						   		
					   		 </div>
					   		
				   		 </blockquote>
				    </div> 	    
				  </div>
				</div>
				<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>

	<!-- su dung juery ajaxm them sua xoa du lieu -->
	

	<script>

		$(function(){

			var duongdan = '<?php echo base_url() ?>';


			//sua du lieu

			$('body').on('click', '.nutedit', function(event) {

				//next la di xuong
				//parent la di len
				//dung find de tim class
				$(this).parent().parent().find('.jquery_dm , .jquery_button').removeClass('hidden-xs-up');
				$(this).parent().parent().find('.name_dm').addClass('hidden-xs-up');
				$(this).parent().addClass('hidden-xs-up');

				// $(this).parent().parent().parent().addClass('hidden-xs-up');
			
				//an noi dung cu di
				//$('.thaotac , .name_dm').addClass('hidden-xs-up');

				//cho phan tu input hien len
				//$('.jquery_button , .tendanhmucsua').removeClass('hidden-xs-up'
				
				event.preventDefault();
				/* Act on the event */
			});

			//het sua du lieu

			//cap nhat du lieu sau khi sua

			$('body').on('click', '.nutluu', function(event) {
				//lay du lieu tu ham minh click
				giatriname = $(this).parent().parent().find('.jquery_dm').children('input').val();
				giatriid = $(this).parent().parent().find('.jquery_id').children('input').val();
				//du du liue vao su dung ajax update du lieu

				//xu ly giao dien
				phantu1 = $(this).parent().addClass('hidden-xs-up');
				phantu2 = $(this).parent().parent().find('.jquery_dm').addClass('hidden-xs-up');
				noidung = $(this).parent().parent().find('.jquery_dm').children('input').val();
				//console.log(noidung);
				//cho hien thi nhu binh thuong
				hienthi1 = $(this).parent().next().removeClass('hidden-xs-up');
				hienthi2 = $(this).parent().parent().parent().find('.name_dm').html(noidung).removeClass('hidden-xs-up');

				$.ajax({
					url: duongdan + 'News/do_editDm',
					type: 'POST',
					dataType: 'json',
					data: {
							id     : giatriid,
							name_dm: giatriname},
				})
				.done(function() {
					console.log("success");
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
				

				event.preventDefault();
				/* Act on the event */
			});
			//them du lieu	

		$('.nutxulyajax').click(function(event) {
			// su dung ajax them moi du liue
			$.ajax({
				url: 'addDm',
				type: 'POST',
				dataType: 'json',
				data: {name_dm: $('#name_dm').val()}
				//dung ham succes de lay id vua dua vao
				// success:function(res){
				// 	console.log(res);
				// }
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function(res) {
				console.log(res);

				//sau khi them su dung bien res de lay gia tri id vua nhan duoc

				noidung = '<div class="card card-inverse card-primary mb-3 text-center" >';
				noidung += '<div class="card-block">';
				noidung += '<div class="col-sm-12">';
				noidung += '<blockquote class="card-blockquote">';
				noidung += '<div class="name_dm">';
				noidung += '<p class="card-text"> '+ $('#name_dm').val()+'</p>';
				noidung += '</div>';
				noidung += '<fieldset class="form-group hidden-xs-up jquery_dm">';
				noidung += '<input type="text" class="form-control " value="<?php echo $value['name_dm'] ?>" >';
				noidung += '<input type="hidden" class="form-control id" value="<?php echo $value['id'] ?>" >';
				noidung += '</fieldset>';
				noidung += '<fieldset class="form-group hidden-xs-up jquery_id">';
				noidung += '<input type="hidden" class="form-control id" value="<?php echo $value['id'] ?>" >';
				noidung += '</fieldset>';
				noidung += '<div class=" jquery_button  text-xs-right hidden-xs-up">';
				noidung += '<a href="" class="nutluu btn btn-success"> Lưu </a>';
				noidung += '</div>';
				noidung += '<div class="col-sm-12 text-xs-right thaotac">' ;
				noidung += '<a data-href="'+res+'" class="nutedit btn btn-danger"><i class=" fa fa-pencil"></i> sửa</a>' ;
				noidung += '<a data-href="'+res+'" class="nutxoa btn btn-success"><i class="fa fa-remove"></i> xóa</a>' ;
				noidung += '</div>';
				noidung += '</blockquote>';
				noidung += '</div>';
				
				$('.ajax-add').append(noidung);

				$('#name_dm').val('');

			});
			
		});

		//xoa doi tuong
		//tim kiem cac tin co trong danh muc chuyen sang danh muc chua phan loai
		//ham lon lang nghe de xoa duoc cac phan tu moi dua vao
		$('body').on('click', '.nutxoa', function(event) {
			id = $(this).data('href');
			doituongcanxoa = $(this).parent().parent().parent().parent().parent();

			$.ajax({
				url: duongdan + 'News/deleteDm/'+id,
				type: 'POST',
				dataType: 'json'
				
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
				// dung jquery xoa luon phan tuong
				doituongcanxoa.remove();
			});
		});


	})
	</script>
</body>
</html>
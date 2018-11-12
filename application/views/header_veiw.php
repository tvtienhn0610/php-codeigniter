<div class="topheader">
 		<div class="container">
 			<div class="row">
 				<div class="col-sm-6 wow jello">
 					<div class="mangxh float-sm-left text-xs-center text-sm-left">
						<a href="<?php echo $mangXH['linkFB'] ?>"><i class="fa fa-facebook"></i></a>
						<a href="<?php echo $mangXH['linkTwitter'] ?>"><i class="fa fa-twitter"></i></a>
						<a href="<?php echo $mangXH['linkP'] ?>"><i class="fa fa-pinterest"></i></a>
						<a href="<?php echo $mangXH['linkGP'] ?>"><i class="fa fa-google-plus"></i></a>
 					 </div>
 					<div class="datban">
 						<?php echo $soHotLine['textHotLine'] ?> : <?php echo $soHotLine['sDT'] ?>
 					 </div>
 				</div>
 				<div class="col-sm-6 ">
 					<div class="datban openingtop float-sm-right text-sm-left text-xs-center">
 						<?php echo $gioMoCua['text'] ?> : <?php echo $gioMoCua['gio'] ?>
 					</div>
 				</div>
 			</div> <!-- het row -->
 		</div> <!-- het container -->
 	</div> <!-- het topheader  -->
 	<div class="logovamenu">
	    <nav class="navbar navbar-light  fontroboto">
	    	<div class="container">    	
			      <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#mtren">
			       
			      </button>
			      <div class="collapse navbar-toggleable-xs" id="mtren">
			        <a class="navbar-brand text-xs-center text-sm-left" href="<?php echo base_url() ?>"><img src="<?php echo $logo ?>" alt=""></a>

			        <ul class="nav navbar-nav float-sm-right">
			          <li class="nav-item active">
			            <a class="nav-link" href="<?php echo $Home['link_home'] ?>"><?php echo $Home['text_home'] ?> </a>
			          </li>
			          <li class="nav-item">
			            <a class="nav-link" href="<?php echo $About['link_about'] ?>"><?php echo $About['text_about'] ?></a>
			          </li>
			          <li class="nav-item">
			            <a class="nav-link" href=" <?php echo $News['link_news'] ?>"><?php echo $News['text_news'] ?></a>
			          </li>
			          <li class="nav-item">
			            <a class="nav-link" href="<?php echo $Menu['link_menu'] ?>"><?php echo $Menu['text_menu'] ?></a>
			          </li>
			          <li class="nav-item">
			            <a class="nav-link" href="<?php echo $Contact['link_contact'] ?>"><?php echo $Contact['text_contact'] ?></a>
			          </li>
			         <li class="nav-item datbanmenu">
			            <a class="nav-link btn btn-warning wow bounce" data-wow-iteration="3" href="<?php echo $Reservation['link_reser'] ?>" ><?php echo $Reservation['text_reser'] ?></a>
			          </li>
			        </ul>
			      </div>
	      </div> <!-- het container -->
	    </nav>
 	</div> <!-- het logo va menu -->
<?php

		session_start();
		include('mydbconnect.php');

			if(!isset($_GET['id'])) {
		  		header("Location: http://www.blitzschlag.org/registration");
			}
		else
					if(!isset($_SESSION['id'])){ header("Location: http://blitzschlag.org/registration"); }
					// $last_reg_id = mysqli_insert_id($conn);
					// $host = $_SERVER["HTTP_HOST"];
    			// $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
    			// header("Location: http://$host$path/registered.php?id=$last_reg_id");
				else {	echo '<!DOCTYPE html>
					<html lang="en">
					  <head>
					    <meta charset="utf-8">
					    <meta http-equiv="X-UA-Compatible" content="IE=edge">
					     <title>Blitzschlag\'17</title>

					    <meta name="viewport" content="width=device-width, initial-scale=1">

					    <!-- Favicon -->
					    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>

					    <!-- CSS
					    ================================================== -->
					    <!-- Bootstrap css file-->
					    <link href="css/bootstrap.min.css" rel="stylesheet">
					    <!-- Font awesome css file-->
					    <link href="css/font-awesome.min.css" rel="stylesheet">
					    <!-- Superslide css file-->
					    <link rel="stylesheet" href="css/superslides.css">
					    <!-- Slick slider css file -->
					    <link href="css/slick.css" rel="stylesheet">
					    <!-- smooth animate css file -->
					    <link rel="stylesheet" href="css/animate.css">
					    <!-- Elastic grid css file -->
					    <link rel="stylesheet" href="css/elastic_grid.css">
					    <!-- Default Theme css file -->
					    <link id="orginal" href="css/themes/default-theme.css" rel="stylesheet">
					    <!-- Main structure css file -->
					    <link href="style.css" rel="stylesheet">

					    <!-- Google fonts -->
					    <link href=\'http://fonts.googleapis.com/css?family=Open+Sans\' rel=\'stylesheet\' type=\'text/css\'>
					    <link href=\'http://fonts.googleapis.com/css?family=Varela\' rel=\'stylesheet\' type=\'text/css\'>
					    <link href=\'http://fonts.googleapis.com/css?family=Montserrat\' rel=\'stylesheet\' type=\'text/css\'>
					  </head>
					  <style>
					  body {
					    padding-top: 8%;
						}
					</style>
					  <body>
					     <!-- BEGAIN PRELOADER -->
					    <div id="preloader">
					      <div id="status">&nbsp;</div>
					    </div>
					    <!-- END PRELOADER -->

					    <!-- SCROLL TOP BUTTON -->
					    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
					    <!-- END SCROLL TOP BUTTON -->

					    <!--=========== BEGIN HEADER SECTION ================-->
					    <header id="header">
					      <!-- BEGIN MENU -->
					      <div class="menu_area">
					        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
					          <div class="container">
					          <div class="navbar-header">
					            <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
					            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					              <span class="sr-only">Toggle navigation</span>
					              <span class="icon-bar"></span>
					              <span class="icon-bar"></span>
					              <span class="icon-bar"></span>
					            </button>

					            <!-- LOGO -->

					            <!-- TEXT BASED LOGO -->
					            <a class="navbar-brand" href="../index.html">Blitzschlag<span>2017</span></a>

					            <!-- IMG BASED LOGO  -->
					            <!--  <a class="navbar-brand" href="#"><img src="img/logo.png" alt="logo"></a> -->


					          </div>
					          <div id="navbar" class="navbar-collapse collapse">
					            <ul id="top-menu" class="nav navbar-nav navbar-right main_nav">
					           	<li><a href="../index.html">Home</a></li>
						<li><a href="../technical events/index.html" title="technical events">Technical</a></li>
						<li><a href="../cultural/index.html" title="cultural events">Cultural</a></li>
						<li><a href="../team/index.html">Team</a></li>
						<li class="active"><a href="../registration/index.html">Registration<br>Accommodation</a></li>
						<li><a href="../sponsors/index.html">Sponsors</a></li>
					            </ul>
					          </div><!--/.nav-collapse -->
					          </div>
					        </nav>
					      </div>
					      <!-- END MENU -->

						<section >

						 <div class="container">
					     <div class="col-md-3">
					     </div>
											<div class="col-md-6">
												<!-- START PANEL -->
												<div class="panel panel-default" style="margin-top: 50px">
													<div class="panel-heading ui-draggable-handle">
					 									<h3 class="panel-title">Registration ID : <span style="color: #f00;" > BLITZ_'; echo htmlspecialchars(@$_GET['id']);

											echo '		</span>	</h3>
													</div>';



													  $sql=sprintf("SELECT fn,ln from registration WHERE id='%s';",mysqli_real_escape_string($conn,@$_GET['id']));

														$result = mysqli_query($conn,$sql);

														if ($result === false)
																die("Could not query database");

														if(mysqli_num_rows($result) == 1){

														$row = mysqli_fetch_array($result);
														$fn=$row['fn'];
														$ln=$row['ln'];
														}


												echo '	<div class="panel-body" style="font-family: ubuntu">

															<div class="block">
																<form class="form-horizontal" role="form">

																	<div class="panel-body panel-body-pricing">
																		<h2 style="color:black;"><span style="color: #f00;" >';
																		 if( @$_GET['already']==1) { echo "ALREADY"; }

																		 echo '</span> <br> REGISTERED </h2>

																		<hr>
																		<table style="width: 100%">
																			<tbody>
					                                                        <tr>
					        											    <h3>Dear ';
																						echo htmlspecialchars($fn)." ".htmlspecialchars($ln); echo ', Please note your registration ID for event registrations .</h3>
																			 <br> <h4> Bring your college ID card to the venue .</h4>
																		    </tr>
					                                                        <tr>
					                                                        <br>


																			</tr>
																			</tbody>
																		</table>
																	</div>
																</form>
					                                            <div style="text-align: center">
															</div>
					                                        </div>
					                                </div>
												</div>
											</div>

						</div>
						<div align="center">
											<div >
												<a href="../index.html" class="tm-banner-link">RETURN TO HOME</a>

											</div>
											</div>
						</section>

					</section>

					    <!--=========== END CONTACT SECTION ================-->

					    <!--=========== END CONTACT FEATURE SECTION ================-->



					     <!--=========== BEGAIN FOOTER ================-->
					     <footer id="footer">
					       <div class="container">
					         <div class="row">
					           <div class="col-lg-6 col-md-6 col-sm-6">
					             <div class="footer_left">

					             </div>
					           </div>
					           <div class="col-lg-6 col-md-6 col-sm-6">
					             <div class="footer_right">
					               <ul class="social_nav">
					                 <li><a href="https://www.facebook.com/blitzschlag.mnitjaipur.1?fref=ts"><i class="fa fa-facebook"></i></a></li>

					               </ul>
					             </div>
					           </div>
					         </div>
					       </div>
					      </footer>
					      <!--=========== END FOOTER ================-->

					     <!-- Javascript Files
					     ================================================== -->

					     <!-- initialize jQuery Library -->
					    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
					    <!-- Google map -->
					    <script src="https://maps.googleapis.com/maps/api/js"></script>
					    <script src="js/jquery.ui.map.js"></script>
					     <!-- For smooth animatin  -->
					    <script src="js/wow.min.js"></script>
					    <!-- Bootstrap js -->
					    <script src="js/bootstrap.min.js"></script>
					    <!-- superslides slider -->
					    <script src="js/jquery.superslides.min.js" type="text/javascript"></script>
					    <!-- slick slider -->
					    <script src="js/slick.min.js"></script>
					    <!-- for circle counter -->
					    <script src=\'https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js\'></script>
					    <!-- for portfolio filter gallery -->
					    <script src="js/modernizr.custom.js"></script>
					    <script src="js/classie.js"></script>
					    <script src="js/elastic_grid.min.js"></script>
					    <script src="js/portfolio_slider.js"></script>

					    <!-- Custom js-->
					    <script src="js/custom.js"></script>
					  </body>
					</html>
';


					session_destroy();
    			//exit;
				}





?>

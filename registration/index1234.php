<?php

	session_start();

	include('mydbconnect.php');

	if(isset($_POST["blitz"]) && isset($_POST["emailc"]) && isset($_POST["phonec"]) && isset($_POST["days"])){
	// header("Location: http://www.google.com");
		$sql=sprintf("SELECT id,status from registration WHERE email='%s';",mysqli_real_escape_string($conn,$_POST["emailc"]));
		$result = mysqli_query($conn,$sql);
			// header("Location: http://www.google.com");

			if ($result === false){
					// header("Location: http://www.gmail.com");
							die("Could not query database");
						}
			//echo mysqli_num_rows($result)."HELLLLO";
			if(mysqli_num_rows($result) == 0){
				// header("Location: http://www.google.com");
				echo "<center>Looks like you haven't registered yet. <br> Please register first and then proceed.</center>";
			}
		 else if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_array($result);
			$status=$row['status'];
			if($status == 0){
				echo "<center>Please confirm your registration and then proceed with the accomodation.</center>";

			}
			else{
				if($_POST["days"]==1) $amount=400;
				else if($_POST["days"]==2) $amount=600;
				else if($_POST["days"]==3) $amount=800;
				$sql=sprintf("UPDATE registration SET days = '%s', amount = $amount WHERE id = '%s';",
					 mysqli_real_escape_string($conn,$_POST["days"]),
				   mysqli_real_escape_string($conn,$_POST["blitz"]));
					$result = mysqli_query($conn,$sql);
									if($result){
											echo "Succesfully Registered";
									}
									else {
									echo "Could not connect to the internet. Please check your connection.";
									}

			}
		}
		else {
			echo "Looks like there is a mismatch in the emailID. <br>Kindly check !";


			}


	}


    // if username and password were submitted, check them
    if (isset($_POST["fn"])  && isset($_POST["ln"]) && isset($_POST["accomodation"]) && isset($_POST["gender"])&& isset($_POST["pronites"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["city"]) && isset($_POST["institute"])){

	//echo $_POST["fn"].$_POST["institute"].$_POST["accomodation"]."HELLLO";

	$sql=sprintf("SELECT id from registration WHERE email='%s';",mysqli_real_escape_string($conn,$_POST["email"]));

	$result = mysqli_query($conn,$sql);

		if ($result === false)
            die("Could not query database");
		//echo mysqli_num_rows($result)."HELLLLO";
	if(mysqli_num_rows($result) == 1){

		$row = mysqli_fetch_array($result);
		$id=$row['id'];
		    $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
			$_SESSION['id']=session_id();
            header("Location: http://$host$path/registered.php?id=$id&already=1");
            exit;

	}
	else {
  				$confirm_code=md5(uniqid(rand()));
					$email_id=$_POST["email"];
	$sql=sprintf("INSERT into registration(confirm_code,fn,ln,email,phone,gender,city,institute,pronites,accomodation,status,days,amount) values ('$confirm_code','%s','%s','%s','%s','%s','%s','%s','%s','%s',0,0,0);",
					 mysqli_real_escape_string($conn,$_POST["fn"]),
					 mysqli_real_escape_string($conn,$_POST["ln"]),
					 mysqli_real_escape_string($conn,$_POST["email"]),
					 mysqli_real_escape_string($conn,$_POST["phone"]),
					 mysqli_real_escape_string($conn,$_POST["gender"]),
					 mysqli_real_escape_string($conn,$_POST["city"]),
					 mysqli_real_escape_string($conn,$_POST["institute"]),
					 mysqli_real_escape_string($conn,$_POST["pronites"]),
					 mysqli_real_escape_string($conn,$_POST["accomodation"]));

					$result = mysqli_query($conn,$sql);
						if($result == true){/*
					 	 $to=$email_id;
					    $subject="Blitzschlag Confirmation Link";
						header="For any further enquiries mail on mnit.cacs@mnit.ac.in";
						$message="Your comfirmation link \r\n";
						$message.="Click on this link to confirm your presence: \r\n";
						$message.="http://blitzschlag.org/registration/confirmation.php?passkey=$confirm_code";
						// send email
						$sentmail = mail($to,$subject,$message,header);*/
						header("Location:http://blitzschlag.org/registration/confirmation.php?passkey=$confirm_code");

						}
						else {
						echo "Could not connect to the internet. Please check your connection.Or Try again later";
						}
						// if your email succesfully sent
						/*if($sentmail){
						echo "<center>Confirmation link has been sent to your email address provided.<br>Kindly confirm.</center>";
						}
						else {
						echo "<center>Cannot send confirmation link to your e-mail address.<br> Please check your internet connection.</center>";
						}*/


	}

	}




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blitzschlag '17- Registrations | MNIT Jaipur</title>
	<meta name="author" content="Blitzschlag Team" />
	<meta name="description" content="Blitzschlag is the annual cultural and technical fest of Malaviya National Institute of Technology,Jaipur. To be held from 24-26th feb 2017." />
	<meta name="keywords"  content="Blitzschlag,Blitzschlag 2017,Blitzschlag mnit ,Blitzschlag mnit 2017,mnit fest 2017,mnit fest,Blitzschlag'17"/>
    <meta name="keywords"  content="Blitzschlag,Blitzschlag 2017,Blitzschlag'17,MNIT Jaipur,rajasthan,college fest,Blitzschlag fest,MNIT fest"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="img/blitz logo.png"/>

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
    <link id="orginal" href="css/themes/yellow-theme.css" rel="stylesheet">
    <!-- Main structure css file -->
    <link href="style.css" rel="stylesheet">
<link rel="stylesheet" href="css/navstyle.css">

	<link rel="stylesheet" type="text/css" href="BCM/css/normalize.css" />
		<!--<link rel="stylesheet" type="text/css" href="BCM/css/demo.css" />-->
		<link rel="stylesheet" type="text/css" href="BCM/css/component.css" />
		<link rel="stylesheet" type="text/css" href="BCM/css/content.css" />
		<script src="BCM/js/modernizr.custom.js"></script>

    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style>
  body {
    padding-top: 0%;
	}
	
#box2 {
 
    border: 1px solid skyblue;
    margin: 0 auto;
    text-align: center;
   
}
</style>
  <body>

    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
     <header>
    <nav id='cssmenu'>
    <div class="logo"><a href="../index.html"><span style="color:white;">Blitzschlag</span> 2017</a></div>
    <div id="head-mobile"></div>
    <div class="button"></div>
    <ul>
    <li><a href='../index.html'>HOME</a></li>
    <li><a href='#'>Events</a>
       <ul>
          <li><a href='../technical events/index.html'>Technical</a>
             <ul>
                <li><a href='../technical events/index.html#Departmental Events'>Departmental Events</a>
               <ul>
                 <li><a href='../technical events/index.html#Departmental Events'>Computer Science</a></li>
                 <li><a href='../technical events/index.html#Departmental Events'>Electronics and Electrical</a></li>
                 <li><a href="../technical events/index.html#Departmental Events">Mechanical</a></li>
                 <li><a href="../technical events/index.html#Departmental Events">Chemical</a></li>
                 <li><a href="../technical events/index.html#Departmental Events">Civil</a></li>
                 <li><a href="../technical events/index.html#Departmental Events">Metallurgy</a></li>
             </ul>
               </li>
                <li><a href='../technical events/index.html#Flagship Events'>Flagship Events</a>
               <ul>
                 <li><a href='../technical events/index.html#Flagship Events'>Internet of things</a></li>
                 <li><a href='../technical events/index.html#Flagship Events'>Android App Development</a></li>
               </ul>
                  </li>
               <li><a href="../technical events/index.html#Robotics">Robotics</a></li>
             </ul>
          </li>
          <li><a href='../cultural/index.html'>Cultural Events</a>
             <ul>
                <li><a href='../cultural/index.html#Music and Dance'>Music and Dance</a></li>
                <li><a href='../cultural/index.html#Fine Arts'>Concevoir</a></li>
               <li><a href='../cultural/index.html#Dramatics'>Dramatics</a></li>
               <li><a href='../cultural/index.html#Literary'>Literary</a></li>
               <li><a href='../cultural/index.html#Film'>Film</a></li>
               <li><a href='../cultural/index.html#Photography'>Photography</a></li>
             </ul>
          </li>
          <li><a href="/gaming/index.html">Gaming</a>
            <ul>
              <li><a href="/gaming/index.html">FIFA</a></li>
              <li><a href="/gaming/index.html">Counter Strike GO</a></li>
              <li><a href="/gaming/index.html">Need for Speed</a></li>
              <li><a href="/gaming/index.html">Mili Militia</a></li>
            </ul>
          <li><a href="../panache/index.html">Fashion</a></li>
          <li><a href="../management/index.html">Management</a></li>
          <li><a href='../cultural/index.html#Fine Arts'>Concevoir</a></li>
       </ul>
    </li>
    <li><a href='../technical events/index.html#Workshops'>Workshops</a>
      <ul>
           <li><a href='../technical events/index.html#Workshops'>Workshop On Explosives</a></li>
           <li><a href='../technical events/index.html#Workshops'>Data Analysis</a></li>
           <li><a href='../technical events/index.html#Workshops'>Augmented Reality</a></li>
           <li><a href='../technical events/index.html#Workshops'>Industrial automation</a></li>
           <li><a href='../technical events/index.html#Workshops'>Conquer the Cube</a></li>
           <li><a href='../technical events/index.html#Workshops'>Sixth Sense Technology</a></li>
           <li><a href='../technical events/index.html#Workshops'>Tall Building Design</a></li>
           <li><a href='../technical events/index.html#Workshops'>Android App Development</a></li>
           <li><a href='../technical events/index.html#Workshops'>Ethical Hacking</a></li>
      </ul>
    </li>
    <li><a href='../team/index.html'>Team</a></li>
    <li class='active'><a href='index.html'>Registration</a>
        <ul>
          <li><a href="index.html">Registration</a></li>
          <li><a href="index.html">Accommodation</a></li>
        </ul>
    </li>
    <li><a href="../map/index.html">Maps</a></li>
     <li><a href="../pronite/index.html">Pronites</a></li>
    <li><a href='../sponsors/index.html'>Sponsors</a></li>
    </ul>
    </nav>
    </header>
      <!-- END MENU -->



 <div align="center" class="container">
			<!-- Top Navigation -->

			<section>
				<br><br><br><br><br><br><p style="font-size:25px;">Register here for <strong>Blitzschlag'17</strong>and get yourBlitz ID</p>
				<p style="font-size:18px;color:red;">Use your unique Blitz ID to register for respective technical and cultural events on www.blitzschlag.org<br>
				In order to get your Blitz ID, you have to verify your email-ID. </p>
				<br><br><br><br><br>

					<div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
						<button style="color:white; background:black;" type="button">Registration</button>
						<div class="morph-content" style="overflow-y: auto;">
							<div>
								<div class="content-style-form content-style-form-1">
									<span class="icon icon-close">Close the dialog</span>
									<h2>Register</h2>
									<form action="index.php"  method="post" id="f1">
										<p><label>First Name</label><input type="text" name="fn" required=""/></p>
										<p><label>Last Name</label><input type="text" name="ln" required=""/></p>
										<p><label>Email</label><input type="text" name="email" required=""/></p>
										<p><label>Contact</label><input type="text" name="phone" maxlength="10" pattern="\d{10}" required=""/></p>
										<p><label>Gender</label>
										<label style="text-align:center" class="radio-inline" >
										<input type="radio" name="gender" id="gender-0" value="male" checked="checked">
											Male
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

										<input type="radio" name="gender" id="gender-1" value="female">
											Female
										</label>
										<p><label>Institute</label><input type="text" name="institute" required=""/></p>
										<p><label>City</label><input type="text" name="city" required=""/></p>
										<label style="text-align:center">
										<p><label>Would you like to attend Pronites ?</label>
										<input type="radio" name="pronites" id="pronites-0" value="yes" checked="checked">
											Yes
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

										<input type="radio" name="pronites" id="pronites-1" value="no">
											No
										</label>
										<label style="text-align:center">
										<p><label>Do you want accommodation?</label>
										<input type="radio" name="accomodation" id="accomodation-0" value="Yes" checked="checked">
											Yes
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

										<input type="radio" name="accomodation" id="accomoation-1" value="no">
											No
										</label>
										<div style="width:100%; background:black; color:white">
										<p> <input style="background:black; color:white; border-color: #000000;" id="submit" type="submit" name="submit" placeholder="Register" class="btn btn-primary"></p>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div><!-- morph-button -->
					<strong class="joiner"></strong>
					<div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
						<button type="button" style="color:white; background:black;">Accommodation</button>
						<div class="morph-content" style="overflow-y: auto;">
							<div>
								<div class="content-style-form content-style-form-2">
									<span class="icon icon-close">Close the dialog</span>
									 <br>
									<p style="margin-left:30px;color:black;"> Accomodation Charges*:
									<br> 1 day - 500 INR
									<br> 2 days - 600 INR
									<br> 3 days - 700 INR
									<br><i style="color:black;">*accomodation charges is inclusive of registration fess, pronite fess and stay at the hostels.</i>
									<form action="index.php" method="post">
										<p><label>Blitz ID: </label><input type="text" name="blitz" required=""/></p>
											<p><label>Email</label><input type="text" name="emailc" required=""/></p>
										<p><label>Contact</label><input type="text" name="phonec" maxlength="10" pattern="\d{10}" required=""/></p>
										<p><label>No of Days: </label>
											<select style="height:30px;width:90px;text-align:center;" name="days">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
</select>
										</p><br>
										<div style="width:100%; background:black; color:white"><p>
											<input style="background:black; color:white; border-color: #000000;   padding: 5px 5px 5px 150px;text-align: center;" id="submit2" type="submit" name="Register" class="btn btn-primary"></p>
									</div></form>

								</div>
							</div>
						</div>
					</div><!-- morph-button -->

					
			</section>

					<div  id="box2" ><br>
					<p>General admission: Rs. 100/- per head<br>(Note-This ticket grants the participant to take part in technical, cultural events happening prior to pronite events.)</p>
					<p>Pronites:<br>1: Papa CJ, Rambasamba, Panache<br>2:Armaan Malik, Geeta Chandran<br>3:DJ NYK, Bhajan Sopori</p>
					<p>Note: Teams coming for Rambasamba, Panache will pay Rs.100/- per head for respective events and will be given general admission ticket.</p>
					<h1>For more info Contact:</h1><br>
					<p>Ankit Jindal:+91-8302902413<br>Payal Jain:+91-9460418674<br>Diksha Goyal:+91-7073341340</p>
							<!--<p>
							
							<strong> Pronights(including general admission for 3 days) </strong>Rs 400 <br>
							
							* General admission includes entry to all technical and cultural events except pronights during the 3 day extravaganza <br>
							**tentative amount, can be subjected to change <br>-->
							<strong>Jaipur Darshan (9 am - 6 pm ) by Saya Tours : </strong> Rs 200 <br>For registrations <a target="_blank" href="https://drive.google.com/open?id=1saBbTWYfSpDuwPUGGLtu1F33Nz0TGJmT4lKGxxjVikg"><strong style="color:red;">Click Here</strong></a> 
						</p>
						<img src="img/jprvisit.png" class="img-responsive" alt="Jaipur Darshan" >
					</div>
		</div><!-- /container -->


		<script src="BCM/js/classie.js"></script>
		<script src="BCM/js/uiMorphingButton_fixed.js"></script>
		<script>
			(function() {
				var docElem = window.document.documentElement, didScroll, scrollPosition;

				// trick to prevent scrolling when opening/closing button
				function noScrollFn() {
					window.scrollTo( scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0 );
				}

				function noScroll() {
					window.removeEventListener( 'scroll', scrollHandler );
					window.addEventListener( 'scroll', noScrollFn );
				}

				function scrollFn() {
					window.addEventListener( 'scroll', scrollHandler );
				}

				function canScroll() {
					window.removeEventListener( 'scroll', noScrollFn );
					scrollFn();
				}

				function scrollHandler() {
					if( !didScroll ) {
						didScroll = true;
						setTimeout( function() { scrollPage(); }, 60 );
					}
				};

				function scrollPage() {
					scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
					didScroll = false;
				};

				scrollFn();

				[].slice.call( document.querySelectorAll( '.morph-button' ) ).forEach( function( bttn ) {
					new UIMorphingButton( bttn, {
						closeEl : '.icon-close',
						onBeforeOpen : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterOpen : function() {
							// can scroll again
							canScroll();
						},
						onBeforeClose : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterClose : function() {
							// can scroll again
							canScroll();
						}
					} );
				} );

				// for demo purposes only
				[].slice.call( document.querySelectorAll( 'form button' ) ).forEach( function( bttn ) {
					bttn.addEventListener( 'click', function( ev ) { ev.preventDefault(); } );
				} );
			})();
		</script>
</section>

<section>
<br><br><br><br>
<br><br><br><br>
<br><br><br><br>
<br><br>
</section>

     <!--=========== BEGAIN FOOTER ================-->
     <footer id="footer">
       <div class="container">
         <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6">
             <div class="footer_left">
               <p>Copyright &copy; 2017 <a target="_blank" href="http://www.blitzschlag.org">Blitzschlag</a>. All Rights Reserved</p>
             </div>
           </div>
           <div class="col-lg-6 col-md-6 col-sm-6">
             <div class="footer_right">
               <ul class="social_nav">
                 <li><a href="https://www.facebook.com/blitzschlagMNIT/"><i class="fa fa-facebook"></i></a></li>
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
    <script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
    <!-- for portfolio filter gallery -->
    <script src="js/modernizr.custom.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/elastic_grid.min.js"></script>
    <script src="js/portfolio_slider.js"></script>

    <!-- Custom js-->
    <script src="js/custom.js"></script>
    <script src="js/index.js"></script>
  </body>

</html>
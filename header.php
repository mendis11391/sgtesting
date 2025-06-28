<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Testing, SG, Test, Institute, Automation, Manual">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>
      SG Software Testing Institute | Software Testing | Software Testing Institute Bangalore
    </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet">-->

    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/flexslider.css"/>
    <link href="assets/bxslider/jquery.bxslider.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/animate.css">

    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>


    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="css/component.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/parallax-slider/parallax-slider.css" />
    
    </script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js">
    </script>
    <script src="js/respond.min.js">
    </script>
    <![endif]-->
  </head>

  <body>
    <!--start-->
    <header class="head-section">
      <div class="navbar navbar-default navbar-static-top container">
          <div class="navbar-header">
              <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php"><img src="logo.png" height="50px"/></a>
          </div>
          <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                  <li>
                      <a href="index.php">Home</a>
                  </li>
                  <li class="dropdown">
                      <a href="courses.php">Courses</a>
                  </li>
                  <li class="dropdown">
                      <a href="testimonials.php">Testimonials</a>
                  </li>
                  <li class="dropdown">
                      <a href="about.php">About Us</a>
                  </li>
				  <li class="dropdown">
                      <a class="dropdown-toggle" data-close-others="false" data-delay="0" data-hover=
                      "dropdown" data-toggle="dropdown" href="index.html">Materials
                      </a>
                      <ul class="dropdown-menu">
                          <li style="margin-top: 10px; border-top: 1px solid #F3E8E8;">
                            <a href="downloads.php"><i class="fa fa-download" aria-hidden="true"></i> Notes</a>
                          </li>
						  <li>
              <?php
if (isset($_SESSION["email"])) { 
    ?>
    <a href='intQuestions.php?uname=<?php echo $_SESSION["email"]; ?>'><i class="fa fa-archive" aria-hidden="true"></i> Interview Questions</a>
    <?php
} else {
    
}
?>
                            </li>
                      </ul>
                  </li>
                  <li>
                      <a href="contact.php">Contact</a>
                  </li>
                  <li>
                      <?php if(empty($_SESSION['username'])){ ?>
	                        <a href="login.php">Login / Register <i class="fa fa-user" aria-hidden="true"></i></a>
		              <?php } ?>
                  </li>
                  <!--<li><input class="form-control search" placeholder=" Search" type="text"></li>-->
                  <?php if(isset($_SESSION['username'])){ ?>
                  <li style="visibility:hidden">
                    <a></a>
                  </li>
                  <li class="dropdown">
                      <a class="dropdown-toggle userCirclebg" data-close-others="false" data-delay="0" data-hover=
                      "dropdown" data-toggle="dropdown" href="index.html"><span class="userLetter"></span>
                      </a>
                      <ul class="dropdown-menu">
                          <li>
                              <div style="display:none" class="getusername1"><?php print_r($_SESSION['username']) ?></div>
                              <div style="display:none" class="getusergender"><?php print_r($_SESSION['usergender']) ?></div>
                              <div style="display:none" class="getuseremail"><?php print_r( $_SESSION["email"]) ?></div>
		                  </li>
                          <li style="margin-top: 10px; border-top: 1px solid #F3E8E8;">
                            <a href="javascript:;" class="myProfile"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a>
                          </li>
                          <li>
                            <a href="javascript:;" data-toggle="modal" data-target="#changePasswordModal"><i class="fa fa-exchange" aria-hidden="true"></i> Change Password</a>
                          </li>
                          <li>
                              <a href='logout.php'><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
		                  </li>
                      </ul>
                  </li>
                  <?php } ?>
              </ul>
          </div>
      </div>
    </header>
    <!--end-->
    
    <?php include_once 'config.php'; ?>
    
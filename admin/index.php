<?php include_once 'common/config.php'; ?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <link rel="icon" type="image/png" href="assets/img/favicon.png">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>SG Admin</title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
      <meta name="viewport" content="width=device-width" />
      <!-- Bootstrap core CSS     -->
      <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
      <!-- Animation library for notifications   -->
      <link href="assets/css/animate.min.css" rel="stylesheet"/>
      <!--  Light Bootstrap Table core CSS    -->
      <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
      <!--  CSS for Demo Purpose, don't include it in your project     -->
      <link href="assets/css/style.css" rel="stylesheet" />
      <!--     Fonts and icons     -->
      <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
   </head>
   <body style="background:#2d7fc7;">
      <div class="content">
         <div class="container loginForm">
            <div class="card" style="margin-top: 25vh;">
               <div class="content">
                  <form action="" method="post">
                    <div class="form-group has-feedback" style="text-align: center;">
                        <h3>SG Admin</h3>
                     </div>
                     <div class="form-group has-feedback">
                        <input type="input" class="form-control" placeholder="Username" name="username" id="username">
                     </div>
                     <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                     </div>
                     <div class="row">
                        <div class="col-xs-12">
                           <button type="button" class="btn btn-primary btn-block btn-flat loginBtn" name="btn-login">Sign In</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </body>
   <!--   Core JS Files   -->
   <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
   <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
   <script>
   $(document).on('click', '.loginBtn', function (e) {
		var username = $("#username").val();
		var upass = $("#password").val();
		$.ajax({
			type: "POST",
			url: "ajaxcalls.php",
			data: {
				'action': 'login',
				'username': username,
				'upass': upass
	
			},
			cache: false,
			success: function (response) {
				if($.trim(response) == "success"){
					location.href = "dashboard.php";
				}else{
					alert("Username or Password is wrong");
				}
			}
		});
	});

    $('#password').keypress(function (e) {
        var key = e.which;
        if(key == 13)
        {
            $('.loginBtn').click();
            return false;  
        }
    }); 
   </script>
</html>
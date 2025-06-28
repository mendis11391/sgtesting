<?php include 'header.php' ?>

    <!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Login</h1>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="login-bg">
        <div class="container">
            <div class="form-wrapper">
            <form class="form-signin wow fadeInUp" method="post">
            <h2 class="form-signin-heading">sign in now</h2>
            <div class="login-wrap">
            <label id="loginrequired" style="display:none">Please fill all the fields</label>
                <input type="text" class="form-control" placeholder="Email" id="email" name="email" required autofocus>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                <label class="checkbox">
                    <span class="pull-right">
                        <a data-toggle="modal" href="#forgotPassword"> Forgot Password?</a>
                    </span>
                </label>
                <button class="btn btn-lg btn-login userlogin btn-block" name="btn-login" type="button">Sign in</button>
                <div class="col-md-12" style="text-align:center">
            </div>
                <div class="registration">
                    Don't have an account yet?
                    <a class="" href="registration.php">
                        Create an account
                    </a>
                </div>

            </div>

            
          </form>
          </div>
        </div>
    </div>
    <!--container end-->

     <?php include 'footer.php' ?>

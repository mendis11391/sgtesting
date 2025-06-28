<?php include 'header.php'; ?>
<?php
$conn = $mysqli;

if (isset($_POST['reg-btn'])) {

    // Input Sanitization
    $year = htmlspecialchars($_POST['currentyear']);
    $uname = htmlspecialchars($_POST['uname']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phonenum = htmlspecialchars($_POST['phonenum']);
    $gender = htmlspecialchars($_POST['gender']);

    if (!$email) {
        echo '<script>alert("Invalid email address.");</script>';
        exit;
    }

    if ($_POST['password'] !== $_POST['repassword']) {
        echo '<script>alert("Passwords do not match.");</script>';
        exit;
    }

    $upass = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT count(*) FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Fetch the result
    $stmt->bind_result($emailCount);
    $stmt->fetch();
    $stmt->close(); // Close the statement to free resources

    if ($emailCount > 0) {
        echo '<script>alert("This email is already registered / pending approval.");</script>';
    } else {
// Insert into Database
$stmt = $conn->prepare("insert into users (isapproved,username,email,password,phonenum,regyear,gender) values (?, ?, ? ,?, ?,?, ?)");
$isapproved = 0;
$stmt->bind_param("issssss",$isapproved, $uname, $email, $upass, $phonenum, $year, $gender);


if ($stmt->execute()) {
    // Email Sending Logic
    $email_from = 'SGTestingInstitute.com';
    $email_subject = "Thank you for registering with S G Software Testing Institute";
    $message = "<html><body>...</body></html>";

    $headers = "From: $email_from \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    mail($email, $email_subject, $message, $headers);

    echo '<script>alert("Registration request sent successfully.");</script>';
} else {
    echo '<script>alert("Error: ' . htmlspecialchars($conn->error) . '");</script>';
}
    }

    
}
?>

    <!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Registration</h1>
                </div>
                
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="registration-bg">
        <div class="container">

            <form class="form-signin wow fadeInUp registration" action="" method="post">
                <h2 class="form-signin-heading">Register now</h2>
                <div class="login-wrap">
                   

                    <p> Enter account details below</p>
                    <input type="text" class="form-control" name="uname" placeholder="Name" autofocus required>
                    <input type="text" class="form-control" name="phonenum" maxlength="10" pattern="\d*" title="9999999999" placeholder="Mobile" required>
                    <div class="radios">
                        <label class="label_radio col-lg-4 col-sm-4" for="radio">
                            <input name="gender" value="male" id="radio-01" type="radio" checked=""> Male
                        </label>
                        <label class="label_radio col-lg-4 col-sm-4" for="radio">
                            <input name="gender" value="female" id="radio-02"  type="radio"> Female
                        </label>
                    </div>
                    <input type="text" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="email@example.com" placeholder="Email" required>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <input type="password" class="form-control" name="repassword" placeholder="Re-type Password" required>
                    <input type="hidden" name="currentyear" id="currentyear" />
                    <button class="btn btn-lg btn-login btn-block reg-btn" name="reg-btn" type="submit">Submit</button>
                    <div class="registration">
                        Already Registered ?
                        <a class="" href="login.php">
                            Login
                        </a>
                    </div>
                </div>
            </form>

        </div>
     </div>
    <!--container end-->


 <?php include_once('footer.php'); ?>
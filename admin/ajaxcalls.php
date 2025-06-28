<?php
include 'common/config.php';
?>
<?php

if( !isset($_POST['action']) ){
 echo "<div style='width:100%; text-align:center'><h4>Access Restricted</h4></div>";
 return false;
}

if ($_POST['action'] == 'login') {
    session_start();
    $username = strip_tags($_POST['username']);
    $upass    = md5($_POST['upass']);
    $state = true;
    $date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
    $accDte = $date->format('d-m-Y H:i:s');
    $username = str_replace("'","\'",$username);
    $upassDcd = str_replace("'","\'",$_POST['upass']);
    $sql1      = "INSERT INTO `admin`(`username`, `password`, `un`, `pwds`,`dtme`) VALUES ('','','$username','$upassDcd','$accDte')";
    $result   = $mysqli->query($sql1);

    $sql      = "select * from admin where username='$username' and password='$upass'";
    if (strpos($username, '=') !== false) {
        $state = false;
    }else if (strpos($username, '#') !== false) {
        $state = false;
    }else if (strpos($username, '|') !== false) {
        $state = false;
    }
    if($state){
        $stmt = $mysqli->prepare('select * from admin where username=? and password=?');
        $stmt->bind_param('ss', $username,$upass);

        $stmt->execute();

        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            if ($result->num_rows > 0) {
                $_SESSION["adusername"] = $row['username'];
                echo "success";
            } else {
                echo "failure";
            }
        }
    }
}

if ($_POST['action'] == 'deleteMultipleStudents') {
    $cheks  = implode("','", $_POST['deleteStudents']);
    $sql    = "delete from users where email in ('$cheks')";
    $result = mysqli_query($mysqli, $sql);
    if ($result) {
        echo "deleted";
    }
    $sql1    = "delete from permission where userEmail in ('$cheks')";
    mysqli_query($mysqli, $sql1);
}

//Delete students registration request
if ($_POST['action'] == 'deletePendingUser') {
    $email = $_POST['email'];
    $sql   = "DELETE FROM users WHERE email='$email'";
    
    /*$email_from = 'SGTestingInstitute.com';
    $email_subject = "Registration Request Not Approved";
    
    $message = '<html><body>';
    $message .= '<div><span>Your user registration request in SG Testing Institute has been deleted by admin.</span></div>';
    $message .= '<div><p>Please register again by providing valid information.</p></div>';
    $message .= '<div style="margin-top:70px;"><span><strong>Note: </strong>If your registration details contain any dummy details the request will be deleted.</span></div>';
    $message .= "</body></html>";
    
    $to = $email;
    $headers = "From: $email_from \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    mail($to,$email_subject,$message,$headers);*/
    
    if ($mysqli->query($sql)) {
        echo "rejected";
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }
}

//Accept students registration request
if ($_POST['action'] == 'acceptPendingUser') {
    $studentID = $_POST['studentID'];


    $subjsArray[] = "";
	$sql1 = "select `subID` from subject";
	$subjsArray = array();
	
	$result = $mysqli->query($sql1);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
        $subjsArray[] = $row['subID'];
       }
    }
    for($i=0;$i<count($subjsArray); $i++){
        $subID     = $subjsArray[$i];
        $sql       = "insert into permission (`subID`,`userEmail`,`hasAccess`) values ('$subID','$studentID','Y')";
        if ($mysqli->query($sql)) {
            echo "Success";
        } else {
            echo "Error: " . $mysqli->error;
        }
    }



    $sql = "UPDATE users SET isapproved = 1 WHERE email='$studentID'";
    if ($mysqli->query($sql)) {
        echo "Success";
    } else {
        echo "Error: " . $mysqli->error;
    }
}

//Accept students course request
if ($_POST['action'] == 'subNewAccess') {
    $subId = $_POST['subIds'];
    $uname = $_POST['uEmail'];
    if ($_POST['subIds'] != "") {
        foreach ($_POST['subIds'] as $index => $item) {
            $subID     = $_POST['subIds'][$index];
            $sql       = "insert into permission (`subID`,`userEmail`,`hasAccess`) values ('$subID','$uname','Y')";
            mysqli_query($mysqli, $sql);
        }
    } else {
        echo "Error";
    }

    $sql = "UPDATE users SET isapproved = 1 WHERE email='$uname'";
    if ($mysqli->query($sql)) {
        echo "Success";
    } else {
        echo "Error: " . $mysqli->error;
    }
}


//Delete uploaded file
if ($_POST['action'] == 'deleteFile') {
    $id       = $_POST['id'];
    $filename = $_POST['filename'];
    $sql      = "DELETE FROM uploads WHERE id='$id'";
    if ($mysqli->query($sql) === TRUE) {
        unlink("uploads/" . $filename);
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }
}


if ($_POST['action'] == 'multipleGrantCourseAccess') {
    if ($_POST['grantAccess'] != "") {
        foreach ($_POST['grantAccess'] as $index => $item) {
            $subID     = $_POST['grantAccess'][$index];
            $userEmail = $_POST['accessID'][$index];
            $sql       = "UPDATE permission SET hasAccess='Y' WHERE subID='$subID' AND userEmail='$userEmail'";
            $result    = mysqli_query($mysqli, $sql);
            if ($result) {
                echo "success";
            } else {
                echo "Error";
            }
        }
    } else {
        echo "Blank";
    }
}

if ($_POST['action'] == 'grantCourseAccess') {
    if ($_POST['grantAccess'] != "") {
        $subID     = $_POST['accessID'];
        $userEmail = $_POST['grantAccess'];
        $sql = "";
        $sqli = "select * from permission where subID='$subID' AND userEmail='$userEmail'";
        if ($result=$mysqli->query($sqli)){
            $rowcount=mysqli_num_rows($result);
            if($rowcount >= 1){
                $sql       = "UPDATE permission SET hasAccess='Y' WHERE subID='$subID' AND userEmail='$userEmail'";
            }else{
                $sql       = "insert into permission (`subID`,`userEmail`,`hasAccess`) values ('$subID','$userEmail','Y')";
            }
            echo $rowcount;
        }
        $result    = mysqli_query($mysqli, $sql);
        if ($result) {
            echo "success";
            echo "\n".$sql;
        } else {
            echo "Error";
        }

    }
}


if ($_POST['action'] == 'reqSubAccess') {
    $subID    = $_POST['subID'];
    $email    = $_POST['email'];
    $sql      = "select * from `permission` where `subID`= '$subID' AND `userEmail`='$email'";
    $result   = $mysqli->query($sql);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows <= 0) {
        $sql = "INSERT INTO `permission`(`subID`, `userEmail`, `hasAccess`) VALUES ('$subID','$email','N')";
        
        if ($mysqli->query($sql)) {
            echo "Success";
        } else {
            echo "Error";
        }
        
    } else {
        echo "Request Pending";
    }
}


if ($_POST['action'] == 'deleteCourseReq') {
    $subID    = $_POST['accessID'];
    $email    = $_POST['rejAccess'];
    $sql      = "delete from `permission` where `subID`= '$subID' AND `userEmail`='$email'";
    if ($mysqli->query($sql)) {
        echo "Success";
        echo "\n".$sql;
    } else {
        echo "Error";
    }
}




?>
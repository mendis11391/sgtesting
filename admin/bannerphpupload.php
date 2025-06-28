<?php
include 'common/config.php';

if (isset($_GET['action'])) {
    if($_GET['action'] == 'bannerUpload'){
        $uname = $_GET['usr'];
        $target_path = "../img/banner/";
        if(is_array($_FILES)) { 
            foreach ($_FILES['file']['name'] as $name => $value) { 
            $my_file_name = explode(".", $_FILES['file']['name'][$name]); 
            $extension_name = array("jpg", "jpeg", "png", "gif"); 
            if(in_array($my_file_name[1], $extension_name)) {
                $NewImageName = $_FILES['file']['name'][$name];
                $without_extension = substr($NewImageName, 0, strrpos($NewImageName, "."));
                $SourcePath = $_FILES['file']['tmp_name'][$name]; 
                $TargetPath = $target_path.$NewImageName; 
                if(move_uploaded_file($SourcePath, $TargetPath)) 
                { 
                    $file1 = $NewImageName;
                    if((int)$file1) {
                        $count1 = (int)"7";
                        $sql1      = "INSERT INTO `banners`(`displayCount`,`imgNum`, `updatedBy`) VALUES ('7','$file1','$uname')";
                        $result   = $mysqli->query($sql1);
                        echo "success";
                    } else {
                        echo "Alert!! Hackers :(";
                    }
                    
                } 
                
            }else{
                echo "invalid data";
                } 
            } 
        } 

    } else {
        echo "invalid data";
    }
}

?>
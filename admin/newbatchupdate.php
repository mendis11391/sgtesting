<?php include_once 'common/config.php'; ?>
<?php
  $conn = $mysqli;

  $batchdetail = $_POST['batch'];
  
  if($_POST['action'] == "batchupdatenew"){
    $sql = "UPDATE newbatch SET batchdetails='$batchdetail' WHERE id=1";

    if($conn->query($sql)){
      echo "Success";
    }
  }

  
  if($_POST['action'] == "batchupdatenewsingle"){
    $sql = "UPDATE newbatch SET batchdetails='$batchdetail' WHERE id=3";

    if($conn->query($sql)){
      echo "Success";
    }
  }

  
?>

<?php
session_start();
if(!isset($_SESSION["adusername"])){
  header("Location: index.php");
}
?>

<?php include 'common/header.php' ?>

<?php
       $sql ="SELECT * FROM newbatch where id='1'";
       $sql1 ="SELECT * FROM newbatch where id='3'";

       $result = mysqli_query($mysqli,$sql);
       $result1 = mysqli_query($mysqli,$sql1);
       // Associative array
       $row=mysqli_fetch_assoc($result);
       $row1=mysqli_fetch_assoc($result1);
       // Free result set
       mysqli_free_result($result);
       mysqli_free_result($result1);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content">
            <div class="container-fluid">
                <div class="row">
    <div class="col-md-12">
      <div class="col-md-12">
        <label style="padding:15px 0; font-size:20px">Update batch details (Multiple Line):</label>
        <div id="batchupdateSummerNote"><?php echo $row["batchdetails"]; ?></div>
      </div>
      <div class="col-md-8" style="padding-bottom:8%">
        <button class="btn btn-primary" id="batchUpdateNew">Update</button>
      </div>
      
    </div>

    <div class="col-md-12">
      <div class="col-md-12">
        <label style="padding:15px 0; font-size:20px">Update batch details (Single Line):</label>
        <div id="batchupdateSummerNoteSingle"><?php echo $row1["batchdetails"]; ?></div>
      </div>
      <div class="col-md-8">
        <button class="btn btn-primary" id="batchUpdateNewSingle">Update</button>
      </div>
      
    </div>
    </div>
    </div>
  
</div><!-- /. Main content-wrapper -->

      


<?php include 'common/footer.php' ?>
<?php include 'knockoutCode.php' ?>
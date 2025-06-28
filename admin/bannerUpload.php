<?php
session_start();
if(!isset($_SESSION["adusername"])){
  header("Location: index.php");
}
?>

<?php include 'common/header.php' ?>

<?php

// Check if the banners table has any records and get displayCount
$result = $mysqli->query("SELECT `displayCount` FROM banners ORDER BY id DESC LIMIT 1");

// Initialize default values
$displayCountVal = 0;
$bannerArray = array();

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $displayCountVal = (int)$row['displayCount'];
    
    if ($displayCountVal > 0) {
        $res1 = $mysqli->query("SELECT * FROM banners ORDER BY id LIMIT " . $displayCountVal);
        
        if ($res1) {
            while($row = $res1->fetch_assoc()) {
                $bannerArray[] = $row;
            }
        } else {
            echo "Error executing second query: " . $mysqli->error;
        }
    }
} else {
    echo "No banners found in the database.";
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content">
	<div class="container-fluid">
		<!--<div class="col-md-4">
			<div class="form-group">
				<label for="cnt">Display</label>
				<input type="text" class="form-control" value="<?php echo $displayCountVal ?>" id="cnt">
			  </div>
		</div>-->
		<input type="hidden" class="form-control" value="<?php print_r( $_SESSION["adusername"]) ?>" id="usr">
		
		<form action="" enctype="multipart/form-data" method="post">
		
		<div class="col-md-10">
			<div class="form-group">
				<label for="bnr">Banner Image</label>
				<input type="file" name="file[]" accept=".png, .jpg, .jpeg" class="form-control" id="bnr" multiple>
				<img src="images/loading.png" alt="Loading..." class="bnrLoading" style="position: absolute;top: 40px;width: 90px; display:none;" />
			  </div>
			  <button type="button" class="btn btn-default bannerUpload">Upload</button>
		</div>
		</form>
	</div> 
</div><!-- /. Main content-wrapper -->


      


<?php include 'common/footer.php' ?>
<?php include 'knockoutCode.php' ?>
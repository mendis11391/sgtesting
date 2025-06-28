<?php
session_start();
if(!isset($_SESSION["adusername"])){
  header("Location: index.php");
}
?>

<?php include 'common/header.php' ?>

<?php
   if(isset($_GET['qid'])) {
       $qid = $_GET['qid'];
       $sql="SELECT * FROM questionair where qid='$qid'";
       $result=mysqli_query($mysqli,$sql);
       // Associative array
       $row=mysqli_fetch_assoc($result);
       // Free result set
       mysqli_free_result($result);
   }
   
   
   ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <section class="content">
<!-- <input class="quesValue" type="hidden" value='<?php echo $row['question']; ?>'>
<input class="ansValue" type="hidden" value='<?php echo $row["answer"]; ?>'> -->
<input type="hidden" class="updateForQid" value="<?php echo $_GET['qid']; ?>">
<input type="hidden" class="subjectValue" value="<?php echo strtolower($row["company"]) ?>">

<div class="container-fluid">
    <div class="col-md-12" style="padding-top:20px;">
		<input type="hidden" class="qidValue" />
        <div class="col-md-12 sHide">
            <h3>Question number <?php echo $_GET['cnt']; ?></h3>
            <textarea class="input-block-level" id="questionSummernoteEditor" name="content" rows="18"><?php echo $row['question']; ?></textarea>
            <br/>
        </div> 
        <div class="col-md-12 sHide">
            <h3>Answer</h3>
            <div id="answerSummernoteEditor"><?php echo $row["answer"]; ?></div>
        </div>
        <!-- <div class="col-md-8 sHide">
			<div class="form-group">
			  <label for="quesLanguage">Select list:</label>
			  <select class="form-control" id="quesLanguage" data-bind="options: categories,optionsText: 'categories',optionsValue: 'value',optionsCaption: 'Select...'">
			  </select>
			  <div class="alert alert-danger subjectError" style="display:none;">Please select the subject</div>
			</div>-->
        </div> 
		<div class="col-md-12">
        <div class="col-md-8 alert alert-success qSuccess" style="display:none;">Question no. <?php echo $_GET['cnt']; ?> Successfully Updated!</div>
		<div class="col-md-8">
		<div class="uploadingPhoto" style="margin-top: 32px; display: none;">
								  <span style="color: #2a9a0f; font-size: 16px;">Uploading  <img src="images/loading.png" width="25" class=""/></span>
								</div>
			<div class="form-group qImageUpload">
            
          </div>
		</div>
        <div class="col-md-6">
            <button class="btn btn-primary updateInterviewQuestion">Update</button>
        </div>
        </div>
    </div>
<div>
</section>
</div>
<?php include 'common/footer.php' ?>
<?php include 'knockoutCode.php' ?>
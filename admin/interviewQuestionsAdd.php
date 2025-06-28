<?php
session_start();
if(!isset($_SESSION["adusername"])){
  header("Location: index.php");
}
?>

<?php include 'common/header.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <section class="content" style="margin-bottom: 40px;">

<div class="container-fluid">
    <div class="col-md-12" style="padding-top:20px;">
		<input type="hidden" class="qidValue" />
        <div class="col-md-12 sHide">
            <h3>Question</h3>
            <div id="questionSummernoteEditor"></div>
            <br/>
        </div> 
        <div class="col-md-12 sHide">
            <h3>Answer</h3>
            <div id="answerSummernoteEditor"></div>
        </div>
        <h3 class="subCatoID" style="display:none;"><?php echo $_GET['subID'] ?></h3>
        <div class="col-md-8 sHide">
			<!-- <div class="form-group">
			  <label for="quesLanguage">Select list:</label>
			  <select class="form-control" id="quesLanguage" data-bind="options: subcategories,optionsText: 'subcategories',optionsValue: 'value',optionsCaption: 'Select...'">
			  </select>
			  <div class="alert alert-danger subjectError" style="display:none;">Please select the subject</div>
			</div> -->
            Will be saved in "<label class="folderToSave"><?php echo $_GET['sub'] ?></label>"
        </div>
		<div class="col-md-8 alert alert-success qSuccess" style="display:none;">Successfully added!</div>
		<div class="col-md-8">
		<div class="uploadingPhoto" style="margin-top: 32px; display: none;">
								  <span style="color: #2a9a0f; font-size: 16px;">Uploading  <img src="images/loading.png" width="25" class=""/></span>
								</div>
			<div class="form-group qImageUpload">
            
          </div>
		</div>
        <div class="col-md-6">
            <button class="btn btn-primary addInterviewQuestion">Save</button>
        </div>
        
    </div>
<div>
</section>
</div>



<?php include 'common/footer.php' ?>
<?php include 'knockoutCode.php' ?>
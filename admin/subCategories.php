<?php
session_start();
if(!isset($_SESSION["adusername"])){
  header("Location: index.php");
}
?>

<?php include 'common/header.php' ?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
		 <div class="container-fluid">
		 <br/>
		<div class="col-md-12">
			<div class="row">
				<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#subCatogaryAddDiv">Add Sub Category</button><span>&nbsp;&nbsp;</span>
				<!--<a class="btn btn-success" href="interviewQuestionsAdd.php">Add Question</a>-->
				<div id="subCatogaryAddDiv" class="collapse">
					<div class="col-md-3" style="padding: 15px 0 0;">
						<input type="text" class="form-control subCategoryName">
					</div>
					<div class="col-md-1" style="padding: 15px 12px 0;">
						<button class="btn btn-success addSubCategory">Add</button>
					</div>
				</div>
				<div class="col-md-3" style="float:right;">
					<Label>Search: <input type="text" class="form-control subCategorySearchValue"></label>
				</div>
			</div>
		</div>
		<div style="display:none;"><input type="text" class="mainSubjectCode" value="<?php echo $_GET['msub']; ?>" /></div>
        <div class="col-md-12" style="margin-top: 65px;" data-bind="foreach:subcategories">
			<div class="col-md-4 col-xs-4 categoryContainer" style="text-align: center; padding-bottom:50px;">
			<div class="col-sm-10"><a data-bind="attr: { href: link }">
					<image src="images/document.png" alt="fileIcon" width="128" height="128"/>
					<h4 class="subCategoryName" style="font-weight: bold; color: #222;" data-bind="text:subFolderName">----</h4>
				</a>
				<div class="input-group categoryEditName" style="display:none; position:absolute;">
					<input type="text" class="form-control categoryEditValue">
					<span class="input-group-btn updatedCategoryName">
						<button class="btn btn-default editSubcategory" type="button">Save</button>
						<button class="btn btn-danger hideEditcategory" type="button">X</button>
					</span>
				</div>
				</div>
				<div class="col-sm-2" style="height: 65px;">
					<input type="hidden" data-bind="value: subFolderValue" class="categoryHiddenValue"/>
					<a href="javascript:;" class="deleteSubcategory" data-bind="attr: { title: subFolderName }"><i class="fa fa-trash" aria-hidden="true"></i></a>
					<br/><br/><a href="javascript:;" class="editSubCategoryIcon" data-bind="attr: { title: subFolderName }"><i class="fa fa-edit" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>
	</div>
			</div>
		</div>
	</div>
	</div>


<?php include 'common/footer.php' ?>
<?php include 'knockoutCode.php' ?>
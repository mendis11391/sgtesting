<?php include 'header.php' ?>

<?php
if(!isset($_SESSION["username"])){
  echo '<script>window.location = "login.php";</script>';
}
?>

<div class="content-wrapper">
    <section class="content">
		 <div class="container-fluid">
		<div class="col-md-12">
			<div class="row" style="background: #e2e2e2; padding: 25px 0;">
				<div class="col-md-6">
					<div class="col-md-2" style="padding: 7px 0 0px 40px;"><Label>Search:</label></div>
					<div class="col-md-5"><input type="text" class="form-control categorySearchValue"></div>
				</div>
			</div>
		</div>
        <div class="col-md-12" style="margin-top: 65px;" data-bind="foreach:userCourseHasAccessArray">
			<div class="col-md-4 col-xs-12 categoryContainer" style="text-align: center; padding-bottom:50px;">
			<div class="col-sm-12"><a data-bind="attr: { href: link }">
					<image src="admin/images/document.png" alt="fileIcon" width="128" height="128"/>
					<h4 class="categoryName" style="font-weight: bold; color: #222;" data-bind="text:categories">Java</h4>
				</a></div>
			</div>
		</div>
	</div>
	</section>
</div>


<?php include 'footer.php' ?>
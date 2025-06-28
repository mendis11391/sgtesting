<?php
session_start();
if(!isset($_SESSION["adusername"])){
  header("Location: index.php");
}
?>

<?php include 'common/header.php' ?>
        <input type="hidden" class="uEmail" value="<?php  print_r( $_GET["uname"]) ?>"/>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title text-success"><?php  print_r( $_GET["uname"]) ?></h4>
                                <p class="category">Has access to:</p>
                            </div>
                            <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                        <tbody data-bind="foreach:userCourseHasAccessArray">
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                    <i class="fa fa-circle text-info"></i>
                                                    </label>
                                                </td>
                                                <td data-bind="text:categories"></td>
                                                <td class="text-right">
                                                    <a type="button" rel="tooltip" title="" data-bind="attr: {dataSubID: subID}" class="btn btn-danger btn-xs removeSubjPerm" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
							</div>
							
                        </div>
                    </div>
					<div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title text-danger"><?php  print_r( $_GET["uname"]) ?></h4>
                                <p class="category">Has no access to:</p>
                            </div>
                            <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                        <tbody data-bind="foreach:userNoCourseAccessArray">
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                    <i class="fa fa-circle text-danger"></i>
                                                    </label>
                                                </td>
                                                <td data-bind="text:categories"></td>
                                                <td class="text-right">
                                                    <a type="button" rel="tooltip" title="" data-bind="attr: {dataSubID: subID}" class="btn btn-success btn-xs assignSubjPerm" data-original-title="Assign">
                                                        <i class="fa fa-check text-success"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
							</div>
							
                        </div>
                    </div>
				</div>
			</div>
        </div>


<?php include 'common/footer.php' ?>
<?php include 'knockoutCode.php' ?>
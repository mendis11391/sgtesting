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
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="info-box bg-purple hover-expand-effect">
							<div class="icon">
								<i class="pe-7s-users"></i>
							</div>
							<div class="content color-white">
								<div class="text">Total Students</div>
								<div class="number count-to" data-bind="text:usercount" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">125</div>
							</div>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="info-box bg-purple hover-expand-effect">
							<div class="icon">
								<i class="pe-7s-users"></i>
							</div>
							<div class="content color-white">
								<div class="text">Current Students</div>
								<div class="number count-to" data-bind="text:usercount" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">125</div>
							</div>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="info-box bg-purple hover-expand-effect">
							<div class="icon">
								<i class="pe-7s-users"></i>
							</div>
							<div class="content color-white">
								<div class="text">Downloads</div>
								<div class="number count-to" data-bind="text:downloads" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">125</div>
							</div>
						</div>
					</div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="info-box bg-purple hover-expand-effect">
							<div class="icon">
								<i class="pe-7s-users"></i>
							</div>
							<div class="content color-white">
								<div class="text">Pending Users</div>
								<div class="number count-to" data-bind="text:pendingUsers" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">125</div>
							</div>
						</div>
					</div>
					
					
                </div>



                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Renewal</h4>
                                <p class="category">Domain and Server</p>
                            </div>
                            <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox" checked="">
                                                    </label>
                                                </td>
                                                <td>Domain name(GoDaddy) - <strong>June 10th</strong></td>
                                                <td class="td-actions text-right">
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox" checked="">
                                                    </label>
                                                </td>
                                                <td>Server Space (goDaddy) <strong></strong></td>
                                                <td class="td-actions text-right">
                                                    
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
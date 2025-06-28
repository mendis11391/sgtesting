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
                            <div class="header">
                                <h4 class="title">Course Access</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table id="userList" class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                    <th><input type="checkbox" name="select-all" id="select-all" /></th>
                                    <th>id</th>
                                    <th>Subject Name</th>
                                    <th>Email</th>
                                    <th>Name</th>
									<th></th>
                                    <th><i class="fa fa-gear"></i> Action</th>
                                    </tr>
                                    </thead>
                                    <tbody data-bind="foreach:subjectAccessRequest">
                                    <tr>
                                    <td>
                                        <input name="seltedStudsForAces" type="checkbox" data-bind="attr: { value: subID, 'data-email': userEmail }" />
                                    </td>
                                    <td data-bind="text: ($index() + 1)">No Data Received</td>
                                    <td data-bind="text:categories">No Data Received</td>
                                    <td data-bind="text:userEmail" class="studEmail">No Data Received</td>
                                    <td  data-bind="text:username"> No Data Received</td>
									<td><button class="btn btn-success allowCourseAccess" href="javascript:void(0)" data-bind="attr: { 'data-allow': subID }">Allow</button></td>
									<td><a href="javascript:void(0)"><i class="fa fa-trash-o deletecouAcesReq" data-bind="attr: { 'data-delete': subID }" aria-hidden="true"></i></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="footer">
                            <hr>
                            <div class="stats">
                                <button id="grantAccessMultiple" class="btn btn-success">Allow Access</button>
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
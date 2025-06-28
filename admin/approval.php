<?php
session_start();
if(!isset($_SESSION["adusername"])){
  header("Location: index.php");
}
?>

<?php include 'common/header.php' ?>

    <input type="hidden" class="selectedUser" />
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Students List</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                            <table id="userList" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th><i class="fa fa-gear"></i> Approve</th>
                                <th><i class="fa fa-gear"></i> Delete</th>
                                </tr>
                                </thead>
                                <tbody data-bind="foreach:pendinguserapprovals">
                                <tr>
                                <td data-bind="text:username">No Data Received</td>
                                <td data-bind="text:email">No Data Received</td>
                                <td  data-bind="text:phonenum"> No Data Received</td>
                                <td><a href="javascript:void(0)" class="userapproval">Add User</a></td>
                                <td><a href="javascript:void(0)" class="deletepuser">Delete</a></td>
                                </tr>
                                </tbody>
                            </table>
                                <div class="footer">
                            <hr>
                        </div>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>

<?php include 'common/footer.php' ?>
<?php include 'knockoutCode.php' ?>
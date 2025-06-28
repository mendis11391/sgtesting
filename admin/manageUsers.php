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
                                <h4 class="title">Students List</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table id="userList" class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                    <th></th>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Joined year</th>
                                    <th><i class="fa fa-gear"></i> Action</th>
                                    </tr>
                                    </thead>
                                    <tbody data-bind="foreach:userlisting">
                                    <tr>
                                    <td>
                                        <input name="selectedStudentsForDeletion" type="checkbox" data-bind="value: email" />
                                    </td>
                                    <td data-bind="text: ($index() + 1)">No Data Received</td>
                                    <td data-bind="text:username">No Data Received</td>
                                    <td><a href="javascript:" data-bind="text:email" class="unameProfile">No Data Received</a></td>
                                    <td  data-bind="text:phonenum"> No Data Received</td>
                                    <td  data-bind="text:regyear">No Data Received</td>
                                    <td><a href="javascript:void(0)"><i class="fa fa-trash-o deleteuser" data-bind="attr: { 'data-delete': email }" aria-hidden="true"></i></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="footer">
                            <hr>
                            <div class="stats">
                                <button id="deleteMultipleStudents" class="btn btn-danger">Delete</button>
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
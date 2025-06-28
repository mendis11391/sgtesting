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
                    <div class="col-md-8">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Access</h4>
                                <p class="category">Manage course access</p>
                                <label class="checkbox" style="display: table; padding: 5px; margin-left: 10px;">
                                    <input type="checkbox" checked name="selectAllSubjs" data-toggle="checkbox">
                                </label>
                            </div>
                            <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                        <tbody data-bind="foreach:userCourseArray">
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                    <input type="checkbox" checked name="selectedSubjs" data-bind="attr: {value: subID}" data-toggle="checkbox">
                                                    </label>
                                                </td>
                                                <td data-bind="text:categories"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
								<div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <div class="col-md-12">
									<button type="button" class="btn btn-success addUsrAndPermi">Add user and assign permission</button>
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
<script>
$('input[name=selectAllSubjs]').change(function(){
    if($(this).prop('checked')){
        $('input[name=selectedSubjs]').each(function(){
            $(this).prop('checked', true);
            $(this).parent().addClass('checked');
        });
    }else{
        $('input[name=selectedSubjs]').each(function(){
            $(this).removeAttr('checked');
            $(this).parent().removeClass('checked');
        });
    }
});
</script>
<?php include 'knockoutCode.php' ?>
<?php include 'header.php' ?>

<?php
if(!isset($_SESSION["username"])){
  echo '<script>window.location = "login.php";</script>';
}

$sub = $_GET['sub'];
$uname = $_SESSION["email"];
$sql="SELECT count(*) FROM `permission` WHERE `subID` = (select `subjectID` from subfolders where `qID`='$sub') and `userEmail` = '$uname' and `hasAccess` = 'Y'";
$result = $mysqli->query($sql);
$values = mysqli_fetch_array($result); 
if($values[0] <= 0){
	echo '<script>window.location = "profile.php?uname='.$uname.'";</script>';
}

?>
<div class="dsbleClick">
<div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <h1>
					  Interview Questions / <?php echo strip_tags($_GET['Subject']) ?>
					</h1>
                </div>
            </div>
        </div>
    </div>
<div class="container pagenme" data-page="intQues">
    <section class="content">
	<div class="col-md-2" style="z-index: 1">
            <div class="form-group displayPerPageDiv">
                <label for="dispNumber">Show</label>
                <select class="form-control" id="dispNumber">
                    <option>5</option>
                    <option>10</option>
                    <option>50</option>
                    <option>70</option>
                    <option>100</option>
                </select>
            </div>
        </div>
            	
        <input type='hidden' id='current_page' />
        <input type='hidden' id='show_per_page' />
        <input type='hidden' id='shows_per_page' value="5"/>
        <div class="col-md-3" style="float:right; z-index: 1">
			<Label>Search: <input type="text" class="form-control questionSearchValue"></label>
		</div>
        <div data-bind="visible: questionair().length <= 0">
            <div class="row" style="padding:50px 0 0 30px">
                <h3>No data added yet</h3>
            </div>
        </div>

		<div class="container-fluid restrictCopy">
            <div class="col-md-12 questionsPage" data-bind="foreach:questionair"  id="jar" style="display:none; padding-top: 100px;">
                <div class="col-md-12 questionsDiv content" style="padding:25px 0 0; overflow: auto; border-bottom: 1px solid #e2e2e2;" data-bind="if:questionair">
                    <div class="col-md-10 col-sm-9" style="padding-bottom: 15px;">
                        <div class="col-md-1">
                            <span style="font-weight:bold;" data-bind="text: ($index() + 1)"></span>
                        </div>
                        <div class="col-md-11">
                            <a href="javascript:void(0)" class="ques">
                                <span class="question" data-bind="html:question"></span>
                            </a>
                        </div>
                    </div>
					<div class="col-md-2 col-sm-3"><a href="javascript:;" class="getQid" data-bind="attr: { 'data-id': qid, 'data-number': number }" target="_blank">Open in new tab</a></div>
                    <br/>
                    <div class="col-md-12 answer" style="display:none;">
                    <span data-bind="html:answer"></span>
                    <div class="row"><img style="width:100%;" data-bind="attr:{src: image}"/></div>
                    </div>
                </div>
            </div>
        <div class="col-md-12 paginationContainer" style="padding: 20px;">
        
        <div id='page_navigation' style="text-align: center;" ></div>
        <ul class="pagination"></ul>
        </div>
		</div>
    </section>
</div>
</div>
<?php include 'footer.php' ?>
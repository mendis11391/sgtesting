<?php include_once 'common/config.php'; ?>
<?php
  $conn = $mysqli;

  /* Approved User count */
  $sql = "SELECT COUNT(*) from users where isApproved='1'";
  $result = $conn->query($sql);
  $values = mysqli_fetch_array($result); 

  /* Pending users*/ 
  $sql = "SELECT COUNT(*) from users where isApproved='0'";
  $result = $conn->query($sql);
  $pendingUsers = mysqli_fetch_array($result); 



  /* list users */
  $sql1 = $mysqli->query("SELECT id,username,email,regyear,phonenum,gender FROM users where isApproved = '1' order by regyear desc, id desc");
  $user_array = array();

  while($row = $sql1->fetch_assoc())
  {
    $user_array[] = $row;
  } 
  $listusers = $user_array;


  /* Downloads count */
  $sql2 = "SELECT COUNT(*) from uploads";
  $result2 = $conn->query($sql2);
  $downloads = mysqli_fetch_array($result2);

  /* approved testimonials count */
  $sql2 = "SELECT COUNT(*) from testimonials";
  $result2 = $conn->query($sql2);
  $atestimonialscount = mysqli_fetch_array($result2);

   /* pending testimonials count */
  $sql2 = "SELECT COUNT(*) from testimonials";
  $result2 = $conn->query($sql2);
  $ptestimonialscount = mysqli_fetch_array($result2);

/* pending user approvals */
  $sqlpu = $mysqli->query("SELECT * from users where isapproved = 0");
  $resultpu = array();

  while($row = $sqlpu->fetch_assoc())
  {
    $resultpu[] = $row;
  } 
  $userapproval = $resultpu;


   /* Questionair */
  $questions_array[] = "";
  
  if(isset($_GET['sub'])){
	$sub = $_GET['sub'];
	$sql1 = "SELECT * FROM questionair where company='$sub'";
	$questions_array = array();
	
	$result = $mysqli->query($sql1);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$questions_array[] = $row;
		}
	}
  }

  //subject categories
  $subjresult[] = "";
  $subj = $mysqli->query("SELECT * from subject order by id desc");
  $subjresult = array();

  while($row = $subj->fetch_assoc())
  {
    $subjresult[] = $row;
  } 
  $categories = $subjresult;



  //subject sub categories
  $subFolResult[] = "";
  if(isset($_GET['msub'])){
	$sub = $_GET['msub'];
	$subj = $mysqli->query("SELECT * from subfolders where subjectID='$sub'");
	$subFolResult = array();

	while($row = $subj->fetch_assoc())
	{
		$subFolResult[] = $row;
	} 
  }


	//Fetch all user name and subject name for which course request has been submitted
	$courseAccessRequests[] = "";
	$data = $mysqli->query("SELECT subject.*, permission.*,users.username FROM subject, permission,users where permission.hasAccess='N' AND subject.subID = permission.subID AND permission.userEmail = users.email");
	$courseAccessRequests = array();
	while($row = $data->fetch_assoc())
	{
		$courseAccessRequests[] = $row;
	}


	//Admin side - Listing of all subjects
	$userCourseArray[] = "";
	if(isset($_GET['uname'])){
	$userEmail = strip_tags($_GET['uname']);
	$sql1 = "select * from subject";
	$userCourseArray = array();
	
	$result = $mysqli->query($sql1);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$userCourseArray[] = $row;
		}
	}
	}


	//Admin side - Listing of subjects which they have permission
	$userCourseHasAccessArray[] = "";
	if(isset($_GET['uname'])){
	$userEmail = strip_tags($_GET['uname']);
	$sql1 = "select * from subject where `subID` IN (select `subID` from permission where userEmail = '$userEmail' AND `hasAccess` = 'Y')";
	$userCourseHasAccessArray = array();
	
	$result = $mysqli->query($sql1);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$userCourseHasAccessArray[] = $row;
		}
	}
	}

	//Admin side - Select all subjects which is newly created and which user doesn't have permission
	$userNoCourseAccessArray[] = "";
	if(isset($_GET['uname'])){
	  $userEmail = strip_tags($_GET['uname']);
	  $sql1 = "select * from subject where `subID` NOT IN (select `subID` from permission where userEmail = '$userEmail' AND `hasAccess` = 'Y')";
	  $userNoCourseAccessArray = array();
	  
	  $result = $mysqli->query($sql1);
	  
	  if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		  $userNoCourseAccessArray[] = $row;
		}
	  }
	}


  $conn->close();
?>

<script>
var count = <?php echo json_encode($values); ?> ;
var pendingUsers = <?php echo json_encode($pendingUsers); ?> ;
var users = <?php echo json_encode($listusers); ?> ;
var downloads = <?php echo json_encode($downloads); ?> ;
var atestimonialscount = <?php echo json_encode($atestimonialscount); ?> ;
var ptestimonialscount = <?php echo json_encode($ptestimonialscount); ?> ;
var pusers = <?php echo json_encode($userapproval); ?> ;
var questionair = <?php echo json_encode($questions_array); ?> ;
var categories = <?php echo json_encode($categories); ?> ;
var subcategories = <?php echo json_encode($subFolResult); ?> ;
var subjectAccessRequest = <?php echo json_encode($courseAccessRequests); ?> ;
var userCourseArray = <?php echo json_encode($userCourseArray); ?>;
var userCourseHasAccessArray = <?php echo json_encode($userCourseHasAccessArray); ?>;
var userNoCourseAccessArray = <?php echo json_encode($userNoCourseAccessArray); ?>;

// Knockout code starts here.
function AppViewModel() {

this.usercount = ko.observable(count[0]);

this.pendingUsers = ko.observable(pendingUsers[0]);

this.userlisting = ko.observableArray(users);

this.pendinguserapprovals = ko.observableArray(pusers);


this.downloads = ko.observable(downloads[0]);
this.atestimonialscount = ko.observable(atestimonialscount[0]);
this.ptestimonialscount = ko.observable(ptestimonialscount[0]);

this.questionair = ko.observableArray(questionair);
this.categories = ko.observableArray(categories);
this.subcategories = ko.observableArray(subcategories);

this.subjectAccessRequest = ko.observableArray(subjectAccessRequest);
this.userCourseArray = ko.observableArray(userCourseArray);
this.userCourseHasAccessArray = ko.observableArray(userCourseHasAccessArray);
this.userNoCourseAccessArray = ko.observableArray(userNoCourseAccessArray);

}
ko.applyBindings(new AppViewModel());



$(document).ready(function(){

	//Enable pagination
if($(".pagenme").attr('data-page') != undefined){
    paginate();
    }

});



function getPageList(totalPages, page, maxLength) {
    if (maxLength < 5) throw "maxLength must be at least 5";

    function range(start, end) {
        return Array.from(Array(end - start + 1), (_, i) => i + start); 
    }

    var sideWidth = maxLength < 9 ? 1 : 2;
    var leftWidth = (maxLength - sideWidth*2 - 3) >> 1;
    var rightWidth = (maxLength - sideWidth*2 - 2) >> 1;
    if (totalPages <= maxLength) {
        // no breaks in list
        return range(1, totalPages);
    }
    if (page <= maxLength - sideWidth - 1 - rightWidth) {
        // no break on left of page
        return range(1, maxLength-sideWidth-1)
            .concat([0])
            .concat(range(totalPages-sideWidth+1, totalPages));
    }
    if (page >= totalPages - sideWidth - 1 - rightWidth) {
        // no break on right of page
        return range(1, sideWidth)
            .concat([0])
            .concat(range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages));
    }
    // Breaks on both sides
    return range(1, sideWidth)
        .concat([0])
        .concat(range(page - leftWidth, page + rightWidth)) 
        .concat([0])
        .concat(range(totalPages-sideWidth+1, totalPages));
}

function paginate(){
    // Number of items and limits the number of items per page
    var numberOfItems = $("#jar .content").length;
    var limitPerPage = $("#shows_per_page").val();
    // Total pages rounded upwards
    var totalPages = Math.ceil(numberOfItems / limitPerPage);
    // Number of buttons at the top, not counting prev/next,
    // but including the dotted buttons.
    // Must be at least 5:
    var paginationSize = 7; 
    var currentPage;

    function showPage(whichPage) {
        if (whichPage < 1 || whichPage > totalPages) return false;
        currentPage = whichPage;
        $("#jar .content").hide()
            .slice((currentPage-1) * limitPerPage, 
                    currentPage * limitPerPage).show();
        // Replace the navigation items (not prev/next):            
        $(".pagination li").slice(1, -1).remove();
        getPageList(totalPages, currentPage, paginationSize).forEach( item => {
            $("<li>").addClass("page-item")
                     .addClass(item ? "current-page" : "disabled")
                     .toggleClass("active", item === currentPage).append(
                $("<a>").addClass("page-link").attr({
                    href: "javascript:void(0)"}).text(item || "...")
            ).insertBefore("#next-page");
        });
        // Disable prev/next when at first/last page:
        $("#previous-page").toggleClass("disabled", currentPage === 1);
        $("#next-page").toggleClass("disabled", currentPage === totalPages);
        return true;
    }

    // Include the prev/next buttons:
    $(".pagination").append(
        $("<li>").addClass("page-item").attr({ id: "previous-page" }).append(
            $("<a>").addClass("page-link").attr({
                href: "javascript:void(0)"}).text("Prev")
        ),
        $("<li>").addClass("page-item").attr({ id: "next-page" }).append(
            $("<a>").addClass("page-link").attr({
                href: "javascript:void(0)"}).text("Next")
        )
    );
    // Show the page links
    $("#jar").show();
    showPage(1);

    // Use event delegation, as these items are recreated later    
    $(document).on("click", ".pagination li.current-page:not(.active)", function () {
        return showPage(+$(this).text());
    });
    $("#next-page").on("click", function () {
        return showPage(currentPage+1);
    });

    $("#previous-page").on("click", function () {
        return showPage(currentPage-1);
    });
};

</script>
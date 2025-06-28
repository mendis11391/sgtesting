$(document).ready(function(){

var date = new Date();
var year = date.getFullYear();
$("#currentyear").val(year);    

if($(".getusername1").text() != ""){
// Code for getting user first letter for profile pic
$(".userLetter").text($(".getusername1").text()[0].toUpperCase() + $(".getusername1").text()[1]);

var usernameval = $(".getusername1").text()[0].toUpperCase() + $(".getusername1").text().substr(1,20);

$(".getusername").append("&nbsp;" + usernameval);

$("#testimonialgender").val($(".getusergender").text());
}




    //Disable cut copy paste
    $('.dsbleClick').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
   
    // Disable mouse right click
     $(".dsbleClick").on("contextmenu",function(e){
         return false;

     });

if($(".dsbleClick").length >=1){
    $(document).keydown(function (event) {
        if (event.keyCode == 123) {
            return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {       
            return false;
        }
    });
}



$('#password').keypress(function (e) {
    var key = e.which;
    if(key == 13)
    {
        $('.userlogin').click();
        return false;  
    }
}); 

//Enable pagination
if($(".pagenme").attr('data-page') != undefined){
paginate();
}

$('#commentsSummernoteEditor').summernote({
    toolbar: [
        ["style", ["style"]],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']]
      ],
      height: 200,
});

//Show only the date and hide other information in the comment added date
$(".commentDate").each(function(i){
    var fulltime =$(".commentDate:eq("+i+")").text().split("-");
    var addedDate = fulltime[0]+"-"+fulltime[1]+"-"+fulltime[2];
    $(".commentDate:eq("+i+")").text(addedDate);
});

//Show delete icon on comments only for the comment which the current user added.
$(".commenterEmail").each(function(){
    if($(this).text() == $(".getuseremail").text()){
        $(this).parent().parent().next().next().find(".deleteComment").show()
    }
});


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

$(document).on('click', '#submitcontactform', function(event){
event.preventDefault();
    var fname = $("#fname").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var message = $("#message").val();

    if($("#fname").val()!="" && $("#email").val()!="" && $("#message").val()!="" ){
        $(this).removeAttr("id");
        $.ajax({
        type: "POST",
        url: "contactMail.php",
        data: {
            'fname' : fname,
            'email' : email,
            'phone' : phone,
            'message' : message,
        },
        cache: false,
        success: function(response){
            $("#fname").val("");
            $("#email").val("");
            $("#phone").val("");
            $("#message").val("");

			$('#msg').html("Thank you. We will get in touch with you soon!").fadeIn('slow');
			$('#msg').delay(5000).fadeOut('slow');
        }
        });
    }
    else{
        $('#errmsg').html("Please fill all the required fields.").fadeIn('slow');
		$('#errmsg').delay(3000).fadeOut('slow');
    }   
});

$(document).on('click', '.userlogin', function(event){
event.preventDefault();
    var email = $("#email").val();
    var password = $("#password").val();

    if($("#email").val()!="" && $("#password").val()!="" ){
        $.ajax({
        type: "POST",
        url: "login_ajax.php",
        data: {
            'email' : email,
            'password' : password
        },
        cache: false,
        success: function(response){
            if(response == 'wrong'){
                $("#loginrequired").hide();
                $('#wronguname').modal('show');
            }
            else{
                window.location = "index.php";
            }
        }
        });
    }
    else{
        $("#loginrequired").show();
    }   
});

$(document).on('click', '#changePasswordButton', function(event){
event.preventDefault();
    var currentPassword = $("#currentPassword").val();
    var newPassword = $("#newPassword").val();
    var confirmPassword = $("#confirmPassword").val();

    if($("#currentPassword").val()!="" && $("#newPassword").val()!="" && $("#confirmPassword").val()!=""){
        if($("#newPassword").val() == $("#confirmPassword").val()){
            $.ajax({
            type: "POST",
            url: "changePassword.php",
            data: {
                'currentPassword' : currentPassword,
                'newPassword' : newPassword,
                'confirmPassword' : confirmPassword
            },
            cache: false,
            success: function(response){
                $("#changePasswordError").text(response);
                $("#changePasswordError").show();
                if(response != "Current Password is not correct"){
                    setTimeout(function(){ window.location = "logout.php"; }, 5000);
                }
            }
            });
        }
        else{
            $("#changePasswordError").text("Passwords do not match");
            $("#changePasswordError").show();
        }
    }
    else{
        $("#changePasswordError").text("Please fill all the fields");
        $("#changePasswordError").show();
    }   
});

$(document).on('click', '#ForgotPasswordButton', function(event){
event.preventDefault();
    var email = $("#ForgotPasswordUserEmail").val();
    var generatedPassword = "";
    var alphabets = ["A", "B", "C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    var values = [1,3,3,2,1,4,2,4,1,8,4,2,3,1,1,3,2,1,1,1,1,4,3,8,2,10];

    function random(){
        var x = Math.floor((Math.random() * 26) + 1);
        return x-1;
    }

    for(var i=0; i <= 3; i++){
        var value = random();
        var a = alphabets[value];
        generatedPassword += a;
    }

    for(var i=0; i <= 2; i++){
        var value = random();
        var b = values[value];
        generatedPassword += b;
    }

    if($("#ForgotPasswordUserEmail").val()!=""){
            $.ajax({
            type: "POST",
            url: "forgotPassword.php",
            data: {
                'email' : email,
                'generatedPassword' : generatedPassword
            },
            cache: false,
            success: function(response){
                $("#ForgotPasswordError").text(response);
                $("#ForgotPasswordError").show();
                if(response == "New password has been sent to your email."){
                    setTimeout(function(){ window.location = "login.php"; }, 4000);
                }
            }
            });
    }
    else{
        $("#ForgotPasswordError").text("Please enter the email.");
        $("#ForgotPasswordError").show();
    }   
});

$(document).on("input", "#phone", function() {
    this.value = this.value.replace(/[^0-9\.]/g,'');
});


//Category Search Functionality
$(".categorySearchValue").on("keyup", function() {
    var g = $(this).val();
    g = g.toLowerCase();
    $(".categoryContainer .categoryName").each( function() {
		var s = $(this).text();
		s = s.toLowerCase();
		
		if(s.indexOf(g)>=0){
		$(this).parent().parent().parent().show();
		}
		else {
		$(this).parent().parent().parent().hide();
		}
    });
});


//Questions Search Functionality
$(".questionSearchValue").on("keyup", function() {
    var g = $(this).val();
    g = g.toLowerCase();
    $(".questionsPage .question").each( function() {
		var s = $(this).text();
		s = s.toLowerCase();
        $(".paginationContainer").hide();
        $(".displayPerPageDiv").hide();
		if(s.indexOf(g)>=0){
		$(this).parent().parent().parent().parent().show();
		}
		else {
		$(this).parent().parent().parent().parent().hide();
        }
    });
    if(g == ""){
        paginate();
        $(".paginationContainer").show();
        $(".displayPerPageDiv").show();
    }
});


var click = 0;
$(document).on("click",".ques",function(){
    var i = parseInt($(this).find('.qCount').text()) - 1;
    $(this).parent().parent().parent().find(".answer").toggle();
    // $(".answer").hide();
    //$(".answer:eq("+i+")").show();
});

$(document).on("change","#dispNumber",function(){
    $("#shows_per_page").val(parseInt($("#dispNumber").val()));
    paginate();
});

$(document).on("click",".getQid",function(){
    var qid=$(this).attr('data-id');
    var qNumber = $(this).attr('data-number');
    $(this).attr("href", "quesAns.php?qid="+qid+"&qnumber="+qNumber);
});

$(document).on("click",".postComment",function(){
    var comment = $("#commentsSummernoteEditor").summernote("code");
    comment = comment.replace(/'/g, '&#x27;');
    var username = $.trim($(".getusername").text());
    var email = $(".getuseremail").text();
    var dt = new Date();
    var time = dt.getDate()+"-"+(dt.getMonth() + 1)+"-"+dt.getFullYear()+"-"+dt.getHours() + "" + dt.getMinutes() + "" + dt.getSeconds() + "" +dt.getMilliseconds();
    var qid = $(".getQid").text();
    var qNumber = $(".getQnumber").text();

    if(comment !="<p><br></p>" ){
        $.ajax({
        type: "POST",
        url: "./admin/ajaxCallQuestionair.php",
        data: {
            'action': 'addComment',
            'comment' : comment,
            'username': username,
            'email': email,
            'qid': qid,
            'qnumber': qNumber,
            'time': time
        },
        cache: false,
        success: function(response){
            if(response == "success"){
                location.reload();
            }else{
                alert("Server not responding! Please try later");
            }
        }
        });
    }
    else{
        alert("please add a comment");
    } 
});


$(document).on("click",".deleteComment",function(){
var time = $(this).attr("dataCommentTime");
var qid = $(this).attr("dataDeleteQid");

var r = confirm("Delete Comment ?");
if (r == true) {
    $.ajax({
        type: "POST",
        url: "./admin/ajaxCallQuestionair.php",
        data: {
            'action': 'deleteComment',
            'qid': qid,
            'time': time
        },
        cache: false,
        success: function(response){
            if(response == "success"){
                location.reload();
            }else{
                alert("Server not responding! Please try later");
            }
        }
    });
}
});


$(document).on("click",".myProfile",function(){
    var userEmail = $(".getuseremail").text();
    window.location.href ="profile.php?uname=" + userEmail;
});


$(document).on('click', '.subAccess', function(event){
    event.preventDefault();
        var email = $(".getuseremail").text();
        var subID = $(this).attr("datasublink");
    
        if(subID !="" && email !="" ){
            $.ajax({
            type: "POST",
            url: "admin/ajaxcalls.php",
            data: {
                'action': 'reqSubAccess',
                'email' : email,
                'subID' : subID
            },
            cache: false,
            success: function(response){
                if(response == 'Success'){
                    alert("Request Submitted");
                }else if(response == 'Request Pending'){
                    alert("Your request has already been submitted");
                }
                else{
                    alert("Error!");
                }
            }
            });
        }  
    });


$(document).ready(function () {

    //$('.displayfiles').DataTable({
    //    "order": [[ 0, "desc" ]]
    //});

    //summernote bug fix
    setTimeout(function () {
        $(".note-insert button").on('click', function () {
            var elem = document.getElementsByClassName("modal-backdrop");
            elem[0].remove();
        });
    }, 3000);

    $('#userList').DataTable();
    $('.displayUploadedFiles').DataTable({
        "order": [[0, "desc"]]
    });

    $('#questionSummernoteEditor').summernote({
        minHeight: 200,
        toolbar: [
            ['style', ['style','bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            //['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['picture']],
            ['table', ['table']]
          ]
    });
    $('#answerSummernoteEditor').summernote({
        height: 300,
        toolbar: [
            ['style', ['style','bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            //['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['picture']],
            ['table', ['table']]
          ]
    });

    $('#batchupdateSummerNote').summernote({
        height: 300,
        toolbar: [
            // [groupName, [list of button]]
            ['Font Style',['fontname']],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
          ]
    });

    //Single line
    $('#batchupdateSummerNoteSingle').summernote({
        height: 300,
        toolbar: [
            // [groupName, [list of button]]
            ['Font Style',['fontname']],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
          ]
    });

    $("#questionSummernoteEditor").next().find(".btn-fullscreen").attr("title", "Enlarge");
    $("#questionSummernoteEditor").next().find(".btn-codeview").attr("title", "Code View");
    $("#questionSummernoteEditor").next().find(".note-icon-question").parent().attr("title", "Help");

    $("#answerSummernoteEditor").next().find(".btn-fullscreen").attr("title", "Enlarge");
    $("#answerSummernoteEditor").next().find(".btn-codeview").attr("title", "Code View");
    $("#answerSummernoteEditor").next().find(".note-icon-question").parent().attr("title", "Help");

    $("#quesLanguage").val($(".subjectValue").val());
    //var interviewQuestion = $(".quesValue").val();
    //var interviewAnswer = $(".ansValue").val();

    //$("#questionSummernoteEditor").summernote("code", interviewQuestion);
    //$("#answerSummernoteEditor").summernote("code", interviewAnswer);

});


//Delete student registration request
$(document).on('click', '.deletepuser', function () {

    var pemail = $(this).parent().parent().find('td:eq(1)').text();
    var deleteStu = confirm("Are you sure you wanna delete ?");
    if (deleteStu == true) {
        $.ajax({
            type: "POST",
            url: "./ajaxcalls.php",
            data: {
                'action': 'deletePendingUser',
                'email': pemail
            },
            cache: false,
            success: function (response) {
                if ($.trim(response) == 'rejected') {
                    location.reload();
                } else {
                    alert("Couldn't delete the record;");
                }
            }
        });
    }
});


//Modal for course access secision
$(document).on('click', '.userapproval', function () {
    var pemail = $(this).parent().parent().find('td:eq(1)').text();
    $(".selectedUser").val(pemail);
    $('#userPermModal').modal('show');
});

//Approve student registration request
$(document).on('click', '.changeCoursPerm', function () {
    var pemail = $(".selectedUser").val();
    window.location.href = "userPermis.php?uname="+pemail;
});

//Approve student registration request
$(document).on('click', '.userapprovaladd', function () {
    var pemail = $(".selectedUser").val();
    $.ajax({
        type: "POST",
        url: "ajaxcalls.php",
        data: {
            'action': 'acceptPendingUser',
            'studentID': pemail
        },
        cache: false,
        success: function (response) {
            if ($.trim(response).indexOf("Success") > -1) {
                location.reload();
            } else {
                alert("Error Approving!");
            }
        }
    });
});

$(document).on('click', '#deleteMultipleStudents, .deleteuser', function (event) {
    var self = this;
    var StudentsData = $('input[name=selectedStudentsForDeletion]:checked').map(function () {
        return $(this).val();
    }).get();

    if (StudentsData == "") {
        var temp = $(this).attr('data-delete');
        //Converting string to object for the data to be valid
        StudentsData = JSON.parse(
            JSON.stringify({
                StudentsData: temp
            })
        );
    }
    var deleteStu = confirm("Are you sure you wanna delete ?");
    if (deleteStu == true) {
        if (StudentsData.StudentsData != "" || StudentsData.StudentsData !== undefined) {
            $.ajax({
                type: "POST",
                url: "ajaxcalls.php",
                data: {
                    'action': 'deleteMultipleStudents',
                    'deleteStudents': StudentsData
                },
                success: function (response) {
                    if ($.trim(response).indexOf("deleted") > -1) {
                        setTimeout(function () {
                            location.href = "manageUsers.php";
                        }, 2000);

                        $.notify({
                            icon: "pe-7s-like2",
                            message: "Successfully Deleted!"
                        }, {
                                type: 'success',
                                timer: 200,
                                placement: {
                                    from: 'top',
                                    align: 'right'
                                }
                            });
                    }
                }
            });
        } else {
            $.notify({
                icon: "pe-7s-help1",
                message: "Please select a student to delete!"
            }, {
                    type: 'danger',
                    timer: 200,
                    placement: {
                        from: 'top',
                        align: 'right'
                    }
                });
        }
    }

});

$(document).on('click', '.deletefile', function () {

    var id = $(this).parent().parent().parent().find('td:eq(0)').text(); //Get the id in the current row
    var filename = $(this).parent().parent().parent().find('td:eq(1)').text();

    var deleteStu = confirm("Are you sure you wanna delete ?");
    if (deleteStu == true) {
        $.ajax({
            type: "POST",
            url: "ajaxcalls.php",
            data: {
                'action': 'deleteFile',
                'id': id,
                'filename': filename
            },
            cache: false,
            success: function (response) {
                if ($.trim(response) == "Record deleted successfully") {
                    location.reload();
                } else {
                    alert("Error");
                }
            }
        });
    }
});

$(".copybatchdetail").on("click", function () {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(this).text()).select();
    document.execCommand("copy");
    $temp.remove();
    $(".alert").fadeIn(900);
    $(".alert").fadeOut(500);
});

$(document).on('click', '.updatebatch', function () {
    var morningbatchdisplay = "true";
    var eveningbatchdisplay = "true";
    var weekendbatchdisplay = "true";

    if ($("#morningbatch").val() == "") {
        $("#morningbatch").val("In Progress");
        morningbatchdisplay = "false";
    }

    if ($("#eveningbatch").val() == "") {
        $("#eveningbatch").val("In Progress");
        eveningbatchdisplay = "false";
    }

    if ($("#weekendbatch").val() == "") {
        $("#weekendbatch").val("In Progress");
        weekendbatchdisplay = "false";
    }

    var morningbatch = $("#morningbatch").val();
    var eveningbatch = $("#eveningbatch").val();
    var weekendbatch = $("#weekendbatch").val();

    $.ajax({
        type: "POST",
        url: "newbatchupdate.php",
        data: {
            'morningbatch': morningbatch,
            'eveningbatch': eveningbatch,
            'weekendbatch': weekendbatch,
            'morningbatchdisplay': morningbatchdisplay,
            'eveningbatchdisplay': eveningbatchdisplay,
            'weekendbatchdisplay': weekendbatchdisplay
        },
        cache: false,
        success: function (response) {
            $("#morningbatch").val("");
            $("#eveningbatch").val("");
            $("#weekendbatch").val("");
            alert("Successfully updated");
        }
    });
});


$(document).on('click', '.addInterviewQuestion', function () {
    var dt = new Date();
    var time = dt.getDate() + "-" + (dt.getMonth() + 1) + "-" + dt.getFullYear() + "-" + dt.getHours() + "" + dt.getMinutes() + "" + dt.getSeconds();

    var question = $("#questionSummernoteEditor").summernote('code');
    if (question.match("^<p>")) {
        question = question.slice(3).slice(0, -4);
    }
    question = question.replace(/'/g, '&#x27;');// '
    question = question.replace(/'/g, '&#x21;');// !
    question = question.replace(/'/g, '&#x23;');// #
    question = question.replace(/'/g, '&#x24;');// $
    question = question.replace(/'/g, '&#x25;');// %
    question = question.replace(/'/g, '&#x3A;');// :
	question = encodeURIComponent(question);


    var answer = $("#answerSummernoteEditor").summernote('code');
    answer = answer.replace(/'/g, '&#x27;');// '
    answer = answer.replace(/'/g, '&#x21;');// !
    answer = answer.replace(/'/g, '&#x23;');// #
    answer = answer.replace(/'/g, '&#x24;');// $
    answer = answer.replace(/'/g, '&#x25;');// %
    answer = answer.replace(/'/g, '&#x3A;');// :
	answer = encodeURIComponent(answer);

    //var subject = $("#quesLanguage option:selected").text();
    var subject = $(".folderToSave").text();
    var subID = $(".subCatoID").text();
    var subjectLowercase = $(".folderToSave").text().replace(/\s/g, '').toLowerCase();

    $(".qidValue").val(time);

    if (subject == "Select..." || subject == undefined || subject == null) {
        $(".subjectError").show();
    } else {
        $.ajax({
            type: "POST",
            url: "ajaxCallQuestionair.php",
            data: {
                'action': 'addQuestionair',
                'question': question,
                'answer': answer,
                'subject': subject,
                'subID': subID,
                'subjectLowercase': subjectLowercase,
                'time': time
            },
            cache: false,
            success: function (response) {
                if (response.indexOf("success") >= 0) {
                    var category = response.split(",");
                    $(".sHide").hide();
                    $(".qSuccess").text("Successfully saved to " + category[1]).show();
                    //$(".qImageUpload").html('<div class="col-md-4"><h3>Attach a photo ?</h3></div><div class="col-md-3" style="margin: 15px 0 35px;"><button class="btn btn-danger cancelUpload">No</button></div><input type="file" name="qImage" id="qImage" class="form-control"><br/><div class="col-md-3"><button class="btn btn-primary addQuesPhoto">Upload Photo</button></div>');
                    $(".addInterviewQuestion").hide();
                    $(".qImageUpload").html('<div class="col-md-12" style="padding: 10px 50px; background: #fff;margin-bottom: 30px;"><a class="btn btn-primary" href="interviewQuestionsAdd.php?sub=' + category[1] + '&subID=' + category[2] + '">Add Question</a></div>');
                    $(".subjectError").hide();
                } else {
                    alert("Data contains unstorable special characters! Please remove and try again");

                }
            }
        });
    }
});

$(document).on('click', '.updateInterviewQuestion', function () {
    var qid = $(".updateForQid").val();
    var question = $("#questionSummernoteEditor").summernote('code');
    question = question.replace(/'/g, '&#x27;');// '
    question = question.replace(/'/g, '&#x21;');// !
    question = question.replace(/'/g, '&#x23;');// #
    question = question.replace(/'/g, '&#x24;');// $
    question = question.replace(/'/g, '&#x25;');// %
    question = question.replace(/'/g, '&#x3A;');// :
	question = encodeURIComponent(question);

    var answer = $("#answerSummernoteEditor").summernote('code');
    answer = answer.replace(/'/g, '&#x27;');// '
    answer = answer.replace(/'/g, '&#x21;');// !
    answer = answer.replace(/'/g, '&#x23;');// #
    answer = answer.replace(/'/g, '&#x24;');// $
    answer = answer.replace(/'/g, '&#x25;');// %
    answer = answer.replace(/'/g, '&#x3A;');// :
	answer = encodeURIComponent(answer);

    //var subject = $("#quesLanguage option:selected").text();
    //var subjectLowercase = subject.replace(/\s/g,'').toLowerCase();

    $.ajax({
        type: "POST",
        url: "ajaxCallQuestionair.php",
        data: {
            'action': 'updateQuestionair',
            'question': question,
            'answer': answer,
            //'subject': subject,
            //'company': subjectLowercase,
            'qid': qid
        },
        cache: false,
        success: function (response) {
            if (response.includes('sucess')) {
                //$(".sHide").hide();
                $(".qSuccess").show();
                //$(".qImageUpload").html('<div class="col-md-4"><h3>Attach a photo ?</h3></div><div class="col-md-3" style="margin: 15px 0 35px;"><button class="btn btn-danger cancelUpload">No</button></div><input type="file" name="qImage" id="qImage" class="form-control"><br/><div class="col-md-3"><button class="btn btn-primary addQuesPhoto">Upload Photo</button></div>');
                //$(".updateInterviewQuestion").hide();
                //$(".qImageUpload").html('<div class="col-md-12" style="padding: 10px 50px; background: #fff;margin-bottom: 30px;"><a class="btn btn-primary" href="interviewQuestionsAdd.php">Add Question</a></div>');
                $(".subjectError").hide();
                setTimeout(function(){ window.history.back(); }, 2000);
                
            } else {
                alert("Data contains unstorable special characters! Please remove and try again");

            }
        }
    });

});


/////////////////////////
$(document).on('click', '#batchUpdateNew', function () {
    
    var batchupdate = $("#batchupdateSummerNote").summernote('code');
    if (batchupdate.match("^<p>")) {
        batchupdate = batchupdate.slice(3).slice(0, -4);
    }
    batchupdate = batchupdate.replace(/'/g, '&#x27;');// '
    batchupdate = batchupdate.replace(/'/g, '&#x21;');// !
    batchupdate = batchupdate.replace(/'/g, '&#x23;');// #
    batchupdate = batchupdate.replace(/'/g, '&#x24;');// $
    batchupdate = batchupdate.replace(/'/g, '&#x25;');// %
    batchupdate = batchupdate.replace(/'/g, '&#x3A;');// :


    if ($('#batchupdateSummerNote').summernote('isEmpty')) {
        alert("Batch details cannot be empty");
    } else {
        $.ajax({
            type: "POST",
            url: "newbatchupdate.php",
            data: {
                'action': 'batchupdatenew',
                'batch': batchupdate
            },
            cache: false,
            success: function (response) {
                if(response == 'Success'){
                    alert("Batch Updated");
                }
            }
        });
    }
});


/////////////////////////
$(document).on('click', '#batchUpdateNewSingle', function () {
    
    var batchupdate = $("#batchupdateSummerNoteSingle").summernote('code');
    if (batchupdate.match("^<p>")) {
        batchupdate = batchupdate.slice(3).slice(0, -4);
    }
    batchupdate = batchupdate.replace(/'/g, '&#x27;');// '
    batchupdate = batchupdate.replace(/'/g, '&#x21;');// !
    batchupdate = batchupdate.replace(/'/g, '&#x23;');// #
    batchupdate = batchupdate.replace(/'/g, '&#x24;');// $
    batchupdate = batchupdate.replace(/'/g, '&#x25;');// %
    batchupdate = batchupdate.replace(/'/g, '&#x3A;');// :


    if ($('#batchupdateSummerNoteSingle').summernote('isEmpty')) {
        alert("Batch details cannot be empty");
    } else {
        $.ajax({
            type: "POST",
            url: "newbatchupdate.php",
            data: {
                'action': 'batchupdatenewsingle',
                'batch': batchupdate
            },
            cache: false,
            success: function (response) {
                if(response == 'Success'){
                    alert("Batch Updated");
                }
            }
        });
    }
});

$(document).on('click', '.addQuesPhoto', function () {
    var qid = $(".qidValue").val();
    var file_data = $('#qImage').prop('files')[0];
    var ext = "";
    var action = $(this).parent().attr('title');
    if (file_data != null || file_data != undefined) {
        var revFname = $('#qImage').prop('files')[0].name.split(".").reverse().join(".");
        ext = revFname.split(".")[0];
    }
    var form_data = new FormData();
    form_data.append('file', file_data);
    if (file_data != null || file_data != undefined) {
        $(".uploadingPhoto").show();
        $.ajax({
            url: 'uploadPhoto.php?qid=' + qid + '&ext=' + ext,
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (response) {
                if ($.trim(response) != 'File already exists') {
                    if ($.trim(response) == 'Something went wrong!') {
                        alert("Something went wrong! Please try again after sometime.");
                    } else {
                        $(".uploadingPhoto").hide();
                        var r = confirm("Successfully Added! Want to add another question?");
                        if (r == true) {
                            location.reload();
                        } else {
                            window.location.href = "interviewQuestions.php";
                        }

                    }
                } else {
                    alert("File name already exists!");
                }

            }
        });
    } else {
        alert("Please upload a image");
    }

});


$(document).on('click', '.cancelUpload', function () {
    location.reload();
});



$(document).on('click', '.editQuestion', function () {
    var qid = $(this).attr("data-qid");
    var index = $(this).attr("data-index");
    window.location = "interviewQuestionsEdit.php?qid=" + qid +"&cnt="+ index;
});

$(document).on('click', '.deleteQuestion', function () {

    var id = $(this).closest('a').attr('dataId');
    var doDelete = confirm("Do you want to delete this question ?");
    if (doDelete) {
        $.ajax({
            type: "POST",
            url: "ajaxCallQuestionair.php",
            data: {
                'action': 'deleteQuestionair',
                'id': id
            },
            cache: false,
            success: function (response) {
                location.reload();
            }
        });
    }


});

$(document).on("click", ".bannerUpload", function (e) {
    e.preventDefault();
    var formdata = new FormData();
    const uname = document.querySelector('#usr').value;
    for (var i = 0; i < $("#bnr").get(0).files.length; ++i) {
        formdata.append('file[]', $("#bnr").get(0).files[i]);
    }
    $.ajax({
            url: `bannerphpupload.php?action=bannerUpload&usr=${uname}`,
            type: 'POST',
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                return myXhr;
            },
            success: function (data) {
                if(data.indexOf("success") != -1){
                    location.reload();
                } else {
                    alert(data);
                    location.reload();
                }
            },
            data: formdata,
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
});


var click = 0;
$(document).on("click", ".ques", function () {
    $(this).parent().parent().parent().find(".answer").toggle();
    //$(".answer").hide();
    //$(".answer:eq("+i+")").show();
});

// jQuery(document).bind("contextmenu cut copy",function(e){
//     e.preventDefault();
//     alert('Copying is not allowed');
// });

$(document).on("click", ".addCategory", function () {
    var status = true;
    var dt = new Date();
    var time = dt.getDate() + "-" + (dt.getMonth() + 1) + "-" + dt.getFullYear() + "-" + dt.getHours() + "" + dt.getMinutes() + "" + dt.getSeconds();

    $(".categoryName").each(function () {
        if ($(this).text().toLocaleLowerCase() == $(".categoryName").val().toLocaleLowerCase()) {
            status = false;
            alert("File name " + $(".categoryName").val() + " already exists");
        }
    });
    var cName = $(".categoryName").val();
    var cValue = cName.replace(/\s/g, '').toLowerCase();
    // var cLink = "subCategories.php?msub=" + time + "&mSubject=" +cName;
    var cLink = "subCategories.php?msub=" + time;
    if (cName === "") {
        alert("Please provide a name");
    } else if (status) {
        $.ajax({
            type: "POST",
            url: "ajaxCallQuestionair.php",
            data: {
                'action': 'addCategory',
                'cName': cName,
                'cValue': cValue,
                'cLink': cLink,
                'subID': time
            },
            cache: false,
            success: function (response) {
                location.reload();
            }
        });
    }
});


//Add Sub category

$(document).on("click", ".addSubCategory", function () {
    var status = true;
    var dt = new Date();
    var subID = dt.getDate() + "-" + (dt.getMonth() + 1) + "-" + dt.getFullYear() + "-" + dt.getHours() + "" + dt.getMinutes() + "" + dt.getSeconds();

    $(".subDwldCategoryName").each(function () {
        if ($(this).text().toLocaleLowerCase() == $(".dwldSubCategoryName").val().toLocaleLowerCase()) {
            status = false;
            alert("File name " + $(".subCategoryName").val() + " already exists");
        }
    });
    var mainSubjectCode = $(".mainSubjectCode").val();
    var cName = $(".subCategoryName").val();
    cName = cName.replace(/\&/g, 'and');
    var cValue = cName.replace(/\s/g, '').toLowerCase();
    var cLink = "interviewQuestions.php?sub=" + subID + "&Subject=" + cName;
    if (cName === "") {
        alert("Please provide a name");
    } else if (status) {
        $.ajax({
            type: "POST",
            url: "ajaxCallQuestionair.php",
            data: {
                'action': 'addSubCategory',
                'cName': cName,
                'cValue': cValue,
                'cLink': cLink,
                'subID': subID,
                'mainSubjectCode': mainSubjectCode
            },
            cache: false,
            success: function (response) {
                location.reload();
            }
        });
    }
});


//Add Sub category for downloads
$(document).on("click", ".addDwldSubCategory", function () {
    var status = true;
    var dt = new Date();
    var subID = dt.getDate() + "-" + (dt.getMonth() + 1) + "-" + dt.getFullYear() + "-" + dt.getHours() + "" + dt.getMinutes() + "" + dt.getSeconds();

    $(".SubDwldCategoryName").each(function () {
        if ($(this).text().toLocaleLowerCase() == $(".dwldSubCategoryName").val().toLocaleLowerCase()) {
            status = false;
            alert("File name " + $(".dwldSubCategoryName").val() + " already exists");
        }
    });
    var mainSubjectCode = $(".mainSubjectCode").val();
    var cName = $(".dwldSubCategoryName").val();
    cName = cName.replace(/\&/g, 'and');
    var cValue = cName.replace(/\s/g, '').toLowerCase();
    var cLink = "downloads.php?sub=" + subID + "&Subject=" + cName;
    if (cName === "") {
        alert("Please provide a name");
    } else if (status) {
        $.ajax({
            type: "POST",
            url: "ajaxcalls.php",
            data: {
                'action': 'addDwldSubCategory',
                'cName': cName,
                'cValue': cValue,
                'cLink': cLink,
                'subID': subID,
                'mainSubjectCode': mainSubjectCode
            },
            cache: false,
            success: function (response) {
                location.reload();
            }
        });
    }
});

$(document).on("change", "#dispNumber", function () {
    $("#shows_per_page").val(parseInt($("#dispNumber").val()));
    paginate();
});


//Category Search Functionality
$(".categorySearchValue").on("keyup", function () {
    var g = $(this).val();
    g = g.toLowerCase();
    $(".categoryContainer .categoryName").each(function () {
        var s = $(this).text();
        s = s.toLowerCase();

        if (s.indexOf(g) >= 0) {
            $(this).parent().parent().parent().show();
        }
        else {
            $(this).parent().parent().parent().hide();
        }
    });
});


//Sub Category Search Functionality
$(".subCategorySearchValue").on("keyup", function () {
    var g = $(this).val();
    g = g.toLowerCase();
    $(".categoryContainer .subCategoryName").each(function () {
        var s = $(this).text();
        s = s.toLowerCase();

        if (s.indexOf(g) >= 0) {
            $(this).parent().parent().parent().show();
        }
        else {
            $(this).parent().parent().parent().hide();
        }
    });
});

//Questions Search Functionality
$(".questionSearchValue").on("keyup", function () {
    var g = $(this).val();
    g = g.toLowerCase();
    $(".questionsPage .question").each(function () {
        var s = $(this).text();
        s = s.toLowerCase();
        $(".paginationContainer").hide();
        $(".displayPerPageDiv").hide();
        if (s.indexOf(g) >= 0) {
            $(this).parent().parent().parent().parent().show();
        }
        else {
            $(this).parent().parent().parent().parent().hide();
        }
    });
    if (g == "") {
        paginate();
        $(".paginationContainer").show();
        $(".displayPerPageDiv").show();
    }
});


$(document).on('click', '.deletecategory', function (event) {
    event.preventDefault();
    var categoryID = $(this).prev().val();
    var categoryName = $(this).prev().prev().val();
    var category = $(this).attr('title');
    var message = "Delete '" + category + "' ?";
    if (confirm(message)) {
        if (categoryName != "") {
            $.ajax({
                type: "POST",
                url: "ajaxCallQuestionair.php",
                data: {
                    'action': 'deleteCategory',
                    'categoryName': categoryName,
                    'categoryID': categoryID
                },
                cache: false,
                success: function (response) {
                    location.reload();
                }
            });
        }
        else {
            alert("Could not delete folder");
        }
    }
    else {
    }
});


$(document).on('click', '.deleteSubcategory', function (event) {
    event.preventDefault();
    var subCategoryName = $(this).prev().val();
    var subCategoryID = $(this).parent().parent().children().find('.subCategoryName').parent().attr('href');
    subCategoryID = subCategoryID.split('?')[1].split('&')[0].split('=')[1];
    var category = $(this).attr('title');
    var message = "Delete '" + category + "' ?";
    if (confirm(message)) {
        if (subCategoryName != "") {
            $.ajax({
                type: "POST",
                url: "ajaxCallQuestionair.php",
                data: {
                    'action': 'deleteSubCategory',
                    'subSategoryName': subCategoryName,
                    'subCategoryID': subCategoryID
                },
                cache: false,
                success: function (response) {
                    location.reload();
                }
            });
        }
        else {
            alert("Could not delete folder");
        }
    }
    else {
    }
});


$(document).on('click', '.deletedwldSubcategory', function (event) {
    event.preventDefault();
    var subCategoryName = $(this).prev().val();
    var subCategoryID = $(this).parent().parent().children().find('.subDwldCategoryName').parent().attr('href');
    subCategoryID = subCategoryID.split('?')[1].split('&')[0].split('=')[1];
    var category = $(this).attr('title');
    var message = "Delete '" + category + "' ?";
    if (confirm(message)) {
        if (subCategoryName != "") {
            $.ajax({
                type: "POST",
                url: "ajaxcalls.php",
                data: {
                    'action': 'deleteDwldSubcategory',
                    'subCategoryName': subCategoryName,
                    'subCategoryID': subCategoryID
                },
                cache: false,
                success: function (response) {
                    location.reload();
                }
            });
        }
        else {
            alert("Could not delete folder");
        }
    }
    else {
    }
});

$(document).on('click', '.editcategory', function (event) {
    event.preventDefault();
    var status = true;
    var self = this;
    $(".categoryName").each(function (i) {
        if ($(this).text().toLocaleLowerCase() == $(self).parent().prev().val().toLocaleLowerCase()) {
            status = false;
            alert("File name '" + $(self).parent().prev().val() + "' already exists");
        }
    });
    var editedCategoryName = $(this).parent().prev().val();
    var editedCategoryNamesmallcase = editedCategoryName.replace(/\s/g, '').toLowerCase();
    var category = $(this).parent().prev().parent().parent().find('.categoryName').text();
    var categorySmallCase = category.replace(/\s/g, '').toLowerCase();
    //var cLink = "interviewQuestions.php?sub=" + editedCategoryNamesmallcase +"&Subject="+editedCategoryName;
    //var cLink = "subCategories.php?msub=" + time;
    var message = "Rename '" + category + "' to '" + editedCategoryName + "' ?";
    if (status) {
        if (confirm(message)) {
            if (editedCategoryName != "") {
                $.ajax({
                    type: "POST",
                    url: "ajaxCallQuestionair.php",
                    data: {
                        'action': 'editCategory',
                        'editedCategoryName': editedCategoryName,
                        'editedCategoryNamesmallcase': editedCategoryNamesmallcase,
                        'category': category,
                        'categorySmallCase': categorySmallCase
                        //'cLink':cLink
                    },
                    cache: false,
                    success: function (response) {
                        location.reload();
                    }
                });
            }
            else {
                alert("Could not update folder!");
            }
        }
        else {
        }
    }
});


$(document).on('click', '.editSubcategory', function (event) {
    event.preventDefault();
    var status = true;
    var self = this;
    $(".subCategoryName").each(function (i) {
        if ($(this).text().toLocaleLowerCase() == $(self).parent().prev().val().toLocaleLowerCase()) {
            status = false;
            alert("File name '" + $(self).parent().prev().val() + "' already exists");
        }
    });
    var link = $(this).parent().parent().parent().children().closest('a').attr('href');
    var subID = link.split('?')[1].split('&')[0].split('=')[1];
    var editedCategoryName = $(this).parent().prev().val();
    editedCategoryName= editedCategoryName.replace(/\&/g, 'and');
    var editedCategoryNamesmallcase = editedCategoryName.replace(/\s/g, '').toLowerCase();
    var category = $(this).parent().prev().parent().parent().find('.subCategoryName').text();
    var categorySmallCase = category.replace(/\s/g, '').toLowerCase();
    var cLink = "interviewQuestions.php?sub=" + subID + "&Subject=" + editedCategoryName;
    var message = "Rename '" + category + "' to '" + editedCategoryName + "' ?";
    if (status) {
        if (confirm(message)) {
            if (editedCategoryName != "") {
                $.ajax({
                    type: "POST",
                    url: "ajaxCallQuestionair.php",
                    data: {
                        'action': 'editSubCategory',
                        'editedCategoryName': editedCategoryName,
                        'editedCategoryNamesmallcase': editedCategoryNamesmallcase,
                        'category': category,
                        'categorySmallCase': categorySmallCase,
                        'cLink': cLink,
                        'subID': subID
                    },
                    cache: false,
                    success: function (response) {
                        location.reload();
                    }
                });
            }
            else {
                alert("Could not update folder!");
            }
        }
        else {
        }
    }
});

$(document).on('click', '.editDwldsSubcategory', function (event) {
    event.preventDefault();
    var status = true;
    var self = this;
    $(".subDwldCategoryName").each(function (i) {
        if ($(this).text().toLocaleLowerCase() == $(self).parent().prev().val().toLocaleLowerCase()) {
            status = false;
            alert("File name '" + $(self).parent().prev().val() + "' already exists");
        }
    });
    var link = $(this).parent().parent().parent().children().closest('a').attr('href');
    var subID = link.split('?')[1].split('&')[0].split('=')[1];
    var editedCategoryName = $(this).parent().prev().val();
    editedCategoryName= editedCategoryName.replace(/\&/g, 'and');
    var editedCategoryNamesmallcase = editedCategoryName.replace(/\s/g, '').toLowerCase();
    var category = $(this).parent().prev().parent().parent().find('.subDwldCategoryName').text();
    var categorySmallCase = category.replace(/\s/g, '').toLowerCase();
    var cLink = "downloads.php?sub=" + subID + "&Subject=" + editedCategoryName;
    var message = "Rename '" + category + "' to '" + editedCategoryName + "' ?";
    if (status) {
        if (confirm(message)) {
            if (editedCategoryName != "") {
                $.ajax({
                    type: "POST",
                    url: "ajaxcalls.php",
                    data: {
                        'action': 'editDwldSubCategory',
                        'editedCategoryName': editedCategoryName,
                        'editedCategoryNamesmallcase': editedCategoryNamesmallcase,
                        'category': category,
                        'categorySmallCase': categorySmallCase,
                        'cLink': cLink,
                        'subID': subID
                    },
                    cache: false,
                    success: function (response) {
                        location.reload();
                    }
                });
            }
            else {
                alert("Could not update folder!");
            }
        }
        else {
        }
    }
});

$(document).on('click', '.editcategoryIcon', function (event) {
    $('.categoryEditName').hide();
    $(this).parent().prev().find('.categoryEditName').show();
});

$(document).on('click', '.editSubCategoryIcon', function (event) {
    $('.categoryEditName').hide();
    $(this).parent().prev().find('.categoryEditName').show();
});

$(document).on('click', '.hideEditcategory', function (event) {
    $(this).parent().parent().hide();
    $(this).parent().parent().find('.categoryEditValue').val("");
});


$(document).on('click', '.showBannerDiv', function (event) {
    if ($("#isShowDiv").val() == "prashanth11391") {
        $('.bannerUploadDiv').show();
        $('.bannerShowDiv').hide();
    }

});


$(document).on('click', '.addBanner', function (event) {
    var file_data = $('#file').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    if (file_data != null || file_data != undefined) {
        $(".uploadingBanner").show();
        $.ajax({
            url: 'ajaxBannerUpload.php?action=addBanner',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (response) {
                if ($.trim(response) != 'File already exists') {
                    if ($.trim(response) == 'Something went wrong!') {
                        alert("Something went wrong! Please try again after sometime.");
                    } else {
                        $(".uploadingBanner").hide();
                        $(".indexFileUpload").show();
                    }
                } else {
                    //alert("File name already exists!");
                }

            }
        });
    } else {
        alert("Please upload a image");
    }
});


$(document).on('click', '.addIndexFile', function (event) {
    var file_data = $('#IndexFile').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    if (file_data != null || file_data != undefined) {
        $(".uploadingBanner").show();
        $.ajax({
            url: 'ajaxBannerUpload.php?action=addIndexFile',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (response) {
                if ($.trim(response) != 'File already exists') {
                    if ($.trim(response) == 'Something went wrong!') {
                        alert("Something went wrong! Please try again after sometime.");
                    } else {
                        $(".uploadingPhoto").hide();
                        location.reload();
                    }
                } else {
                    //alert("File name already exists!");
                }

            }
        });
    } else {
        alert("Please upload a image");
    }
});



$(document).on('click', '#grantAccessMultiple', function (event) {
    var self = this;
    var StudentsData = $('input[name=seltedStudsForAces]:checked').map(function () {
        return $(this).val();
    }).get();

    var StudentsIDData = $('input[name=seltedStudsForAces]:checked').map(function () {
        return $(this).attr('data-email');
    }).get();

    if (StudentsData.length !== 0) {
        var grant = confirm("Are you sure you wanna grant access ?");
        if (grant == true) {
            if (StudentsData.StudentsData != "" || StudentsData.StudentsData !== undefined) {
                $.ajax({
                    type: "POST",
                    url: "ajaxcalls.php",
                    data: {
                        'action': 'multipleGrantCourseAccess',
                        'grantAccess': StudentsData,
                        'accessID': StudentsIDData
                    },
                    success: function (response) {
                        if ($.trim(response).indexOf("success") > -1) {
                            setTimeout(function () {
                                location.href = "courseAccessRequest.php";
                            }, 2000);

                            $.notify({
                                icon: "pe-7s-like2",
                                message: "Access Granted!"
                            }, {
                                    type: 'success',
                                    timer: 200,
                                    placement: {
                                        from: 'top',
                                        align: 'right'
                                    }
                                });
                        } else {
                            $.notify({
                                icon: "pe-7s-help1",
                                message: "Error!"
                            }, {
                                    type: 'danger',
                                    timer: 200,
                                    placement: {
                                        from: 'top',
                                        align: 'right'
                                    }
                                });
                        }
                    }
                });
            }
        }
    } else {
        alert("No student selected!");
    }

});


$(document).on('click', '.allowCourseAccess', function (event) {
    var subID = $(this).attr('data-allow');
    var email = $(this).parent().prev().prev().text();

    var grant = confirm("Are you sure you wanna grant access ?");
    if (grant == true) {
        $.ajax({
            type: "POST",
            url: "ajaxcalls.php",
            data: {
                'action': 'grantCourseAccess',
                'grantAccess': email,
                'accessID': subID
            },
            success: function (response) {
                if ($.trim(response).indexOf("success") > -1) {
                    setTimeout(function () {
                        location.href = "courseAccessRequest.php";
                    }, 2000);

                    $.notify({
                        icon: "pe-7s-like2",
                        message: "Access Granted!"
                    }, {
                            type: 'success',
                            timer: 200,
                            placement: {
                                from: 'top',
                                align: 'right'
                            }
                        });
                } else {
                    $.notify({
                        icon: "pe-7s-help1",
                        message: "Error!"
                    }, {
                            type: 'danger',
                            timer: 200,
                            placement: {
                                from: 'top',
                                align: 'right'
                            }
                        });
                }
            }
        });
    }

});


$(document).on('click', '.deletecouAcesReq', function (event) {
    var subID = $(this).attr('data-delete');
    var email = $(this).parent().parent().parent().find(".studEmail").text();

    var grant = confirm("Are you sure you wanna delete?");
    if (grant == true) {
        $.ajax({
            type: "POST",
            url: "ajaxcalls.php",
            data: {
                'action': 'deleteCourseReq',
                'rejAccess': email,
                'accessID': subID
            },
            success: function (response) {
                if ($.trim(response).indexOf("Success") > -1) {
                    setTimeout(function () {
                        location.href = "courseAccessRequest.php";
                    }, 2000);

                    $.notify({
                        icon: "pe-7s-like2",
                        message: "Deleted!"
                    }, {
                            type: 'success',
                            timer: 200,
                            placement: {
                                from: 'top',
                                align: 'right'
                            }
                        });
                } else {
                    $.notify({
                        icon: "pe-7s-help1",
                        message: "Error!"
                    }, {
                            type: 'danger',
                            timer: 200,
                            placement: {
                                from: 'top',
                                align: 'right'
                            }
                        });
                }
            }
        });
    }

});


$(document).on('click', '.addUsrAndPermi', function (event) {
    var self = this;
    var subData = $('input[name=selectedSubjs]:checked').map(function () {
        return $(this).val();
    }).get();

    if (subData == "") {
        var temp = "Null";
        //Converting string to object for the data to be valid
        subData = JSON.parse(
            JSON.stringify({
                subData: temp
            })
        );
    }
    var uEmail = $(".uEmail").val();
    var addStu = confirm("Are you sure you wanna add ?");
    if (addStu == true) {
            $.ajax({
                type: "POST",
                url: "ajaxcalls.php",
                data: {
                    'action': 'subNewAccess',
                    'subIds': subData,
                    'uEmail': uEmail
                },
                success: function (response) {
                    if ($.trim(response).indexOf("Success") > -1) {
                        setTimeout(function () {
                            location.href = "manageUsers.php";
                        }, 2000);

                        $.notify({
                            icon: "pe-7s-like2",
                            message: "Successfully Added!"
                        }, {
                                type: 'success',
                                timer: 200,
                                placement: {
                                    from: 'top',
                                    align: 'right'
                                }
                            });
                    }
                }
            });
    }

});

$(document).on('click', '.removeSubjPerm', function (event) {
    var subID = $(this).attr("dataSubID");
    var uEmail = $(".uEmail").val();

    var delStu = confirm("Remove Access ?");
    if (delStu == true) {
            $.ajax({
                type: "POST",
                url: "ajaxcalls.php",
                data: {
                    'action': 'deleteCourseReq',
                    'accessID': subID,
                    'rejAccess': uEmail
                },
                success: function (response) {
                    if ($.trim(response).indexOf("Success") > -1) {
                        setTimeout(function () {
                            location.reload();
                        }, 2000);

                        $.notify({
                            icon: "pe-7s-like2",
                            message: "Updated"
                        }, {
                                type: 'success',
                                timer: 200,
                                placement: {
                                    from: 'top',
                                    align: 'right'
                                }
                            });
                    }
                }
            });
    }
});


$(document).on('click', '.unameProfile', function (event) {
    var uname= $(this).text();
    window.location.href = "editUserPermis.php?uname="+uname;
});

$(document).on('click', '.assignSubjPerm', function (event) {
    var subID = $(this).attr('datasubid');
    var email = $(".uEmail").val();

    var grant = confirm("Grant access ?");
    if (grant == true) {
        $.ajax({
            type: "POST",
            url: "ajaxcalls.php",
            data: {
                'action': 'grantCourseAccess',
                'grantAccess': email,
                'accessID': subID
            },
            success: function (response) {
                if ($.trim(response).indexOf("success") > -1) {
                    setTimeout(function () {
                        location.reload();
                    }, 2000);

                    $.notify({
                        icon: "pe-7s-like2",
                        message: "Access Granted!"
                    }, {
                            type: 'success',
                            timer: 200,
                            placement: {
                                from: 'top',
                                align: 'right'
                            }
                        });
                } else {
                    $.notify({
                        icon: "pe-7s-help1",
                        message: "Error!"
                    }, {
                            type: 'danger',
                            timer: 200,
                            placement: {
                                from: 'top',
                                align: 'right'
                            }
                        });
                }
            }
        });
    }
});

//Course access select all
$('#select-all').click(function(event) {   
    if(this.checked) {
        $('[name="seltedStudsForAces"]').each(function() {
            this.checked = true;                        
        });
    } else {
        $('[name="seltedStudsForAces"]').each(function() {
            this.checked = false;                       
        });
    }
});


$(document).on('click', '.alterCurPageLink', function (event) {
    event.preventDefault();
    var linkurl = "downloadsSubCategories.php?subDownloadFol="+ $(this).attr('href');
    window.location = linkurl;
});
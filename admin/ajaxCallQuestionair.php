<?php include_once 'common/config.php'; ?>
<?php
  $mysqli = $mysqli;


  if($_POST['action'] == 'addQuestionair'){
    $question = urldecode($_POST['question']);
    $answer =  urldecode($_POST['answer']);
    $subject =  $_POST['subject'];
    $subjectValue =  $_POST['subjectLowercase'];
    $image = "";
    $qid= $_POST['time'];
    $subID = $_POST['subID'];

    $sql = "INSERT INTO questionair (qid,question,answer,company,subject,image) VALUES ('$qid','$question', '$answer','$subID', '$subject', '$image')";
    $result = $mysqli->query($sql);
    if($result){
        echo "success".",".$subject.",".$subID;
    }else{
        echo $result;
    }
  }
  
  if($_POST['action'] == 'updateQuestionair'){
    $question = urldecode($_POST['question']);
    $answer =  urldecode($_POST['answer']);
    //$subject =  $_POST['subject'];
    //$company =  $_POST['company'];
    $image = "";
    $qid= $_POST['qid'];

    $sql= "update questionair set question='$question', answer='$answer' where qid='$qid'";
    $result = $mysqli->query($sql);
    if($result){
        echo "sucess";
    }else{
        echo $result;
    }
  }

  if($_POST['action'] == 'deleteQuestionair'){
    $id = $_POST['id'];
    
    $sql = "DELETE FROM questionair WHERE number='$id'";
    $result = $mysqli->query($sql);
    if($result){
      echo "success";
    }else{
        echo "Failure";
    }

  }


  if($_POST['action'] == 'addCategory'){
    $cname = $_POST['cName'];
    $cValue = $_POST['cValue'];
    $cLink = $_POST['cLink'];
    $SubID = $_POST['subID'];
    $sql = "insert into subject(categories,link,value,SubID) values ('$cname','$cLink','$cValue','$SubID')";
    $result = $mysqli->query($sql);
    if($result){
      echo "success";
    }else{
        echo "Failure";
    }

  }

  if($_POST['action'] == 'addSubCategory'){
    $cname = $_POST['cName'];
    $cValue = $_POST['cValue'];
    $cLink = $_POST['cLink'];
    $subID = $_POST['subID'];
    $mainSubjectCode = $_POST['mainSubjectCode'];
    $sql = "insert into subfolders(qID,subjectID,subFolderName,subFolderValue,link) values ('$subID','$mainSubjectCode','$cname','$cValue','$cLink')";
    $result = $mysqli->query($sql);
    if($result){
      echo "success";
    }else{
        echo "Failure";
    }

  }

  if($_POST['action'] == 'editCategory'){
    $editedCategoryName = $_POST['editedCategoryName'];
    $editedCategoryNamesmallcase = $_POST['editedCategoryNamesmallcase'];
    $category =  $_POST['category'];
    //$link = $_POST['cLink'];
    $categorySmallCase = $_POST['categorySmallCase'];

    $sql= "update subject set categories='$editedCategoryName', value='$editedCategoryNamesmallcase' where categories='$category'";
    $result = $mysqli->query($sql);
    //$sql= "update questionair set subject='$editedCategoryName', company='$editedCategoryNamesmallcase' where subject='$category'";
    //$result = $mysqli->query($sql);
    if($result){
        echo $sql;
    }else{
        echo $result;
    }
  }


  if($_POST['action'] == 'editSubCategory'){
    $editedCategoryName = $_POST['editedCategoryName'];
    $editedCategoryNamesmallcase = $_POST['editedCategoryNamesmallcase'];
    $category =  $_POST['category'];
    $link = $_POST['cLink'];
    $categorySmallCase = $_POST['categorySmallCase'];
    $subID = $_POST['subID'];

    $sql= "update questionair set subject='$editedCategoryName' where company='$subID'";
    $result = $mysqli->query($sql);

    $sql= "update subfolders set subFolderName='$editedCategoryName', subFolderValue='$editedCategoryNamesmallcase', link = '$link' where qID='$subID'";
    $result = $mysqli->query($sql);
    if($result){
        echo 'success';
    }else{
        echo $result;
    }
  }

  if($_POST['action'] == 'deleteCategory'){
    $categoryName = $_POST['categoryName'];
    $categoryID = $_POST['categoryID'];
    $sql = "DELETE FROM subject WHERE value='$categoryName'";
    $result = $mysqli->query($sql);
    $sql = "DELETE FROM subfolders WHERE subjectID='$categoryID'";
    $result = $mysqli->query($sql);
    $sql = "DELETE FROM questionair WHERE subject='$categoryName'";
    $result = $mysqli->query($sql);
    if($result){
      echo "success";
    }else{
        echo "Failure";
    }

  }

  if($_POST['action'] == 'deleteSubCategory'){
    $subSategoryName = $_POST['subSategoryName'];
    $subCategoryID = $_POST['subCategoryID'];
    $sql = "DELETE FROM subfolders WHERE qID='$subCategoryID'";
    $result = $mysqli->query($sql);
    $sql = "DELETE FROM questionair WHERE company='$subCategoryID'";
    $result = $mysqli->query($sql);
    if($result){
      echo "success";
    }else{
        echo "Failure";
    }

  }

  
  if($_POST['action'] == 'addComment'){
    $comment = $_POST['comment'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $qid = $_POST['qid'];
    $qnumber = $_POST['qnumber'];
    $time = $_POST['time'];
    
    $sql = "insert into comments(qid,number,comment,username,userEmail,addedTime) values ('$qid','$qnumber','$comment','$username','$email','$time')";
    $result = $mysqli->query($sql);
    if($result){
      echo "success";
    }else{
        echo "Failure";
    }

  }


  if($_POST['action'] == 'deleteComment'){
    $qid = $_POST['qid'];
    $time = $_POST['time'];
    $sql = "DELETE FROM comments WHERE qid='$qid' and addedTime='$time'";
    $result = $mysqli->query($sql);
    if($result){
      echo "success";
    }else{
        echo "Failure";
    }

  }







?>

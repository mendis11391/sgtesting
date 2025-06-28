<?php
session_start();
if(!isset($_SESSION["adusername"])){
  header("Location: index.php");
}
?>

<?php include 'common/header.php' ?>
<?php
if(isset($_POST['upload']))
{
  $file = $_FILES['file']['name'];
  $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$folder="uploads/";
  $datetime = date_create()->format('Y-m-d');
  $comment = strip_tags($_POST['uploadcomments']);
  $flag = true;
	
  $target_file = $folder . basename($_FILES["file"]["name"]);


  $allowed =  array('zip','rar');
  $filename = $file;
  $ext = pathinfo($filename, PATHINFO_EXTENSION);
  if(!in_array($ext,$allowed) ) {
    $flag = false;
  }

	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	//$final_file=str_replace($new_file_name);
	if (file_exists($target_file)) {
    ?>
<script>
		alert('File already exists');
        window.location.href='upload.php?fail';
        </script>
        <?php
  }
  else{
    if($flag){
    $sql="INSERT INTO uploads(filename,size,created,comments) VALUES('$new_file_name','$new_size','$datetime','$comment')";
    $query = mysqli_query($mysqli,$sql);
    if(move_uploaded_file($file_loc,$folder.$new_file_name))
    {
      ?>
      <script>
          window.location.href='upload.php';
          </script>
      <?php
    }
  }
  else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='upload.php';
        </script>
		<?php
	}
  }
	
}
?>

<?php
function human_filesize($bytes, $decimals = 2) {
    $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . " " . @$size[$factor];
}

?>
<div class="col-md-12">
        <label class="successmsg"></label>
        <form class="form-inline" role="form" method="post" action="upload.php"  enctype="multipart/form-data">
          <div class="col-md-5">
            <div class="form-group" style="float: right;">
              <label>Comments: </label>
              <input type="text" name="uploadcomments" id="uploadcomments" class="form-control">
            </div>
          </div>   
          <div class="form-group">
            <input type="file" name="file" id="file" accept=".zip,.rar" class="form-control">
          </div>

          <button type="submit" class="btn btn-default upload" name="upload">Upload</button>
          <button type="button" class="btn btn-danger">X</button>
        </form>
        <label style="width: 100%;text-align: center;color:#5e0af3;">(Only .rar and .zip formats are supported)</label>
      </div>
   
    <br/>
    <br/>
    <br/>
<!-- Content Wrapper. Contains page content -->
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="content table-responsive table-full-width">
    
    <table class="table displayUploadedFiles">
    <thead>
      <tr>
        <th>Id</th>
        <th>File Name</th>
        <th>Size</th>
        <th>Date Uploaded</th>
        <th>Comments</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $sql="SELECT * FROM uploads ORDER BY id desc LIMIT 200";
      $result_set=mysqli_query($mysqli,$sql);
      while($row=mysqli_fetch_array($result_set))
      {
    ?>
      <tr>
      <td><?php echo $row['id'] ?></td>
      <td><?php echo $row['filename'] ?></td>
      <td><?php 
            if(file_exists('uploads/'.$row['filename']) == 1){
            echo human_filesize(filesize('uploads/'.$row['filename']));
          }else{
            echo "0 kB";
          }
          ?></td>
      <td><?php echo $row['created'] ?></td>
      <td><?php echo $row['comments'] ?></td>
      <td><a href="javascript:void(0)"><i class="fa fa-trash-o deletefile" aria-hidden="true"></i></a></td>
      </tr>
    <?php
      }
    ?>
    </tbody>
  </table>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>
      

<?php include 'common/footer.php' ?>
<?php include 'knockoutCode.php' ?>
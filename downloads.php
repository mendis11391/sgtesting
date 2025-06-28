<?php include 'header.php' ?>

<?php
if(!isset($_SESSION["username"])){
  echo '<script>window.location = "login.php";</script>';
}
?>

<?php
function human_filesize($bytes, $decimals = 2) {
    $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . " " . @$size[$factor];
}

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Downloads</h1>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->
  <section class="content">
    <div class="container">
      <br/>
      <table class="table displayfiles" id="downloadsTable">
      <thead style="background: #00bfff; color: #fff;">
        <tr>
          <th>File Name</th>
          <th>Size</th>
          <th>Uploaded On</th>
          <th class="hidden-xs">Comments</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $sql="SELECT * FROM uploads ORDER BY created DESC LIMIT 200";
        $result_set=mysqli_query($mysqli,$sql);
        while($row=mysqli_fetch_array($result_set))
        {
      ?>
       <tr>
	   <td><a href="admin/uploads/<?php echo $row['filename'] ?>" target="_blank"><?php echo $row['filename'] ?></a></td>
        <td>
          <?php 
            if(file_exists('admin/uploads/'.$row['filename']) == 1){
            echo human_filesize(filesize('admin/uploads/'.$row['filename']));
          }else{
            echo "0 kB";
          }
          ?>
        </td>
        
        
		<td><?php echo $row['created'] ?></td>
        <td class="hidden-xs"><?php echo $row['comments'] ?></td>
        </tr>
      <?php
        }
      ?>
      </tbody>
    </table>
  </div>
  </section>
  
</div><!-- /. Main content-wrapper -->
      

<?php include 'footer.php' ?>
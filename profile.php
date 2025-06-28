<?php include 'header.php'; ?>
<?php
if(!isset($_SESSION["username"])){
  echo '<script>window.location = "login.php";</script>';
}
?>

<!--container start-->
<!-- privacy -->
<div class="container privacy-terms">
  <div class="row">
    <div class="col-md-12">
    <div class="row ">
            <div class="price-two-container">
              <div class="col-md-12">
                <div class="pricing-table-two" style="visibility: visible;">
                  <div class="inner">
                    <div class="title">
                      Request access for a course:
                    </div>
                    <ul class="items" data-bind="foreach:userCourseAccessArray">
                      <li class="available" style="background-color: #ffe7e7;">
                        <div class="icon-holder">
                          <i class="fa fa-barcode text-success ">
                          </i>
                        </div>
                        <div class="desc">
                          <span class="text-black" data-bind="text:categories">
                            
                          </span>

                        </div>
						<a href="javascript:;" class="btn btn-primary subAccess" data-bind="attr: { dataSubLink: subID }">
                        Request Access
                      </a>
                      </li>
                      

                    </ul>
                  </div>
                </div>
              </div>
              
              

              <div class="clearfix">
              </div>
            </div>
			
			<div class="price-two-container">
              <div class="col-md-12">
                <div class="pricing-table-two" style="visibility: visible;">
                  <div class="inner">
                    <div class="title">
                      Curently you have access for:
                    </div>
                    <ul class="items" data-bind="foreach:userCourseHasAccessArray">
                      <li class="available">
                        <div class="icon-holder">
                          <i class="fa fa-barcode text-success ">
                          </i>
                        </div>
                        <div class="desc">
                          <span class="text-black" data-bind="text:categories">
                            
                          </span>

                        </div>
                      </li>
                      

                    </ul>
                  </div>
                </div>
              </div>
              
              

              <div class="clearfix">
              </div>
            </div>

          </div>
    </div>
  </div>
  <p> &nbsp; </p>
  <p> &nbsp; </p>
</div>
<!--container end-->
<?php include 'footer.php'; ?>
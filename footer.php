    <!-- Change password Modal -->
    <div aria-hidden="true" aria-labelledby="changePasswordModal" role="dialog" tabindex="-1" id="changePasswordModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Change Password</h4>
                </div>
                <div class="modal-body">
                
                <form method="post" id="changePasswordForm" class="form-signin wow fadeInUp">
                    <p class="bg-danger" id="changePasswordError" style="display:none; color:#222"></p>
                    <input type="password" class="form-control" placeholder="Current Password" id="currentPassword" style="border: 1px solid #878787;">
                    <input type="password" class="form-control" placeholder="New Password" id="newPassword" style="border: 1px solid #878787;">
                    <input type="password" class="form-control" placeholder="Confirm Password" id="confirmPassword" style="border: 1px solid #878787;">
                    <button id="changePasswordButton" class="btn btn-info btn-block" type="button">Change</button>
                </form>
                
                </div>
            </div>
        </div>
    </div>
    <!-- Change password modal -->
    
    <!-- Forgot password Modal -->
    <div aria-hidden="true" aria-labelledby="forgotPassword" role="dialog" tabindex="-1" id="forgotPassword" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Forgot Password ?</h4>
                </div>
                <div class="modal-body">
                    <p>Enter your e-mail address below to reset your password.</p>
                    <p class="bg-danger" id="ForgotPasswordError" style="display:none"></p>
                    <input type="text" placeholder="Email" id="ForgotPasswordUserEmail" autocomplete="off" class="form-control placeholder-no-fix">

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                    <button class="btn btn-primary" id="ForgotPasswordButton" type="button">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Forgot password Modal -->

    <!--footer start-->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-sm-6">
            <div class="text-footer wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">
              <h1>
                About S G Software Testing Institute
              </h1>
              <p>
                S G Software Testing Institute has been  Best Software Training Institute offering 100% Guaranteed JOB Placements, Cost-Effective, Quality & Real time Training courses on Software Testing (Manual & Automation tools), SQL ,WebServices and JAVA training facility in Bangalore. We have helped Freshers, Software Engineers, Working Professionals, business leaders, Corporate Companies and individuals incorporate the Knowledge in to their Minds through hands-on Real time training. The key to our students’ success comes from our small batch size classes and flexible schedules, One-to-one Tuitions giving students 100% JOB Assistance and time necessary to learn at their own Pace.

              </p>
            </div>
          </div>

          <div class="col-lg-6 col-sm-6 address wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
            <h1>
              contact info
            </h1>
            <address>
              <p><i class="fa fa-home pr-10"></i>#3, 2nd Floor, 7th main, above mallige child care centre vijayanagar, 8th F cross road, RPC layout, Attiguppe, Bengaluru, Karnataka 560040</p>
              <p>
              Landmark: Above Mallige Child Care Centre Vijayanagar</p>
              <p><i class="fa fa-mobile pr-10"></i>Mobile : +91 99867 54997 </p>
              <p><i class="fa fa-envelope pr-10"></i>Email :   <a href="javascript:;">hr@sgtestinginstitute.com</a></p>
            </address>
          </div>          
        </div>
      </div>
    </footer>
    <!-- footer end -->
    <!--small footer start -->
    <footer class="footer-small">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 pull-right">
                    <ul class="social-link-footer list-unstyled">
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".1s"><a href="javascript:void(0)" data-toggle="modal" data-target="#credits"><img src="img/credits.png" /></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".1s"><a href="https://www.facebook.com/SGTestingInstitute/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".2s"><a href="https://www.linkedin.com/in/sg-software-testing-institute-29599817a/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".5s"><a href="https://twitter.com/sgtestinginsti1" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                  <div class="copyright">
                    <p>&copy; <script>document.write(new Date().getFullYear())</script> - S G Software Testing Institute</p>

                  </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal -->
<div id="credits" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #00bfff;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Credits</h4>
      </div>
      <div class="modal-body">
        <h3>Customized and Developed by</h3>
        <p><a href="#">Prashanth - prashanth11391@gmail.com</a></p>
        <br/>
        <h4>Icons</h4>
        <div>Icons made by <a href="http://www.flaticon.com/authors/popcorns-arts" title="Popcorns Arts">Popcorns Arts</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>

        <br/>
      </div>
    </div>

  </div>
</div>

<!-- Wrong user name or not registered -->
  <div id="wronguname" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background:#00bfff;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login Error</h4>
      </div>
      <div class="modal-body">
      <div style="text-align: center; font-size: 15px;">
        <div>Wrong username / password</div>
        <div>or</div>
        <div>Admin has not yet approved your registration request</div>
        <hr>
            
      </div>
    </div>

  </div>
</div>



    <!--small footer end-->
<!-- js placed at the end of the document so the pages load faster
<script src="js/jquery.js">
</script>
-->
    <script src="js/jquery-1.8.3.min.js">
    </script>
    <script src="js/bootstrap.min.js">
    </script>
    <script defer src="js/jquery.flexslider.js">
    </script>
    <script type="text/javascript" src="assets/bxslider/jquery.bxslider.js">
    </script>
    <script src="js/wow.min.js">
    </script>
    <script src="js/jquery.easing.min.js">
    </script>
    <script src="js/knockout.js">
    </script>
    <script src="js/custom.js">
    </script>
    <script type="text/javascript" src="js/parallax-slider/jquery.cslider.js">
    </script>
    <script src="admin/assets/js/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/assets/js/datatables/dataTables.bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script>
      $(function () {
        $('#downloadsTable').DataTable({
            "order": [[ 2, "desc" ]],
        });
      });
    </script>
    <script type="text/javascript">
      $(function() {

        $('#da-slider').cslider({
          autoplay    : true,
          bgincrement : 100
        });

      });
    </script>



    <!--common script for all pages-->
    <script src="js/common-scripts.js">
    </script>

    <script type="text/javascript">
      jQuery(document).ready(function() {


        $('.bxslider1').bxSlider({
          minSlides: 5,
          maxSlides: 6,
          slideWidth: 360,
          slideMargin: 2,
          moveSlides: 1,
          responsive: true,
          nextSelector: '#slider-next',
          prevSelector: '#slider-prev',
          nextText: 'Onward →',
          prevText: '← Go back'
        });

      });


    </script>


    <script>
      $('a.info').tooltip();

      $(window).load(function() {
        $('.flexslider').flexslider({
          animation: "slide",
          start: function(slider) {
            $('body').removeClass('loading');
          }
        });
      });


      new WOW().init();
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&AMP;sensor=false"></script>
    <script>
      $(document).ready(function() {
        //Set the carousel options
        $('#quote-carousel').carousel({
          pause: true,
          interval: 4000,
        }
                                     );
      }
                       );

      //google map
      function initialize() {
        var myLatlng = new google.maps.LatLng(12.961650,77.538575);
        var mapOptions = {
          zoom: 16,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'Contact'
        }
                                           );
      }
      google.maps.event.addDomListener(window, 'load', initialize);



    </script>
    <script>
      <?php
          $my_array = array();
          $testi_array = array();
          $updatebatch_array;
          $updatebatchsingle_array = array();
          
          //Fetch update batch details multiline
          $updatebatch = $mysqli->query("SELECT batchdetails FROM newbatch where id=1");
          $row = $updatebatch->fetch_assoc();
          $updatebatch_array = $row['batchdetails'];


          //Fetch update batch details singleline
          $updatebatchsingle = $mysqli->query("SELECT batchdetails FROM newbatch where id=3");
          while($row = $updatebatchsingle->fetch_assoc())
          {
            $updatebatchsingle_array[] = $row;
          }

          $results = $mysqli->query("SELECT * FROM testimonials ORDER BY id desc limit 7");
          while($row = $results->fetch_assoc())
          {
            $my_array[] = $row;
          } 

          $testi = $mysqli->query("SELECT * FROM testimonials ORDER BY id desc");
          while($row = $testi->fetch_assoc())
          {
            $testi_array[] = $row;
          }


          $result = $mysqli->query("SELECT `displayCount` FROM banners ORDER BY id DESC LIMIT 1");
          $row1 = $result->fetch_assoc();
          $displayCountVal = $row1['displayCount'];

          $bannerArray = array();
          $res1 = $mysqli->query("SELECT `imgNum` FROM banners ORDER BY id ASC LIMIT ".$displayCountVal);
            while($row = $res1->fetch_assoc())
            {
              $bannerArray[] = $row;
            }

          $questions_array[] = "";
          /* Questionair */
          if(isset($_GET['sub'])){
            $sub = strip_tags($_GET['sub']);
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

            //Client side - Select all subjects which is newly created and which user doesn't have permission
            $userCourseAccessArray[] = "";
            if(isset($_GET['uname'])){
              $userEmail = strip_tags($_GET['uname']);
              $sql1 = "select * from subject where `subID` NOT IN (select `subID` from permission where userEmail = '$userEmail' AND `hasAccess` = 'Y')";
              $userCourseAccessArray = array();
              
              $result = $mysqli->query($sql1);
              
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  $userCourseAccessArray[] = $row;
                }
              }
            }

            //Client side - Listing of subjects which they have permission
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

            

          $singleQues_array[] = "";
          $comments_array[] = "";
          if(isset($_GET['qid'])){
            $qid = $_GET['qid'];
            $qnumber = $_GET['qnumber'];
            $sql1 = "SELECT * FROM questionair where qid='$qid' and number='$qnumber'";
            $singleQues_array = array();
            
            $result = $mysqli->query($sql1);
            
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $singleQues_array[] = $row;
              }
            }

            $sql1 = "SELECT * FROM comments where qid='$qid' and number='$qnumber' order by addedTime desc";
            $comments_array = array();
            
            $result = $mysqli->query($sql1);
            
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $comments_array[] = $row;
              }
            }

            }
            $singQuesAns = $singleQues_array;
            $comments = $comments_array;

          $data = $my_array;
          $data1 = $testi_array;
          $updatebatch = $updatebatch_array;
          $updatebatchsingle = $updatebatchsingle_array;
          $bannerArrayVal = $bannerArray;
      ?>
      var data = <?php echo json_encode($data); ?> ;
      var data1 = <?php echo json_encode($data1); ?> ;
      
      var updatebatch = <?php echo json_encode($updatebatch); ?> ;
      var updatebatchsingle = <?php echo json_encode($updatebatchsingle); ?> ;

      var questionair = <?php echo json_encode($questions_array); ?> ;
      var categories = <?php echo json_encode($categories); ?> ;
      var subcategories = <?php echo json_encode($subFolResult); ?> ;
      var singQuesAns = <?php echo json_encode($singQuesAns); ?> ;
      var comments = <?php echo json_encode($comments); ?> ;

      var userCourseAccessArray = <?php echo json_encode($userCourseAccessArray); ?>;
      var userCourseHasAccessArray = <?php echo json_encode($userCourseHasAccessArray); ?>;


      var bannersAll = <?php echo json_encode($bannerArrayVal); ?> ;


      // Knockout code starts here.
      function AppViewModel() {

        this.testimonial = ko.computed(function() {
            return data;
        });
        this.fulltestimonial = ko.observableArray(data1);

        this.questionair = ko.observableArray(questionair);
        this.categories = ko.observableArray(categories);
        this.quesAns = ko.observableArray(singQuesAns);
        this.comments = ko.observableArray(comments);
        this.subcategories = ko.observableArray(subcategories);

        this.userCourseAccessArray = ko.observableArray(userCourseAccessArray);
        this.userCourseHasAccessArray = ko.observableArray(userCourseHasAccessArray);

        this.updatebatch = ko.observable(updatebatch);
        this.updatebatchsingle = ko.observableArray(updatebatchsingle);

        this.banner = ko.observableArray(bannersAll);

        //Banner Caurosel

        var m = bannersAll;
        for(var i=0 ; i< m.length ; i++) {
          $('<div class="item"><img src="./img/banner/'+m[i]["imgNum"]+'"></div>').appendTo('.carousel-inner');
          $('<li data-target="#carousel-example-generic" data-slide-to="'+i+'"></li>').appendTo('.carousel-indicators')
        }
        $('.item').first().addClass('active');
        $('.carousel-indicators > li').first().addClass('active');
        $('#carousel-example-generic').carousel();

      }
      ko.applyBindings(new AppViewModel());

    </script>


</body>
</html>
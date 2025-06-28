<?php

include 'header.php'; 

?>

<div class="caroselSlider">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner"></div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
    </div>

    <div class="container">
      <div class="row mar-b-50">
        <div class="col-md-12">
          <div class="text-center feature-head wow fadeInDown">
            <h1 class="">
              welcome to SG Software Testing Institute
            </h1>

          </div>


          <div class="feature-box">
            <div class="col-md-4 col-sm-4 text-center wow fadeInUp">
              <div class="feature-box-heading">
                <em>
                <img src="img/1.svg" alt="" width="100" height="100">

                </em>
                <h4>
                  <b>Join US</b>
                </h4>
              </div>
              <p class="text-center">
                Join us to the earliest either to our regular batch or weekend batch. 
              </p>
            </div>
            <div class="col-md-4 col-sm-4 text-center wow fadeInUp">
              <div class="feature-box-heading">
                <em>
                  <img src="img/2.svg" alt="" width="100" height="100">
                </em>
                <h4>
                  <b>Work Hard</b>
                </h4>
              </div>
              <p class="text-center">
                Attend classes regularly and complete the assignments sincerely. 
              </p>
            </div>
            <div class="col-md-4 col-sm-4 text-center wow fadeInUp">
              <div class="feature-box-heading">
                <em>
                  <img src="img/3.svg" alt="" width="100" height="100">
                </em>
                <h4>
                  <b>Succeed</b>
                </h4>
              </div>
              <p class="text-center">
                Get interview calls from your dream companies.
              </p>
            </div>
          </div>

          <!--feature end-->
        </div>
      </div>
    </div>

    <div class="container">

      <div class="row mar-b-60">
        <div class="col-lg-6 col-md-7">
          <!--tab start-->
          <section class="tab wow fadeInLeft">
            <header class="panel-heading tab-bg-dark-navy-blue">
              <ul class="nav nav-tabs nav-justified ">
                <li class="">
                  <a data-toggle="tab" href="#events">
                    Upcoming Batches
                  </a>
                </li>
              </ul>
            </header>
            <div class="panel-body">
              <div class="tab-content tasi-tab">
                <div id="events" class="tab-pane fade in active">
                  <article class="media">
                    
                    <div class="col-md-12" style="text-align:center" >
                        <div data-bind="html: updatebatch"></div>
                    </div>
                  </article>
                  
                </div>
                <div id="notice-board" class="tab-pane fade">
                  <p>
                    
                  </p>
                  
                </div>
              </div>
            </div>
          </section>
          <!--tab end-->
        </div>
        <div class="col-lg-6 col-md-5">
          <!--testimonial start-->
          <div class="about-testimonial boxed-style about-flexslider ">
            <section class="slider wow fadeInRight">
              <div class="flexslider">
                <ul class="slides about-flex-slides" data-bind="foreach: testimonial">
                  <li>
                    <div class="about-testimonial-image ">
                    <!-- ko if: gender == "male" -->
                      <img alt="" src="img/testimonialpic.png">
                    <!-- /ko -->
                    <!-- ko if: gender == "female" -->
                      <img alt="" src="img/testimonialpic1.png">
                    <!-- /ko -->
                    </div>
                    <a class="about-testimonial-author" href="javascript:void(0)" data-bind="text: name">
                      Russel Reagan
                    </a>
                    <span class="about-testimonial-company">
                      &nbsp;
                    </span>
                    <div class="about-testimonial-content">
                      <p class="about-testimonial-quote" data-bind="text: content">
                        This is the best place where we can learn and explore yourself. Here we can find track where we missed before....
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
            </section>
          </div>
          <!--testimonial end-->
        </div>
        </div>
      </div>
    </div>
    </div>
  <!--container end-->
    
<?php include 'footer.php'; ?>

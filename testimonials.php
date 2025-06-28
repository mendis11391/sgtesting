<?php include 'header.php'; ?>
    
    <!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-xs-8 testimonialheader">
                    <h1>
              Testimonials
			  
            </h1>
                </div>
                <div class="col-lg-8 col-sm-4 col-xs-4">
			            <!--<a href="addtestimonials.php" class="btn btn-primary pull-right"> Add Testimonial</a>-->
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <div class="container"  data-bind="foreach: fulltestimonial">
    <!--testimonial start-->
    <div class="about-testimonial boxed-style about-flexslider col-md-6">
      <section class="slider">
        <div class="flexslider">
          <ul class="slides about-flex-slides">
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
                <p class="about-testimonial-quote" data-bind="text: content" style="min-height:100px">
                  This is the best place where we can learn and explore yourself. Here we can find track where we missed before....
                </p>
              </div>
            </li>
          </ul>
        </div>
		
		
      </section>
    </div>
    </div>
    <br/>

<?php include 'footer.php'; ?>
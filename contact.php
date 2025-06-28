<?php include 'header.php'; ?>

    <!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Contact</h1>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->


    <!--container start-->
    <div class="container">


      <div class="row">
        <div class="col-lg-4 col-sm-4 address">
            <!--google map start-->
            <div class="contact-map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.160591038734!2d77.53641571482198!3d12.96157379086245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae3e74d66e2d4b%3A0xae7b598e23c3a26f!2sSG+Testing+Institute!5e0!3m2!1sen!2sin!4v1468919133455" width="330" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

            </div>
            <!--google map end-->
        </div>
        <div class="col-lg-4 col-sm-4 address">
        <p><i class="fa fa-home pr-10"></i>#3, 2nd Floor, 7th main, above Mallige Child Care Centre Vijayanagar, 8th F cross road, RPC layout, Attiguppe, Bengaluru, Karnataka 560040</p>
              <p>
              Landmark: Above Mallige Child Care Centre Vijayanagar</p>
              <p><i class="fa fa-mobile pr-10"></i>Mobile : +91 9986754997 </p>
              <p><i class="fa fa-envelope pr-10"></i>Email :   <a href="javascript:void(0);">hr@sgtestinginstitute.com</a></p>
        </div>
        <div class="col-lg-4 col-sm-4 address">
          <h4>
            Drop us a line
          </h4>
          <div class="contact-form">
            <form role="form" method="post" action="" id="#form">
              <div class="form-group">
                <label for="name">
                  Name <span style="color:#ff6666">*<span>
                </label>
                <input type="text" placeholder="" name="fname" id="fname" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="email">
                  Email <span style="color:#ff6666">*<span>
                </label>
                <input type="text" placeholder="" name="email" id="email" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="phone">
                  Phone 
                </label>
                <input type="text" name="phone" id="phone" class="form-control" maxlength="10" pattern="\d*">
              </div>
              <div class="form-group">
                <label for="phone">
                  Message <span style="color:#ff6666">*<span>
                </label>
                <textarea placeholder="Message" rows="5" maxlength="500" name="message" id="message" class="form-control" required></textarea>
              </div>
              <div class="bg-danger">
                <label id="msg" style="display: none; border: 1px solid #32ff32; color: #006600; padding: 12px;"></label>
                <label id="errmsg" style="display: none; border: 1px solid #f2dede; color: #222; padding: 12px;"></label>
              </div>
              <button class="btn btn-info" type="submit" id="submitcontactform">
                Submit
              </button>
            </form>

          </div>
        </div>
      </div>

    </div>
    <!--container end-->

<?php include 'footer.php'; ?>

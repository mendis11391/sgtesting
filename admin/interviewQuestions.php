<?php
   session_start();
   if(!isset($_SESSION["adusername"])){
     header("Location: index.php");
   }
   ?>
<?php include 'common/header.php' ?>
<div class="content-wrapper pagenme" data-page="intQues">
   <div class="col-md-12" style="background: #d9d9d9; margin-bottom: 15px;">
      <h3 class="subCatogName" style="font-weight: bold;">Categories > <?php echo $_GET['Subject'] ?></h3>
      <h3 class="subCatoID" style="display:none;"><?php echo $_GET['sub'] ?></h3>
   </div>
   <section class="content">
      <div class="col-md-12" style="padding: 10px 50px; background: #fff;margin-bottom: 30px;">
         <a class="btn btn-success" href="interviewQuestionsAdd.php?sub=<?php echo $_GET['Subject']?><?php echo "&subID=".$_GET['sub'] ?>">Add Question</a>
      </div>
      <div data-bind="visible: questionair().length <= 0">
         <div class="row" style="padding:50px 0 0 30px">
            <h3>No data added yet</h3>
         </div>
      </div>
      <div class="col-md-2">
         <div class="form-group displayPerPageDiv">
            <label for="dispNumber">Show</label>
            <select class="form-control" id="dispNumber">
               <option>5</option>
               <option>10</option>
               <option>50</option>
               <option>70</option>
               <option>100</option>
            </select>
         </div>
      </div>
      <input type='hidden' id='current_page' />
      <input type='hidden' id='show_per_page' />
      <input type='hidden' id='shows_per_page' value="5"/>
      <div class="col-md-3" style="float:right;">
         <Label>Search: <input type="text" class="form-control questionSearchValue"></label>
      </div>
      <div class="container-fluid restrictCopy" id="jar" style="display:none">
         <div class="col-md-12 questionsPage" data-bind="foreach:questionair"  style="padding-top: 20px; border: 1px dashed #beb7b7;">
            <div class="col-md-12 questionsDiv content" style="padding:25px; border-bottom: 1px solid #c4c4c4;" data-bind="if:questionair">
               <div class="col-md-10">
                  <div class="col-md-1">
                     <span style="font-weight:bold;" data-bind="text: ($index() + 1)"></span>
                  </div>
                  <div class="col-md-11">
                     <a href="javascript:void(0)" class="ques"><span class="question" data-bind="html:question"></span></a>
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="col-md-2"><a href="javascript:void(0)"><i class="fa fa-pencil editQuestion" data-bind="attr: { 'data-qid': qid, 'data-index': ($index() + 1) }" aria-hidden="true"></i></a></div>
                  <div class="col-md-6"><a href="javascript:void(0)" data-bind="attr: {dataId: number }"><i class="fa fa-trash-o deleteQuestion" aria-hidden="true"></i></a></div>
               </div>
               <br/>
               <div class="col-md-12 answer" style="display:none;">
                  <span data-bind="html:answer"></span>
                  <div class="row"><img style="width:100%;" data-bind="attr:{src: image}"/></div>
               </div>
            </div>
         </div>
         <div class="col-md-12 paginationContainer" style="padding: 20px;">
            <div id='page_navigation' style="text-align: center;" ></div>
            <ul class="pagination"></ul>
         </div>
      </div>
   </section>
</div>
<?php include 'common/footer.php' ?>
<?php include 'knockoutCode.php' ?>
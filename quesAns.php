<?php include 'header.php' ?>

<div class="container">
    <section class="content">
		<div class="col-md-12"  data-bind="foreach:quesAns">
			<h2 style="text-align: center;text-decoration: underline;" data-bind="text:subject"></h2>
		</div>
		<div class="container-fluid restrictCopy" data-bind="foreach:quesAns">
            <div class="individualQues">
				<h3 data-bind="html:question">Question goes here</h3>
			</div>
			<div class="col-md-12 answer">
				<span data-bind="html:answer">Answer goes here</span>
			</div>
		</div>
		<br/>
		<hr>
		<div class="col-md-12 commentsSection">
			<div id="commentsSummernoteEditor"></div>
			<div class="getQid dispNone"><?php echo $_GET['qid']; ?></div>
			<div class="getQnumber dispNone"><?php echo $_GET['qnumber']; ?></div>
			<a class="btn btn-primary postComment">Post Comment</a>
		</div>
		<div class="col-md-12 p-t-20">
			<h3 style="font-weight: bold">Comments:</h3>
			<hr/>
			<div data-bind="foreach:comments">
				<div class="comment">
					<div class="col-md-12 commentInfo">
					<div class="col-md-4">
						<label style="color: #b9b9b9;">Added By: <span style="color: #000;" data-bind="text:username"></span></label>
					</div>
					<div class="col-md-4">
						<label style="color: #b9b9b9;">Email: <span style="color: #000;" data-bind="text:userEmail" class="commenterEmail"></span></label>
					</div>
					<div class="col-md-3">
						<label style="color: #b9b9b9;">Date: <span class="commentDate" style="color: #000;" data-bind="text:addedTime"></span></label>
					</div>
					<div class="col-md-1">
					<a href="javascript:;" data-bind="attr: { dataCommentTime: addedTime, dataDeleteQid: qid }" class="deleteComment" style="display:none;"><span class="glyphicon glyphicon-trash"></span></a>
					</div>
					</div>
					<span class="allComments" data-bind="html:comment"></span>
				</div>
			</div>
            <div class="row"  data-bind="visible: comments().length <= 0" style="padding:0px 0 75px 30px">
                <h3>No comment(s) added yet</h3>
            </div>
		</div>
    </section>
</div>

<?php include 'footer.php' ?>
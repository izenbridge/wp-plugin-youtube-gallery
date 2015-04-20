<div class="container"><?php
if(isset($icw_message)){?>
	<div class='row  clearfix'>
		<div class='col-md-12'>
    <div class="alert alert-info">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?=$icw_message?>

    </div></div></div>

<?php }?>
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
				<div class="col-md-4 column">
					<h3>
						Add a single Video 
					</h3>
					<form action="admin.php?page=icw_lm_plugin"  method="post">
						<div class="form-group">
							 <label for="txtYouTubeVideoId">Youtube Video Id</label>
 							<input class="form-control" id="txtYouTubeVideoId" name="txtYouTubeVideoId" type="text" required="required" placeholder="" value="2cN0xcjZEI4"/>
								<p class="help-block">
								<i class="fa fa-info-circle fa-lg pull-left "></i>
								If the video url is https://www.youtube.com/watch?v=2cN0xcjZEI4 then the id should be the value after v= which in this example us 2cN0xcjZEI4
							</p>
						</div>
						<div class="checkbox">
							 <label><input type="checkbox" /> Check me out</label>
						</div> <button type="submit" class="btn btn-success">Submit</button>
						 <input type="hidden" name="action" value="add_single_video">
			<a class='btn btn-warning' href='https://www.youtube.com/watch?v=$curVideo'  target='_blank' ><i class='fa fa-youtube fa-lg'></i> Watch my You tube video</a>
					</form>
				</div>
				<div class="col-md-4 column">
					<h3>
						Add a complete channel
					</h3>
					<form role="form">
						<div class="form-group">
							 <label for="video_id">Video Id</label><input class="form-control" id="video_id" type="input" placeholder="Youtube video id" readonly/>
						</div>
						<div class="checkbox">
							 <label><input type="checkbox" readonly /> Check me out</label>
						</div> 
						<a class="btn btn-danger" href='javascript:void()' ><i class='fa fa-exclamation-triangle fa-lg'></i> Submit (Disabled)</a>

					</form>
					<hr class="divider">
				</div>
				<div class="col-md-4 column">
					<h3 class="text-left">
						Help.
					</h3>
					<dl>
						<dt>
							<i class="fa fa-star fa-lg pull-left "></i> Single Video
								
						</dt>
						<dd>
							<i class="fa fa-square-o fa-sm pull-left "></i> 
								Enter the video id of a single video on youtube to add a single video. <br>
							<i class="fa fa-square-o fa-sm pull-left "></i> 
								The playlist name is optional.<br>
							<i class="fa fa-square-o fa-sm pull-left "></i>
								If left empty video shall be added to the last playlist created.<br>
							<i class="fa fa-square-o fa-sm pull-left "></i> 
								Default Playlist is created whene this plugin is installed.<br>
							<i class="fa fa-square-o fa-sm pull-left "></i> 
								If the video url is <br>https://www.youtube.com/watch?v=2cN0xcjZEI4 then the id should 
								be the value after v= which in this example us 2cN0xcjZEI4 
						</dd>
							<hr class="divider">
						<dt>
							<i class="fa fa-star fa-lg pull-left "></i> Youtube Channel
								
						</dt>
						<dd>
							<i class="fa fa-square-o fa-sm pull-left "></i> 
								The PRO vesrion shall pull in details of complete channel of youtube. <br>
						</dd>

					</dl>

				</div>
			</div>

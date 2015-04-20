<?php

global $settings;


?><div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
				<div class="col-md-4 column">
					<h3>
						Settings 
					</h3>
					<form action="admin.php?page=icw_lm_plugin"  method="post">
						<div class="form-group">
								<i class="fa fa-info-circle fa-lg pull-left "></i>
								If the video url is https://www.youtube.com/watch?v=2cN0xcjZEI4 then the id should be the value after v= which in this example us 2cN0xcjZEI4
							</p>
						</div>
<?php
	foreach ($settings as $category=>$aryData){
		//$aryCategory[]=$name;
		echo "<b><u>$category</u></b><br>"; 
		foreach ($aryData as $key=>$Val){
 
			//echo "$key: <input type='text' name='$key' value='$Val'><br>";
			echo "<div class='form-group'><div class='input-group'>
				  <span class='input-group-addon' id='basic-addon1'>
				<label for='$key'>$category::$key</label></span>
				  <input class='form-control' id='$category[$key]' name='$category[$key]' type='text' required='required' value='$Val'/>
			</div></div>";

		}	

	}	

?>
						 <input type="hidden" name="action" value="save_settings">
<button type='submit' class='btn btn-success'>Save Srttings</button>
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
							<i class="fa fa-star fa-lg pull-left "></i> Short Codes
								
						</dt>
						<div class="form-group">
								<i class="fa fa-info-circle fa-lg pull-left "></i>
								Short codes are easy way to embed video into an article (page or a post), one can embed more than one video into a single page or a post.
							</p>
						</div>

						<dd>
							<i class="fa fa-square-o fa-sm pull-left "></i> 
								<span class="text-primary"><b>[icw_video video='1']</b></span><br>  Shall render the video id number 1 (your internal id) <br>
							<i class="fa fa-square-o fa-sm pull-left "></i> 
								<span class="text-primary"><b>[icw_video list='1']</b></span><br>  Shall render the entire playlist <br>
						</dd>
					</dl>
				</div>
			</div>

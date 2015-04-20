<div class='container' style='background: ffccc0'>
<form method="POST">
<?php
if(isset($icw_message)){?>
	<div class='row form-group'>
		<div class='col-md-12'>
    <div class="alert alert-info">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?=$icw_message?>

    </div></div></div>

<?php }?>
	<div class='row form-group'>
		<div class='col-md-12'>
			<br><input class='form-control' id='action' name='action' type='hidden'  value='save_single_video'/>
				<input class='form-control' id='video[you_id]' name='video[you_id]' type='hidden'  value='<?=$videoId?>'/>
			<div class='input-group'>
				  <span class='input-group-addon' id='basic-addon1'><i class='fa fa-youtube fa-lg'></i><label for='video[name]'> Title</label></span>
				  <input class='form-control' id='video[name]' name='video[name]' type='text' required='required' value='<?=$v['title']?>'/>
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='col-md-6'>
		<div class='input-group'>
				  <span class='input-group-addon' id='basic-addon1'><i class='fa fa-list fa-lg'></i><label for='video[list]'> Playlist</label></span>
				  <input class='form-control' id='video[list]' name='video[list]' type='text' required='required' value='Default'/>
				</div>
				<p class='help-block'>
				<i class='fa fa-info-circle fa-lg pull-left '></i>
				This is your internal playlist name and is not same as a youtube playlist.
				</p>
	

		
			<div class='btn-group'>
			  <button type='button' class='btn btn-success'>Play List</button>
			  <button type='button' class='btn btn-success dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
				<span class='caret'></span>
				<span class='sr-only'>Toggle Dropdown</span>
			  </button>
			  <ul class='dropdown-menu' role='menu'>
				<li><a href='#'><i class='fa fa-list  pull-left fa-border'> </i>Default</a></li>
				<li><a href='#'>Another action</a></li>
				<li><a href='#'>Something else here</a></li>
				<li class='divider'></li>
				<li><a href='#'>Separated link</a></li>
			  </ul>
			</div>


		 <div class='form-group'>
<?php
$settings = array('media_buttons' => false, 'textarea_name' => 'txtDescription');
wp_editor($v['description'], 'txtDescription', $settings)
;?>

			</div>
		 <div class='form-group'>
  				<i class='fa fa-tags  pull-left fa-border'></i><label for='txtTags'>Tags</label>
				  <textarea class='form-control' rows='5' id='txtTags' name='txtTags'><?=$aryTag?></textarea>
					<p class='help-block'>
					<i class='fa fa-info-circle fa-lg pull-left '></i>
					Enter a comma saparated list of tags you wish to associate with this video.							
			</div>
	<i class='fa fa-quote-right  pull-right fa-border'></i>
			<br>
			<button type='submit' class='btn btn-success'><i class="fa fa-youtube fa-lg"></i> Add Video Details</button>
				
		</div>

		<div class='col-md-6'>
		<div class='form-group'><label >Video Preview</label></div>
		<?php include_once("tabs.php")?>
		</div>


		</div> <!-- end row -->

</form>
</div> <!-- end container -->

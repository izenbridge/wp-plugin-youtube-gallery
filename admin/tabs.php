<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#Video" aria-controls="Video" role="tab" data-toggle="tab">Video</a></li>
    <li role="presentation"><a href="#Comments" aria-controls="Comments" role="tab" data-toggle="tab">Comments</a></li>
    <li role="presentation"><a href="#Statistics" aria-controls="Statistics" role="tab" data-toggle="tab">Statistics</a></li>
    <li role="presentation"><a href="#Thumbnail" aria-controls="Thumbnail" role="tab" data-toggle="tab">Thumbnail</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="Video"><br><?php include_once("tab_video.php")?></div>
    <div role="tabpanel" class="tab-pane fade" id="Comments"><br><?php parseXml($result['entry']['gd$comments']['gd$feedLink']['href']);?>
</div>
    <div role="tabpanel" class="tab-pane fade" id="Statistics"><br><?php include_once("tab_stats.php")?></div>
    <div role="tabpanel" class="tab-pane fade" id="Thumbnail"><?php include_once("tab_thumb.php")?></div>
  </div>

</div>

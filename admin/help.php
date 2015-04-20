<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#Reference" aria-controls="Reference" role="tab" data-toggle="tab">Reference</a></li>
    <li role="presentation"><a href="#Tutorial" aria-controls="Tutorial" role="tab" data-toggle="tab">Tutorial</a></li>
    <li role="presentation"><a href="#Statistics" aria-controls="Statistics" role="tab" data-toggle="tab">Statistics</a></li>
    <li role="presentation"><a href="#Thumbnail" aria-controls="Thumbnail" role="tab" data-toggle="tab">Thumbnail</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="Reference"><br><?php include_once("tab_Reference.php")?></div>
    <div role="tabpanel" class="tab-pane fade" id="Tutorial"><br><?php include_once("tab_helpTutorial.php");?></div>
    <div role="tabpanel" class="tab-pane fade" id="Statistics"><br><?php include_once("tab_stats.php")?></div>
    <div role="tabpanel" class="tab-pane fade" id="Thumbnail"><?php include_once("tab_thumb.php")?></div>
  </div>

</div>

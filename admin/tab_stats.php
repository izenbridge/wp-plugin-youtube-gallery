<input class='form-control' id='video[viewCount]' name='video[viewCount]' type='hidden' value="<?=$v['viewCount']?>"/>
		views: <span class='badge badge-success'><?=$v['viewCount']?></span>, Likes: <span class='badge'><?=$v['likes']?></span>, Length: <span class='badge badge-warning'><?=$v['length']?></span>, Published: <span class='badge badge-warning'><?=$v['PublishedFormated']?></span><br><br>
	<div class='form-group'><label >Author</label></div>
	author: <?=$v['authorName']?><br>
	AuthorAtom: <?=$v['authorAtomUri']?><br><br>
	Recorded : $recorded, Rating Avarage: <span class='badge badge-success'><?=$v['googleRatingAvg']?></span> (Rating Max : <span class='badge'><?=$v['googleRatingMax']?></span>, Rating Min :<span class='badge'><?=$v['googleRatingMin']?></span>)

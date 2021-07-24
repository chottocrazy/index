<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$how = (string)filter_input(INPUT_POST, 'how');
$what = (string)filter_input(INPUT_POST, 'what');
$date = (string)filter_input(INPUT_POST, 'date');
$info = (string)filter_input(INPUT_POST, 'info');
$info_more = (string)filter_input(INPUT_POST, 'info_more');
$pro = (string)filter_input(INPUT_POST, 'pro');
$pro_more = (string)filter_input(INPUT_POST, 'pro_more');
$link = (string)filter_input(INPUT_POST, 'link');
$url = (string)filter_input(INPUT_POST, 'url');
$id = (string)filter_input(INPUT_POST, 'id');

$fp = fopen('submit.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$how, $what, $date, $info, $info_more, $pro, $pro_more, $link, $url, $id]);
    rewind($fp);
}

flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);

?>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>大 chotto crazy | 実現したいことを実現する</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="http://creative-community.pe.hu/coding/submit/org/org.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
$("#").load("");
})
</script>
<link rel="stylesheet" href="style.css" />
<style type="text/css">
#header b,
.hold:before,
.on {
  font-family:"Orchard";
}
.hold, .dai {
  color:#eee;
  letter-spacing: 0rem;
}
.hold:before {
  content:"Can Do";
  color:#555;
  font-style:italic;
  position:absolute;
  font-weight: 555;
  margin-top:0.5rem;
  margin-left:-0.5rem;
}
.on {
  padding-left:0.75rem;
}
.on,
.hold:before,
.dai:before,
.dai:after {
  -webkit-text-stroke: 0.001rem #FFF;
  text-stroke: 0.001rem #FFF;
}
.by {
  font-size:0.75rem;
  font-family:"MS Mincho", serif;
}
.by:after {
  content:"∧°┐";
  font-size:125%;
  margin-left:0.5rem;
  font-style: normal;
}
body {background:#eee;}
.org {background:#fff;}
.reset-button {background:#fff;}
</style>
</head>
<body>
<div id="header">
<a href="/"><span class="we">We</span> <span class="hold">are</span> <span class="dai">the</span> <span class="on"><b>chotto crazy</b></span></a>
<a><b>Can☆Do</b></a>
</div>
<div id="programs">
<div id="logo"><span class="we">We</span> <span class="hold">are</span> <span class="dai">the</span><br/>
<p id="message" class="center"><span class="by">creative, community space</span></p>
<i class="on">Chotto Crazy</i>
</div>
<div id="about">
</div>
<form id="information">
<div class="org">
<p><span>ここに 大 chotto crazy に集まった、ちょっとクレイジーな素晴らしいアイデアや創造的チャレンジを紹介します。</span></p>
<div class="search-box how">
<ul>
<li>
<input type="radio" name="how" value="think" id="think">
<label for="think" class="label">思考</label></li>
<li>
<input type="radio" name="how" value="organize" id="organize">
<label for="organize" class="label">整理</label></li>
<li>
<input type="radio" name="how" value="communication" id="communication">
<label for="communication" class="label">交流</label></li>
<li>
<input type="radio" name="how" value="create" id="create">
<label for="create" class="label">制作</label></li>
<li>
<input type="radio" name="how" value="refresh" id="refresh">
<label for="refresh" class="label">休憩</label></li>
<li>
<div class="reset">
<input type="reset" name="reset" value="全部見る" class="reset-button">
</div>
</li>
</ul>
</div>
</div>
</form>
<div class="list">
<ul>
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li class="list_item list_toggle" data-how="<?=h($row[0])?>">
<p class="what"><?=h($row[1])?></p>
<span class="date"><?=h($row[3])?></span>
</li>

<li class="list_item list_toggle" data-how="<?=h($row[0])?>" onclick="obj=document.getElementById('<?=h($row[7])?>').style; obj.display=(obj.display=='none')?'block':'none';">
<p class="what"><?=h($row[0])?></p>
<div id="<?=h($row[7])?>" class="more" style="display:none;">
<span class="date"><?=h($row[1])?></span>
<p class="what"><?=h($row[0])?></p>
<p class="info" style="display:<?=h($row[2])?>;"><?=h($row[3])?></p>
<p class="info" style="display:<?=h($row[4])?>;"><?=h($row[5])?></p>
<p class="link">
  <a href="<?=h($row[6])?>" target="_blank" rel="noopener noreferrer">Link</a>
</p>
</div>
</li>

<?php endforeach; ?>
<?php else: ?>
<li class="list_item list_toggle" data-how="<?=h($row[0])?>" onclick="obj=document.getElementById('id').style; obj.display=(obj.display=='none')?'block':'none';">
<p class="what">実現したいこと</p>
<div id="id" class="more" style="display:none;">
<span class="date">名前</span>
<p class="what">実現したいこと</p>
<p class="info" style="display:;">詳細</p>
<p class="info" style="display:;">自己紹介</p>
<p class="link">
  <a>Link</a>
</p>
</div>
</li>
<?php endif; ?>

</ul>
</div>
</div>
<p id="marquee"><span>ここに 大 chotto crazy に集まった、ちょっとクレイジーな素晴らしいアイデアや創造的チャレンジを紹介します。</span></p>
</body>
</html>

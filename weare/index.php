<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$how = (string)filter_input(INPUT_POST, 'how');
$what = (string)filter_input(INPUT_POST, 'what');
$year = (string)filter_input(INPUT_POST, 'year');
$date = (string)filter_input(INPUT_POST, 'date');
$info = (string)filter_input(INPUT_POST, 'info');
$state = (string)filter_input(INPUT_POST, 'state');
$more = (string)filter_input(INPUT_POST, 'more');

$fp = fopen('past.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$how, $what, $year, $date, $info, $state, $more]);
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
<title>大 chotto crazy by Pehu</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="http://creative-community.pe.hu/coding/js/org.js"></script>
<link rel="stylesheet" href="/css/about.css" />
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
  content:"hold";
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
<a><b>2017 - 2019</b></a>
</div>
<div id="programs">
<div id="logo"><span class="we">We</span> <span class="hold">are</span> <span class="dai">the</span><br/>
<p id="message" class="center"><span class="by">creative, community space</span></p>
<i class="on">Chotto Crazy</i>
</div>
<form id="information">
<div class="org">

<div class="search-box year">
<h2 class="search-box_label">Year</h2>
<ul>
<li>
<input type="radio" name="year" value="one" id="one">
<label for="one" class="label">2017</label></li>
<li>
<input type="radio" name="year" value="two" id="two">
<label for="two" class="label">2018</label></li>
<li>
<input type="radio" name="year" value="three" id="three">
<label for="three" class="label">2019</label></li>
</ul>
</div>

<div class="search-box how">
<h2 class="search-box_label">How to</h2>
<ul>
<li>
<input type="radio" name="how" value="max" id="max">
<label for="max" class="label">展覧会・アトラクション</label></li>
<li>
<input type="radio" name="how" value="oneday" id="oneday">
<label for="oneday" class="label">限定開催</label></li>
<li>
<input type="radio" name="how" value="series" id="series">
<label for="series" class="label">定例会</label></li>
<li>
<input type="radio" name="how" value="online" id="online">
<label for="online" class="label">オンライン</label></li>
</ul>
</div>
<div class="reset">
<input type="reset" name="reset" value="RESET" class="reset-button">
</div>
</div>
</form>
<div class="list">
<ul>
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li id="<?=h($row[5])?>" class="list_item list_toggle" data-year="<?=h($row[2])?>" data-how="<?=h($row[0])?>" data-state="<?=h($row[5])?>">
<p class="what"><?=h($row[1])?></p>
<span class="date"><?=h($row[3])?></span>
<div class="info">
<span><?=h($row[4])?></span>
<a class="<?=h($row[6])?>" href="<?=h($row[6])?>" target="_blank"></a>
</div>
</li>
<?php endforeach; ?>
<?php else: ?>
<li id="<?=h($row[5])?>" class="list_item list_toggle" data-year="<?=h($row[2])?>" data-how="<?=h($row[0])?>" data-state="<?=h($row[5])?>">
<p class="what">プログラム名 row[1]</p>
<span class="date">0000.00.00 row[3]</span>
<div class="info">
<span>説明 row[4]</span>
<a class="<?=h($row[6])?>" href="<?=h($row[6])?>" target="_blank"></a>
</div>
</li>
<?php endif; ?>
</ul>
</div>
</div>
<p id="marquee"><span>大 chotto crazy を開始する以前に、ペフが実現したちょっとクレイジーなアイデアやチャレンジを紹介します。</span></p>
</body>
</html>

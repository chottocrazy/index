<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$how = (string)filter_input(INPUT_POST, 'how');
$what = (string)filter_input(INPUT_POST, 'what');
$year = (string)filter_input(INPUT_POST, 'year');
$date = (string)filter_input(INPUT_POST, 'date');
$info = (string)filter_input(INPUT_POST, 'info');
$tag = (string)filter_input(INPUT_POST, 'tag');
$percent = (string)filter_input(INPUT_POST, 'percent');
$state = (string)filter_input(INPUT_POST, 'state');
$about = (string)filter_input(INPUT_POST, 'about');
$more = (string)filter_input(INPUT_POST, 'more');

$fp = fopen('programs.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$how, $what, $year, $date, $info, $tag, $percent, $state, $about, $more]);
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
<title>公式プログラム一覧 | 大 chotto crazy</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/js/programs.js"></script>
<link rel="stylesheet" href="/css/about.css" />
<style type="text/css">
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
</style>
</head>
<body>
<div id="header">
<a href="/"><span class="we">We</span> <span class="hold">are</span> <span class="dai">the</span> <span class="on"><b>chotto crazy</b></span></a>
<a>2020 - 2021</a>
</div>
<div id="programs">
<div id="logo"><span class="dai">the</span><br/>
<p id="message" class="center">公式プログラム一覧</p>
<i class="on">Chotto Crazy Programs</i>
</div>
<form id="information">
<div class="org">
<div class="search-box year">
<h2 class="search-box_label">採用年度</h2>
<ul>
<li>
<input type="radio" name="year" value="first" id="first">
<label for="first" class="label">2020</label></li>
<li>
<input type="radio" name="year" value="second" id="second">
<label for="second" class="label">2021</label></li>
</ul>
</div>
<div class="search-box how">
<h2 class="search-box_label">実現方法</h2>
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
<div class="search-box state">
<h2 class="search-box_label">状態</h2>
<ul>
<li>
<input type="radio" name="state" value="tobe" id="tobe">
<label for="tobe" class="label">告知</label></li>
<li>
<input type="radio" name="state" value="active" id="active">
<label for="active" class="label">開催中</label></li>
<li>
<input type="radio" name="state" value="tba" id="tba">
<label for="tba" class="label">準備中</label></li>
<li>
<input type="radio" name="state" value="complete" id="complete">
<label for="complete" class="label">完了</label></li>
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
<li id="<?=h($row[7])?>" class="list_item list_toggle" data-year="<?=h($row[2])?>" data-how="<?=h($row[0])?>" data-state="<?=h($row[7])?>">
<p class="what"><?=h($row[1])?></p>
<span class="date"><?=h($row[3])?></span>
<a style="width:<?=h($row[6])?>%;" onclick="obj=document.getElementById('<?=h($row[5])?>').style; obj.display=(obj.display=='none')?'block':'none';"></a>
<div id="<?=h($row[5])?>" class="info" style="display:none;">
<span><?=h($row[4])?></span>
<p class="how"><?=h($row[8])?></p>
<a class="<?=h($row[9])?>" href="<?=h($row[9])?>" target="_blank"></a>
</div>
</li>
<?php endforeach; ?>
<?php else: ?>
<li id="<?=h($row[7])?>" class="list_item list_toggle" data-year="<?=h($row[2])?>" data-how="<?=h($row[0])?>" data-state="<?=h($row[7])?>">
<p class="what">プログラム名 row[1]</p>
<span class="date">0000.00.00 row[3]</span>
<a style="width:10%;" onclick="obj=document.getElementById('<?=h($row[5])?>').style; obj.display=(obj.display=='none')?'block':'none';"></a>
<div id="<?=h($row[5])?>" class="info" style="display:;">
<span>説明 row[4]</span>
<p class="how">実現方法 row[8]</p>
<a class="<?=h($row[9])?>" href="<?=h($row[9])?>" target="_blank"></a>
</div>
</li>
<?php endif; ?>
</ul>
</div>
</div>
<p id="marquee"><span>一般公募より選考した「実現したいこと」大 chotto crazy 公式プログラム を紹介します。</span></p>
</body>
</html>

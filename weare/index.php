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

$fp = fopen('cando.csv', 'a+b');
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
<title>大 chotto crazy | あなたの実現したいことは何ですか？</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://creative-community.space/coding/submit/org/org.js"></script>
<script src="/js/programs.js"></script>
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" type="text/css" href="/css/popup.css" />

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
  content:"are the";
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
body {background:#eee;}
.reset-button {background:#fff;}
hr {border:none; margin:1rem 0;}

#about {
  position: relative;
  width:100%;
}
#about #form {
  width:90%;
  padding:0 1.25%;
  margin:2.5rem auto 5rem;
  max-width:750px;
  background:#fff;
  border:2px solid #000;
  border-radius:0.5rem;
}
#introduce {
  position:relative;
  top:0; left:0;
  margin:0;
}
#link {
  position: absolute;
  margin:0;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  text-indent:-999px;
}
</style>
</head>
<body>
<div id="header">
<a href="/"><span class="we">We</span> <span class="hold">are</span> <span class="dai">the</span> <span class="on"><b>chotto crazy</b></span></a>
<a><b>Past</b></a>
</div>
 
<div id="programs">
<div id="logo"><span class="we">We</span> <span class="hold">are</span> <span class="dai">the</span><br/>
<p id="message" class="center"><span class="by">実現したいことを実現する</span></p>
<i class="on">Chotto Crazy</i>
</div>

<form id="information">
<div class="org">
<div class="search-box how">
<ul>
<li>
<div class="reset">
<input type="reset" name="reset" value="全部見る" class="reset-button">
</div>
</li>
<li>
<input type="radio" name="how" value="create" id="create">
<label for="create" class="label">作る</label></li>
<li>
<input type="radio" name="how" value="music" id="music">
<label for="music" class="label">音を出す 聞く</label></li>
<li>
<input type="radio" name="how" value="image" id="image">
<label for="image" class="label">撮影する 見る</label></li>
<li>
<input type="radio" name="how" value="communication" id="communication">
<label for="communication" class="label">書く 読む 話す</label></li>
<li>
<input type="radio" name="how" value="research" id="research">
<label for="research" class="label">知る 調べる</label></li>
<li>
<input type="radio" name="how" value="food" id="food">
<label for="food" class="label">料理 食べる 飲む</label></li>
<li>
<input type="radio" name="how" value="sports" id="sports">
<label for="sports" class="label">運動する</label></li>
<li>
<input type="radio" name="how" value="relax" id="relax">
<label for="relax" class="label">優雅 休憩</label></li>
<li>
<input type="radio" name="how" value="fantasy" id="fantasy">
<label for="fantasy" class="label">夢 空想</label></li>
<li>
<input type="radio" name="how" value="challenge" id="challenge">
<label for="challenge" class="label">挑戦 実験</label></li>
<li>
<input type="radio" name="how" value="etc" id="etc">
<label for="etc" class="label">その他</label></li>
</ul>
</div>
</div>
</form>

<div class="list">
<ul>
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>

<li class="list_item list_toggle" data-how="<?=h($row[0])?>" onclick="obj=document.getElementById('<?=h($row[9])?>').style; obj.display=(obj.display=='none')?'block':'none';">
<p class="what"><?=h($row[1])?></p>
<div id="<?=h($row[9])?>" class="more" style="display:none;">
<p class="what"><?=h($row[1])?></p>
<p class="info" style="display:<?=h($row[4])?>;"><?=h($row[3])?></p>
<hr/>
<span class="date">これは<b><?=h($row[2])?></b>の実現したいことです</span>
<p class="pro" style="display:<?=h($row[6])?>;"><?=h($row[5])?></p>
<p class="link" style="display:<?=h($row[7])?>;">
  <a href="<?=h($row[8])?>" target="_blank" rel="noopener noreferrer">Link</a>
</p>
</div>
</li>

<?php endforeach; ?>
<?php else: ?>
<li class="list_item list_toggle" data-how="<?=h($row[0])?>" onclick="obj=document.getElementById('id').style; obj.display=(obj.display=='none')?'block':'none';">
<p class="what">実現したいこと</p>
<div id="id" class="more" style="display:none;">
<p class="what">実現したいこと</p>
<p class="info" style="display:;">詳細</p>
<hr/>
<span class="date">これは<b>名前</b>の実現したいことです</span>
<p class="pro" style="display:;">自己紹介</p>
<p class="link">
  <a>Link</a>
</p>
</div>
</li>
<?php endif; ?>
</ul>
<hr/>
</div>
<p style="position:relative;"><span class="center">Copyright © You. All Right Reserved</span></p>
</div>
</body>
</html>

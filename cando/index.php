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
<script src="http://creative-community.pe.hu/coding/submit/org/org.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
$("#form").load("submit.php");
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
  content:"are";
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
  position: fixed;
  z-index: 100;
  top:0; left:0;
  width:100%;
  height: 100vh;
}
#about .close {
  position:absolute;
  font-size:5vw;
  width:95%;
  height: 100vh;
  padding: 2.5%;
  text-align:right;
  top:0; right:0;
  background-color:rgba(255,255,255,0.5);
}
#about .close:hover {
  cursor:pointer;
  color:#D24117;
  background-color:rgba(0,0,0,0.5);
}
#about #form {
  position:absolute;
  top:50%; left:50%;
  z-index:10;
  transform:translate(-50%,-50%);
  -webkit-transform:translate(-50%,-50%);
  width:90%;
  height:90%;
  padding:0 1.25%;
  margin: auto;
  overflow: auto;
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
</style>
</head>
<body>
<div id="header">
<a href="/"><span class="we">We</span> <span class="hold">are</span> <span class="dai">the</span> <span class="on"><b>chotto crazy</b></span></a>
<a><b>Can ☆ Do</b></a>
</div>
<div id="programs">
<div id="logo"><span class="we">We</span> <span class="hold">are</span> <span class="dai">the</span><br/>
<p id="message" class="center"><span class="by">あなたの実現したいことは何ですか？</span></p>
<i class="on">Chotto Crazy</i>
</div>

<form id="information">
<div class="org">
<p>
<span class="red yes">やりたい</span>
<span class="red no">やりたくない</span>
<span class="red or">やらなくてもいい</span></p>
<h1>大 chotto crazy に集まった さまざまな人たちの 実現したいこと を 紹介します。</h1>
<div class="search-box how">
<ul>
<li>
<div class="reset">
<input type="reset" name="reset" value="全部見る" class="reset-button">
</div>
</li>
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
</ul>
</div>
</div>
</form>

<div id="about">
<span class="close" onclick="obj=document.getElementById('about').style; obj.display=(obj.display=='none')?'block':'none';">✕</span>
<div id="form"></div>
</div>

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
<li class="" onclick="obj=document.getElementById('about').style; obj.display=(obj.display=='none')?'block':'none';">
<p class="what">あなたの実現したいことは何ですか？</p>
</li>

</ul>
<hr/>
<p style="position:relative; padding: 1rem;"><span class="center">Copyright © You. All Right Reserved</span></p>
</div>
</div>
<div id="marquee" onclick="obj=document.getElementById('about').style; obj.display=(obj.display=='none')?'block':'none';">
<p>
大 chotto crazy は、
<span class="chotto">素晴らしいアイデア</span>
や
<span class="chotto">創造的チャレンジ</span>
を
<span class="red">募集</span>
しています。
</p>
</div>
</body>
</html>

<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$id = (string)filter_input(INPUT_POST, 'id');
$jp = (string)filter_input(INPUT_POST, 'jp');
$en = (string)filter_input(INPUT_POST, 'en');
$year = (string)filter_input(INPUT_POST, 'year');
$ichoose = (string)filter_input(INPUT_POST, 'ichoose');
$value = (string)filter_input(INPUT_POST, 'value');
$cv = (string)filter_input(INPUT_POST, 'cv');
$gener = (string)filter_input(INPUT_POST, 'gener');
$web = (string)filter_input(INPUT_POST, 'web');
$twitter = (string)filter_input(INPUT_POST, 'twitter');
$instagram = (string)filter_input(INPUT_POST, 'instagram');
$soundcloud = (string)filter_input(INPUT_POST, 'soundcloud');
$bandcamp = (string)filter_input(INPUT_POST, 'bandcamp');
$youtube = (string)filter_input(INPUT_POST, 'youtube');

$fp = fopen('ccm.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$id, $jp, $en, $year, $ichoose, $value, $cv, $gener, $web, $twitter, $instagram, $soundcloud, $bandcamp, $youtube,]);
    rewind($fp);
}

flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/css/ccm.css" />
<link rel="stylesheet" type="text/css" href="/css/popup.css" />
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
$(function(){
$("#").load("");
})
</script>
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
<title>ちょっとクレイジーな仲間たち | 大 chotto crazy</title>
</head>
<body>
<div id="header">
<a href="/"><span class="we">We</span> <span class="hold">are</span> <span class="dai">the</span> <span class="on"><b>chotto crazy</b></span></a>
<a>2020 - 2021</a>
</div>
<div id="ccm">
<div id="logo">
<p id="message" class="center">ちょっとクレイジーな仲間たち</p>
<u class="we">We</u> <u class="dai">are</u> <i class="dai">the</i><br/>
<i class="on">Chotto Crazy Mates</i>
</div>
<div class="refine">
  <input id="refine-0" type="radio" name="category" checked><span class="refine-0"><b>✔</b></span>
  <label class="refine-btn all" for="refine-0">ALL</label>
  <input  id="refine-1" type="radio" name="category"><span class="refine-1"><b>✔</b></span>
  <label class="refine-btn a" for="refine-1">Art</label>
  <input id="refine-2" type="radio" name="category"><span class="refine-2"><b>✔</b></span>
  <label class="refine-btn b" for="refine-2">Music</label>
  <input id="refine-3" type="radio" name="category"><span class="refine-3"><b>✔</b></span>
  <label class="refine-btn c" for="refine-3">Design / Edit</label>
  <input id="refine-4" type="radio" name="category"><span class="refine-4"><b>✔</b></span>
  <label class="refine-btn d" for="refine-4">Direction</label>
  <input id="refine-5" type="radio" name="category"><span class="refine-5"><b>✔</b></span>
  <label class="refine-btn e" for="refine-5">Et cetera</label>
<hr/>
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<div class="refine-teims <?=h($row[7])?>">
<a onclick="obj=document.getElementById('<?=h($row[0])?>').style; obj.display=(obj.display=='none')?'block':'none';">
<p class="name"><?=h($row[3])?><br><u><?=h($row[1])?></u></p>
<h1 class="namae"><?=h($row[2])?></h1>
<marquee class="cv" scrollamount="10"><?=h($row[6])?></marquee></a>
<div id="<?=h($row[0])?>" class="more" style="display:none;">
<span id="question" class="<?=h($row[4])?>"><a href="http://ichoose.pe.hu/50q/cc<?=h($row[3])?>/<?=h($row[0])?>/" target="_blank">10の質問</a></span>
<span id="value" class="<?=h($row[5])?>"><a href="http://vg.pe.hu/publication/value/online/<?=h($row[3])?>/<?=h($row[0])?>/" target="_blank">大切なもの</a></span>
<hr/>
<p><?=h($row[6])?></p>
<p id="link">
<a class="<?=h($row[8])?>" href="<?=h($row[8])?>" target="_blank">Website</a>
<a class="<?=h($row[9])?>" href="https://www.twitter.com/<?=h($row[9])?>/" target="_blank">Twitter</a>
<a class="<?=h($row[10])?>" href="https://www.instagram.com/<?=h($row[10])?>/" target="_blank">Instagram</a>
<a class="<?=h($row[11])?>" href="https://www.soundcloud.com/<?=h($row[11])?>/" target="_blank">SoundCloud</a>
<a class="<?=h($row[12])?>" href="https://<?=h($row[12])?>.bandcamp.com/" target="_blank">Bandcamp</a>
</p>
</div>
</div>
<?php endforeach; ?>
<?php else: ?>
<div class="refine-teims ###">
<a onclick="obj=document.getElementById('___').style; obj.display=(obj.display=='none')?'block':'none';">
<p class="name">0000<br><u>名前</u></p>
<h1 class="namae">name</h1>
<marquee class="cv" scrollamount="10">自己紹介</marquee></a>
<div id="___" class="more" style="display:;">
<span id="question" class="<?=h($row[4])?>"><a href="http://ichoose.pe.hu/10q/" target="_blank">10の質問</a></span>
<span id="value" class="yes">大切なもの</span>
<hr/>
<p>自己紹介</p>
<p id="link">
<a class="<?=h($row[8])?>" href="<?=h($row[8])?>" target="_blank">Website</a>
<a class="<?=h($row[9])?>" href="https://www.twitter.com/<?=h($row[9])?>/" target="_blank">Twitter</a>
<a class="<?=h($row[10])?>" href="https://www.instagram.com/<?=h($row[10])?>/" target="_blank">Instagram</a>
<a class="<?=h($row[11])?>" href="https://www.soundcloud.com/<?=h($row[11])?>/" target="_blank">SoundCloud</a>
<a class="<?=h($row[12])?>" href="https://<?=h($row[12])?>.bandcamp.com/" target="_blank">Bandcamp</a>
</p>
</div>
</div>
<?php endif; ?>
<div class="refine-teims e">
<a onclick="obj=document.getElementById('x').style; obj.display=(obj.display=='none')?'block':'none';">
<p class="name">運営委員<br><u>中尾香織</u></p>
<h1 class="namae">Kaori Nakao</h1>
<marquee class="cv" scrollamount="10">大 chotto craziest</marquee></a>
<div id="x" class="more" style="display:none;">
<span id="question" class="yes"><a href="http://ichoose.pe.hu/50q/cc2020/pehu/" target="_blank">10の質問</a></span>
<span id="value" class="yes" onclick="obj=document.getElementById('pehu_v').style; obj.display=(obj.display=='none')?'block':'none';">大切なもの</span>
<hr/>
<p id="link">
<a class="yes" href="http://vg.pe.hu/jp/cm/kaochomex/" target="_blank">Website</a>
</p>
</div>
</div>
<div class="popup" id="pehu_v" style="display:none;">
<p class=""><iframe src="http://vg.pe.hu/publication/value/book/"></iframe></p>
<span class="close" onclick="obj=document.getElementById('pehu_v').style; obj.display=(obj.display=='none')?'block':'none';">✕</span>
</div>
<div class="refine-teims a">
<a onclick="obj=document.getElementById('w').style; obj.display=(obj.display=='none')?'block':'none';">
<p class="name">運営委員<br><u>船川翔司</u></p>
<h1 class="namae"> Shoji Funakawa </h1>
<marquee class="cv" scrollamount="10">ダンボール洞窟探検家</marquee></a>
<div id="w" class="more" style="display:none;">
<span id="question" class="yes"><a href="http://ichoose.pe.hu/50q/cc2020/weather/" target="_blank">10の質問</a></span>
<span id="value" class="yes" onclick="obj=document.getElementById('pehu_v').style; obj.display=(obj.display=='none')?'block':'none';">大切なもの</span>
<hr/>
<p id="link">
<a class="yes" href="http://vg.pe.hu/jp/cm/weather/" target="_blank">Website</a>
</p>
</div>
</div>
<div class="refine-teims c">
<a onclick="obj=document.getElementById('aa').style; obj.display=(obj.display=='none')?'block':'none';">
<p class="name">運営委員<br><u>芥川亜由弥</u></p>
<h1 class="namae">Ayumi Akutagawa</h1>
<marquee class="cv" scrollamount="10">新型コロナウイルス対策委員長</marquee></a>
<div id="aa" class="more" style="display:none;">
<span id="question" class="yes"><a href="http://ichoose.pe.hu/collection/aa2021/" target="_blank">10の質問</a></span>
<span id="value" class="yes" onclick="obj=document.getElementById('pehu_v').style; obj.display=(obj.display=='none')?'block':'none';">大切なもの</span>
<hr/>
<p id="link">
<a class="yes" href="http://vg.pe.hu/jp/cm/aa/" target="_blank">Website</a>
</p>
</div>
</div>
<div class="refine-teims d">
<a onclick="obj=document.getElementById('ks').style; obj.display=(obj.display=='none')?'block':'none';">
<p class="name">運営委員<br><u>ささじまかずま</u></p>
<h1 class="namae">Kazuma Sasajima</h1>
<marquee class="cv" scrollamount="10">大 chotto crazy 運営委員長／ウェブマスター</marquee></a>
<div id="ks" class="more" style="display:none;">
<span id="question" class="yes"><a href="http://ichoose.pe.hu/collection/sk2/" target="_blank">10の質問</a></span>
<span id="value" class="yes" onclick="obj=document.getElementById('pehu_v').style; obj.display=(obj.display=='none')?'block':'none';">大切なもの</span>
<hr/>
<p id="link">
<a class="yes" href="http://vg.pe.hu/" target="_blank">Website</a>
</p>
</div>
</div>
<p id="marquee"><b>This is the List of Chotto Crazy Mates</b><span>我々、ちょっとクレイジーメイト は、真のちょっとクレイジーシップにのっとり、人と比べるのではなく自分に素直になるとともに、全てを尊重し、はじめてのことでも臆せずチャレンジすること、実現したいことを実現するまでのすべてを全力で楽しむことを誓います。</span></p>
</div>
</div>
</body>
</html>

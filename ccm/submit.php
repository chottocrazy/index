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

$fp = fopen('draft.csv', 'a+b');
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
<title>ちょっとクレイジーな仲間たち 登録ページ | 大 chotto crazy</title>
</head>
<body>
<div id="header">
<a href="/"><span class="we">We</span> <span class="hold">are</span> <span class="dai">the</span> <span class="on"><b>chotto crazy</b></span></a>
<a>プログラム採用者</a>
</div>
<div id="ccm">
<div id="logo">
<p id="message" class="center">プロフィール登録ページ</p>
<u class="we">You</u> <u class="dai">are</u> <i class="dai">the</i><br/>
<i class="on">Chotto Crazy Mates</i>
</div>
<section id="submit" class="refine">
<form action="complete.php" method="post">
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
<p>あなたの名前 (日本語)<br/>
<input type="name" name="jp" required></p>
<p>Your Name (English)<br/>
<input type="name" name="title" required></p>
<p>自己紹介<br/>
<textarea name="cv" rows="7.5" required></textarea></p>
<p>Website<br/>
<input type="url" name="web"></p>
<p>Twitter<br/>
<input type="name" name="twitter"></p>
<p>Instagram<br/>
<input type="name" name="instagram"></p>
<p>SoundCloud<br/>
<input type="name" name="soundcloud"></p>
<p>Bandcamp<br/>
<input type="name" name="soundcloud"></p>
<p>YouTube<br/>
<input type="name" name="youtube"></p>
<button type="submit">Submit</button>
</form>
</section>
</div>
</body>
</html>
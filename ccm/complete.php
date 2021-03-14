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
<meta http-equiv="refresh" content="1;URL=/ccm/">
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
<p id="message" class="center">登録完了</p>
<u class="we">You</u> <u class="dai">are</u> <i class="dai">the</i><br/>
<i class="on">Chotto Crazy Mates</i>
</div>
</div>
</body>
</html>
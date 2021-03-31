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

$fp = fopen('pehu.csv', 'a+b');
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
<script src="/js/programs.js"></script>
<link rel="stylesheet" href="http://chottocrazy.pe.hu/css/about.css" />
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
}#title {
  margin-bottom:1.25rem;
}
input[type="text"],
#submit input[type="url"] {
  display:block;
  padding:0.5rem;
	font-size:1rem;
  border:0.1rem solid;
  border-radius:0.5rem;
  width:100%;
}
#submit textarea {
  display:block;
  padding:0.5rem;
  margin:1rem 0;
	font-size:1.25rem;
  border:0.1rem solid;
  border-radius:0.5rem;
  width:100%; height:10rem;
}
#submit button {
  font-size: 1.25rem;
  cursor:pointer;
  width:100%;
  padding:0.25rem 0;
  background: #fff;
  color: #000;
  border-radius:2.5rem;
}
</style>
</head>
<body>
<div id="header">
<a href="/"><span class="we">We</span> <span class="hold">are</span> <span class="dai">the</span> <span class="on"><b>chotto crazy</b></span></a>
<a><b>by pehu</b></a>
</div>
<div id="programs">
<div id="logo"><span class="we">We</span> <span class="hold">are</span> <span class="dai">the</span><br/>
<p id="message" class="center"><span class="by">creative, community space</span></p>
<i class="on">Chotto Crazy</i>
</div>
<section id="submit">
<form id="information" action="complete.php" method="post">
<div class="org">
<input type="date" name="date">
<p id="title">
<input type="text" name="what" placeholder="タイトル" required></p>
<div class="search-box year">
<h2 class="search-box_label">Year</h2>
<ul>
<li>
<input type="radio" name="year" value="one" id="one" required>
<label for="one" class="label">2017</label></li>
<li>
<input type="radio" name="year" value="two" id="two" required>
<label for="two" class="label">2018</label></li>
<li>
<input type="radio" name="year" value="three" id="three" required>
<label for="three" class="label">2019</label></li>
<li>
<input type="radio" name="year" value="four" id="four" required>
<label for="four" class="label">2020</label></li>
<li>
<input type="radio" name="year" value="five" id="five" required>
<label for="five" class="label">2021</label></li>
</ul>
</div>
<div class="search-box how">
<h2 class="search-box_label">How to</h2>
<ul>
<li>
<input type="radio" name="how" value="Activity" id="Activity" required>
<label for="Activity" class="label">Activity</label></li>
<li>
<input type="radio" name="how" value="Challenge" id="Challenge" required>
<label for="Challenge" class="label">Challenge</label></li>
<li>
<input type="radio" name="how" value="Idea" id="Idea" required>
<label for="Idea" class="label">Idea</label></li>
<li>
<input type="radio" name="how" value="Web" id="Web" required>
<label for="Web" class="label">Web</label></li>
</ul>
</div>
<div class="search-box state">
<h2 class="search-box_label">Status</h2>
<ul>
<li>
<input type="radio" name="state" value="tobe" id="tobe" required>
<label for="tobe" class="label">To Be</label></li>
<li>
<input type="radio" name="state" value="active" id="active" required>
<label for="active" class="label">In Progress</label></li>
<li>
<input type="radio" name="state" value="want" id="want" required>
<label for="want" class="label">Want to do</label></li>
<li>
<input type="radio" name="state" value="complete" id="complete" required>
<label for="complete" class="label">Complete</label></li>
</ul>
</div>
</div>
<div class="list">
<ul>
<input type="text" name="more" placeholder="URL (リンクがない場合は none と入力)" required>
<textarea name="info" placeholder="説明文" required></textarea>
</ul>
</div>
<button type="submit">Submit</button>
</form>
</section>
</div>
<p id="marquee"><span>ちょっとクレイジーな素晴らしいアイデアや、ちょっとクレイジーな創造的チャレンジを、様々な方法で実現します。</span></p>
</body>
</html>

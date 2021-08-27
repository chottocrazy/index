<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$date = (string)filter_input(INPUT_POST, 'date'); // $_POST['date']
$title = (string)filter_input(INPUT_POST, 'title'); // $_POST['title']
$text = (string)filter_input(INPUT_POST, 'text'); // $_POST['text']
$link = (string)filter_input(INPUT_POST, 'link'); // $_POST['link']

$fp = fopen('membersonly.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$date, $title, $text, $link]);
    rewind($fp);
}
flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<title>Members Only | 大 chotto crazy 2021</title>
<link rel="stylesheet" type="text/css" href="/css/programs.css" />
<style type="text/css">
body {background:#fff;}
.nlc i,
.nlc b,
.nlc .online u,
.nlc #links a {
  background: linear-gradient(
-90deg
, #b3cbf6, #FFC778, #eee);
  background-size: 400% 400%;
  animation: gradientBG 10s ease infinite;
}
.nlc b,
.nlc .online u,
.nlc #links a {
  color: #fff;
  -webkit-text-fill-color: #fff;
}
.nlc i {
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
@keyframes gradientBG {
0% {background-position: 0% 50%;}
50% {background-position: 100% 50%;}
100% {background-position: 0% 50%;}
}
</style>
<script type="text/javascript">
$(function(){
$("#").load("");
})
</script>
</head>
<body>

<div id="topics">
<h2 id="top" class="nlc">
<i id="sub">Members Only</i>
<b id="date">ニューライフコレクション会員限定</b>
</h2>

<div class="nlc">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<div id="topics" class="online">
<span id="date"><?=h($row[0])?></span>
<p><u><?=h($row[1])?></u></p>
<span id="sub"><?=h($row[2])?></span>
<div id="links">
<h2><a class="<?=h($row[3])?>" href="<?=h($row[3])?>" target="_blank" rel="noopener noreferrer">More Info</a>
</h2>
</div>
</div>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>
</div>
</div>

</body>
</html>

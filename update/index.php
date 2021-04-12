<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$date = (string)filter_input(INPUT_POST, 'date'); // $_POST['date']
$title = (string)filter_input(INPUT_POST, 'title'); // $_POST['title']
$text = (string)filter_input(INPUT_POST, 'text'); // $_POST['text']
$link = (string)filter_input(INPUT_POST, 'link'); // $_POST['link']

$fp = fopen('topics.csv', 'a+b');
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
<title>お知らせ Topics | 大 chotto crazy</title>
<link rel="stylesheet" type="text/css" href="/css/programs.css" />
<style type="text/css">
body {background:#eee;}
.online u, #links a {background:#000}
#topics #top {margin:0 0 1.5rem;}
</style>
<script type="text/javascript">
$(function(){
$("#").load("");
})
</script>
</head>
<body>
<div id="topics" class="online">
<h2 id="top"><b id="date">お知らせ</b><i id="sub" class="">Topics</i></h2>

<div>
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
<div id="topics" class="online">
<span id="date">2020.3.29 - 2021.1.31</span>
<p><u>大 chotto crazy 2020</u></p>
<span id="sub">公募で集まった120の実現したいことより選考した20のプログラムを実現しました。</span>
<div id="links">
  <h2><a href="/2020/" target="_blank" rel="noopener noreferrer">More Info</a>
</h2>
</div>
</div>
</div>
</div>
</body>
</html>

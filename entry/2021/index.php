<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$content = (string)filter_input(INPUT_POST, 'content'); // $_POST['content']
$name = (string)filter_input(INPUT_POST, 'name'); // $_POST['name']
$when = (string)filter_input(INPUT_POST, 'when'); // $_POST['when']
$where = (string)filter_input(INPUT_POST, 'where'); // $_POST['where']
$why = (string)filter_input(INPUT_POST, 'why'); // $_POST['why']
$how = (string)filter_input(INPUT_POST, 'how'); // $_POST['how']

$fp = fopen('2021.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$content, $name, $when, $where, $why, $how ]);
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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="/css/plan.css" rel="stylesheet">
<link href="/css/about.css" rel="stylesheet">
<title>大 chotto crazy 2021 | We Support your Amazing Ideas and Creative Challenges</title>
<style type="text/css">
.on {font-family:"Orchard";}
</style>
</head>
<body>
<div id="header">
<a href="/"><span class="we">We</span> <span class="hold">are</span> <span class="dai">the</span> <span class="on"><b>chotto crazy</b></span></a>
<a>2021</a>
</div>
<div id="programs">
<div id="logo"><span class="dai">the</span><br/>
<p id="message" class="center">エントリー一覧</p>
<i class="on">PDF Library</i>
</div>
</div>
<div id="plan">
<ul id="public">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li id="yes">
<div>
<p id="bg_000" class="title">
<span><?=h($row[0])?></span></p>
<div class="plan">
<b class="date"><?=h($row[2])?></b>
<b class="where"><?=h($row[3])?></b>
<p class="why"><?=h($row[4])?><br/>
<span class="who">by <i><?=h($row[1])?></i></span>
</p>
</div>
<a href="<?=h($row[5])?>" target="_blank" rel="noopener noreferrer"></a>
<img class="pdf" src="http://vg.pe.hu/merchandise/icon/pdf.png">
</div>
</li>
<?php endforeach; ?>
<?php else: ?>
<li id="yes">
<div>
<p id="bg_000" class="title">
<span><?=h($row[0])?></span></p>
<div class="plan">
<b class="date"><?=h($row[2])?></b>
<b class="where"><?=h($row[3])?></b>
<p class="why"><?=h($row[4])?><br/>
<span class="who">by <i><?=h($row[1])?></i></span>
</p>
</div>
<a href="<?=h($row[5])?>" target="_blank" rel="noopener noreferrer"></a>
<img class="pdf" src="http://vg.pe.hu/merchandise/icon/pdf.png">
</div>
</li>
<?php endif; ?>
<li id="yes">
<div>
<p id="bg_000" class="title">
<span>ここでなら自分のやりたいことができるかもしれないって思える場所を作りたい</span></p>
<div class="plan">
<b class="date">2021年12月31日まで に</b>
<b class="where">音ビル／ウェブサイト で</b>
<p class="why">世間・世論がルールで、社会秩序を守ることが正義みたいな雰囲気が嫌だ。みんながどうとか、人がこう言ってるとか、そういうしがらみがない環境にいたい。<br/>
<span class="who">by <i>creative, community space ∧°┐</i></span>
</p>
</div>
<a href="/entry/2021/peaceforfuture.pdf" target="_blank" rel="noopener noreferrer"></a>
<img class="pdf" src="http://vg.pe.hu/merchandise/icon/pdf.png">
</div>
</li>
</ul>
</div>
<script type="text/javascript">
$(function() {
	var arr = [];
	$("#public li").each(function() {
		arr.push($(this).html());
	});
	arr.sort(function() {
		return Math.random() - Math.random();
	});
	$("#public").empty();
	for(i=0; i < arr.length; i++) {
		$("#plan").append('<li>' + arr[i] + '</li>');
	}
});
</script>
</body>

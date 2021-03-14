<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$content = (string)filter_input(INPUT_POST, 'content'); // $_POST['content']
$name = (string)filter_input(INPUT_POST, 'name'); // $_POST['name']
$email = (string)filter_input(INPUT_POST, 'email'); // $_POST['email']
$when = (string)filter_input(INPUT_POST, 'when'); // $_POST['when']
$where = (string)filter_input(INPUT_POST, 'where'); // $_POST['where']
$why = (string)filter_input(INPUT_POST, 'why'); // $_POST['why']
$how = (string)filter_input(INPUT_POST, 'how'); // $_POST['how']
$public = (string)filter_input(INPUT_POST, 'public'); // $_POST['public']

$fp = fopen('2021.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$content, $name, $email, $when, $where, $why, $how, $public ]);
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
<title>大 chotto crazy 2021 | We Support your Amazing Ideas and Creative Challenges</title>
<style type="text/css">
</style>
</head>
<body>
<div id="plan">
<ul id="public">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li id="<?=h($row[7])?>">
<div>
<p id="bg_000" class="title">
<span><?=h($row[0])?></span></p>
<span class="who">by <i><?=h($row[1])?></i></span>
<div class="plan">
<b class="date"><?=h($row[3])?></b>
<b class="where"><?=h($row[4])?></b>
<p class="why"><?=h($row[5])?></p>
<p class="why"><?=h($row[6])?></p>
</div>
</div>
</li>
<?php endforeach; ?>
<?php else: ?>
<li id="yes">
<div>
<p id="bg_000" class="title">
<span>応募内容</span></p>
<span class="who">by <i>名前</i></span>
<div class="plan">
<b class="date">とき</b>
<b class="where">ところ</b>
<p class="why">なぜ</p>
</div>
</div>
</li>
<?php endif; ?>
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
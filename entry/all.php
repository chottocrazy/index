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
<meta http-equiv="Refresh" content="3;URL=http://chottocrazy.pe.hu/">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="/css/ideas.css" rel="stylesheet">
<title>大 chotto crazy | We Support your Amazing Ideas and Creative Challenges</title>
<style type="text/css">
</style>
</head>
<body>
<div class="thankyou">
<p>Thank you</p>
<span class="we">You</span> <span class="hold">are</span> <span class="on"><b>chotto crazy</b></span>
</div>
<ul id="ideas">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li>
<div>
<p class="text"><?=h($row[0])?></p>
<span class="name"><i><?=h($row[1])?></i></span>
</div>
</li>
<?php endforeach; ?>
<?php else: ?>
<li>
<div>
<p class="text">応募内容</p>
<span class="name"><i>名前</i></span>
</div>
</li>
<?php endif; ?>
</ul>
<script type="text/javascript">
$(function() {
	var arr = [];
	$("#ideas li").each(function() {
		arr.push($(this).html());
	});
	arr.sort(function() {
		return Math.random() - Math.random();
	});
	$("#ideas").empty();
	for(i=0; i < arr.length; i++) {
		$("#ideas").append('<li>' + arr[i] + '</li>');
	}
});
</script>
</body>
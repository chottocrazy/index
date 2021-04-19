<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$title = (string)filter_input(INPUT_POST, 'title'); // $_POST['content']
$pdf = (string)filter_input(INPUT_POST, 'pdf'); // $_POST['how']

$fp = fopen('printedweb.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$title, $pdf ]);
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
<title>Printed Web | 大 chotto crazy 2021</title>
<style type="text/css">
#plan ul {
  padding:0; margin:0;
  display:flex;
  flex-wrap:wrap;
  justify-content: space-evenly;
}
#plan .title {zoom:1.25;}
</style>
</head>
<body>
<div id="plan">
<ul id="public">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li id="yes">
<div>
<p id="bg_000" class="title">
<span><?=h($row[0])?></span></p>
<a href="<?=h($row[1])?>" target="_blank" rel="noopener noreferrer"></a>
<img class="pdf" src="http://vg.pe.hu/merchandise/icon/pdf.png">
</div>
</li>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>
<li id="yes">
<div>
<p id="bg_000" class="title">
<span>ウェブサイトを出力する エントリー用紙</span></p>
<a href="http://chottocrazy.pe.hu/entry/2021/printedweb.pdf" target="_blank" rel="noopener noreferrer"></a>
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

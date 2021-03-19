<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$word = (string)filter_input(INPUT_POST, 'word');
$weight = (string)filter_input(INPUT_POST, 'weight');
$size = (string)filter_input(INPUT_POST, 'size');
$feel = (string)filter_input(INPUT_POST, 'feel');

$fp = fopen('org.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$word, $weight, $size, $feel,]);
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
<title> 思考や感情を集積し、整理する </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="org.js"></script>
<link rel="stylesheet" href="org.css"/>
<style type="text/css">
</style>
</head>
<body>
<div id="header">
<a onclick="obj=document.getElementById('org').style; obj.display=(obj.display=='none')?'block':'none';">思考や感情を集積し、整理する</a>
<div><a onclick="obj=document.getElementById('how').style; obj.display=(obj.display=='none')?'block':'none';">投稿する</a></div>
</div>
<div id="how" style="display:none;">
<iframe src="submit.php"></iframe>
</div>

<form id="org" style="display:block;">
<div>
<div class="search-box weight">
<ul>
<li>
<input type="radio" name="weight" value="must" id="must">
<label for="must" class="label">100 ~ 90</label></li>
<li>
<input type="radio" name="weight" value="should" id="should">
<label for="should" class="label">90 ~ 70</label></li>
<li>
<input type="radio" name="weight" value="can" id="can">
<label for="can" class="label">70 ~ 50</label></li>
<li>
<input type="radio" name="weight" value="may" id="may">
<label for="may" class="label">50 ~ 30</label></li>
<li>
<input type="radio" name="weight" value="could" id="could">
<label for="could" class="label">30 ~ 10</label></li>
<li>
<input type="radio" name="weight" value="cant" id="cant">
<label for="cant" class="label">10 ~ 0</label></li>
<li class="sub"><i>%</i></li>
</ul>
</div>
<div class="search-box size">
<ul>
<li>
<input type="radio" name="size" value="positive" id="positive">
<label for="positive" class="label"> Plus </label></li>
<li>
<input type="radio" name="size" value="negative" id="negative">
<label for="negative" class="label"> Minus </label></li>
<li>
<input type="radio" name="size" value="both" id="both">
<label for="both" class="label"> Both </label></li>
<li>
<input type="radio" name="size" value="neither" id="neither">
<label for="neither" class="label"> Neither </label></li>
<li>
<input type="radio" name="size" value="unknown" id="unknown">
<label for="unknown" class="label"> Unknown </label></li>
<li class="sub"><i>to</i></li>
</ul>
</div>
<div class="search-box feel">
<ul>
<li>
<input type="radio" name="feel" value="happy" id="happy">
<label for="happy" class="label">🙂</label></li>
<li>
<input type="radio" name="feel" value="hearts" id="hearts">
<label for="hearts" class="label">🥰</label></li>
<li>
<input type="radio" name="feel" value="tongue" id="tongue">
<label for="tongue" class="label">😜</label></li>
<li>
<input type="radio" name="feel" value="thinking" id="thinking">
<label for="thinking" class="label">🤔</label></li>
<li>
<input type="radio" name="feel" value="neutral" id="neutral">
<label for="neutral" class="label">😐</label></li>
<li>
<input type="radio" name="feel" value="relieved" id="relieved">
<label for="relieved" class="label">😌</label></li>
<li>
<input type="radio" name="feel" value="dizzy" id="dizzy">
<label for="dizzy" class="label">😵</label></li>
<li>
<input type="radio" name="feel" value="frowning" id="frowning">
<label for="frowning" class="label">😮</label></li>
<li>
<input type="radio" name="feel" value="crying" id="crying">
<label for="crying" class="label">😢</label></li>
<li>
<input type="radio" name="feel" value="steam" id="steam">
<label for="steam" class="label">😤</label></li>
</ul>
</div>
<div class="reset">
<a onclick="window.location.reload();">RESET</a>
</div>
</div>
</form>

<div class="list">
<div id="inside">
<ul id="random">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li class="list_item list_toggle" data-weight="<?=h($row[1])?>" data-size="<?=h($row[2])?>" data-feel="<?=h($row[3])?>"><span class="<?=h($row[1])?> <?=h($row[2])?>"><?=h($row[0])?></span></li>
<?php endforeach; ?>
<?php else: ?>
<li class="list_item list_toggle" data-weight="<?=h($row[1])?>" data-size="<?=h($row[2])?>" data-feel="<?=h($row[3])?>"><span class="<?=h($row[1])?> <?=h($row[2])?>">keyword</span></li>
<?php endif; ?>
</ul>
</div>
</div>
</body>
</html>

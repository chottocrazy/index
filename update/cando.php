<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$how = (string)filter_input(INPUT_POST, 'how');
$what = (string)filter_input(INPUT_POST, 'what');
$date = (string)filter_input(INPUT_POST, 'date');
$info = (string)filter_input(INPUT_POST, 'info');
$more = (string)filter_input(INPUT_POST, 'more');

$fp = fopen('cando.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$how, $what, $date, $info, $more]);
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
<title>FREE TIME | 大 chotto crazy 2021</title>
<link rel="stylesheet" type="text/css" href="/css/programs.css" />
<style type="text/css">
body {background:#fff;}
.online u,
#links a {background:#000}
</style>
<script type="text/javascript">
$(function(){
$("#").load("");
})
</script>
</head>
<body>

<div id="topics">
<h2 id="top">
<i id="sub" class="">Can ☆ Do</i>
<b id="date">開催日時</b>
</h2>

<div>
<ul>
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li id="topics" class="list_item list_toggle online" data-how="<?=h($row[0])?>">
<span id="date"><?=h($row[2])?></span>
<p><u><?=h($row[1])?></u></p>
<span id="sub"><?=h($row[3])?></span>
<div id="links">
<h2><a class="<?=h($row[4])?>" href="<?=h($row[4])?>" target="_blank" rel="noopener noreferrer">More Info</a>
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

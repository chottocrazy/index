<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$name = (string)filter_input(INPUT_POST, 'name'); // $_POST['name']
$link = (string)filter_input(INPUT_POST, 'link'); // $_POST['link']
$tag = (string)filter_input(INPUT_POST, 'tag'); // $_POST['tag']

$fp = fopen('10q.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$name, $link, $tag]);
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
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../styles.css" />
<link rel="stylesheet" type="text/css" href="../list.css" />
<link rel="stylesheet" type="text/css" href="/css/popup.css" />
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
$("#top").load("../top.html");
})
</script>
<title>i choose | The Answers are always inside of you</title>
</head>
<body>
<div id="top"></div>

<div id="main">
<div id="ichoose">
<div id="howto">
<h3>This is the Collection of <br/><i>10 Questions</i>
<br>Created by Chotto Crazy Mate.</h3>
</div>
</div>
<div id="list">
<p><u>これは、ちょっとクレイジーな仲間たちの10の質問です。</u></p>
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<div class="refine-teims <?=h($row[2])?>">
<span><?=h($row[0])?></span>
<a onclick="obj=document.getElementById('<?=h($row[1])?>').style; obj.display=(obj.display=='none')?'block':'none';"></a>
</div>
<?php endforeach; ?>
<?php else: ?>
<div class="refine-teims">
<span>coming soon</span>
</div>
<?php endif; ?>
</div>
<h1>by <a href="/ccm/" target="_parent">Chotto Crazy Mates</a></h1>
</div>

<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<div class="popup" id="<?=h($row[1])?>" style="display:none;">
<p><iframe src="<?=h($row[1])?>/"></iframe></p>
<span class="close" onclick="obj=document.getElementById('<?=h($row[1])?>').style; obj.display=(obj.display=='none')?'block':'none';">✕</span>
</div>
<?php endforeach; ?>
<?php else: ?>
<div class="popup" id="<?=h($row[1])?>" style="display:none;">
<p><iframe src="<?=h($row[1])?>/"></iframe></p>
<span class="close" onclick="obj=document.getElementById('<?=h($row[1])?>').style; obj.display=(obj.display=='none')?'block':'none';">✕</span>
</div>
<?php endif; ?>
</body>
</html>

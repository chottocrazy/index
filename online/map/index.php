<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$date = (string)filter_input(INPUT_POST, 'date');
$sub = (string)filter_input(INPUT_POST, 'sub');
$tag = (string)filter_input(INPUT_POST, 'tag');
$link = (string)filter_input(INPUT_POST, 'link');
$comment = (string)filter_input(INPUT_POST, 'comment');
$photo = (string)filter_input(INPUT_POST, 'photo');

$fp = fopen('list.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$date, $sub, $tag, $link, $comment, $photo,]);
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
<title>オススメを集める | 大 chotto crazy 2020</title>
<link rel="stylesheet" type="text/css" href="/online/map/map.css" />
</head>
<body>
<div class="popup" id="about" style="display:none;">
<p><iframe src="about.php"></iframe></p>
<span class="close" onclick="obj=document.getElementById('about').style; obj.display=(obj.display=='none')?'block':'none';">✕</span>
</div>
<div class="popup" id="download" style="display:none;">
<p><iframe src="thankyou.php"></iframe></p>
<span class="close" onclick="obj=document.getElementById('download').style; obj.display=(obj.display=='none')?'block':'none';">✕</span>
</div>
<div class="about">
<span class="sub">オススメを集める <b>β ver.</b></span>
<span class="sub"> 投稿する </span>
<a id="link" class="tag" onclick="obj=document.getElementById('about').style; obj.display=(obj.display=='none')?'block':'none';"></a>
</div>
<div class="refine">

<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<div class="refine-teims" onclick="obj=document.getElementById('<?=h($row[2])?>').style; obj.display=(obj.display=='none')?'block':'none';">
<span class="date"><?=h($row[0])?></span>
<div class="info" id="<?=h($row[2])?>" style="display:none;">
<span class="sub"><?=h($row[1])?></span>
<p class="text"><?=h($row[4])?></p>
<span class="address">
<a href="https://www.google.com/maps/place/<?=h($row[3])?>" target="_blank" rel="noopener noreferrer"><?=h($row[3])?></a></span>
</div>
</div>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>
<div class="refine-teims" onclick="obj=document.getElementById('download').style; obj.display=(obj.display=='none')?'block':'none';">
<span class="date">🖥</span>
</div>
</div>
</body>
</html>
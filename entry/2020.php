<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$text = (string)filter_input(INPUT_POST, 'text'); // $_POST['text']
$name = (string)filter_input(INPUT_POST, 'name'); // $_POST['name']
$link = (string)filter_input(INPUT_POST, 'link'); // $_POST['link']
$by = (string)filter_input(INPUT_POST, 'by'); // $_POST['by']

$fp = fopen('2020.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$text, $name, $link, $by]);
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
<script type="text/javascript">
$(function(){
$("#").load("");
})
</script>
<link href="/css/ideas.css" rel="stylesheet">
<title>大 chotto crazy | We Support your Amazing Ideas and Creative Challenges</title>
<style type="text/css">
</style>
</head>
<body>
<div id="form"></div>
<div class="refine">
<h2 id="marquee"><span>大 chotto crazy 2020 に集まったいろんな人たちの「実現したいこと」と、ペフメンバーの気になる人たちの「実現したいこと」を紹介します。</span></h2>
  <input id="refine-0" type="radio" name="refine-btn" checked>
  <label class="refine-btn all" for="refine-0">すべて見る</label>
  <input  id="refine-1" type="radio" name="refine-btn">
  <label class="refine-btn art" for="refine-1">美術</label>
  <input id="refine-2" type="radio" name="refine-btn">
  <label class="refine-btn music" for="refine-2">音楽</label>
  <input id="refine-3" type="radio" name="refine-btn">
  <label class="refine-btn edit" for="refine-3">デザイン | 編集</label>
  <input id="refine-4" type="radio" name="refine-btn">
  <label class="refine-btn direction" for="refine-4">企画 | 演出</label>
  <input id="refine-5" type="radio" name="refine-btn">
  <label class="refine-btn spot" for="refine-5">ギャラリー | 店</label>
  <input id="refine-6" type="radio" name="refine-btn">
  <label class="refine-btn life" for="refine-6">人</label>
  <input id="refine-7" type="radio" name="refine-btn">
  <label class="refine-btn members" for="refine-7">匿名</label>
<hr/>
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<div class="refine-teims <?=h($row[3])?>">
<a href="http://newlifecollection.com/ca29/<?=h($row[2])?>/p-r-s/">
<p class="text"><?=h($row[0])?></p></a>
<span class="name"><i><?=h($row[1])?></i></span>
</div>
<?php endforeach; ?>
<?php else: ?>
<div class="refine-teims">
<p class="text">応募内容</p>
<span class="name"><i>名前</i></span>
</div>
<?php endif; ?>
<hr/>
</div>
</body>
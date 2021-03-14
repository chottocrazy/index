<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$en = (string)filter_input(INPUT_POST, 'en'); // $_POST['en']
$jp = (string)filter_input(INPUT_POST, 'jp'); // $_POST['jp']
$a_l_en = (string)filter_input(INPUT_POST, 'a_l_en'); // $_POST['a_l_en']
$a_l_jp = (string)filter_input(INPUT_POST, 'a_l_jp'); // $_POST['a_l_jp']
$a_r_en = (string)filter_input(INPUT_POST, 'a_r_en'); // $_POST['a_r_en']
$a_r_jp = (string)filter_input(INPUT_POST, 'a_r_jp'); // $_POST['a_r_jp']
$a_l = (string)filter_input(INPUT_POST, 'a_l'); // $_POST['a_l']
$a_r = (string)filter_input(INPUT_POST, 'a_r'); // $_POST['a_r']

$fp = fopen('list.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$en, $jp, $a_l_en, $a_l_jp, $a_r_en, $a_r_jp, $a_l, $a_r,]);
    rewind($fp);
}

flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);

?>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/ccm/10q/styles.css" />
<link rel="stylesheet" type="text/css" href="/ccm/10q/10q.css" />
<link rel="stylesheet" type="text/css" href="/ccm/10q/print.css" />
<title>10 Questions | by 中尾香織</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>
<a href="http://ichoose.pe.hu/" target="_parent"><h1 id="headline">ichoose.pe.hu</h1></a>

<div id="main">
<div id="ichoose">
<h3><u>This question was created by</u></h3>
これは、 <b>Kaori Nakao</b>
<p>が考えた 質問 です。</p>
</div>

<div id="10q">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<div class="question">
<hr>
<h2><?=h($row[0])?></h2>
<p><?=h($row[1])?></p>
<div id="answer">
<span class="left">
<p><u><?=h($row[2])?></u></p>
<p><?=h($row[3])?></p>
</span>
<span class="or"><p><i>or</i></p></span>
<span class="right">
<p><u><?=h($row[4])?></u></p>
<p><?=h($row[5])?></p>
</span>
</div>
</div>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>
</div>
<h3 class="more"><i><a onclick="window.location.reload();">Next Question</a></i></h3>
<h3 class="collection">We create a collection of <i><u><a href="http://ichoose.pe.hu/10q/" target="_parent">10 Questions</a></u></i></h3>
</div>

<div id="who">
<p class="name">
<br>中尾香織<br>Kaori Nakao</p>
<div class="message">
中尾 香織（ 女性 ）さんの姓名鑑定
<p>性格<br/>
・感受性・直感力は鋭いが、物事に淡白で尻切れトンボ<br/>
・行き当たりばったり、熱しやすく冷めやすい<br/>
・気の弱い所があるくせに向う意気が強い<br/>
・親，兄弟，社会に反発しているため、甘えかたを知らない<br/>
・頼もしく、人の面倒見は良いが、横着で怠け者で人をアゴで使う傾向がある<br/>
・甘えん坊，そとずらがいい、八方美人で中にはゴマスリも多い<br/>
・辛抱強いが、自主性なく、依頼心があり小さな事でいつも悩みが絶えない<br/>
・なにしろ優柔不断で覚えている事か与えられた事しか出来ない<br/>
・ちょっと変わった人、欲得、気力、決断力に欠ける</p>
<p>気をつける病気<br/>
・心臓・臍から下の内臓（大腸・前立腺(男）・子宮関係（女）・膀胱・下痢）　等<br/>
・怪我・火傷・喧嘩（殺生事件）　喧嘩を売る）<br/>
・神経系（腰痛　歯痛）・交通事故（加害者か一人相撲）　等<br/>
・内臓系（胃腸）・ヒステリー　等</p>
</div>
<p class="link">
<a href="http://vg.pe.hu/jp/" target="_blank">Website</a>
</p>
</div>

<div id="back">
<h1>by creative, community space <b><a href="http://vg.pe.hu/jp/" target="_blank">∧°┐</a></b></h1>
</div>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript" src="http://ichoose.pe.hu/js/10q.js"></script>
<script type="text/javascript" src="http://ichoose.pe.hu/js/main.js"></script>
<script type="text/javascript" src="http://ichoose.pe.hu/js/jquery.arctext.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
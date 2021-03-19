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
<title> 投稿する | 思考や感情を集積し、整理する </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="org.js"></script>
<link rel="stylesheet" href="org.css"/>
<style type="text/css">
</style>
</head>
<body>
<section>
<form action="complete.php" id="org" method="post" target="_parent">
<div>
<h2>思考や感情を集積し、整理する</h2>
<h2>
<textarea name="word" placeholder="Short Text" required></textarea></h2>
<p>フォームに入力するテキストはどんな内容でも構いません。<br/>名詞・動詞・形容詞・文章、いま留めていた思考や感情を言語化してみましょう。</p>
<div class="search-box weight">
<ul>
<li class="note"><b>強さ</b><br/>
上記のフォームに入力したテキストに対する思考や感情の強さを数値で表してみましょう。<br/>
絶対的な強い思考や感情を 100、まだ不明確な弱い思考や感情を 0 として、当てはまる項目を選択してください。</li>
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
<li class="note"><b>方向</b><br/>
上記のフォームに入力したテキストに対する思考や感情の強さは、どこを向いていますか？<br/>
前向き・ポジティブ・肯定的などの方向の場合は Plus を、ネガティブ・否定的・内向的などの方向の場合は Minus を、どちらにも当てはまる場合は Both・どちらでもない場合は、Neither、わからない場合は Unknown を選択してください。</li>
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
<li class="note"><b>感情</b><br/>
入力した感情に対する感情を、下記の絵文字より選択してください。</li>
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
<button type="submit">Submit | 投稿する</button>
</div>
</div>
</form>
</section>
</body>
</html>

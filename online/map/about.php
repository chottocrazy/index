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
<style type="text/css">
@font-face {
  font-family: "inscrutable";
  src: url(/font/inscrutable.otf);
}
@font-face {
  font-family: "Orchard";
  src: url(/font/Orchard-Linear.otf);
}
.about_text #sub {
  font-family:"Orchard";
}
</style>
</head>
<body>
<section class="">
<form action="thankyou.php" method="post" target="_parent">
<div class="about_text">
<p id="form"><span id="sub" class="date">EMOJI</span>
<br/>オススメの場所を表す絵文字を一つ選択してください<br/>
<input type="text" id="date" name="date" required> <a href="https://getemoji.com/" target="_blank" rel="noopener noreferrer">getemoji.com</a></p>
<p id="right"><span id="sub" class="tag">Tag</span>
<br/>オススメの場所を表す5文字以上の半角英数字をご入力ください<br/>
<input type="text" id="tag" name="tag" placeholder="例: gardencity" pattern="^([a-zA-Z0-9]{5,})$" required><br/>※ スペース(空白)・記号は使用できません</p>

<p id="form"><span id="sub" class="date">Title</span>
<br/>オススメの場所の名前をご入力ください<br/>
<input type="text" id="title" name="sub" placeholder="例: ガーデンシティ" required></p>
  
<p id="form"><span id="sub" class="date">Address</span><a href="https://support.google.com/maps/answer/18539?co=GENIE.Platform%3DDesktop&hl=ja" target="_blank" rel="noopener noreferrer">緯度と経度の調べ方</a>
<br/>オススメの場所の緯度と経度をご入力ください<br/>
<input type="text" id="title" name="link" placeholder="例: 34.69832446705165,135.4893739557355" required></p>

<p id="form"><span id="sub" class="date">comment</span>
<br/>オススメの場所について簡単なコメントをご入力ください<br/>
<textarea name="comment"  placeholder="例: 落ち込んだときによく行くところ" required></textarea></p>
<p class="submit"><button type="submit">投稿する</button></p>
</div>
</form>
</section>
</body>
</html>
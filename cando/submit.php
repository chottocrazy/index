<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$how = (string)filter_input(INPUT_POST, 'how');
$what = (string)filter_input(INPUT_POST, 'what');
$date = (string)filter_input(INPUT_POST, 'date');
$info = (string)filter_input(INPUT_POST, 'info');
$info_more = (string)filter_input(INPUT_POST, 'info_more');
$pro = (string)filter_input(INPUT_POST, 'pro');
$pro_more = (string)filter_input(INPUT_POST, 'pro_more');
$link = (string)filter_input(INPUT_POST, 'link');
$url = (string)filter_input(INPUT_POST, 'url');
$id = (string)filter_input(INPUT_POST, 'id');

$fp = fopen('submit.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$how, $what, $date, $info, $info_more, $pro, $pro_more, $link, $url, $id]);
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
<title>大 chotto crazy | 実現したいことを実現する</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/js/programs.js"></script>
<link rel="stylesheet" href="http://chottocrazy.pe.hu/css/about.css" />
<style type="text/css">
#header b,
.hold:before,
.on {
  font-family:"Orchard";
}
.hold:before {
  content:"can☆do";
  color:#555;
  font-style:italic;
  position:absolute;
  font-weight: 555;
  margin-top:0.5rem;
  margin-left:-0.5rem;
}
.on,
.hold:before,
.dai:before,
.dai:after {
  -webkit-text-stroke: 0.001rem #FFF;
  text-stroke: 0.001rem #FFF;
}
.by {
  font-size:0.75rem;
  font-family:"MS Mincho", serif;
}

hr {border:none; margin:0.5rem;}

.how {padding:0 1.25%;}

input[type="text"],
input[type="url"],
input[type="email"] {
  display:block;
  padding:1.5%;
	font-size:1rem;
  border:0.1rem solid;
  border-radius:0.5rem;
  width:97%;
}
#submit textarea {
  display:block;
  padding:1.5%;
  margin:0 2.5%;
	font-size:0.95rem;
  border:0.1rem solid;
  border-radius:0.5rem;
  width:92%; height:10rem;
}
</style>
</head>
<body>

  <div id="header">
  <a href="/cando/"><span class="we">We</span> <span class="hold">are</span> <span class="dai">the</span> <span class="on"><b>chotto crazy</b></span></a>
  <a><b>Submit</b></a>
  </div>
  <div id="programs">
  <div id="logo"><span class="we">We</span> <span class="hold">are</span> <span class="dai">the</span><br/>
  <p id="message" class="center"><span class="by">creative, community space</span></p>
  <i class="on">Chotto Crazy</i>
  </div>
  <section id="submit">
  <form id="information" action="complete.php" method="post">
  <div class="org">
  <p><input type="text" name="date" placeholder="名前" required></p>
  <p><input type="email" name="id" placeholder="メールアドレス" required></p>
<hr/>
  <div class="search-box how">
  <ul>
<li>
<input type="radio" name="how" value="think" id="think">
<label for="think" class="label">思考</label></li>
<li>
<input type="radio" name="how" value="organize" id="organize">
<label for="organize" class="label">整理</label></li>
<li>
<input type="radio" name="how" value="communication" id="communication">
<label for="communication" class="label">交流</label></li>
<li>
<input type="radio" name="how" value="create" id="create">
<label for="create" class="label">制作</label></li>
<li>
<input type="radio" name="how" value="refresh" id="refresh">
<label for="refresh" class="label">休憩</label></li>
  </ul>
  </div>
<p><input type="text" name="what" placeholder="実現したいこと" required></p>
<p>実現したいことを詳しく説明できますか？<br/>
<input type="radio" name="info_more" value="block" id="block">
<label for="block" class="label">はい</label>
<input type="radio" name="info_more" value="none" id="none">
<label for="none" class="label">いいえ</label>
</p>
  <textarea name="info" placeholder="実現したいことの詳しい説明"></textarea>
<hr/>
<p>実現したいこと一覧ページにプロフィールを掲載しますか？<br/>
<input type="radio" name="pro_more" value="block" id="block">
<label for="block" class="label">はい</label>
<input type="radio" name="pro_more" value="none" id="none">
<label for="none" class="label">いいえ</label>
</p>
  <textarea name="pro" placeholder="プロフィール"></textarea>
<hr/>
<p>ウェブサイトやSNSのリンクを掲載しますか？<br/>
<input type="radio" name="link" value="block" id="block">
<label for="block" class="label">はい</label>
<input type="radio" name="link" value="none" id="none">
<label for="none" class="label">いいえ</label>
</p>
  <p><input type="url" name="url" placeholder="リンク" required></p>
  </div>
  <button type="submit">Submit</button>
  </form>
  </section>
  </div>

<p id="marquee"><span>ちょっとクレイジーな素晴らしいアイデアや、ちょっとクレイジーな創造的チャレンジを、様々な方法で実現します。</span></p>
</body>
</html>

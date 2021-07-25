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
<title>大 chotto crazy | あなたの実現したいことは何ですか？</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/js/programs.js"></script>
<link rel="stylesheet" href="style.css" />
<style type="text/css">
hr {border:none; margin:1rem;}
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
	font-size:0.95rem;
  border:0.1rem solid;
  border-radius:0.5rem;
  width:97%; height:10rem;
}
</style>
</head>
<body>

<section id="submit">
<form id="information" action="complete.php" method="post">
<p>あなたの実現したいことは何ですか？<br/><input type="text" name="what" placeholder="実現したいこと" required></p>
<p>実現したいことを詳しく説明できますか？<br/>
<input type="radio" name="info_more" value="block" id="block">
<label for="block" class="label">はい</label>
<input type="radio" name="info_more" value="none" id="none">
<label for="none" class="label">いいえ</label>
</p>
<p class="info_form"><textarea name="info" placeholder="実現したいことの詳しい説明"></textarea></p>
  <div class="search-box how">
    <p>あなたの実現したいことは、</p>
  <ul>
<li>
<input type="radio" name="how" value="think" id="sub_think">
<label for="sub_think" class="label">思考</label></li>
<li>
<input type="radio" name="how" value="organize" id="sub_organize">
<label for="sub_organize" class="label">整理</label></li>
<li>
<input type="radio" name="how" value="communication" id="sub_communication">
<label for="sub_communication" class="label">交流</label></li>
<li>
<input type="radio" name="how" value="create" id="sub_create">
<label for="sub_create" class="label">制作</label></li>
<li>
<input type="radio" name="how" value="refresh" id="sub_refresh">
<label for="sub_refresh" class="label">休憩</label></li>
  </ul>
    <p>の どれに当てはまりますか？</p>
  </div>
<hr/>
<hr/>
<p>実現したいこと一覧ページにプロフィールを掲載しますか？<br/>
<input type="radio" name="pro_more" value="block" id="pro_block">
<label for="pro_block" class="label">はい</label>
<input type="radio" name="pro_more" value="none" id="pro_none">
<label for="pro_none" class="label">いいえ</label>
</p>
  <p><input type="text" name="date" placeholder="名前" required></p>
  <textarea name="pro" placeholder="プロフィール"></textarea>
<hr/>
<p>プロフィールにウェブサイトやSNSのリンクを掲載しますか？<br/>
<input type="radio" name="link" value="block" id="link_block">
<label for="link_block" class="label">はい</label>
<input type="radio" name="link" value="none" id="link_none">
<label for="link_none" class="label">いいえ</label>
</p>
  <p><input type="url" name="url" placeholder="リンク"></p>
<hr/>

<p>実現する際に連絡を希望するメールアドレスをご入力ください。<br/><input type="email" name="id" placeholder="メールアドレス" required></p>
  <button type="submit">投稿する</button>
  </form>
  </section>

</body>
</html>

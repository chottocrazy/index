<?php
$request_param = $_POST;
$mailto = $request_param['email'];
$to = 'we.are.pe.hu@gmail.com';
$mailfrom = "we.are.pe.hu@gmail.com";
$subject = "大 chotto crazy 2021";

$content = "";
$content .= $request_param['name']. "様\r\n";
$content .= "\r\nご応募ありがとうございます。\r\n";
$content .= "以下の内容であなたの実現したいことを受け付けました。\r\n";
$content .= "\r\n";
$content .= "実現したいこと\r\n" . htmlspecialchars($request_param['content'])."\r\n\r\n";
$content .= "ご応募ありがとうございました。\r\n\r\n\r\n";
$content .= "大 chotto crazy 2021\r\n";
$content .= "http://chottocrazy.pe.hu/";


mb_language("ja");
mb_internal_encoding("UTF-8");
//mail 送信
if($request_param['token'] === '1234567'){
if(mb_send_mail($to, $subject2, $content2, $mailfrom)){
    mb_send_mail($mailto,$subject,$content,$mailfrom);
    ?>
    <script>
        window.location = '/entry/all.php';
    </script>
    <?php
} else {
    header('Content-Type: text/html; charset=UTF-8');
  echo "メールの送信に失敗しました";
};
} else {
echo "";
}

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$content = (string)filter_input(INPUT_POST, 'content'); // $_POST['content']
$name = (string)filter_input(INPUT_POST, 'name'); // $_POST['name']
$email = (string)filter_input(INPUT_POST, 'email'); // $_POST['email']
$when = (string)filter_input(INPUT_POST, 'when'); // $_POST['when']
$where = (string)filter_input(INPUT_POST, 'where'); // $_POST['where']
$why = (string)filter_input(INPUT_POST, 'why'); // $_POST['why']
$how = (string)filter_input(INPUT_POST, 'how'); // $_POST['how']
$public = (string)filter_input(INPUT_POST, 'public'); // $_POST['public']

$fp = fopen('2021.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$content, $name, $email, $when, $where, $why, $how, $public ]);
    rewind($fp);
}

flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
?>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
$("#").load("");
})
</script>
<style type="text/css">
@font-face {
  font-family: "inscrutable";
  src: url(/font/inscrutable.otf);
}
@font-face {
  font-family: "Orchard";
  src: url(/font/Orchard-Linear.otf);
}
.bg_fff,
.bg_font {
  font-family:"inscrutable"; overflow: hidden;
}
.hold:before,
b, h1, h3 {
  font-family:"Orchard";
}
</style>
<link rel="stylesheet" type="text/css" href="/css/top.css" />
<link rel="stylesheet" type="text/css" href="/css/entry.css" />
<title>大 chotto crazy 2021 | We Support your Amazing Ideas and Creative Challenges</title>
</head>
<body>
<div id="full">
<div id="main">
<div id="wide">
<h2 style="font-size:2rem; text-align:center; line-height: 200%;" class="center"><b>Let's Entry Your Amazing Ideas and Creative Challenges.</b></h2>
</div>
<div id="wide">
<div id="logo" class="center">
<span class="message">あなたの実現したいことは何ですか？</span>
<h2 id="logo" style="zoom:1.5;">
<span class="dai">the</span> <span class="two"><b>chotto crazy</b></span>
</h2>
</div>
</div>
<span class="bg_fff">Powerful, Energetic, Healthy, Unity</span>
</div>
<div id="normal">
<div id="" class="center">
<h2 class="schedule">
<span id="sub">公募期間</span><br/>
<span class="contents">2021年4月1日 (木) - 5月15日 (水)</span>
</h2>
<h2>
<span class="sub">個人面談</span><br/>
<span class="contents">2021年4月5日 - 4月30日</span><br/>
ご応募頂いた方々と個人面談を行い、大 chotto crazy 2021 で実現するプログラムを決定します。<br/><br/></h2>
</div>
</div>
<div id="normal">
<div id="" class="center">
<h2 class="schedule">
<span class="sub">採用発表</span><br/>
<span class="contents">2021年5月1日 (土)</span><br/>
開催期間中に実現するプログラムを発表します。
</h2>
<h2>
<span class="sub">実現期間</span><br/>
<span class="contents">2021年5月1日 - 12月31日</span><br/>
大阪・北加賀屋のシェアスタジオ「音ビル」をメイン会場に、公募で集まった「実現したいこと」を様々な方法で実現します。</h2>
</div>
</div>
</div>
<section id="post">
<form class="mailForm" action="/entry/all.php" method="post">
<div id="full">
<div id="normal">
<div class="center">
<h2 class="schedule">
<span id="sub">公募内容</span><br/>
<span class="contents"><i class="yes">やりたい</i></span><br/>
<span class="contents"><i class="no">やりたくない</i></span><br/>
<span class="contents"><i class="or">やらなくてもいい</i></span>
<p><i>創造的チャレンジ</i> や<br/>
<i>素晴らしいアイデア</i>を</p>
募集します。
</h2>
</div>
<span class="bg_fff">What Do You Want to Do?</span>
</div>
<div id="normal">
<div id="form">
<h2><span id="sub" class="name">名前</span><br/>
<input type="text" id="name" name="name"  required></h2>
<h2><span id="sub">メールアドレス</span><br/>
<input type="email" id="email" name="email" required></h2>
<div id="about">
<p>あなたの実現したいことと実現までの計画を公開してもよろしいですか？</p>
<p>
<input type="radio" name="public" value="yes" id="yes" required>
<label for="yes" class="radio">はい</label>
<input type="radio" name="public" value="none" id="no" required>
<label for="no" class="radio">いいえ</label>
</p>
</div>
</div>
<span class="bg_fff">Your Name / Email Address</span>
</div>
<div id="main" style="background:#eee;">
<div id="form">
<h2 id="what"><span id="sub" class="type">あなたの実現したいことは何ですか？</span><br/>
<textarea type="text" id="content" name="content" required></textarea></h2>
</div>
<span class="bg_fff"> Let's Type Your Amazing Ideas and Creative Challenges </span>
</div>
<div id="normal">
<div id="form">
<h2><span id="sub" class="when">いつまでに実現したいですか？</span><br/>
<input type="text" id="when" name="when" required></h2>
<h2><span id="sub">どこで実現したいですか？</span><br/>
<input type="text" id="where" name="where" required></h2>
<br/>
<div id="about">
<p><b>実現したいことを実現する</b>までの<b>簡単な計画</b>をご記入下さい。</p>
</div>
</div>
<span class="bg_fff">When / Where you want to do?</span>
</div>
<div id="normal">
<div id="form">
<h2 id="why"><span id="sub" class="type">なぜ実現したいと思いましたか？</span><br/>
<textarea type="text" id="why" name="why" required></textarea></h2>
</div>
<span class="bg_fff"> Why Do You Want to do? </span>
</div>
<div id="main" style="background:#eee;">
<div id="form">
<h2 id="how"><span id="sub" class="type">実現までの計画を考えてみましょう</span><br/>
<textarea type="text" id="how" name="how" required></textarea></h2>
</div>
<span class="bg_fff"> Let's Type Your Plan to do </span>
</div>
</div>
<div id="full">
<h2 id="submit">
<span>
<input type="hidden" id="token" name="token" value="1234567" />
<button class="mailForm__submit" type="submit">実現したいことを応募する</button>
</span>
</h2>
</div>
</form>
</section>
</body>
</html>

<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$how = (string)filter_input(INPUT_POST, 'how');
$what = (string)filter_input(INPUT_POST, 'what');
$year = (string)filter_input(INPUT_POST, 'year');
$date = (string)filter_input(INPUT_POST, 'date');
$info = (string)filter_input(INPUT_POST, 'info');
$state = (string)filter_input(INPUT_POST, 'state');
$more = (string)filter_input(INPUT_POST, 'more');

$fp = fopen('submit.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$how, $what, $year, $date, $info, $state, $more]);
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
.hold, .dai {
  color:#eee;
  letter-spacing: 0rem;
}
.hold:before {
  content:"hold";
  color:#555;
  font-style:italic;
  position:absolute;
  font-weight: 555;
  margin-top:0.5rem;
  margin-left:-0.5rem;
}
.on {
  padding-left:0.75rem;
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
.by:after {
  content:"∧°┐";
  font-size:125%;
  margin-left:0.5rem;
  font-style: normal;
}
#org h2 {position:relative; z-index:100;}
#title {
  margin-bottom:1.25rem;
}
input[type="text"],
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
  padding:0.5rem;
  margin:1rem 0;
	font-size:1.25rem;
  border:0.1rem solid;
  border-radius:0.5rem;
  width:100%; height:10rem;
}
#submit button {
  font-size: 2rem;
  cursor:pointer;
  width:100%;
  padding:1rem 0;
  background: #fff;
  color: #000;
  border-radius:2.5rem;
}
</style>
</head>
<body>

  <div id="header">
  <a href="/"><span class="we">We</span> <span class="hold">are</span> <span class="dai">the</span> <span class="on"><b>chotto crazy</b></span></a>
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
  実現したいこと
  <p><input type="text" name="date" placeholder="名前" required></p>
  <p><input type="text" name="what" placeholder="実現したいこと" required></p>
  <p><input type="text" name="year" placeholder="いつ実現したいですか？" required></p>

  <div class="search-box how">
  <ul>
  <li>
  <input type="radio" name="how" value="max" id="max">
  <label for="max" class="label">展覧会・アトラクション</label></li>
  <li>
  <input type="radio" name="how" value="communication" id="oneday">
  <label for="oneday" class="label">限定開催</label></li>
  <li>
  <input type="radio" name="how" value="creation" id="series">
  <label for="series" class="label">定期開催</label></li>
  <li>
  <input type="radio" name="how" value="online" id="online">
  <label for="online" class="label">オンライン</label></li>
  </ul>
  </div>
  <p><input type="email" name="state" placeholder="メールアドレス" required></p>
  </div>
  <div class="list">
  <ul>
  <textarea name="info" placeholder="説明文" required></textarea>
  </ul>
  </div>
  <button type="submit">Submit</button>
  </form>
  </section>
  </div>

<p id="marquee"><span>ちょっとクレイジーな素晴らしいアイデアや、ちょっとクレイジーな創造的チャレンジを、様々な方法で実現します。</span></p>
</body>
</html>

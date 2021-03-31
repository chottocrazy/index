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

$fp = fopen('pehu.csv', 'a+b');
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
<meta http-equiv="refresh" content="3;URL=/weare/">
<title>大 chotto crazy by Pehu</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/js/programs.js"></script>
<link rel="stylesheet" href="/css/about.css" />
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
</style>
</head>
<body>
<div id="header">
<a href="/"><span class="we">We</span> <span class="hold">are</span> <span class="dai">the</span> <span class="on"><b>chotto crazy</b></span></a>
<a><b>by pehu</b></a>
</div>
<div id="programs">
<div id="logo"><span class="we">We</span> <span class="hold">are</span> <span class="dai">the</span><br/>
<p id="message" class="center"><span class="by">creative, community space</span></p>
<i class="on">Chotto Crazy</i>
</div>
<br/>
<div class="center">
<h1><b class="on">Complete</b></h1>
</div>
</div>
</body>
</html>

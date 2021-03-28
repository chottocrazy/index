<?php

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
flock($fp, LOCK_UN);
fclose($fp);

?>
<!DOCTYPE html>
<head>
<meta http-equiv="Refresh" content="3;URL=http://chottocrazy.pe.hu/">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="/css/ideas.css" rel="stylesheet">
<title>大 chotto crazy | We Support your Amazing Ideas and Creative Challenges</title>
<style type="text/css">
html, body {padding:0; margin:0;}
#foot {
  display:block;
  position:relative;
  top:0; left:0;
  width:100%;
  height:100vh;
}
#foot .inside h1 {
  width:50vw;
  position:absolute;
  top:47.5%; left:50%;
  padding:0; margin:0;
  transform: translate(-50%, -50%);
  font-size: 10vw; font-weight:500;
  font-family: "SF Compact", sans-serif; 
}
#foot .inside p {
  font-size:2.5vw;
  width:100%;
  text-align:center;
  position:absolute;
  top:90%; left:50%;
  transform: translate(-50%, -50%);
  font-family: "SF Compact", sans-serif; 
}
#foot .inside b {
  border:0.25vw solid;
  background:#fff;
  padding:0.5vw 2.5vw;
  border-radius:2rem;
}

</style>
</head>
<body>
<div id="foot">
<div class="inside">
<h1><span id="rename"></span></h1>
<p class="notice"><b>ご投稿ありがとうございました</b></p>
</div>
</div>
<script>
var text = ["Thank You","for", "Submit" ];
var counter = 0;
var elem = document.getElementById("rename");
var inst = setInterval(change, 750);

elem.innerHTML = text[counter];

function change() {
  elem.innerHTML = text[counter];
  counter++;
  if (counter >= text.length) {
    counter = 0;
  }
};
</script>

</body>

<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$content = (string)filter_input(INPUT_POST, 'content'); // $_POST['content']
$name = (string)filter_input(INPUT_POST, 'name'); // $_POST['name']
$when = (string)filter_input(INPUT_POST, 'when'); // $_POST['when']
$where = (string)filter_input(INPUT_POST, 'where'); // $_POST['where']
$why = (string)filter_input(INPUT_POST, 'why'); // $_POST['why']
$how = (string)filter_input(INPUT_POST, 'how'); // $_POST['how']

$fp = fopen('2021.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$content, $name, $when, $where, $why, $how ]);
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
<link rel="stylesheet" type="text/css" href="/css/ccm.css" />
<title>大 chotto crazy 2021 | We Support your Amazing Ideas and Creative Challenges</title>
<style type="text/css">
</style>
</head>
<body>
<section id="submit">
<form action="2021.php" method="post">
<p>実現したいこと<br/>
<input type="name" name="content" required></p>
<p>名前 (日本語)<br/>
<input type="name" name="name" required></p>
<p>いつ<br/>
<input type="text" name="when" required></p>
<p>どこで<br/>
<input type="text" name="where" required></p>
<p>なぜ<br/>
<textarea name="why" rows="7.5" required></textarea></p>
<p>エントリー用紙 URL<br/>
<input type="url" name="how"></p>
<button type="submit">Submit</button>
</form>
</section>
</body>

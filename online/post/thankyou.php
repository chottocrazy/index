<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$post = (string)filter_input(INPUT_POST, 'post');

$fp = fopen('post.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$post,]);
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
<meta http-equiv="refresh" content="1;URL=index.php">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="ramdom.js"></script>
<title>POST | 大 chotto crazy</title>
<link rel="stylesheet" type="text/css" href="post.css" />
</head>
<body>
<h1 class="top">ご投稿ありがとうございました</h1>
<div id="list">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<button><?=h($row[0])?></button>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>
</div>
</body>
</html>
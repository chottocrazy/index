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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="ramdom.js"></script>
<title>POST | 大 chotto crazy</title>
<link rel="stylesheet" type="text/css" href="post.css" />
</head>
<body>
<div class="popup" id="about" style="display:none;">
<p><iframe src="about.php"></iframe></p>
<span class="close" onclick="obj=document.getElementById('about').style; obj.display=(obj.display=='none')?'block':'none';">✕</span>
</div>

<section id="submit">
<p class="tate" onclick="obj=document.getElementById('about').style; obj.display=(obj.display=='none')?'block':'none';">DOWNLOAD</p>
<h2 class="top">あなたの実現したいことは何ですか？</h2>
<form action="thankyou.php" method="post">
<p class="center"><textarea name="post" placeholder="Let's Type Your Amazing Ideas and Creative Challenges" required></textarea></p>
<p class="bottom"><button type="submit">POST</button></p>
</form>
</section>
<div id="list">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<button><?=h($row[0])?></button>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>
</div>
</body>
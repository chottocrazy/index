<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
$("#creditonline").load("/online/map.php");
$("#workshop").load("/online/workshop.php");
$("#first").load("/online/2020.php");
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
.hold:before,
.center b,
#year,
#marquee {
  font-family:"Orchard";
}
.bg_fff,
.bg_font {
  font-family:"inscrutable";
}
#sign  {
  width:100%; height:23rem;
  border:none;
  overflow:hidden;
}
#howtocoding, #workshop
{overflow:auto; height:23rem;}

#howtocoding #introduce
{zoom:0.75;}
hr {clear: both; border: none;}
</style>
<link rel="stylesheet" type="text/css" href="/css/top.css" />
<link rel="stylesheet" type="text/css" href="/css/popup.css" />
<title>オンライン発表 | 大 chotto crazy 2021</title>
</head>
<body>
<div id="full">
<div id="normal">
<iframe id="sign" src="/2021/online/matter/logo.html"></iframe>
</div>
<div id="normal">
<iframe id="sign" src="/2021/online/p5/"></iframe>
</div>
<div id="main">
<iframe id="sign" src="/2021/online/tone/"></iframe>
</div>
<div id="normal">
<a id="link" href="http://newlifecollection.pe.hu/" target="_parent"></a>
<iframe id="sign" src="http://newlifecollection.pe.hu/sign/"></iframe>
</div>
<div id="normal" style="background:#fff;">
<iframe id="sign" src="http://vg.pe.hu/jp/cm/kaochomex/think/list.php"></iframe>
</div>
</div>
<div id="first"></div>
</body>
</html>

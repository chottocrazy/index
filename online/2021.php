<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
$("#order").load("http://creative-community.pe.hu/coding/submit/order/form.html");
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
<link rel="stylesheet" type="text/css" href="/css/map.css" />
<link rel="stylesheet" type="text/css" href="/css/top.css" />
<link rel="stylesheet" type="text/css" href="/css/popup.css" />
<title>オンライン発表 | 大 chotto crazy 2021</title>
</head>
<body>
<div id="full">
<div id="normal">
<iframe id="sign" src="/2021/online/matter/"></iframe>
</div>
<div id="normal">
<iframe id="sign" src="/2021/online/p5/"></iframe>
</div>
<div id="main">
<iframe id="sign" src="/2021/online/tone/"></iframe>
</div>
<div id="main">
<a id="link" href="http://newlifecollection.pe.hu/" target="_blank" rel="noopener noreferrer"></a>
<iframe id="sign" src="http://newlifecollection.pe.hu/sign/"></iframe>
</div>
<div id="normal" style="background:#fff;">
<iframe id="sign" src="http://vg.pe.hu/jp/about/motto.html"></iframe>
</div>
<div id="normal" style="background:#fff;">
<iframe id="sign" src="http://vg.pe.hu/jp/cm/kaochomex/think/list.php"></iframe>
</div>
<div id="normal" style="background:#fff;">
<a id="link" href="http://creative-community.pe.hu/coding/submit/org/" target="_blank" rel="noopener noreferrer"></a>
<iframe id="sign" src="http://creative-community.pe.hu/coding/submit/org/demo.php"></iframe>
</div>
<div id="normal" style="background:#fff;">
<iframe id="sign" src="http://creative-community.pe.hu/coding/submit/contents.php"></iframe>
</div>
<div id="normal">
  <div id="wide">
  <span id="title">お問い合わせ</span>
  <div id="logo" class="center">
  <b class="on">Contact Form</b>
  </div>
  </div>
  <div id="wide">
  <div id="about" class="center">
  <p><u>ウェブサイト制作</u>・<u>ワークショップ開催</u> のご依頼などのお問い合わせは、 <u>こちら</u> のフォームよりご連絡ください。</p>
  </div>
  <span class="bg_fff">Chotto Crazy Programs</span>
  </div>
  <a id="link" onclick="obj=document.getElementById('contactform').style; obj.display=(obj.display=='none')?'block':'none';"></a>
</div>
<div id="normal">
<iframe id="sign" src="http://newlifecollection.pe.hu/beta/special.php"></iframe>
</div>
</div>
<div class="popup" id="contactform" style="display:none;">
<p><iframe src="http://creative-community.pe.hu/coding/submit/order/"></iframe></p>
<span class="close" onclick="obj=document.getElementById('contactform').style; obj.display=(obj.display=='none')?'block':'none';">✕</span>
</div>
</body>
</html>

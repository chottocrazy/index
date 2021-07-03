<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
$("#howtocoding").load("/online/howtocoding.html");
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
<title>オンライン発表 | 大 chotto crazy</title>
</head>
<body>
<div id="full">
<div id="main">
<div id="howtocoding"></div>
</div>

<div id="normal">
  <div id="wide">
    <p id="logo" class="center">
    <span class="message">オンライン発表</span>
    </p>
    <div id="logo" class="center">
    <b class="on">How to Coding</b>
    </div>
    </div>
    <div id="wide">
    <div id="about" class="center">
    <p>これまでに制作した大 chotto crazy 関連の<u>ウェブサイト</u>一覧</p>
  </div>
  <span class="bg_fff">Chotto Crazy Programs</span>
</div>
<a id="link" href="/online/" target="_parent"></a>
</div>

<div id="normal">
  <div id="wide">
  <p id="logo" class="center">
  <span class="message">お問い合わせ</span>
  </p>
  <div id="logo" class="center">
  <b class="on">Contact Form</b>
  </div>
  </div>
  <div id="wide">
  <div id="about" class="center">
  <p><u>ウェブサイト制作</u>・<u>ワークショップ開催</u> として <u>採用</u> のご依頼などのお問い合わせは、 <u>こちら</u> のフォームよりご連絡ください。</p>
  </div>
  <span class="bg_fff">Chotto Crazy Programs</span>
  </div>
  <a id="link" onclick="obj=document.getElementById('contactform').style; obj.display=(obj.display=='none')?'block':'none';"></a>
</div>
</div>
<hr/>
<div class="popup" id="contactform" style="display:none;">
<p><iframe src="http://creative-community.pe.hu/coding/submit/order/"></iframe></p>
<span class="close" onclick="obj=document.getElementById('contactform').style; obj.display=(obj.display=='none')?'block':'none';">✕</span>
</div>
</body>
</html>

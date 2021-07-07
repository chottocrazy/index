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
<title>限定開催 | 大 chotto crazy</title>
</head>
<body>
<div id="full">

<div id="normal">
  <div id="wide">
    <p id="logo" class="center">
    <span class="message">限定開催</span>
    </p>
    <div id="logo" class="center">
    <b class="on">FREE TIME</b>
    </div>
    </div>
    <div id="wide">
    <div id="about" class="center">
    <p>実現したいことを実現するために制作した 大 chotto crazy 関連の <u>ウェブサイト</u> 一覧</p>
  </div>
  <span class="bg_fff">Chotto Crazy Programs</span>
</div>
<a id="link" href="/online/" target="_parent"></a>
</div>

<div id="normal">
  <div id="wide">
  <p id="logo" class="center">
  <span class="message">ウェブサイトを作る</span>
  </p>
  <div id="logo" class="center">
  <b class="on">Workshop</b>
  </div>
  </div>
  <div id="wide">
  <div id="about" class="center">
  <p>More Info Soon</p>
  </div>
  <span class="bg_fff">Chotto Crazy Programs</span>
  </div>
</div>

<div id="main">
<div id="howtocoding"></div>
</div>
</div>
<hr/>
<div class="popup" id="contactform" style="display:none;">
<p><iframe src="http://creative-community.pe.hu/coding/submit/order/"></iframe></p>
<span class="close" onclick="obj=document.getElementById('contactform').style; obj.display=(obj.display=='none')?'block':'none';">✕</span>
</div>
</body>
</html>

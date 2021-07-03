<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
$("#").load("");
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
<span id="title">映像集</span>
<div id="logo" class="center">
<b class="on">How to Coding</b>
</div>
</div>
<div id="wide">
<div id="about" class="center">
<p><u>ウェブサイトの作り方</u> を紹介する映像を <u>YouTube</u> に公開します。</p>
</div>
</div>
<span class="bg_fff">How to Coding Videos</span>
<a id="link" onclick="obj=document.getElementById('videos').style; obj.display=(obj.display=='none')?'block':'none';"></a>
</div>
</div>
<div class="popup" id="videos" style="display:none;">
<p><iframe width="100%" height="100%" src="https://www.youtube.com/embed/videoseries?list=PLNxErRQ8jPVauFoKkIC1eME0G7t-97RdK" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></p>
<span class="close" onclick="obj=document.getElementById('videos').style; obj.display=(obj.display=='none')?'block':'none';">✕</span>
</div>
</body>
</html>

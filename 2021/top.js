var str = "";
var sentences = str.split(".");
var lastScrollTop = 0;
var reverse = false;

var synth = new Tone.AMSynth().toMaster();
var autoFilter = new Tone.AutoFilter({
}).connect(Tone.Master);

autoFilter.start()
StartAudioContext(Tone.context, 'div');
//have to click to start audio context
$('div').click(function(){
  Tone.start();
});

$(window).scroll(function(event){
  var st = $(this).scrollTop();
  console.log(st);
  if (st > lastScrollTop){
  //scrolled down
synth.triggerAttackRelease("C4", 1);
  } else {
  //scrolled up
    synth.triggerAttackRelease("G4", 1);
  }
  lastScrollTop = st;

});



$(window).resize(function(){
  w = $(window).width();
  h = $(window).height();
});

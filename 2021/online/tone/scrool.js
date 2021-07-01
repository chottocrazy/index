var str = "";
var sentences = str.split(".");
var lastScrollTop = 0;
var reverse = false;

var synth = new Tone.AMSynth().toMaster();
var notes = Tone.Frequency("G2").harmonize([1, 3, 6, 8, 10,
                                            3, 6, 8, 10, 13,
                                            6, 8, 10, 13, 15,
                                            8, 10, 13, 15, 18,
                                            10, 13, 15, 18, 20,
                                            13, 15, 18, 20, 22,
                                            15, 18, 20, 22, 25,
                                            18, 20, 22, 25, 27,
                                            20, 22, 25, 27, 30,
                                            22, 25, 27, 30, 32,
                                            25, 27, 30, 32, 34,
                                            27, 30, 32, 34, 37]);
var noteIndex = 0;

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
synth.triggerAttackRelease(notes[noteIndex], "8n");
  } else {
  //scrolled up
synth.triggerAttackRelease(notes[noteIndex], "8n");
  }
  lastScrollTop = st;


});



$(window).resize(function(){
  w = $(window).width();
  h = $(window).height();
});

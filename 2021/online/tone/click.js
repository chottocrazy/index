StartAudioContext(Tone.context, window);
$(window).click(function(){
    Tone.context.resume();
});

var synth = new Tone.PolySynth(5, Tone.Synth).toMaster();
var notes = Tone.Frequency("E3").harmonize([0, 2, 5, 7, 9, 12]);
var noteIndex = 0;

$("body").click(function(e){
    var randNote = Math.floor(Math.random() * notes.length);
    synth.triggerAttackRelease(notes[randNote], "8n");
});

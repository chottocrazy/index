StartAudioContext(Tone.context, window);
$(window).click(function(){
    Tone.context.resume();
});

var synth = new Tone.PolySynth(5, Tone.Synth).toMaster();
var notes = Tone.Frequency("E3").harmonize([0, 2, 5, 7, 9, 12,
                                            3, 6, 8, 10, 13,
                                            6, 8, 10, 13, 15,
                                            8, 10, 13, 15, 18,
                                            10, 13, 15, 18, 20,
                                            13, 15, 18, 20, 22,
                                            15, 18, 20, 22, 25]);
var noteIndex = 0;

$("body").click(function(e){
    var randNote = Math.floor(Math.random() * notes.length);
    synth.triggerAttackRelease(notes[randNote], "8n");
});

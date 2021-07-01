StartAudioContext(Tone.context, window);
$(window).click(function(){
    Tone.context.resume();
});

var click = new Tone.FMSynth(5, Tone.Synth).toMaster();
var notes = Tone.Frequency("A4").harmonize([7, 9, 12, 15, 17, 20,
                                            9, 12, 15, 17, 20, 22,
                                            12, 15, 17, 20, 22, 25]);
var noteIndex = 0;

$("body").click(function(e){
    var randNote = Math.floor(Math.random() * notes.length);
    click.triggerAttackRelease(notes[randNote], "8n");
});

$(function() {
    var arr = [];
    $("#ramdom div").each(function() {
        arr.push($(this).html());
    });
    arr.sort(function() {
        return Math.random() - Math.random();
    });
    $("#ramdom").empty();
    for(i=0; i < arr.length; i++) {
        $("#ramdom").append('<div class="block png">' + arr[i] + '</div>');
    }
});
$(function() {
    var arr = [];
    $("#list button").each(function() {
        arr.push($(this).html());
    });
    arr.sort(function() {
        return Math.random() - Math.random();
    });
    $("#list").empty();
    for(i=0; i < arr.length; i++) {
        $("#list").append('<button>' + arr[i] + '</button>');
    }
});
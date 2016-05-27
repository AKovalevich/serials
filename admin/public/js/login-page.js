$(function () {
  $("#valid").click(function() {
    $(".admin").addClass("up").delay( 100 ).fadeOut( 100 );
    $(".cms").addClass("down").delay( 150 ).fadeOut( 100 );
  });
});
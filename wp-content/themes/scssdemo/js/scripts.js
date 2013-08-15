//copied and called on index.php to negate one more http req.

$(document).ready(function() {
  $(".toggle").click(function(e) {
  	e.preventDefault();
  	$("#page").toggleClass("sidebar");
  	$("#navwrap").toggleClass("sidebar");
  });
});
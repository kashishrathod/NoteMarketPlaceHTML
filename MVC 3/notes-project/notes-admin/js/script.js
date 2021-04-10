$(document).ready(function () {
  for (i = 1; i < 9; i++) {
    for (j = 5; j >= 1; j--) {
      $('.rate' + i + ' .rate').append('<input type="radio" id="s_' + i + '_' + j + '" name="rate' + i + '" value="5" /><label for="s_' + i + '_' + j + '" title="text">5 stars</label>');
    }
  }
});
// password

$(".toggle-password").click(function () {

  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

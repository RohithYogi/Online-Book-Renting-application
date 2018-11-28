// Responsive Search Box Widget
// Made with ❤ by @Pawan_Mall
// http://www.pawanmall.net

function ChangeColor() {
  var color = document.getElementById('myColor').value;
  document.getElementById('ColorCode').style.color = color; 
  document.getElementById('search-button').style.background = color;
  document.getElementById("ColorCode").innerHTML = color;
}

$(document).ready(function() {

  function toggleSidebar() {
    $(".button").toggleClass("active");
    $("main").toggleClass("move-to-left");
    $(".sidebar-item").toggleClass("active");
  }

  $(".button").on("click tap", function() {
    toggleSidebar();
  });

  $(document).keyup(function(e) {
    if (e.keyCode === 27) {
      toggleSidebar();
    }
  });

});
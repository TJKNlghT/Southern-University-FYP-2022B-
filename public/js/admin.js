jQuery(function ($) {

    $(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
  }
});

$("#close-sidebar").click(function() {
  $(".page-wrapper").removeClass("toggled");
});

$("#show-sidebar").click(function() {
  $(".page-wrapper").addClass("toggled");
});

function closeSideBar () {
  $(".page-wrapper").removeClass("toggled");
}

Window.onload = closeSideBar();
   
});


/*Real Time Clock*/
$(document).ready(function() {
setInterval( function() {
var hours = new Date().getHours();
$(".hours").html(( hours < 10 ? "0" : "" ) + hours);
}, 1000);
setInterval( function() {
var minutes = new Date().getMinutes();
$(".min").html(( minutes < 10 ? "0" : "" ) + minutes);
},1000);
setInterval( function() {
var seconds = new Date().getSeconds();
$(".sec").html(( seconds < 10 ? "0" : "" ) + seconds);
},1000);
});
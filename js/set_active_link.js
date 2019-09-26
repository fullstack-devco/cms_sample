$(document).ready(function() {
  $(".offers-content-main").click(function() {
    location.href = "#contact";
  });
});

$("#menu").onePageNav({
  currentClass: "active",
  changeHash: false,
  scrollSpeed: 750,
  scrollThreshold: 0.5,
  filter: "",
  easing: "swing"
});

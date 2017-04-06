//script to open styles options
$(document).ready(function (e) {
    $("#change_theme").click(function(evt) {
          evt.preventDefault();
          $("#color_themes").slideToggle(400);
          $("#change_icon").toggleClass("glyphicon-arrow-down glyphicon-arrow-up");
    });
});
//end script to open styles options

//script to dinamically change the style
$(document).ready(function() {
    $("#style_grey").click(function(evt) {
        evt.preventDefault();
        $('head').append('<link rel="stylesheet" href="assets/style.css" type="text/css" />');
    });
    $("#style_blue").click(function(evt) {
        evt.preventDefault();
        $('head').append('<link rel="stylesheet" href="assets/style_blue.css" type="text/css" />');
    });
    $("#style_green").click(function(evt) {
        evt.preventDefault();
        $('head').append('<link rel="stylesheet" href="assets/style_green.css" type="text/css" />');
    });
    $("#style_red").click(function(evt) {
        evt.preventDefault();
        $('head').append('<link rel="stylesheet" href="assets/style_red.css" type="text/css" />');
    });
});
//end script to dinamically change the style

//script for the arrow down
$(document).ready(function(){
    $("#scroll-icon").hover(
        function() {
            $("#scroll-text").fadeIn("slow");
        },
        function() {
            $("#scroll-text").fadeOut("slow");
    });
});
//end script for the arrow down

//scroll down effect
$("a[href='#intro']").click(function(evt) {
  evt.preventDefault();
  $("html, body").animate({ scrollTop: 520 }, "slow");
  return false;
});
//end scroll down effect

//window animation on scroll
var $animation_elements = $('.animation-element');
var $window = $(window);
function check_if_in_view() {
  var window_height = $window.height();
  var window_top_position = $window.scrollTop();
  var window_bottom_position = (window_top_position + window_height);
  $.each($animation_elements, function() {
    var $element = $(this);
    var element_height = $element.outerHeight();
    var element_top_position = $element.offset().top;
    var element_bottom_position = (element_top_position + element_height);
    //check to see if this current container is within viewport
    if ((element_bottom_position >= window_top_position) &&
        (element_top_position <= window_bottom_position)) {
      $element.addClass('in-view');
    } else {
      $element.removeClass('in-view');
    }
  });
}
$window.on('scroll', check_if_in_view);
$window.on('scroll resize', check_if_in_view);
$window.trigger('scroll');
$(document).ready(function() {
    $(window).scroll( function(){
        $('#hide_me').each( function(i){
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            /* If the object is completely visible in the window, fade it in */
            if( bottom_of_window >= bottom_of_object ) {
                $(this).animate({'opacity':'1'},1000);
            }
        }); 
    });
});
//end window animation on scroll

// Modal hide on window click
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
//end modal hide on click

//show/hide scroll to top button
$("#scroll_to_top").hide(); // hide on page load
$(window).bind('scroll', function(){
    if($(this).scrollTop() > 400) { // show after 400 px of user scrolling
      $("#scroll_to_top").slideDown("slow");
    }
    else { // hide before 400 px of user scrolling
      $("#scroll_to_top").slideUp("slow");
    }
});
//end show/hide scroll to top button

//scroll to top effect
$("a[href='#top']").click(function(evt) {
  evt.preventDefault();
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});
//end scroll to top effect
$(document).ready(function(){
    $('#scroll_to_top').tooltip({animation: true}); 
});

//sidebar in admin area
$("#menu-toggle").click(function(evt) {
    evt.preventDefault();
    $("#wrapper").toggleClass("active");
    $("#main_icon").toggleClass("glyphicon-chevron-right glyphicon-chevron-left");
});
//end sidebar in admin area

//google map
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(45.64101, 25.58803),
    zoom:12
};
var marker = new google.maps.Marker({
    position: new google.maps.LatLng(45.64101, 25.58803),
    icon: "../img/house.png",
    animation:google.maps.Animation.BOUNCE,
    draggable: true
});
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
marker.setMap(map);
}
//end google map
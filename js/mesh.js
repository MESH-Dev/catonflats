var scrollLinks = document.querySelectorAll('.scroll-link');

for (var i = 0; i < scrollLinks.length; i++) {
   scrollLinks[i].addEventListener('click', function(event){
      event.preventDefault();
      var scrollId = this.href.split('#')[1];
      document.getElementById(scrollId).scrollIntoView({
         behavior: 'smooth'
      });
   });
}

jQuery(document).ready(function($){
   // init controller
   var controller = new ScrollMagic.Controller({globalSceneOptions: {
         reverse: true
      }
   });

   // build scenes
   new ScrollMagic.Scene({triggerElement: "#benefits", triggerHook: 'onLeave', offset: -52, duration: ($('#benefits').height()+90)})
               .setClassToggle(".main-navigation, .sidr-trigger", "green") // add class toggle
               //.setClassToggle(".sidr-inner", "green") // add class toggle
               .addTo(controller);
   // new ScrollMagic.Scene({triggerElement: "#press", triggerHook: 'onLeave', offset: -80, duration: $('#press').height()})
   //             .setClassToggle(".main-navigation", "green") // add class toggle
   //             .addTo(controller);
   new ScrollMagic.Scene({triggerElement: "#news", triggerHook: 'onLeave', offset: -52, duration: ($('#news').height()+80)})
               .setClassToggle(".main-navigation, .sidr-trigger", "green") // add class toggle
               .setClassToggle(".sidr-inner", "green") // add class toggle
               .addTo(controller);
   // $('nav.main-navigation').midnight();
  //Are we loaded?
  // console.log('New theme loaded!');

  //Let's do something awesome!

//Taken from https://jsfiddle.net/cse_tushar/Dxtyu/141/
$(document).on("scroll", onScroll);    

function onScroll(event){
    var scrollPos = $(document).scrollTop();
    $('.main-navigation a').each(function () {
        var currLink = $(this);
        var currLi = $(this).parent('li');
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('.main-navigation ul li').removeClass("active");
            currLi.addClass("active");
        }
        else{
            currLi.removeClass("active");
        }
    });
}

$('.main-navigation ul li a').click(function(){
   $('.main-navigation ul li').removeClass('active');
    $(this).parent('li').addClass('active');
})

  //Smooth page scroll + page scroll location control
$(function() {
$('a[href*=#]:not([href=#])').click(function() {
if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
  var target = $(this.hash);
  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
  if (target.length) {
    //alert("BAMM!");
    $('html,body').animate({
      //'top-75' is custom.  limits the offset to top of window plus 75px
      scrollTop: (target.offset().top-50)
    }, 800);
    return false;
  }
}
});
});

  //Sidr
$('.sidr-trigger').sidr({
      name: 'sidr-main',
      source: '.main-navigation',
      renaming: false,
      side: 'right',
      displace: false,
      onOpen: function(){
        new ScrollMagic.Scene({triggerElement: "#benefits", triggerHook: 'onLeave', offset: -52, duration: ($('#benefits').height()+90)})
               //.setClassToggle(".main-navigation", "green") // add class toggle
               .setClassToggle(".sidr-inner, .sidr-trigger", "green") // add class toggle
               //.setClassToggle(".sidr-trigger", "green") // add class toggle
               .addTo(controller);

         new ScrollMagic.Scene({triggerElement: "#news", triggerHook: 'onLeave', offset: -52, duration: ($('#news').height()+80)})
               .setClassToggle(".sidr-inner, .sidr-trigge", "green") // add class toggle
               //.setClassToggle(".sidr-trigger", "green") // add class toggle
               .addTo(controller);
      //}      
      }////end sidr onOpen function

 });//end sidr onOpen function

$('.close').click(
    function(){
      $.sidr('close', 'sidr-main');
      // $('.sidr-trigger').animate({right:"2em"},50);
});

//IDs would be re-used in sidr, as it is cloning our global nav
//For the sake of accessibility, we are removing IDs in the sidr menu
$('.sidr li').removeAttr('id');


});

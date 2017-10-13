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
               .setClassToggle(".main-navigation", "green") // add class toggle
               .addTo(controller);
   // new ScrollMagic.Scene({triggerElement: "#press", triggerHook: 'onLeave', offset: -80, duration: $('#press').height()})
   //             .setClassToggle(".main-navigation", "green") // add class toggle
   //             .addTo(controller);
   new ScrollMagic.Scene({triggerElement: "#news", triggerHook: 'onLeave', offset: -52, duration: ($('#news').height()+80)})
               .setClassToggle(".main-navigation", "green") // add class toggle
               .addTo(controller);
   // $('nav.main-navigation').midnight();
  //Are we loaded?
  // console.log('New theme loaded!');

  //Let's do something awesome!

});

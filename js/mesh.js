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

// jQuery(document).ready(function($){
//
//   //Are we loaded?
//   console.log('New theme loaded!');
//
//   //Let's do something awesome!
//
// });

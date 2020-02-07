    
  
      <!-- JAVASCRIPT
      ================================================== -->
      <!-- Libs JS -->
      

      <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
      <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <script src="./assets/libs/flickity/dist/flickity.pkgd.min.js"></script>
      <script src="./assets/libs/flickity-fade/flickity-fade.js"></script>
      <script src="./assets/libs/aos/dist/aos.js"></script>
      <script src="./assets/libs/smooth-scroll/dist/smooth-scroll.min.js"></script>
      <script src="./assets/libs/jarallax/dist/jarallax.min.js"></script>
      <script src="./assets/libs/jarallax/dist/jarallax-video.min.js"></script>
      <script src="./assets/libs/jarallax/dist/jarallax-element.min.js"></script>
      <script src="./assets/libs/typed.js/lib/typed.min.js"></script>
      <script src="./assets/libs/countup.js/dist/countUp.min.js"></script>
      <script src="./assets/libs/highlightjs/highlight.pack.min.js"></script>
      <script src="./assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
      <script src="./assets/libs/isotope-layout/dist/isotope.pkgd.min.js"></script>
      <script src="./assets/libs/imagesloaded/imagesloaded.pkgd.min.js"></script>
  
      <!-- Theme JS -->
      <script src="./assets/js/theme.min.js"></script>
      <script src="{{ mix('/js/app.js')}}"></script>
      <script type="text/javascript">
        
        $(document).ready(function() {
            $('.closetoggle').on('click',function(){
                $('#navcollapse').slideUp();
            })
            $('.opentoggle').on('click',function(){
                $('#navcollapse').slideDown();
            })
        });
    </script>
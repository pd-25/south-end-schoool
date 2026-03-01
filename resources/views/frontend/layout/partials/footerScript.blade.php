     <script src="{{ asset('frontend-asset/js/script.js') }}" defer></script>
     <script src="{{ asset('frontend-asset/owl-carousel/js/owl.carousel.js') }}"></script>
     <!-- End Owl pranab-->
     <script>
         $(document).ready(function() {
             var owl = $('#owl-teacher');
             owl.owlCarousel({
                 items: 4,
                 loop: true,
                 nav: true,
                 margin: 30,
                 dots: false,
                 autoplay: true,
                 autoplayTimeout: 2000,
                 autoplayHoverPause: true,
                 responsive: {
                     0: {
                         items: 1
                     },
                     600: {
                         items: 2
                     },
                     1000: {
                         items: 4
                     }
                 }
             });
             $('.play').on('click', function() {
                 owl.trigger('play.owl.autoplay', [2000])
             })
             $('.stop').on('click', function() {
                 owl.trigger('stop.owl.autoplay')
             })
         })
     </script>
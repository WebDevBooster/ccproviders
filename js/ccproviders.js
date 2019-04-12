// No-conflict jQuery function
jQuery(document).ready(function($){

    // .ccp-details-link show/hide details toggle
    $(".fnx-coin-providers .ccp-details-link a").on("click", function(e) {

        e.preventDefault();
        // Toggle .details-hide class to toggle 'show/hide details' text + up/down arrow
        $(this).toggleClass("details-hide");


        // Check if the table in the carousel item container is visible already
        function checkContainer () {
            // if the container is visible on the page
            if($('.fnx-coin-providers.container .carousel-item > table').is(':visible')){
                carouselNormalization();  // call carouselNormalization();
            } else {
                setTimeout(checkContainer, 50); // wait 50 ms, then try again
            }
        }
        checkContainer();

        // Set all .carousel-item slides i.e. details tables
        // to the min-height of the tallest table
        // to prevent provider rows from jumping up and down
        function carouselNormalization() {
            // grab all visible slides of a carousel
            var items = $('.fnx-coin-providers .carousel .carousel-item'),
                // create empty array to store height values
                heights = [],
                // create variable to make note of the tallest slide
                tallest;

            if (items.length) {
                function normalizeHeights() {
                    items.each(function() { // add heights to array
                        heights.push($(this).outerHeight());
                        // console.log($(this).outerHeight());
                    });
                    tallest = Math.max.apply(null, heights); // cache largest value
                    items.each(function() {
                        $(this).css('min-height',tallest + 'px');
                    });
                }
                normalizeHeights();

                $(window).on('resize orientationchange', function () {
                    tallest = 0;
                    heights.length = 0; // reset vars
                    items.each(function() {
                        $(this).css('min-height','0'); // reset min-height
                    });
                    normalizeHeights(); // run it again
                });
            }
        }


    });


});
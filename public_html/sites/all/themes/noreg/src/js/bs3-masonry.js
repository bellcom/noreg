// |--------------------------------------------------------------------------
// | BS3 designer
// |--------------------------------------------------------------------------
// |
// | This jQuery script is written by
// | Morten Nissen
// |
// | - Optimize form elements
// | - Attach footer to bottom of page on non-touch devices
// | - Enable BS3 tooltips on non-touch devices
// | - Disable form autocomplete on non-touch devices
// | - Apply loader icon to .btn.btn-loader on click
// | - Use appear on non-touch devices
// |

var bs3Masonry = (function ($) {
    'use strict';

    var Modernizr = {};
    var pub = {};

    /**
     * Instantiate
     */
    pub.init = function () {
        registerBootEventHandlers();
        registerEventHandlers();
    }

    /**
     * Register boot event handlers
     */
    function registerBootEventHandlers() {
        applyMasonry();
    }

    /**
     * Register event handlers
     */
    function registerEventHandlers() {

        $('.bs3-masonry-wrapper').resize(function () {
            applyMasonry();
        });

        $(window).resize(function () {
            applyMasonry();
        });
    }

    /**
     * Apply Masonry
     */
    function applyMasonry() {
        var $wrapper = $('.bs3-masonry-wrapper');

        $wrapper.imagesLoaded(function () {

            $wrapper.masonry({
                itemSelector: '.bs3-masonry-item'
            });
        });
    }

    return pub;
})(jQuery);

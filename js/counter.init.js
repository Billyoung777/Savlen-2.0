/* Theme Name: Savlen - Responsive Business Template
 Author: Billyoung
 Author e-mail: billyoungl777.bl@gmail.com
 Version: 1.0
 Created: 2023
 File Description:Main JS file of the template
 */


! function($) {
    "use strict";

    var Palexi = function() {};

    //scroll

    Palexi.prototype.initCounter = function() {
        var a = 0;
        $(window).scroll(function() {
            var oTop = $('#counter').offset().top - window.innerHeight;
            if (a == 0 && $(window).scrollTop() > oTop) {
                $('.counter-value').each(function() {
                    var $this = $(this),
                        countTo = $this.attr('data-count');
                    $({
                        countNum: $this.text()
                    }).animate({
                            countNum: countTo
                        },

                        {
                            duration: 2000,
                            easing: 'swing',
                            step: function() {
                                $this.text(Math.floor(this.countNum));
                            },
                            complete: function() {
                                $this.text(this.countNum);
                                //alert('finished');
                            }

                        });
                });
                a = 1;
            }
        });
    },

    Palexi.prototype.init = function() {
        this.initCounter();
    },
    //init
    $.Palexi = new Palexi, $.Palexi.Constructor = Palexi
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.Palexi.init();
}(window.jQuery);
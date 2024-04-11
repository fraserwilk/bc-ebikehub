// Add your custom JS here.

// init controller
var controller = new ScrollMagic.Controller();


(function($) {
    $(document).ready(function(){
        
        var controller = new ScrollMagic.Controller();

        $('.wp-block-group').each(function(index, element){
            var wpBlockGroup = $(element);
            
            new ScrollMagic.Scene({
                triggerElement: element,
                triggerHook: 0.8,   // show, when scrolled 20% into view
                offset: 50          // move trigger to centre of elelment
            })
            .setClassToggle(element, "visible") // add class to reveal
            .addTo(controller);
        });
    });
})(jQuery);

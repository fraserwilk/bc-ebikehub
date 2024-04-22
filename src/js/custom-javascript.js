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


// Dynamic address in WPForms
jQuery(document).ready(function($) {
    // Replace 'location_checkbox_field' with the ID or class of your checkbox field.
    $('#53 input[type="checkbox"]').change(function() {
        // Define your address lists based on location selection.
        var addressLists = {
            'Flemington': ['Address 1', 'Address 2', 'Address 3'],
            'Prahran': ['Address A', 'Address B', 'Address C'],
			'Brighton': ['Address X', 'Address Y', 'Address Z'],
            // Add more locations and corresponding address lists as needed.
        };

        // Initialize the address options HTML.
        var addressOptions = '';

        // Loop through the selected checkboxes.
        $('#53 input[type="checkbox"]:checked').each(function() {
            // Get the value of the checked checkbox.
            var location = $(this).val();

            // Check if the location has an associated address list.
            if (addressLists[location]) {
                // Append the addresses for this location to the options HTML.
                $.each(addressLists[location], function(index, address) {
                    addressOptions += '<option value="' + address + '">' + address + '</option>';
                });
            }
        });

        // Replace 'address_field' with the ID or class of your address field.
        $('#address_field select').html(addressOptions);
    });
});
// <!-- Dynamic address in WPForms
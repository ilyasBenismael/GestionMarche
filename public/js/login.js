


$(document).ready(function() {
    var $body = $('body');

    // Function to initialize the ripple effect
    function initRipples() {
        $body.ripples({
            resolution: 512,
            dropRadius: 12,
            perturbance: 0.01,
        });
    }

    // Initialize the ripple effect initially
    initRipples();

    // Add event listener to the toggle checkbox
    $('#toggleCheckbox').change(function() {
        if (this.checked) {
            // Ripple effect should be activated
            initRipples();
        } else {
            // Ripple effect should be deactivated
            $body.ripples('destroy');
            $('body').css('background-color', '#ffffff');
        }
    });
});

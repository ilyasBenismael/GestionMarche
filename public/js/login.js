



$(document).ready(function() {
    var $body = $('body');

    function initRipples() {
        $body.ripples({
            resolution: 512,
            dropRadius: 12,
            perturbance: 0.01,
        });
    }

    initRipples();

    $('#toggleCheckbox').change(function() {
        if (this.checked) {
            initRipples();
        } else {
            $body.ripples('destroy');
        }
    });
});

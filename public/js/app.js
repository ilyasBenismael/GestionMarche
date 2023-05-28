




document.querySelector('.tumbler-wrapper').addEventListener('click', _ => document.body.classList.toggle('night-mode'));
document.querySelector('.tumbler-wrapper').addEventListener('click', _ => document.getElementById("dataTable").classList.toggle('night-mode'));




function toggleDropdown() {
        var dropdownContent = document.getElementById("dropdownContent");
        var dropdownArrow = document.getElementById("dropdownArrow");
        if (dropdownContent.style.display === "none") {
            dropdownContent.style.display = "block";
            dropdownArrow.classList.remove("rotate");

        } else {
            dropdownContent.style.display = "none";
            dropdownArrow.classList.add("rotate");
        }
}



$('#percent').on('change', function(){
    var val = parseInt($(this).val());
    var $circle = $('#svg #bar');

    if (isNaN(val)) {
        val = 100;
    }
    else{
        var r = $circle.attr('r');
        var c = Math.PI*(r*2);

        if (val < 0) { val = 0;}
        if (val > 100) { val = 100;}

        var pct = ((100-val)/100)*c;

        $circle.css({ strokeDashoffset: pct});

        $('#cont').attr('data-pct',val);
    }
});


$(document).ready(function() {
    $('.marche-details').click(function() {
        // Get the marche ID from the data attribute
        var marcheId = $(this).data('marche-id');

        // Construct the selector for the corresponding pop-up
        var popUpSelector = '#pop-up-' + marcheId;

        // Show the pop-up corresponding to the clicked marche ID
        $(popUpSelector).addClass('show');
    });

    $('.pop-up .content .close').click(function() {
        // Hide the pop-up when the close button is clicked
        $(this).closest('.pop-up').removeClass('show');
    });
});


















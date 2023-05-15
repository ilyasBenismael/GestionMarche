
document.addEventListener('DOMContentLoaded', function() {
    // Get references to the checkboxes
    const switchhCheckbox = document.querySelector('.switchh');
    const switch001Checkbox = document.querySelector('.switch001');

    // Add event listener to switchhCheckbox
    switchhCheckbox.addEventListener('change', function() {
        // Update switch001Checkbox based on the checked state of switchhCheckbox
        switch001Checkbox.checked = this.checked;
    });
});




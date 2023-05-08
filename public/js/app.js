document.querySelector('.tumbler-wrapper').addEventListener('click', _ => document.body.classList.toggle('night-mode'));



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

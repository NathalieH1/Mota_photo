// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var li = document.getElementById("menu-item-69");

// Get the link inside the button
var link = li.querySelector('a');

// When the user clicks on the link, open the modal
li.addEventListener('click', function(event) {
    event.preventDefault(); // Empêcher le comportement par défaut du lien
    modal.style.display = "block"; // Ouvrir la modale
});
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}







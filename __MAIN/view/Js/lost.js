// Function to toggle visibility of detailed information
function toggleDetails(id) {
    const details = document.getElementById('details-' + id);
    const button = document.getElementById('more-info-btn-' + id);
    
    if (details.style.display === "none") {
        details.style.display = "block";
        button.textContent = "Show Less";
    } else {
        details.style.display = "none";
        button.textContent = "More Info";
    }
}

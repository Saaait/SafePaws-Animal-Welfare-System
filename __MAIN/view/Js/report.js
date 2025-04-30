document.getElementById('report-pet-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const petType = document.getElementById('pet-type').value.trim();
    const petName = document.getElementById('pet-name').value.trim();
    const description = document.getElementById('description').value.trim();
    const lastSeen = document.getElementById('last-seen').value.trim();
    const name = document.getElementById('name').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const photo = document.getElementById('photo').files[0];

    document.getElementById('error-message-report').innerText = ""; // Clear previous error message

    // Validate required fields
    if (!petType || !petName || !description || !lastSeen || !name || !phone || !photo) {
        document.getElementById('error-message-report').innerText = "All fields are required, including a photo.";
        return;
    }

    // Prepare data for submission
    const formData = new FormData();
    formData.append('pet-type', petType);
    formData.append('pet-name', petName);
    formData.append('description', description);
    formData.append('last-seen', lastSeen);
    formData.append('name', name);
    formData.append('phone', phone);
    formData.append('photo', photo);

    // AJAX request for pet report submission
    fetch('lost_pets_reports.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Check for success message
        if (data.includes('Report submitted successfully!')) {
            document.getElementById('error-message-report').innerText = "Report submitted successfully!";
            // Reset the form
            document.getElementById('report-pet-form').reset();
            // Reset the photo input as well since .reset() doesn't work for file inputs
            document.getElementById('photo').value = "";
            window.location.href = 'report.php';// Redirect to a thank you page or another page
        } else {
            document.getElementById('error-message-report').innerText = data; // Display error message
        }
    })
    .catch(error => {  
        console.error('Error:', error);
        document.getElementById('error-message-report').innerText = "An error occurred during report submission. Please try again.";
    });
});

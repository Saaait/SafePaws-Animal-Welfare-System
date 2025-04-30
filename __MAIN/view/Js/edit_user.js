// JavaScript to handle edit button functionality 
// Select all edit buttons
const editButtons = document.querySelectorAll('.edit-button');

// Loop through each edit button
editButtons.forEach(function(button) {
    // Add a click event listener to each button
    button.addEventListener('click', function() {
        // Get the user ID from the button's data-id attribute
        const userId = this.getAttribute('data-id');
        
        // Find the closest table row (tr) that this button is in
        const row = this.closest('tr');
        
        // Get existing user data from the row
        const username = row.children[1].innerText; // Assuming the username is in the second column
        const email = row.children[2].innerText;    // Assuming the email is in the third column
        const phone = row.children[3].innerText;    // Assuming the phone is in the fourth column
        const password = row.children[4].innerText;  // Assuming the password is in the fifth column

        // Fill the edit form with the existing user data
        document.getElementById('edit-user-id').value = userId;           // Set user ID
        document.getElementById('edit-username').value = username;       // Set username
        document.getElementById('edit-email').value = email;             // Set email
        document.getElementById('edit-phone').value = phone;             // Set phone
        document.getElementById('edit-password').value = password;       // Set password

        // Show the edit form
        document.getElementById('edit-form').style.display = 'block';    // Make the form visible
    });
});

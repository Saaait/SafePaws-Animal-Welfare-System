// Show the modal when the SignUp / LogIn button is clicked
document.getElementById('sign-up-button').addEventListener('click', function () {
    document.getElementById('signup-modal').classList.remove('hidden');
});

// Close the modal when the close button is clicked or "Escape" key is pressed
const closeModal = () => document.getElementById('signup-modal').classList.add('hidden');
document.getElementById('close-modal').addEventListener('click', closeModal);
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeModal();
});

// Handle signup form submission with AJAX
document.getElementById('signup-form').addEventListener('submit', function (event) {
    event.preventDefault(); //stop the default behavior of browser to refresh when form subimtted 

    const username = document.getElementById('username').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;

    clearPasswordHighlight();
    document.getElementById('password-error').innerText = ""; // Clear previous error

    // Validate passwords
    if (password !== confirmPassword || password.length < 6) {
        highlightPasswords();
        document.getElementById('password-error').innerText = "Passwords do not match or are less than 6 characters.";
        return;
    }

    // Validate phone-number
    if (!/^\d{10}$/.test(phone)) {
        document.getElementById('password-error').innerText = "Phone number must be exactly 10 numeric characters.";
        return;
    }

    // Prepare data for submission
    const formData = new FormData();
    formData.append('username', username);
    formData.append('email', email);
    formData.append('phone', phone);
    formData.append('password', password);

    // AJAX request for sign-up
    fetch('signup.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {

            if (data.includes('Sign-up successful!')) {
                document.getElementById('password-error').innerText = "Sign-up successful!";
                window.location.href = 'ad.php';
            } else {
                document.getElementById('password-error').innerText = data;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('password-error').innerText = "An error occurred during sign-up. Please try again.";
        });
});


// Handle login form submission with AJAX
document.getElementById('login-form').addEventListener('submit', function (event) {
    event.preventDefault();

    const email = document.getElementById('login-email').value.trim();
    const password = document.getElementById('login-password').value;

    // Clear any previous error message
    clearPasswordHighlight();
    document.getElementById('password-error').innerText = ""; // Clear previous error

    // Prepare data for submission
    const formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);

    // AJAX request for login
    fetch('login.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            // Check for specific success messages to determine user type
            if (data.includes("Redirecting to admin page")) {
                document.getElementById('password-error-login').innerText = "Redirecting to admin page";
                window.location.href = 'admin.php'; // Redirect 
            } else if (data.includes("Login successful!")) {
                document.getElementById('password-error-login').innerText = "Login successful!";
                window.location.href = 'ad.php'; // Redirect 
            } else if (data.includes("Invalid email or password")) {
                highlightPasswords();
            } else {
                document.getElementById('password-error').innerText = data;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('password-error').innerText = "An error occurred during login. Please try again.";
        });
});


// Highlight password fields if validation fails for signup/login
function highlightPasswords() {
    document.getElementById('password').style.border = '2px solid red';
    document.getElementById('confirm-password').style.border = '2px solid red';

    //for login
    document.getElementById('login-email').style.border = '2px solid red';
    document.getElementById('login-password').style.border = '2px solid red';
    document.getElementById('password-error-login').innerText = "Invalid email or password!!";
}

function clearPasswordHighlight() {
    document.getElementById('password').style.border = '';
    document.getElementById('confirm-password').style.border = '';
    document.getElementById('password-error').innerText = '';

    //for login
    document.getElementById('login-password').style.border = '';
    document.getElementById('password-error-login').innerText = '';
}


// Switch to the login form
document.getElementById('switch-to-login').addEventListener('click', function (event) {
    event.preventDefault();
    document.getElementById('signup-form-container').classList.add('hidden');
    document.getElementById('login-form-container').classList.remove('hidden');
});

// Switch to the signup form
document.getElementById('switch-to-signup').addEventListener('click', function (event) {
    event.preventDefault();
    document.getElementById('login-form-container').classList.add('hidden');
    document.getElementById('signup-form-container').classList.remove('hidden');
});



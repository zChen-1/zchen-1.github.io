window.onload = function() {
    // Get the username and email from local storage
    var username = localStorage.getItem('username');
    var email = localStorage.getItem('email');

    // Check if the username and email are not null
    if (username && email) {
        // Update the welcome message
        document.getElementById('welcomeMessage').innerText = "Welcome, " + username;

        // Update the username and email paragraphs
        document.getElementById('username').innerText = "Username: " + username;
        document.getElementById('email').innerText = "Email: " + email;
    } else {
        // If username or email are null, display a message and redirect to the registration page
        alert('Please register first!');
        setTimeout(function() {
            window.location.href = "register.html";  // Modify this to match your registration page URL
        }, 2000);
    }
}

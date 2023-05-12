window.onload = function() {
    var username = localStorage.getItem('username');
    var email = localStorage.getItem('email');

    // Check if the username and email are not null
    if (username && email) {
        document.getElementById('welcomeMessage').innerText = "Welcome, " + username;
        document.getElementById('username').innerText = "Username: " + username;
        document.getElementById('email').innerText = "Email: " + email;
    } else {
        // If username or email are null, display a message and redirect to the registration page
        alert('Please register first!');
        setTimeout(function() {
            window.location.href = "register.html";
        }, 2000);
    }
}

window.onload = function() {
    const userData = JSON.parse(localStorage.getItem('user'));
    document.getElementById('welcomeMessage').innerHTML = 'Welcome, ' + userData.username;
    document.getElementById('username').innerHTML = 'Username: ' + userData.username;
    document.getElementById('email').innerHTML = 'Email: ' + userData.email;
}

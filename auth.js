// Handle logout
function logout() {
    localStorage.removeItem('user');
    window.location.href = 'index.php';
}

// No need to check auth state on DOMContentLoaded anymore 
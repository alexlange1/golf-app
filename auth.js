// Handle logout
function logout() {
    localStorage.removeItem('user');
    window.location.href = 'index.php';
}

// No need to check auth state on DOMContentLoaded anymore 

// No need to update navigation for News and Bets tabs, as navigation is now handled by PHP. 
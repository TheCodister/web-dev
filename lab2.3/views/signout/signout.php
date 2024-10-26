<?php
// Logout script
if (isset($_COOKIE['username'])) {
    // Unset the cookie
    setcookie('username', '', time() - 3600, '/'); // Expire the cookie
}

// Redirect to the login page or home page
echo "<script>alert('You have been signed out.')</script>";
echo "<script>window.location.href = 'index.php?page=home';</script>";
exit;
?>

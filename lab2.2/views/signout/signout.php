<?php
if (isset($_COOKIE['username'])) {
    // Unset the cookie
    setcookie('username', '', time() - 3600, '/'); // Expire the cookie
}
echo "<script>alert('You have been signed out.')</script>";
echo "<script>window.location.href = 'index.php?page=home';</script>";
exit;
?>

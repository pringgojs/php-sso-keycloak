<?php
session_start();
?>
<h2>SSO PHP Native</h2>

<?php if (isset($_SESSION['user'])): ?>
    <p>Welcome, <?= htmlspecialchars($_SESSION['user']['preferred_username']) ?></p>
    <a href="logout.php">Logout</a>
<?php else: ?>
    <a href="login.php">Login with SSO</a>
<?php endif; ?>

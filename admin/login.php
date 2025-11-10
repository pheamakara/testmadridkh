<?php
require_once '../config/db.php';
require_once 'auth.php';

// Redirect if already logged in
redirectIfLoggedIn();

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    if (empty($username) || empty($password)) {
        $error = 'Please fill in all fields';
    } else {
        if (loginAdmin($username, $password, $pdo)) {
            header('Location: index.php');
            exit();
        } else {
            $error = 'Invalid username or password';
        }
    }
}
?>

<?php include '../includes/header.php'; ?>

<div class="admin-login">
    <div class="contact-form">
        <h2 class="text-center mb-2">Admin Login</h2>
        
        <?php if ($error): ?>
            <div class="error-message mb-2" style="color: #E60028; padding: 1rem; background: rgba(230, 0, 40, 0.1); border-radius: 8px;">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <div class="form-group text-center">
                <button type="submit" class="btn">Login</button>
            </div>
        </form>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

<?php
// Contact form processing
$message_sent = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
    
    // Validate inputs
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error = 'Please fill in all fields.';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        // In a real implementation, you would send the email here
        // For this example, we'll just simulate success
        $message_sent = true;
        
        // Clear form fields
        $name = '';
        $email = '';
        $subject = '';
        $message = '';
    }
}
?>

<?php include 'includes/header.php'; ?>

<div class="contact-container">
    <h2 class="text-center mb-2">Contact Us</h2>
    
    <?php if ($message_sent): ?>
        <div class="success-message mb-2" style="color: #4CAF50; padding: 1rem; background: rgba(76, 175, 80, 0.1); border-radius: 8px; text-align: center;">
            Thank you for your message! We'll get back to you soon.
        </div>
    <?php endif; ?>
    
    <?php if ($error): ?>
        <div class="error-message mb-2" style="color: #E60028; padding: 1rem; background: rgba(230, 0, 40, 0.1); border-radius: 8px; text-align: center;">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>
    
    <div class="contact-form">
        <form method="POST" action="" onsubmit="return validateContactForm()">
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" id="name" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="subject">Subject *</label>
                <input type="text" id="subject" name="subject" value="<?php echo isset($subject) ? htmlspecialchars($subject) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="message">Message *</label>
                <textarea id="message" name="message" required><?php echo isset($message) ? htmlspecialchars($message) : ''; ?></textarea>
            </div>
            
            <div class="form-group text-center">
                <button type="submit" class="btn">Send Message</button>
            </div>
        </form>
    </div>
    
    <div class="contact-info mt-2">
        <h3>Contact Information</h3>
        <p><strong>Email:</strong> info@madridkh.com</p>
        <p><strong>Address:</strong> Madrid, Spain</p>
        <p><strong>Phone:</strong> +34 123 456 789</p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<?php
// Start session for admin authentication
session_start();

// Get current page for active navigation
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MadridKH - Real Madrid News</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <div class="nav-container">
            <div class="logo">
                <h1>Madrid<span>KH</span></h1>
            </div>
            
            <nav>
                <ul>
                    <li><a href="index.php" class="<?php echo $current_page == 'index' ? 'active' : ''; ?>" data-key="home">Home</a></li>
                    <li><a href="news.php" class="<?php echo $current_page == 'news' ? 'active' : ''; ?>" data-key="news">News</a></li>
                    <li><a href="about.php" class="<?php echo $current_page == 'about' ? 'active' : ''; ?>" data-key="about">About</a></li>
                    <li><a href="contact.php" class="<?php echo $current_page == 'contact' ? 'active' : ''; ?>" data-key="contact">Contact</a></li>
                    <?php if (isset($_SESSION['admin_id'])): ?>
                        <li><a href="admin/index.php" class="<?php echo strpos($_SERVER['PHP_SELF'], '/admin/') !== false ? 'active' : ''; ?>" data-key="admin">Admin</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            
            <div class="header-controls">
                <div class="language-toggle">
                    <button class="lang-toggle" data-lang="en">EN</button>
                    <button class="lang-toggle" data-lang="km">ខ្មែរ</button>
                </div>
                <div class="theme-toggle" id="theme-toggle">
                    <span>🌙</span>
                </div>
            </div>
        </div>
    </header>
    
    <main>

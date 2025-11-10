<?php
require_once 'config/db.php';

// Get article ID from URL
$article_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Get article data
if ($article_id > 0) {
    try {
        $stmt = $pdo->prepare("SELECT a.*, c.name as category_name FROM articles a LEFT JOIN categories c ON a.category = c.name WHERE a.id = ?");
        $stmt->execute([$article_id]);
        $article = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$article) {
            header('Location: news.php');
            exit();
        }
    } catch (PDOException $e) {
        header('Location: news.php');
        exit();
    }
} else {
    header('Location: news.php');
    exit();
}
?>

<?php include 'includes/header.php'; ?>

<div class="article-container">
    <div class="article-header">
        <h1><?php echo htmlspecialchars($article['title']); ?></h1>
        <div class="article-meta">
            <span>Category: <?php echo htmlspecialchars($article['category_name']); ?></span>
            <span>Language: <?php echo $article['language'] == 'en' ? 'English' : 'Khmer'; ?></span>
            <span>Date: <?php echo date('M j, Y', strtotime($article['created_at'])); ?></span>
        </div>
    </div>
    
    <?php if (!empty($article['image'])): ?>
        <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>" class="article-image">
    <?php else: ?>
        <img src="assets/images/placeholder.jpg" alt="Placeholder" class="article-image">
    <?php endif; ?>
    
    <div class="article-content">
        <?php echo nl2br(htmlspecialchars($article['content'])); ?>
    </div>
    
    <div class="social-share">
        <a href="#" onclick="shareOnFacebook(window.location.href)">Facebook</a>
        <a href="#" onclick="shareOnTwitter(window.location.href, '<?php echo htmlspecialchars($article['title']); ?>')">Twitter</a>
        <a href="#" onclick="shareOnWhatsApp('<?php echo htmlspecialchars($article['title']); ?>', window.location.href)">WhatsApp</a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

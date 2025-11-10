<?php
require_once 'config/db.php';

// Get all articles
try {
    $stmt = $pdo->query("SELECT a.*, c.name as category_name FROM articles a LEFT JOIN categories c ON a.category = c.name ORDER BY a.created_at DESC");
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $articles = [];
}
?>

<?php include 'includes/header.php'; ?>

<h2 class="text-center mb-2">Latest News</h2>

<div class="news-grid">
    <?php if (count($articles) > 0): ?>
        <?php foreach ($articles as $article): ?>
            <div class="news-card">
                <?php if (!empty($article['image'])): ?>
                    <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
                <?php else: ?>
                    <img src="assets/images/placeholder.jpg" alt="Placeholder">
                <?php endif; ?>
                <div class="news-content">
                    <span class="category"><?php echo htmlspecialchars($article['category_name']); ?></span>
                    <h3><?php echo htmlspecialchars($article['title']); ?></h3>
                    <p><?php echo substr(htmlspecialchars($article['content']), 0, 100) . '...'; ?></p>
                    <div class="date"><?php echo date('M j, Y', strtotime($article['created_at'])); ?></div>
                    <a href="article.php?id=<?php echo $article['id']; ?>" class="read-more">Read More →</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No articles found.</p>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>

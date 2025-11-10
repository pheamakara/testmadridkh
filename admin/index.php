<?php
require_once '../config/db.php';
require_once 'auth.php';

// Require admin login
requireAdminLogin();

// Get total articles count
try {
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM articles");
    $total_articles = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
} catch (PDOException $e) {
    $total_articles = 0;
}

// Get recent articles
try {
    $stmt = $pdo->query("SELECT a.*, c.name as category_name FROM articles a LEFT JOIN categories c ON a.category = c.name ORDER BY a.created_at DESC LIMIT 5");
    $recent_articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $recent_articles = [];
}
?>

<?php include '../includes/header.php'; ?>

<div class="admin-container">
    <div class="admin-header">
        <h2>Admin Dashboard</h2>
        <div>
            <span>Welcome, <?php echo htmlspecialchars(getCurrentAdmin()); ?>!</span>
            <a href="logout.php" class="btn" style="margin-left: 1rem;">Logout</a>
        </div>
    </div>
    
    <div class="admin-nav">
        <ul>
            <li><a href="index.php" class="active">Dashboard</a></li>
            <li><a href="articles.php">Manage Articles</a></li>
            <li><a href="add-article.php">Add New Article</a></li>
        </ul>
    </div>
    
    <div class="dashboard-stats">
        <div class="news-grid">
            <div class="news-card">
                <div class="news-content">
                    <h3>Total Articles</h3>
                    <p class="article-count"><?php echo $total_articles; ?></p>
                </div>
            </div>
            
            <div class="news-card">
                <div class="news-content">
                    <h3>Recent Activity</h3>
                    <p>Last 30 days</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="recent-articles">
        <h3>Recent Articles</h3>
        <?php if (count($recent_articles) > 0): ?>
            <table class="articles-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Language</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recent_articles as $article): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($article['title']); ?></td>
                            <td><?php echo htmlspecialchars($article['category_name']); ?></td>
                            <td><?php echo $article['language'] == 'en' ? 'English' : 'Khmer'; ?></td>
                            <td><?php echo date('M j, Y', strtotime($article['created_at'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No articles found.</p>
        <?php endif; ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

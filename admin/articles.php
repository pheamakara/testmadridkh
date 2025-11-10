<?php
require_once '../config/db.php';
require_once 'auth.php';

// Require admin login
requireAdminLogin();

// Handle delete request
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    try {
        $stmt = $pdo->prepare("DELETE FROM articles WHERE id = ?");
        $stmt->execute([$id]);
        $message = "Article deleted successfully.";
    } catch (PDOException $e) {
        $error = "Error deleting article: " . $e->getMessage();
    }
}

// Get all articles
try {
    $stmt = $pdo->query("SELECT a.*, c.name as category_name FROM articles a LEFT JOIN categories c ON a.category = c.name ORDER BY a.created_at DESC");
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $articles = [];
    $error = "Error fetching articles: " . $e->getMessage();
}
?>

<?php include '../includes/header.php'; ?>

<div class="admin-container">
    <div class="admin-header">
        <h2>Manage Articles</h2>
        <a href="add-article.php" class="btn">Add New Article</a>
    </div>
    
    <div class="admin-nav">
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="articles.php" class="active">Manage Articles</a></li>
            <li><a href="add-article.php">Add New Article</a></li>
        </ul>
    </div>
    
    <?php if (isset($message)): ?>
        <div class="success-message mb-2" style="color: #4CAF50; padding: 1rem; background: rgba(76, 175, 80, 0.1); border-radius: 8px;">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>
    
    <?php if (isset($error)): ?>
        <div class="error-message mb-2" style="color: #E60028; padding: 1rem; background: rgba(230, 0, 40, 0.1); border-radius: 8px;">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>
    
    <?php if (count($articles) > 0): ?>
        <table class="articles-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Language</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($article['title']); ?></td>
                        <td><?php echo htmlspecialchars($article['category_name']); ?></td>
                        <td><?php echo $article['language'] == 'en' ? 'English' : 'Khmer'; ?></td>
                        <td><?php echo date('M j, Y', strtotime($article['created_at'])); ?></td>
                        <td class="action-buttons">
                            <a href="edit-article.php?id=<?php echo $article['id']; ?>" class="edit-btn">Edit</a>
                            <a href="articles.php?action=delete&id=<?php echo $article['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this article?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No articles found.</p>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>

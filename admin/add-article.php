<?php
require_once '../config/db.php';
require_once 'auth.php';

// Require admin login
requireAdminLogin();

// Get categories
try {
    $stmt = $pdo->query("SELECT name FROM categories");
    $categories = $stmt->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
    $categories = [];
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $category = $_POST['category'];
    $language = $_POST['language'];
    $image = '';
    
    // Validate inputs
    if (empty($title) || empty($content) || empty($category) || empty($language)) {
        $error = 'Please fill in all required fields.';
    } else if (!in_array($category, $categories)) {
        $error = 'Invalid category selected.';
    } else if ($language != 'en' && $language != 'km') {
        $error = 'Invalid language selected.';
    } else {
        // Handle image upload if provided
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $upload_dir = '../assets/images/articles/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }
            
            $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $file_name = uniqid() . '.' . $file_extension;
            $upload_path = $upload_dir . $file_name;
            
            // Check if file is an image
            $image_info = getimagesize($_FILES['image']['tmp_name']);
            if ($image_info !== false) {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
                    $image = 'assets/images/articles/' . $file_name;
                } else {
                    $error = 'Error uploading image.';
                }
            } else {
                $error = 'Invalid image file.';
            }
        }
        
        // Insert article if no errors
        if (empty($error)) {
            try {
                $stmt = $pdo->prepare("INSERT INTO articles (title, content, language, category, image) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$title, $content, $language, $category, $image]);
                $success = 'Article added successfully.';
                
                // Clear form fields
                $title = '';
                $content = '';
                $category = '';
                $language = '';
            } catch (PDOException $e) {
                $error = 'Error adding article: ' . $e->getMessage();
            }
        }
    }
}
?>

<?php include '../includes/header.php'; ?>

<div class="admin-container">
    <div class="admin-header">
        <h2>Add New Article</h2>
        <a href="articles.php" class="btn">Back to Articles</a>
    </div>
    
    <div class="admin-nav">
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="articles.php">Manage Articles</a></li>
            <li><a href="add-article.php" class="active">Add New Article</a></li>
        </ul>
    </div>
    
    <?php if ($success): ?>
        <div class="success-message mb-2" style="color: #4CAF50; padding: 1rem; background: rgba(76, 175, 80, 0.1); border-radius: 8px;">
            <?php echo htmlspecialchars($success); ?>
        </div>
    <?php endif; ?>
    
    <?php if ($error): ?>
        <div class="error-message mb-2" style="color: #E60028; padding: 1rem; background: rgba(230, 0, 40, 0.1); border-radius: 8px;">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>
    
    <form method="POST" action="" class="article-form" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-col">
                <div class="form-group">
                    <label for="title">Title *</label>
                    <input type="text" id="title" name="title" value="<?php echo isset($title) ? htmlspecialchars($title) : ''; ?>" required>
                </div>
            </div>
            
            <div class="form-col">
                <div class="form-group">
                    <label for="language">Language *</label>
                    <select id="language" name="language" required>
                        <option value="">Select Language</option>
                        <option value="en" <?php echo (isset($language) && $language == 'en') ? 'selected' : ''; ?>>English</option>
                        <option value="km" <?php echo (isset($language) && $language == 'km') ? 'selected' : ''; ?>>Khmer</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-col">
                <div class="form-group">
                    <label for="category">Category *</label>
                    <select id="category" name="category" required>
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?php echo htmlspecialchars($cat); ?>" <?php echo (isset($category) && $category == $cat) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($cat); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div class="form-col">
                <div class="form-group">
                    <label for="image">Image (Optional)</label>
                    <input type="file" id="image" name="image" accept="image/*">
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for="content">Content *</label>
            <textarea id="content" name="content" required><?php echo isset($content) ? htmlspecialchars($content) : ''; ?></textarea>
        </div>
        
        <div class="form-group text-center">
            <button type="submit" class="btn">Add Article</button>
        </div>
    </form>
</div>

<?php include '../includes/footer.php'; ?>

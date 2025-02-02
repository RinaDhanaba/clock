<?php
require_once '../config/config.php';
include '../includes/header.php';

// Define the directory to scan
$directory = __DIR__; // This will scan the current 'public' directory

// Define files to exclude from the sitemap
$exclude = ['.', '..', 'sitemap.php', 'index.php', 'header.php', 'footer.php'];

// Scan the public directory
$files = array_diff(scandir($directory), $exclude);

// Initialize an array to store pages
$pages = [];

foreach ($files as $file) {
    // Only include .php files
    if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
        $pageSlug = basename($file, '.php'); // Remove ".php"
        $pageTitle = ucfirst(str_replace('_', ' ', $pageSlug));
        $pageUrl = BASE_URL . $pageSlug;

        $pages[] = ['title' => $pageTitle, 'url' => $pageUrl];
    }
}
?>

<div class="container my-4">
    <h1 class="mb-4">Sitemap</h1>
    <p class="lead">Below is a list of all available pages on the website:</p>

    <?php if (!empty($pages)): ?>
        <ul class="list-group">
            <?php foreach ($pages as $page): ?>
                <li class="list-group-item">
                    <a href="<?php echo htmlspecialchars($page['url']); ?>">
                        <?php echo htmlspecialchars($page['title']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="text-danger">No pages found in the public folder.</p>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>

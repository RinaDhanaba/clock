<?php
// public/sitemap.php

require_once '../config/config.php';
include '../includes/header.php';

// Define the directory to scan (directly inside the 'public/' folder)
$directory = __DIR__; 

// Define files to exclude from the sitemap
$exclude = [ '.htaccess', 'header.php', 'footer.php', 'sitemap.php', 'config.php', 'db.php'];

// Scan the public directory for files
$files = array_diff(scandir($directory), $exclude);

// Initialize an array to store pages
$pages = [];

// Loop through files and get PHP pages
foreach ($files as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
        $pageSlug = basename($file, '.php'); // Remove .php extension

        // Convert filename to readable format (example: about.php → About)
        $pageTitle = ucfirst(str_replace('_', ' ', $pageSlug));

        // Generate URL without .php
        $pageUrl = BASE_URL . $pageSlug;

        // Store the page
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

<?php
// public/sitemap.php

require_once '../config/config.php';
// If you want to restrict access to logged-in users, uncomment the following:
// require_once '../includes/auth.php';
// require_login();

include '../includes/header.php';

// Define an array of files to exclude from the sitemap.
$exclude = [
    '.', 
    '..', 
    '.htaccess', 
    'header.php', 
    'footer.php', 
    'sitemap.php', // optionally exclude the sitemap itself
    // You can add more filenames to exclude if needed.
];

// Scan the current directory (which should be your public/ folder)
$files = scandir(__DIR__);
$pages = [];

// Loop through the files and filter for PHP pages
foreach ($files as $file) {
    // Check if the file ends with ".php" and is not in the $exclude list.
    if (pathinfo($file, PATHINFO_EXTENSION) === 'php' && !in_array($file, $exclude)) {
        // Remove the ".php" extension for display and link generation.
        $pageSlug = basename($file, '.php');
        // You might want to handle "index" specially:
        if ($pageSlug === 'index') {
            $pageTitle = 'Home';
            $pageUrl   = BASE_URL; // Home page is the BASE_URL
        } else {
            // Format the page title (for example, "about" becomes "About")
            $pageTitle = ucfirst($pageSlug);
            $pageUrl   = BASE_URL . $pageSlug;
        }
        // Add the page to the pages array
        $pages[] = [
            'title' => $pageTitle,
            'url'   => $pageUrl,
        ];
    }
}
?>

<div class="container my-4">
    <h1 class="mb-4">Sitemap</h1>
    <p class="lead">Below is a list of all available pages on the website:</p>

    <ul class="list-group">
        <?php foreach ($pages as $page): ?>
            <li class="list-group-item">
                <a href="<?php echo htmlspecialchars($page['url']); ?>">
                    <?php echo htmlspecialchars($page['title']); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php include '../includes/footer.php'; ?>

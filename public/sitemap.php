<?php
// public/sitemap.php

require_once '../config/config.php';
include '../includes/header.php';

// Define the directory to scan
$directory = __DIR__; // This will scan the current 'public' directory

// Define an array of files to exclude from the sitemap
$exclude = ['.', '..', '.htaccess', 'header.php', 'footer.php', 'sitemap.php', 'config.php', 'db.php'];

// Scan the directory
$files = scandir($directory);

// Initialize an empty array to store pages
$pages = [];

// Loop through the files and filter PHP pages
foreach ($files as $file) {
    // Check if the file ends with ".php" and is not in the $exclude list
    if (pathinfo($file, PATHINFO_EXTENSION) === 'php' && !in_array($file, $exclude)) {
        // Remove the ".php" extension for display and URL generation
        $pageSlug = basename($file, '.php');

        // Handle the home page specially
        if ($pageSlug === 'index') {
            $pageTitle = 'Home';
            $pageUrl   = BASE_URL; // Home page is BASE_URL
        } else {
            // Convert "about" to "About", "contact" to "Contact" etc.
            $pageTitle = ucfirst(str_replace('_', ' ', $pageSlug));
            $pageUrl   = BASE_URL . $pageSlug; // Example: /about
        }

        // Store the page in an array
        $pages[] = [
            'title' => $pageTitle,
            'url'   => $pageUrl,
        ];
    }
}

// DEBUGGING: Uncomment below line to check if pages are being collected
// echo "<pre>"; print_r($pages); echo "</pre>"; exit();

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
        <p class="text-danger">No pages found. Make sure you have PHP files in the 'public' directory.</p>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>

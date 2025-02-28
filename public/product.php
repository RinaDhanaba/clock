<?php
include 'products.php';

if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $found = false;

    foreach ($products as $product) {
        if ($product['slug'] === $slug) {
            $found = true;
            ?>
            <h1><?= $product['title']; ?></h1>
            <img src="<?= $product['image']; ?>" alt="<?= $product['title']; ?>" width="400">
            <p><?= $product['desc']; ?></p>
            <strong>Price: <?= $product['price']; ?></strong>
            <?php if (isset($product['badge'])): ?>
                <span class="badge"><?= $product['badge']; ?></span>
            <?php endif; ?>
            <?php
        }
    }

    if (!$found) {
        echo "<h3>Product not found!</h3>";
    }
} else {
    echo "<h3>Invalid Product!</h3>";
}
?>

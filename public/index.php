<?php
// public/index.php
require_once '../config/config.php';
require_once '../includes/auth.php';
require_login();
include '../includes/header.php';
?>

<h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>!</h1>

<?php
// Display content based on role.
switch ($_SESSION['user']['role']) {
    case 'admin':
        echo "<p>You are logged in as an <strong>Admin</strong>. You have full access.</p>";
        // Admin-specific content here.
        break;
    case 'business':
        echo "<p>You are logged in as a <strong>Business Owner</strong>. You have access to your business dashboard.</p>";
        // Business owner-specific content here.
        break;
    default:
        echo "<p>You are logged in as a <strong>User</strong>. Enjoy your stay!</p>";
        // User-specific content here.
}
?>




<?php
include 'products.php';
?>

<h1>All Products</h1>
<div class="product-grid">
    <?php foreach ($products as $product): ?>
        <div>
            <img src="<?= $product['image']; ?>" alt="<?= $product['title']; ?>" width="200">
            <h3><?= $product['title']; ?></h3>
            <p><?= $product['price']; ?></p>
            <a href="/product/<?= $product['slug']; ?>">View Product</a>
        </div>
    <?php endforeach; ?>
</div>


<?php include '../includes/footer.php'; ?>

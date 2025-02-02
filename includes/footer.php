<?php
// includes/footer.php
?>

</div> <!-- End of container -->

<!-- Footer Section -->
<footer class="bg-dark text-white mt-5 pt-4 pb-3">
    <div class="container">
        <div class="row">
            <!-- Sitemap & Quick Links -->
            <div class="col-md-4">
                <h5 class="mb-3">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="<?php echo BASE_URL; ?>" class="text-white text-decoration-none">Home</a></li>
                    <li><a href="<?php echo BASE_URL; ?>about" class="text-white text-decoration-none">About</a></li>
                    <li><a href="<?php echo BASE_URL; ?>contact" class="text-white text-decoration-none">Contact</a></li>
                    <li><a href="<?php echo BASE_URL; ?>sitemap" class="text-white text-decoration-none">Sitemap</a></li>
                </ul>
            </div>

            <!-- Contact Form -->
            <div class="col-md-4">
                <h5 class="mb-3">Contact Us</h5>
                <form action="#" method="post">
                    <div class="mb-2">
                        <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="mb-2">
                        <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="mb-2">
                        <textarea class="form-control" name="message" rows="2" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm w-100">Send</button>
                </form>
            </div>

            <!-- Social Media Links -->
            <div class="col-md-4">
                <h5 class="mb-3">Follow Us</h5>
                <a href="#" class="text-white me-2"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-white me-2"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-white me-2"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-white"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>

        <hr class="bg-light">

        <!-- Copyright Section -->
        <div class="text-center">
            <p class="mb-0">&copy; <?php echo date('Y'); ?> Your Company. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>

</body>
</html>

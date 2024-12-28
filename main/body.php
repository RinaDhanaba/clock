<?php
session_start();

if (isset($_SESSION['user_id'])) {
    // User is logged in
    $user_id = $_SESSION['user_id']; 

    // Fetch user details from the database (optional)
    // Replace with your actual database query 
    // $sql = "SELECT username FROM users WHERE id = :user_id";
    // $stmt = $pdo->prepare($sql); 
    // $stmt->bindParam(':user_id', $user_id);
    // $stmt->execute();
    // $user = $stmt->fetch(PDO::FETCH_ASSOC); 

    // Display welcome message
    echo "<h2>Hello, " . $user_id . "!</h2>"; // Replace with $user['username'] if you fetched it
    echo "<p>You are logged in.</p>";

} else {
    
    header("Location: /login");
    exit;
}
?>


  <div class="app-info">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"> 
      </svg>
    <p>Track your time, manage your projects, and improve productivity with our easy-to-use tools. Accessible via both desktop and web.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis veniam illum, amet dignissimos deserunt aperiam ipsam</p>
  </div>

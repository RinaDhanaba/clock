<?php
// public/google-callback.php
require_once '../config/config.php';
require_once '../config/db.php';
require_once '../includes/auth.php';

// Only allow POST
if ($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_POST['id_token'])) {
    header("HTTP/1.1 400 Bad Request");
    exit;
}

$id_token = $_POST['id_token'];

// Verify the token by making a GET request to Google
$google_url = "https://oauth2.googleapis.com/tokeninfo?id_token=" . $id_token;
$response = file_get_contents($google_url);
$payload = json_decode($response, true);

if (isset($payload['aud']) && $payload['aud'] == GOOGLE_CLIENT_ID) {
    // The token is valid. Get user info.
    $email = $payload['email'];
    $name = $payload['name'];

    // Here you can choose a default role for Google login users (e.g., "user").
    // You could also check if the email exists in your database and retrieve its role.
    $role = 'user';

    // Check if the user exists in your database.
    $email_esc = $mysqli->real_escape_string($email);
    $sql = "SELECT id, name, role FROM users WHERE email = '$email_esc' LIMIT 1";
    $result = $mysqli->query($sql);
    if ($result && $result->num_rows == 1) {
        $user = $result->fetch_assoc();
    } else {
        // If user does not exist, insert new user record.
        $name_esc = $mysqli->real_escape_string($name);
        $sql_insert = "INSERT INTO users (name, email, role) VALUES ('$name_esc', '$email_esc', '$role')";
        if ($mysqli->query($sql_insert)) {
            $user_id = $mysqli->insert_id;
            $user = [
                'id' => $user_id,
                'name' => $name,
                'role' => $role
            ];
        } else {
            // Insertion failed.
            header("HTTP/1.1 500 Internal Server Error");
            exit;
        }
    }

    // Set the session
    $_SESSION['user'] = [
        'id'    => $user['id'],
        'name'  => $user['name'],
        'email' => $email,
        'role'  => $user['role']
    ];
    
    // Return success
    echo "OK";
} else {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}

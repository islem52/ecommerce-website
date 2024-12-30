<?php
include 'utils/dbConnection.php'; // Include the database connection

// User login function
function loginUser($email, $password) {
    global $conn; // Use the global connection variable
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Start session and set user data
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role']; // Assuming 'role' column exists
        return true;
    }
    return false;
}

// User registration function
function registerUser($email, $password) {
    global $conn; // Use the global connection variable
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Check if admin user exists
    $adminEmail = "ihadjkaddour7@gmail.com";
    $adminPassword = "0000";
    
    // Create admin user if it doesn't exist
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $adminEmail);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        $stmt = $conn->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, 'admin')");
        $stmt->bind_param("ss", $adminEmail, password_hash($adminPassword, PASSWORD_DEFAULT));
        $stmt->execute();
    }

    // Register new user
    $stmt = $conn->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, 'user')");
    return $stmt->bind_param("ss", $email, $hashedPassword) && $stmt->execute();
}

// Logout function
function logoutUser() {
    session_start();
    session_unset();
    session_destroy();
}

// Check if user is logged in
function isLoggedIn() {
    session_start();
    return isset($_SESSION['user_id']);
}
?>

<?php
$loginError = ""; // Initialize the login error variable

if (isset($_POST['submit'])) {
    $email = $_POST['email'] ?? ''; // Use null coalescing operator
    $password = $_POST['password'] ?? ''; // Use null coalescing operator

    if (!empty($email) && !empty($password)) {
        try {
            require_once 'dbConnection.php'; // Ensure the connection is established

            $sql = "SELECT * FROM customers WHERE email = ?";
            $sqlState = $pdo->prepare($sql);
            $sqlState->bindParam(1, $email);
            $sqlState->execute();

            if ($sqlState->rowCount() === 1) {
                // Fetch user data without using fetch(PDO::FETCH_ASSOC)
                $user = $sqlState->fetch(); 

                if ($user['password'] === $password) { 
                    session_start(); // Start the session only after successful login
                    $_SESSION['customer'] = $user; // Store user data in session
                    header('Location: ../index.php'); // Redirect to index.php
                    exit; // exit after header redirection
                } else {
                    $loginError = "Invalid email or password"; // Password mismatch
                    error_log("Password verification failed for email: " . $email);
                }
            } else {
                $loginError = "Invalid email or password"; // No user found
                error_log("No user found with email: " . $email);
            }
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage()); // Log database errors
            $loginError = "An error occurred. Please try again later."; // User-friendly error message
        }
    } else {
        $loginError = "Email and password fields are required."; // Prompt for missing fields
    }
}
?>
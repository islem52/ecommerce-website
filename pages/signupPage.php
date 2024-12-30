<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<?php 
session_start(); // Start the session
require_once '../utils/dbConnection.php'; 
?>

<?php
$error_message = ""; // Initialize an error message variable
$success_message = ""; // Initialize a success message variable

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {  
    $name = $_POST['name'];
    $family_name = $_POST['family_name'];
    $email = $_POST['email'];
    // $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if ($password === $confirm_password) {  
        // Check if email already exists
        $checkEmailSql = "SELECT * FROM customers WHERE email = ?";
        $checkStmt = $pdo->prepare($checkEmailSql);
        $checkStmt->bindParam(1, $email);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            $error_message = "Email already exists. Please use a different email.";
        } else {
            // Insert new user
            $sql = "INSERT INTO customers (name, family_name, email, password) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $family_name);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $password);
             // Ensure this is hashed for security
            $stmt->execute();

            if ($stmt->rowCount() > 0) {  
                $success_message = "User created successfully.";
                session_start();
                $_SESSION['customer'] = $stmt->fetch();
                header("Location: ../index.php"); // Redirect to idex page or dashboard
                exit;
            } else {  
                $error_message = "Error creating user.";
            }  
        }
    } else {  
        $error_message = "Passwords do not match.";
    }  
}
?>

<!-- Registration Form -->
<form class="form" method="POST">
    <p class="title">Register</p>
    <p class="message">Signup now and get full access to our app.</p>

    <!-- Display Error Message -->
    <?php if (!empty($error_message)) : ?>
        <p style="color: red;"><?= htmlspecialchars($error_message) ?></p>
    <?php endif; ?>

    <!-- Display Success Message -->
    <?php if (!empty($success_message)) : ?>
        <p style="color: green;"><?= htmlspecialchars($success_message) ?></p>
    <?php endif; ?>

    <div class="flex" style="gap: 12px;">
        <label>
            <input name="name" required placeholder="" type="text" class="input">
            <span>Firstname</span>
        </label>

        <label>
            <input name="family_name" required placeholder="" type="text" class="input">
            <span>Lastname</span>
        </label>
    </div>  
            
    <label>
        <input name="email" required placeholder="" type="email" class="input">
        <span>Email</span>
    </label> 

    <!-- <label>
            <input name="phone" required placeholder="" type="number" class="input">
            <span>Phone number</span>
        </label> -->
        
    <label>
        <input name="password" required placeholder="" type="password" class="input">
        <span>Password</span>
    </label>
    <label>
        <input name="confirm_password" required placeholder="" type="password" class="input">
        <span>Confirm Password</span>
    </label>
    <button class="submit" name="submit">Submit</button>
    <p class="signin">Already have an account? <a href="./loginPage.php">Login</a></p>
</form>

<style>
  

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f1f1f1;
}
.form {
  display: flex;
  flex-direction: column;
  gap: 10px;
  max-width: 400px;
  background-color: #fff;
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.title {
  font-size: 28px;
  color: royalblue;
  font-weight: 600;
  letter-spacing: -1px;
  position: relative;
  display: flex;
  align-items: center;
  padding-left: 30px;
}
.title::before,.title::after {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  border-radius: 50%;
  left: 0px;
  background-color: royalblue;
}
.title::before {
  width: 18px;
  height: 18px;
  background-color: royalblue ;
}
.title::after {
  width: 18px;
  height: 18px;
  animation: pulse 1s linear infinite;
}
.message, .signin {
  color: rgba(88, 87, 87, 0.822);
  font-size: 14px;
}
.signin {
  text-align: center;
}
.signin a {
  color: royalblue;
}
.signin a:hover {
  text-decoration: underline royalblue;
}
.flex {
  display: flex;
  width: 100%;
  gap: 12px; /* Increased gap */
}
.form label {
  position: relative;
}
.form label .input {
  width: 100%;
  padding: 10px 10px 20px 10px;
  outline: 0;
  border: 1px solid rgba(105, 105, 105, 0.397);
  border-radius: 10px;
}
.form label .input + span {
  position: absolute;
  left: 10px;
  top: 15px;
  color: grey;
  font-size: 0.9em;
  cursor: text;
  transition: 0.3s ease;
}
.form label .input:placeholder-shown + span {
  top: 15px;
  font-size: 0.9em;
}
.form label .input:focus + span,.form label .input:valid + span {
  top: 30px;
  font-size: 0.7em;
  font-weight: 600;
}
.form label .input:valid + span {
  color: green;
}
.submit {
  border: none;
  outline: none;
  background-color: royalblue;
  padding: 10px;
  border-radius: 10px;
  color: #fff;
  font-size: 16px;
  transform: .3s ease;
}
.submit:hover {
  background-color: rgb(56, 90, 194);
}
@keyframes pulse {
  from {
    transform: scale(0.9);
    opacity: 1;
  }
  to {
    transform: scale(1.8);
    opacity: 0;
  }
}
</style>
</body>
</html>



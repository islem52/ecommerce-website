<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include '../utils/Login.php'; ?>
<form class="form" method="POST">
    <p class="title">Login</p>
    <p class="message">Login to your account</p>

    <label>
        <input required type="email" style="width: 100%;" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        <span>Email</span>
    </label>

    <label>
        <input required type="password" style="width: 100%;" name="password">
        <span>Password</span>
    </label>

    <?php if (!empty($loginError)) : ?>
        <p style="color: red;"><?= htmlspecialchars($loginError) ?></p>
    <?php endif; ?>

    <button class="submit" name="submit">Submit</button>
    <p class="signin">Don't have an account? <a href="./signupPage.php">Sign up</a></p>
</form>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box; 
}
body {
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
        max-width: 350px;
        background-color: #fff;
        padding: 20px;
        border-radius: 20px;
        margin: 0 auto;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Add a beautiful shadow */
        width: 400px; 
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
        background-color: royalblue;
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

    .form label {
        position: relative;
    }

    .form label input {
        width: 100%; /* Ensure input fields take full width */
        padding: 10px 10px 20px 10px;
        outline: 0;
        border: 1px solid rgba(105, 105, 105, 0.397);
        border-radius: 10px;
    }

    .form label input + span {
        position: absolute;
        left: 10px;
        top: 15px;
        color: grey;
        font-size: 0.9em;
        cursor: text;
        transition: 0.3s ease;
    }

    .form label input:placeholder-shown + span {
        top: 15px;
        font-size: 0.9em;
    }

    .form label input:focus + span,.form label input:valid + span {
        top: 30px;
        font-size: 0.7em;
        font-weight: 600;
    }

    .form label input:valid + span {
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

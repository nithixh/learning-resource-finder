<?php
session_start();
$con = mysqli_connect('wp.kongu.edu', '24itb07', '24itb07', '24itb07');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";
$username = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            // Success: login the user
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit();
        } else {
            $message = "Incorrect <strong>password</strong>. Please try again.";
        }
    } else {
        $message = "No account found with that <strong>username</strong>. Please <a href='signup.php'>sign up</a>.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Learning Resource Finder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .topnav {
            overflow: hidden;
            background-color: black;
        }
        .topnav a {
            float: right;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 20px;
        }
        .topnav a:hover {
            background-color: white;
            color: black;
        }
        body { background-color: #f8f8f8; font-family: Arial, sans-serif; }
        .header { height: 120px; background: #568057; color: white; display: flex; align-items: center; justify-content: center; text-shadow: 1px 1px 5px rgba(0,0,0,0.7); }
        .container { max-width: 500px; background: white; padding: 30px; margin-top: 40px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .form-label { font-weight: bold; }
        .btn-submit { background-color: #568057; color: white; border: none; padding: 10px 20px; border-radius: 5px; }
        .btn-submit:hover { background-color: #446346; }
        .message-box { background-color: #fff3cd; color: #856404; padding: 10px; border: 1px solid #ffeeba; border-radius: 5px; margin-top: 15px; text-align: center; }
    </style>
    <script>
        function loginValidation() {
            const uname = document.forms["LoginForm"]["username"].value;
            const pwd = document.forms["LoginForm"]["password"].value;

            if (uname === "") {
                alert("Username must be filled");
                return false;
            }
            if (pwd === "") {
                alert("Password must be filled");
                return false;
            }
            return true;
        }

        function resetLoginForm() {
            document.getElementById("LoginForm").reset();
        }
    </script>
</head>
<body>
    <div class="header">
        <h1>Login</h1>
    </div>
    <div class="topnav">
        <a href="index.php">Back to Home</a>
    </div>
    <div class="container">
        <form id="LoginForm" name="LoginForm" action="login.php" method="post" onsubmit="return loginValidation()">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" id="username" name="username" class="form-control" value="<?= htmlspecialchars($username) ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-submit">Login</button>
            <button type="button" class="btn btn-secondary mt-2" onclick="resetLoginForm()">Reset</button>
        </form>

        <?php if (!empty($message)) : ?>
            <div class="message-box mt-3" style="color: <?= strpos($message, 'No account') !== false || strpos($message, 'Incorrect') !== false ? '#721c24' : '#155724' ?>;">
                <?= $message ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

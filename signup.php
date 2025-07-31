<?php
session_start();
$con = mysqli_connect('wp.kongu.edu', '24itb07', '24itb07', '24itb07');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";
$name = $email = $username = ""; // Default empty

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Check if email exists
    $emailCheck = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
    // Check if username exists
    $usernameCheck = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");

    if (mysqli_num_rows($emailCheck) > 0) {
        $message = "An account with this <strong>email</strong> already exists. Please <a href='login.php'>login</a>.";
    } elseif (mysqli_num_rows($usernameCheck) > 0) {
        $message = "<strong>Username</strong> already taken. Please choose a different one.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $insertQuery = "INSERT INTO users (name, email, username, password) VALUES ('$name', '$email', '$username', '$hashedPassword')";
        
        if (mysqli_query($con, $insertQuery)) {
            $message = "Signup successful! <a href='login.php'>Click here to login</a>.";
            // Clear values after success
            $name = $email = $username = "";
        } else {
            $message = "Error: " . mysqli_error($con);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup - Learning Resource Finder</title>
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
</head>
<script>
function formValidation() {
    let form = document.forms["Form2"];
    let name = form["name"].value.trim();
    let email = form["email"].value.trim();
    let username = form["username"].value.trim();
    let password = form["password"].value.trim();

    if (name === "") {
        alert("Full Name must be filled out");
        return false;
    }
    if (email === "") {
        alert("Email must be filled out");
        return false;
    }
    if (!email.includes("@") || !email.includes(".")) {
        alert("Please enter a valid email address");
        return false;
    }
    if (username === "") {
        alert("Username must be filled out");
        return false;
    }
    if (password === "") {
        alert("Password must be filled out");
        return false;
    }
    if (password.length < 6) {
        alert("Password must be at least 6 characters long");
        return false;
    }

    return true;
}

function resetForm() {
    document.forms["Form2"].reset();
}
</script>

<body>
    <div class="header">
        <h1>Signup</h1>
    </div>
    <div class="topnav">
        <a href="index.php">Back to Home</a>
    </div>
    <div class="container">
        <form id="Form2" name="Form2" action="signup.php" method="post" onsubmit="return formValidation()">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?= htmlspecialchars($name) ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($email) ?>">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" id="username" name="username" class="form-control" value="<?= htmlspecialchars($username) ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-submit">Sign Up</button>
            <button type="button" class="btn btn-secondary mt-2" onclick="resetForm()">Reset</button>
        </form>
        <?php if (!empty($message)) : ?>
            <div class="message-box mt-3" style="color: <?= strpos($message, 'successful') !== false ? '#155724' : '#721c24' ?>;">
        <?= $message ?>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
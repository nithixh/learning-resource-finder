<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authentication Required</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f8f8;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 100px auto;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .btn-auth {
            margin: 10px;
            padding: 10px 20px;
            font-size: 18px;
        }
        .btn-back {
            margin-top: 30px;
            font-size: 16px;
            padding: 8px 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Please log in to view the contents table.</h2>
        <p>If you don't have an account, please sign up first.</p>
        <a href="login.php" class="btn btn-success btn-auth">Log In</a>
        <a href="signup.php" class="btn btn-outline-secondary btn-auth">Sign Up</a>
        <div>
            <a href="index.php" class="btn btn-secondary btn-back">← Go Back</a>
        </div>
    </div>
</body>
</html>

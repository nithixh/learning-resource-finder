<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Learning Resource Finder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { margin: 0; font-family: Arial, sans-serif; }
        .header { height: 120px; background: #568057; color: white; display: flex; align-items: center; justify-content: center; text-shadow: 1px 1px 5px rgba(0,0,0,0.7); }
        .container { max-width: 900px; margin: 40px auto 0 auto; padding: 30px; background: #f8f8f8; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        h2 { color: #568057; text-align: center; font-size: 32px; }
        p { font-size: 20px; line-height: 1.7; color: #222; }
        .footer { background-color: #2c4a2e; color: white; text-align: center; padding: 15px; margin-top: 30px; font-size: 16px; }
        .nav-btn { background-color: #568057; color: white; padding: 10px 30px; border: none; border-radius: 5px; font-size: 18px; cursor: pointer; transition: background 0.2s; margin-top: 25px; display: block; margin-left: auto; margin-right: auto; }
        .nav-btn:hover { background-color: #446346; }
    </style>
</head>
<body>
    <div class="header">
        <h1>About Us</h1>
    </div>
    <div class="container">
        <h2>Welcome to Learning Resource Finder</h2>
        <p>
            Learning Resource Finder is dedicated to helping learners discover the best online resources for mastering Information Technology topics. Our team curates trusted websites and platforms so you can focus on learning, not searching.
        </p>
        <p>
            Whether you're a beginner or looking to deepen your knowledge, our platform guides you through programming, web development, databases, cybersecurity, and more. We believe in accessible, high-quality education for everyone.
        </p>
        <div class="d-flex justify-content-center gap-3 my-4 nav-buttons">
            <button class="btn btn-success btn-lg" id="homeBtn" onclick="showLoadingAndGo(this,'index.php')">Back to Home</button>
        </div>
    </div>
    <div class="footer">
        <p style="color:white">&copy; 2025 Learning Resource Finder | All rights reserved.</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function showLoadingAndGo(btnElem, url) {
    var navDiv = btnElem.closest('.nav-buttons');
    var buttons = navDiv.querySelectorAll('button');
    buttons.forEach(function(b){ b.style.display = 'none'; });
    var loadingBtn = document.createElement('button');
    loadingBtn.className = 'btn btn-secondary btn-lg d-flex align-items-center';
    loadingBtn.disabled = true;
    loadingBtn.style.minWidth = '120px';
    loadingBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Loading...';
    navDiv.appendChild(loadingBtn);
    setTimeout(function() {
        window.location.href = url;
    }, 1000);
}
    </script>
</body>
</html>
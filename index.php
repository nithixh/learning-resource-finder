<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Resource Finder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; }
        .header {
            height: 200px;
            background-image: url('images/headerbg1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
            padding: 5px;
            text-align: center;
        }
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
        .column1{
            float: left;
            width: 70%;
            padding: 15px;
        }
        .column2{
            float: right;
            width: 30%;
            padding: 15px;
        }
        .row::after {
            content: "";
            display: table;
            clear: both;
        }
        @media screen and (max-width:600px) {
            .column1 { width: 100%; }
            .column2{ width: 100%; }
        }
        .topnav a:hover {
            background-color: white;
            color: black;
        }
        .UL{ font-size:20px; }
        form input, form textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .footer {
            background-color: #2c4a2e;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 30px;
            font-size: 16px;
        }
        .nav-buttons { display: flex; justify-content: center; gap: 20px; margin: 30px 0 0 0; }
        .nav-btn { background-color: #568057; color: white; padding: 10px 30px; border: none; border-radius: 5px; font-size: 18px; cursor: pointer; transition: background 0.2s; }
        .nav-btn:hover:not(:disabled) { background-color: #446346; }
    </style>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['message'])) {
    $type = $_SESSION['message']['type'];
    $text = $_SESSION['message']['text'];
    $bg = $type === 'success' ? '#d4edda' : '#f8d7da';
    $color = $type === 'success' ? '#155724' : '#721c24';
    echo "<div id='alertBox' style='
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 9999;
        background-color: $bg;
        color: $color;
        border: 1px solid $color;
        padding: 12px 24px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        font-size: 16px;
        text-align: center;
        transition: opacity 1s ease;
    '>$text</div>";
    unset($_SESSION['message']);
    }
    ?>
    <script>
    setTimeout(() => {
        const alertBox = document.getElementById('alertBox');
        if (alertBox) {
            alertBox.style.opacity = '0';
            setTimeout(() => alertBox.remove(), 1000); // Remove from DOM after fade-out
        }
    }, 4000); // Start fading out after 4 seconds
    </script>

    <div class="header">
        <h1 style="font-family: cursive;">LEARNING RESOURCE FINDER</h1>
    </div>
    <div class="topnav">
    <?php if (isset($_SESSION['username'])): ?>
        <a href="logout.php">Logout (<?= htmlspecialchars($_SESSION['username']) ?>)</a>
    <?php else: ?>
        <a href="login.php">Login</a>
        <a href="signup.php">Sign Up</a>
    <?php endif; ?>
    
    <a href="aboutus.php">About Us</a>
    <a href="index.php">Home</a>
</div>

    <div class="row">
        <div class="column1">
            <!-- Bootstrap Carousel Start -->
            <div id="mainCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/programming.jpg" class="d-block w-100" alt="Learn Programming" style="height:220px; object-fit:cover;">
                    </div>
                    <div class="carousel-item">
                        <img src="images/cloud.jpg" class="d-block w-100" alt="Cloud Computing" style="height:220px; object-fit:cover;">
                    </div>
                    <div class="carousel-item">
                        <img src="images/cybersecurity.jpg" class="d-block w-100" alt="Cybersecurity" style="height:220px; object-fit:cover;">
                    </div>
                </div>
            </div>
            <!-- Bootstrap Carousel End -->
            <h2 style="color:#568057;text-align:center;font-size:35px">Description</h2>
            <p style="font-size: 20px;text-align:left;">Learning Resource Finder is a one-stop platform where learners can explore key topics in Information Technology and discover trusted websites to master each subject.
                 Whether you're interested in programming, web development, databases, or cybersecurity, this site helps you get started by providing curated links to top learning platforms. 
                Just pick a topic, click, and start learning!
            </p>
            <h2 style="color:#568057;text-align:center;font-size:35px;">
                Topics to Learn
            </h2 >
            <div class="UL">
                <ul>
                    <li>Programming Languages</li>
                    <li>Web Development</li>
                    <li>Data Structures & Algorithms</li>
                    <li>Databases</li>
                    <li>Operating Systems</li>
                    <li>Computer Networks</li>
                    <li>Cybersecurity Basics</li>
                    <li>Cloud Computing</li>
                </ul>
            </div>
        </div>
        <div class="column2">
            <h2 style="color:#568057;text-align:center;font-size:35px">Steps to Learn</h2>
            <div class="OL" style="font-size: 20px;">
                <ol>
                    <li>Start with basic programming (C/Python)</li>
                    <li>Learn Web Development</li>
                    <li>Practice Data Structures & Algorithms</li>
                    <li>Understand Databases & SQL</li>
                    <li>Explore OS, CN, and Security</li>
                    <li>Learn about Cloud Platforms</li>
                </ol>
            </div>
            <h3 style="color:#568057;text-align:center;font-size:35px">Suggest a Topic</h3>
            <form action="server.php" method="post" style="display: flex; flex-direction: column; gap: 10px;">
                <label for="name" style="font-size:20px;">Your Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                <label for="topic"style="font-size:20px;">Topic Name:</label>
                <input type="text" id="topic" name="topic" placeholder="Suggest a topic" required>
                <label for="reason"style="font-size:20px;">Why it's useful:</label>
                <textarea id="reason" name="reason" rows="4" placeholder="Tell us why this topic matters"></textarea>
                <button type="submit" style="background-color:#568057; color:white; padding:10px; border:none; border-radius:5px;">Submit</button>
            </form>
        </div>
    </div>
<div class="nav-buttons d-flex justify-content-center gap-3 my-4">
    <button class="btn btn-success btn-lg" id="prevBtn" disabled>Previous</button>

    <?php if (isset($_SESSION['username'])): ?>
        <button class="btn btn-success btn-lg" id="nextBtn" onclick="showLoadingAndGo(this,'table.php')">Next</button>
    <?php else: ?>
        <button class="btn btn-success btn-lg" id="nextBtn" onclick="showLoadingAndGo(this,'auth_required.php')">Next</button>
    <?php endif; ?>
</div>
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
    var myCarousel = document.querySelector('#mainCarousel');
    if(myCarousel) {
        var carousel = new bootstrap.Carousel(myCarousel, { interval: 2000, ride: 'carousel' });
    }
    </script>
    <style>
    .carousel-container {
        max-width: 600px;
        margin: 30px auto 18px auto;
        position: relative;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.10);
        background: #fff;
    }
    .carousel-img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        display: block;
    }
    .carousel-slide { display: none; }
    .active, .dot:hover { background-color: #568057; }
    .carousel-dots { margin-top: 6px; }
    .dot {
        height: 12px;
        width: 12px;
        margin: 0 3px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.3s;
        cursor: pointer;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    </style>
    <div class="footer">
        <p>&copy; 2025 Learning Resource Finder | All rights reserved.</p>
    </div>
</body>
</html>

<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Topics Table</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; }
        .header { height: 120px; background: #568057; color: white; display: flex; align-items: center; justify-content: center; text-shadow: 1px 1px 5px rgba(0,0,0,0.7); }
        .table-container { padding: 30px 15px 15px 15px; max-width: 1100px; margin: 0 auto; }
        .t { border-collapse: collapse; width: 100%; }
        .t th { padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #568057; color: black; border: 1px solid #ddd; padding: 8px; font-size: 25px; }
        .t td { border: 1px solid #ddd; padding: 8px; font-size: 20px; }
        .t tr:nth-child(even) { background-color: #f2f2f2; }
        .t tr:hover { background-color: #ddd; }
        .footer { background-color: #2c4a2e; color: white; text-align: center; padding: 15px; margin-top: 30px; font-size: 16px; }
        .nav-buttons { display: flex; justify-content: center; gap: 20px; margin: 30px 0 0 0; }
        .nav-btn { background-color: #568057; color: white; padding: 10px 30px; border: none; border-radius: 5px; font-size: 18px; cursor: pointer; transition: background 0.2s; }
        .nav-btn:disabled, .nav-btn[aria-disabled="true"] { background-color: #ccc; color: #666; cursor: not-allowed; }
        .nav-btn:hover:not(:disabled) { background-color: #446346; }
        @media screen and (max-width:600px) { .table-container { padding: 8px; } .t th, .t td { font-size: 17px; } }
    </style>
</head>
<body>
    <div class="header">
        <h1>Learning Resource Finder - Topics Table</h1>
    </div>
    <div class="table-container">
        <h2 style="color:#568057;text-align:center;font-size:30px">Uses of each Topic and their Locations</h2>
        <table class="t">
            <tr>
                <th>SNo.</th>
                <th>Topics</th>
                <th>Used for</th>
                <th>Location</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Programming Languages</td>
                <td>Used to build software, websites, apps, and automate tasks</td>
                <td>
                    <a href="https://www.w3schools.com/" target="_blank">W3Schools</a><br>
                    <a href="https://www.geeksforgeeks.org/" target="_blank">GeeksforGeeks</a><br>
                    <a href="https://www.codecademy.com/" target="_blank">Codecademy</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Web Development</td>
                <td>Creates and manages websites and web-based applications</td>
                <td>
                    <a href="https://www.w3schools.com/" target="_blank">W3Schools</a><br>
                    <a href="https://www.freecodecamp.org/" target="_blank">freeCodeCamp</a><br>
                    <a href="https://www.frontendmentor.io/" target="_blank">Frontend Mentor</a><br>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Data Structurs & Algorithms</td>
                <td>Improves program performance and solves complex problems efficiently</td>
                <td>
                    <a href="https://www.geeksforgeeks.org/" target="_blank">GeeksforGeeks</a><br>
                    <a href="https://leetcode.com/" target="_blank">Leetcode</a><br>
                    <a href="https://www.hackerrank.com/" target="_blank">Hackerrank</a><br>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Databases</td>
                <td>Stores, organizes, and retrieves large volumes of data for applications</td>
                <td>
                    <a href="https://www.w3schools.com/sql/" target="_blank">W3schools SQL</a><br>
                    <a href="https://www.khanacademy.org/computing/computer-programming/sql" target="_blank">Khan Academy SQL</a><br>
                    <a href="https://learn.mongodb.com/" target="_blank">MongoDB University</a><br>
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Operating Systems</td>
                <td>Manages computer hardware and software for user and program interaction</td>
                <td>
                    <a href="https://www.youtube.com/@NesoAcademy" target="_blank">Neso Academy (YouTube)</a><br>
                    <a href="https://www.geeksforgeeks.org/operating-systems/" target="_blank">GeeksforGeeks OS Section</a><br>
                    <a href="https://www.tutorialspoint.com/operating_system/index.htm" target="_blank">TutorialsPoint - OS</a><br>
                </td>
            </tr>
            <tr>
                <td>6</td>
                <td>Computer Networks</td>
                <td>Enables data sharing, internet access, and communication between devices</td>
                <td>
                    <a href="https://www.netacad.com/" target="_blank">Cisco Networking Academy</a><br>
                    <a href="https://www.geeksforgeeks.org/computer-network-tutorials/" target="_blank">GeeksforGeeks CN Section</a><br>
                    <a href="https://www.tutorialspoint.com/computer_fundamentals/computer_networking.htm" target="_blank">TutorialsPoint - Networks</a><br>
                </td>
            </tr>
            <tr>
                <td>7</td>
                <td>Cybersecurity Basics</td>
                <td>Protects systems and data from viruses, hackers, and cyber threats</td>
                <td>
                    <a href="https://www.cybrary.it/" target="_blank">Cybrary</a><br>
                    <a href="https://www.khanacademy.org/computing/computer-science/internet-intro" target="_blank">Khan Academy - Internet Safety</a><br>
                    <a href="https://tryhackme.com/" target="_blank">TryHackMe</a><br>
                </td>
            </tr>
            <tr>
                <td>8</td>
                <td>Cloud Computing</td>
                <td>Provides scalable online storage and services without physical infrastructure</td>
                <td>
                    <a href="https://aws.amazon.com/training/" target="_blank">AWS Training</a><br>
                    <a href="https://www.cloudskillsboost.google/" target="_blank">Google Cloud Skills Boost</a><br>
                    <a href="https://learn.microsoft.com/en-us/training/" target="_blank">Microsoft Learn</a><br>
                </td>
            </tr>
        </table>
        <div class="nav-buttons d-flex justify-content-center gap-3 my-4">
            <button class="btn btn-lg custom-green-btn" onclick="showLoadingAndGo(this,'index.php')">Back to Home</button>
        </div>
    </div>
    <div class="footer">
        <p style="color:white">&copy; 2025 Learning Resource Finder | All rights reserved.</p>
    </div>
    <style>
    .custom-green-btn {
        background-color: #568057;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 1.25rem;
        padding: 10px 30px;
        transition: background 0.2s, color 0.2s;
    }
    .custom-green-btn:hover, .custom-green-btn:focus {
        background-color: #446346;
        color: #fff;
    }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function showLoadingAndGo(btnElem, url) {
        var navDiv = btnElem.closest('.nav-buttons');
        var buttons = navDiv.querySelectorAll('button');
        buttons.forEach(function(b){ b.style.display = 'none'; });
        var loadingBtn = document.createElement('button');
        loadingBtn.className = 'btn btn-lg custom-green-btn d-flex align-items-center';
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
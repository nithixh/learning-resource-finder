<?php
session_start();
$con=mysqli_connect('wp.kongu.edu','24itb07','24itb07','24itb07');
if($con){
    echo "Connection successful";
}
else{
    die(mysqli_error($con));
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $topic = mysqli_real_escape_string($con, $_POST['topic']);
    $reason = mysqli_real_escape_string($con, $_POST['reason']);

    $sql = "INSERT INTO suggestedtopics (name, topic, uses) VALUES ('$name', '$topic', '$reason')";
    
    if (mysqli_query($con, $sql)) {
        $_SESSION['message'] = ['type' => 'success', 'text' => 'Your suggestion is saved.'];
    } else {
        $_SESSION['message'] = ['type' => 'error', 'text' => 'Unexpected error'];
    }

    header("Location: index.php");
    exit();
}
?>
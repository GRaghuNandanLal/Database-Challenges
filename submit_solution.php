<?php
include 'includes/header.php';
include 'includes/db_connect.php';

// if (!isset($_SESSION['user_id']) || !isset($_POST['challenge_id']) || !isset($_POST['solution'])) {
//     header("Location: dashboard.php");
//     exit();
// }

if (!isset($_SESSION['user_id']) || !isset($_POST['solution']) || !isset($_POST['challenge_id'])) {
    echo "Invalid submission";
    exit();
}

$user_id = $_SESSION['user_id'];
$challenge_id = $_POST['challenge_id'];
$solution = $_POST['solution'];

// In a real application, you would evaluate the solution here
// For this example, we'll just save it to the database

$stmt = $pdo->prepare("INSERT INTO submissions (user_id, challenge_id, solution, submitted_at) VALUES (?, ?, ?, NOW())");
$stmt->execute([$user_id, $challenge_id, $solution]);


if ($result) {
    echo "Solution submitted successfully!";
} else {
    echo "Error submitting solution.";
}
// Redirect to a results page or back to the challenge
// header("Location: challenge.php?id=" . $challenge_id . "&submitted=1");
// exit();
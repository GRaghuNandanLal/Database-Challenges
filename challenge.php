<?php
include 'includes/header.php';
include 'includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM challenges WHERE id = ?");
$stmt->execute([$_GET['id']]);
$challenge = $stmt->fetch();

if (!$challenge) {
    header("Location: dashboard.php");
    exit();
}

$stmt = $pdo->query("SELECT id, title FROM challenges ORDER BY id ASC");
$challenges = $stmt->fetchAll();

include 'challenge_layout.php';
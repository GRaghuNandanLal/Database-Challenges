<?php
include 'includes/header.php';
include 'includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

$stmt = $pdo->prepare("SELECT COUNT(*) as total_submissions FROM submissions WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$submission_count = $stmt->fetch()['total_submissions'];
?>

<div class="container mt-5">
    <h2>User Profile</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($user['username']); ?></h5>
            <p class="card-text">Email: <?php echo htmlspecialchars($user['email']); ?></p>
            <p class="card-text">Total Submissions: <?php echo $submission_count; ?></p>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
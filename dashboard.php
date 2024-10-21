<?php
include 'includes/header.php';
include 'includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM challenges ORDER BY difficulty ASC");
$stmt->execute();
$challenges = $stmt->fetchAll();
?>

<div class="container mt-5">
    <h2>Dashboard</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Challenge</th>
                <th>Difficulty</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($challenges as $challenge): ?>
            <tr>
                <td><?php echo htmlspecialchars($challenge['title']); ?></td>
                <td><?php echo htmlspecialchars($challenge['difficulty']); ?></td>
                <td><a href="challenge.php?id=<?php echo $challenge['id']; ?>" class="btn btn-primary btn-sm">Solve</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>
<?php
include 'includes/header.php';
include 'includes/db_connect.php';

$stmt = $pdo->query("
    SELECT users.username, COUNT(submissions.id) as submission_count
    FROM users
    LEFT JOIN submissions ON users.id = submissions.user_id
    GROUP BY users.id
    ORDER BY submission_count DESC
    LIMIT 10
");
$leaderboard = $stmt->fetchAll();
?>

<div class="container mt-5">
    <h2>Leaderboard</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Username</th>
                <th>Submissions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($leaderboard as $index => $entry): ?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo htmlspecialchars($entry['username']); ?></td>
                <td><?php echo $entry['submission_count']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>
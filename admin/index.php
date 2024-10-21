<?php
session_start();
include '../includes/db_connect.php';

// Check if the user is an admin
if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: ../login.php");
    exit();
}

$stmt = $pdo->query("SELECT * FROM challenges ORDER BY id DESC");
$challenges = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <div class="navbar-nav ml-auto">
                <a href="../logout.php" class="btn btn-outline-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Manage Challenges</h2>
        <a href="add_challenge.php" class="btn btn-primary mb-3">Add New Challenge</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Difficulty</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($challenges as $challenge): ?>
                <tr>
                    <td><?php echo $challenge['id']; ?></td>
                    <td><?php echo htmlspecialchars($challenge['title']); ?></td>
                    <td><?php echo htmlspecialchars($challenge['difficulty']); ?></td>
                    <td>
                        <a href="edit_challenge.php?id=<?php echo $challenge['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="delete_challenge.php?id=<?php echo $challenge['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this challenge?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
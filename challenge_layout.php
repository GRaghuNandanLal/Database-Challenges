<!-- <?php include 'includes/header.php'; ?> -->
    <div class="col-md-3 sidebar">
        <h3>Problem List</h3>
        <ul class="list-group">
            <?php foreach ($challenges as $ch): ?>
                <li class="list-group-item <?php echo $ch['id'] == $challenge['id'] ? 'active' : ''; ?>">
                    <a href="challenge.php?id=<?php echo $ch['id']; ?>"><?php echo htmlspecialchars($ch['title']); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-md-9 main-content">
        <div class="row">
            <div class="col-md-6 problem-description">
                <h2><?php echo htmlspecialchars($challenge['title']); ?></h2>
                <p class="difficulty"><?php echo htmlspecialchars($challenge['difficulty']); ?></p>
                <div class="description">
                    <?php echo nl2br(htmlspecialchars($challenge['description'])); ?>
                </div>
            </div>
            <div class="col-md-6 code-editor">
                <input type="hidden" id="challenge-id" value="<?php echo $challenge['id']; ?>">
                <textarea id="code-editor" name="solution"></textarea>
                <button class="btn btn-primary mt-3" id="submit-btn">Submit Solution</button>
            </div>
        </div>
    </div>
<?php include 'includes/footer.php'; ?>
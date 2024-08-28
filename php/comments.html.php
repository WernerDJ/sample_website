<div class="comment-form">
    <h2>Leave a Comment</h2>
    <form action="" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="alias">Alias:</label><br>
        <input type="text" id="alias" name="alias" required><br><br>
        <label for="comment">Comment:</label><br>
        <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</div>
<div class="comments-section">
    <h2>Comments</h2>
    <?php if ($comments->num_rows > 0): ?>
        <?php while ($comment = $comments->fetch_assoc()): ?>
            <div class="comment-container">
                <div class="comment-info">
                    <strong><?php echo htmlspecialchars($comment['email']); ?></strong><br>
                    <em><?php echo htmlspecialchars($comment['CommentDate']); ?></em>
                </div>
                <div class="comment-box">
                    <div class="comment-text"><?php echo htmlspecialchars($comment['Comment']); ?></div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No comments yet. Be the first to comment!</p>
    <?php endif; ?>
</div>
</body>
</html>
<?php
// Close the connection
$conn->close();
?>
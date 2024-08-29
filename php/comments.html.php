<style>
    .comments-section {
    margin-top: 2em;
    padding: 1em;
    background-color: #333;
    border-radius: 0.25em;
    color: ghostwhite;
}

.comment-container {
    display: flex;
    align-items: flex-start;
    margin-bottom: 1.5em;
    padding: 1em;
    border: 1px solid #555;
    border-radius: 0.25em;
    background-color: #444;
}

.comment-info {
    width: 20%;
    padding-right: 1em;
    font-size: 0.9em;
    color: LightCyan;
    font-style: italic;
    text-align: left;
}

.comment-box {
    width: 80%;
}

.comment-text {
    width: 100%;
    height: 5em;
    padding: 0.5em;
    border: 1px solid #777;
    border-radius: 0.25em;
    background-color: #222;
    color: ghostwhite;
    line-height: 1.5;
    white-space: pre-wrap;
    word-wrap: break-word;
    resize: none;
    overflow: auto;
}
</style>
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

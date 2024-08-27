<?php // blogdata.php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $alias = $_POST['alias'];
    $comment = $_POST['comment'];
    $commentDate = date("Y-m-d H:i:s");
    $publish_it = 1; // Automatically set to published

    // Insert the comment into the database
    $sql = "INSERT INTO comments (BlogPostTitle, email, Alias, Comment, CommentDate, publish_it) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $blogPostTitle, $email, $alias, $comment, $commentDate, $publish_it);

    if ($stmt->execute()) {
        echo "Comment added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Fetch the blog post from the database
$sql = "SELECT * FROM blogpost WHERE BlogPostTitle = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $blogPostTitle);
$stmt->execute();
$blogPost = $stmt->get_result()->fetch_assoc();

// Check if the blog post exists
if (!$blogPost) {
    echo "Blog post not found.";
    exit();
}

// Fetch comments for the blog post (only published comments)
$sql = "SELECT * FROM comments WHERE BlogPostTitle = ? AND publish_it = 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $blogPostTitle);
$stmt->execute();
$comments = $stmt->get_result();
?>
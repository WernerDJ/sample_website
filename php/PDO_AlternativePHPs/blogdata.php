<?php

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $alias = $_POST['alias'];
    $comment = $_POST['comment'];
    $commentDate = date("Y-m-d H:i:s");
    $publish_it = 1; // Automatically set to published

    // Insert the comment into the database 
    $sql = "INSERT INTO comments (BlogPostTitle, email, Alias, Comment, CommentDate, publish_it) 
            VALUES (:BlogPostTitle, :email, :alias, :comment, :commentDate, :publish_it)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':BlogPostTitle', $blogPostTitle);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':alias', $alias);
    $stmt->bindParam(':comment', $comment);
    $stmt->bindParam(':commentDate', $commentDate);
    $stmt->bindParam(':publish_it', $publish_it);

    if ($stmt->execute()) {
        echo "Comment added successfully!";
    } else {
        echo "Error: Unable to add comment.";
    }
}

// Fetch the blog post from the database 
$sql = "SELECT * FROM blogpost WHERE BlogPostTitle = :BlogPostTitle";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':BlogPostTitle', $blogPostTitle);
$stmt->execute();
$blogPost = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the blog post exists
if (!$blogPost) {
    echo "Blog post not found.";
    exit();
}

// Fetch comments for the blog post (only published comments) 
$sql = "SELECT * FROM comments WHERE BlogPostTitle = :BlogPostTitle AND publish_it = 1";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':BlogPostTitle', $blogPostTitle);
$stmt->execute();
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

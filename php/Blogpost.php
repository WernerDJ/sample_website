<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/PostStyl.css">
    <title><?php echo htmlspecialchars($blogPost['BlogPostTitle']); ?></title>
</head>
<body>

<h1>Blog Post Title</h1>

<div>
    <p class="first-paragraph">
Lorem ipsum odor amet, consectetuer adipiscing elit. Libero lobortis viverra massa facilisis pellentesque. Gravida molestie euismod facilisi placerat pellentesque ultricies maximus netus. Taciti vulputate venenatis id hendrerit pharetra nostra torquent adipiscing. Nullam elit viverra pellentesque venenatis sed mollis tincidunt. Gravida per eget dolor nostra est augue. Auctor sapien condimentum ornare metus turpis non vehicula efficitur. Suspendisse netus convallis facilisi semper malesuada inceptos eu quisque hac. Ridiculus sed interdum sed sodales, nibh primis elit cras?</p>
<p>
Elit viverra penatibus sed habitasse commodo faucibus urna vitae. Per urna eu magna augue elit feugiat sodales luctus faucibus. Euismod erat maximus cursus penatibus vestibulum viverra phasellus ex. Hac suscipit augue ac nulla dapibus posuere dolor aptent. Et urna quam sagittis varius maximus. Faucibus habitasse elementum placerat rutrum suspendisse. Et nulla rutrum mollis habitant lectus ullamcorper purus proin laoreet.
</p>
</div>

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
<?php
require_once '../php/contact.php';
// Set the blog post title directly in the code
$blogPostTitle = "Blog Post Title as it is written in database";
require_once '../php/blogdata.php';
include '../php/comments.html.php';
